<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class FlowerController extends Controller
{
    public function show(string $slug): View
    {
        $flower = Product::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('flower-detail', compact('flower', 'slug'));
    }
}
