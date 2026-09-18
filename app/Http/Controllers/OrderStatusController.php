<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Session;

class OrderStatusController extends Controller
{
    public function show()
    {
        $order = null;
        $orderNumber = Session::get('last_order_number');

        if ($orderNumber) {
            $order = Order::where('order_number', $orderNumber)->first();
        }

        return view('order-status', compact('order'));
    }
}
