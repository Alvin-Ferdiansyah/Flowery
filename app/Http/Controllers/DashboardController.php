<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'new_orders' => Order::where('status', 'pending')->count(),
            'total_products' => Product::count(),
            'waiting_confirmation' => Order::where('status', 'pending')
                ->where('payment_status', 'paid')->count(),
        ];

        $recentOrders = Order::latest()->take(8)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}
