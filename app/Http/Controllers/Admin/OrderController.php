<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('items')
            ->when($request->status, fn ($q) => $q->where('status', $request->status))
            ->latest()
            ->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items', 'user');

        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => ['required', 'in:pending,confirmed,processing,completed,cancelled'],
            'payment_status' => ['nullable', 'in:pending,paid,failed,expired'],
            'tracking_number' => ['nullable', 'string', 'max:100'],
        ]);

        $updateData = ['status' => $request->status];
        if ($request->has('payment_status')) {
            $updateData['payment_status'] = $request->payment_status;
        }
        if ($request->has('tracking_number')) {
            $updateData['tracking_number'] = $request->tracking_number;
        }

        $order->update($updateData);

        return back()->with('success', 'Data & status pesanan berhasil diperbarui.');
    }
}
