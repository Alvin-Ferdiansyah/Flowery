<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $totalRevenue = Order::where('payment_status', 'paid')->sum('total');
        $paidOrdersCount = Order::where('payment_status', 'paid')->count();
        $pendingOrdersCount = Order::where('status', 'pending')->count();
        $completedOrdersCount = Order::where('status', 'completed')->count();

        $recentSales = Order::with('items')
            ->where('payment_status', 'paid')
            ->latest()
            ->paginate(15);

        return view('admin.reports.index', compact(
            'totalRevenue',
            'paidOrdersCount',
            'pendingOrdersCount',
            'completedOrdersCount',
            'recentSales'
        ));
    }
}
