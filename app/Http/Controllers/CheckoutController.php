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
            'address' => ['required', 'string'],
            'payment_method' => ['required', 'in:midtrans_qris,midtrans_bank_transfer,midtrans_ewallet'],
        ]);

        $items = Session::get('cart', []);

        if (empty($items)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong.');
        }

        $total = array_sum(array_column($items, 'price'));

        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => Order::generateOrderNumber(),
            'customer_name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total,
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
                'price' => $item['price'],
                'custom_note' => $item['custom_note'] ?? null,
                'card_message' => $item['card_message'] ?? null,
            ]);
        }

        $snapToken = $this->midtransAvailable ? Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $order->order_number,
                'gross_amount' => $order->total,
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
                'phone' => $order->phone,
            ],
            'item_details' => collect($items)->map(fn ($item) => [
                'id' => $item['product_id'] ?? Str::slug($item['name']),
                'price' => $item['price'],
                'quantity' => 1,
                'name' => substr($item['name'], 0, 50),
            ])->toArray(),
        ]) : null;

        if ($snapToken) {
            $order->update([
                'midtrans_order_id' => $order->order_number,
                'midtrans_snap_token' => $snapToken,
            ]);
        }

        Session::forget('cart');
        Session::put('last_order_number', $order->order_number);

        return view('checkout-pay', [
            'order' => $order,
            'snapToken' => $snapToken,
            'clientKey' => config('services.midtrans.client_key'),
            'midtransAvailable' => $this->midtransAvailable,
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
