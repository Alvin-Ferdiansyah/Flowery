<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->latest()->take(8)->get();

        return view('home', compact('products'));
    }

    public function collection(): View
    {
        $products = Product::where('is_active', true)->latest()->get();

        return view('collections.index', compact('products'));
    }
}
