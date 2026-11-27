<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderStatusController extends Controller
{
    public function show(Request $request)
    {
        $orderNumber = $request->query('order') ?? Session::get('last_order_number');
        $order = null;

        if ($orderNumber) {
            $order = Order::with('items')->where('order_number', $orderNumber)->first();
        }

        // Jika pembayaran sukses dikonfirmasi via halaman resi/simulasi
        if ($order && $request->has('simulasi_bayar') && $order->payment_status !== 'paid') {
            $order->update([
                'payment_status' => 'paid',
                'status' => 'confirmed',
            ]);

            return redirect()->route('order.status', ['order' => $order->order_number, 'paid' => 1])
                ->with('success', 'Pembayaran berhasil dikonfirmasi!');
        }

        return view('order-status', compact('order'));
    }
}
