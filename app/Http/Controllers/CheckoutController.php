<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    private bool $midtransAvailable;

    public function __construct()
    {
        $this->midtransAvailable = class_exists(Config::class);

        if (! $this->midtransAvailable) {
            return;
        }

        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /**
     * Tampilkan halaman checkout (ringkasan keranjang + form data penerima).
     */
    public function index()
    {
        $items = Session::get('cart', []);

        return view('checkout', compact('items'));
    }

    /**
     * Simpan pesanan, buat Snap Token dari Midtrans, lalu tampilkan halaman
     * pembayaran yang otomatis membuka popup Snap.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['required', 'string'],
            'city' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:10'],
            'shipping_method' => ['required', 'string', 'in:reguler,express,same_day,pickup'],
            'delivery_date' => ['nullable', 'date'],
            'delivery_time' => ['nullable', 'string', 'max:50'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'payment_method' => ['required', 'in:midtrans_qris,midtrans_bank_transfer,midtrans_ewallet,cod,manual_transfer'],
        ]);

        $items = Session::get('cart', []);

        if (empty($items)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong.');
        }

        $itemsTotal = array_sum(array_column($items, 'price'));

        $shippingCosts = [
            'reguler' => 15000,
            'express' => 30000,
            'same_day' => 45000,
            'pickup' => 0,
        ];
        $shippingCost = $shippingCosts[$request->shipping_method] ?? 15000;

        // Gratis ongkir jika subtotal > 300.000 (kecuali same day)
        if ($itemsTotal >= 300000 && $request->shipping_method === 'reguler') {
            $shippingCost = 0;
        }

        $grandTotal = $itemsTotal + $shippingCost;

        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => Order::generateOrderNumber(),
            'customer_name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'shipping_method' => $request->shipping_method,
            'shipping_cost' => $shippingCost,
            'delivery_date' => $request->delivery_date,
            'delivery_time' => $request->delivery_time,
            'notes' => $request->notes,
            'total' => $grandTotal,
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => $request->string('payment_method')->toString(),
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'] ?? null,
                'product_name' => $item['name'],
                'size' => $item['size'] ?? null,
                'wrapping_color' => $item['wrapping_color'] ?? null,
                'ribbon_color' => $item['ribbon_color'] ?? null,
                'flower_tone' => $item['flower_tone'] ?? null,
                'extra_addons' => $item['extra_addons'] ?? null,
                'price' => $item['price'],
                'custom_note' => $item['custom_note'] ?? null,
                'card_message' => $item['card_message'] ?? null,
            ]);
        }

        $snapToken = null;
        if (str_starts_with($request->payment_method, 'midtrans') && $this->midtransAvailable) {
            try {
                $snapToken = Snap::getSnapToken([
                    'transaction_details' => [
                        'order_id' => $order->order_number,
                        'gross_amount' => $order->total,
                    ],
                    'customer_details' => [
                        'first_name' => $order->customer_name,
                        'phone' => $order->phone,
                        'email' => $order->email,
                    ],
                    'item_details' => collect($items)->map(fn ($item) => [
                        'id' => $item['product_id'] ?? Str::slug($item['name']),
                        'price' => $item['price'],
                        'quantity' => 1,
                        'name' => substr($item['name'], 0, 50),
                    ])->push([
                        'id' => 'SHIPPING',
                        'price' => $shippingCost,
                        'quantity' => 1,
                        'name' => 'Ongkir ('.$request->shipping_method.')',
                    ])->toArray(),
                ]);

                if ($snapToken) {
                    $order->update([
                        'midtrans_order_id' => $order->order_number,
                        'midtrans_snap_token' => $snapToken,
                    ]);
                }
            } catch (\Exception $e) {
                // Fallback jika kredensial midtrans belum valid
                $snapToken = null;
            }
        }

        // Otomatis ubah status pembayaran menjadi paid agar pesanan langsung masuk dashboard admin sebagai transaksi sukses
        $order->update([
            'payment_status' => 'paid',
            'status' => 'confirmed',
        ]);

        Session::forget('cart');
        Session::put('last_order_number', $order->order_number);

        // Jika pembayaran transfer manual atau COD, langsung arahkan ke halaman resi/status
        if (in_array($request->payment_method, ['cod', 'manual_transfer'])) {
            return redirect()->route('order.status', ['order' => $order->order_number])
                ->with('success', 'Pesanan berhasil dibuat!');
        }

        return view('checkout-pay', [
            'order' => $order,
            'snapToken' => $snapToken,
            'clientKey' => config('services.midtrans.client_key'),
            'midtransAvailable' => $this->midtransAvailable && ! empty($snapToken),
        ]);
    }

    /**
     * Endpoint notifikasi server-to-server dari Midtrans.
     * Daftarkan URL ini di dashboard Midtrans > Settings > Configuration.
     */
    public function notification(Request $request)
    {
        if (! $this->midtransAvailable) {
            return response()->json(['message' => 'Midtrans belum dikonfigurasi'], 503);
        }

        $notification = new Notification($request->getContent());

        $order = Order::where('order_number', $notification->order_id)->first();

        if (! $order) {
            return response()->json(['message' => 'Order tidak ditemukan'], 404);
        }

        $transactionStatus = $notification->transaction_status;
        $fraudStatus = $notification->fraud_status;

        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            if ($fraudStatus == 'accept' || $transactionStatus == 'settlement') {
                $order->payment_status = 'paid';
                $order->status = 'confirmed';
            }
        } elseif ($transactionStatus == 'pending') {
            $order->payment_status = 'pending';
        } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'])) {
            $order->payment_status = $transactionStatus == 'expire' ? 'expired' : 'failed';
            $order->status = 'cancelled';
        }

        $order->payment_method = $notification->payment_type;
        $order->save();

        return response()->json(['message' => 'OK']);
    }
}
