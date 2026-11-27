<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $selectedCategorySlug = $request->query('kategori');
        $categories = Category::withCount('products')->get();

        $query = Product::where('is_active', true);

        if ($selectedCategorySlug) {
            $query->whereHas('category', function ($q) use ($selectedCategorySlug) {
                $q->where('slug', $selectedCategorySlug);
            });
        }

        $products = $query->latest()->take(12)->get();

        return view('home', compact('products', 'categories', 'selectedCategorySlug'));
    }

    public function collection(Request $request): View
    {
        $search = $request->query('q');
        $selectedCategorySlug = $request->query('kategori');
        $categories = Category::withCount('products')->get();

        $query = Product::with('category')->where('is_active', true);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('variety', 'like', "%{$search}%")
                    ->orWhere('colour', 'like', "%{$search}%");
            });
        }

        if ($selectedCategorySlug) {
            $query->whereHas('category', function ($q) use ($selectedCategorySlug) {
                $q->where('slug', $selectedCategorySlug);
            });
        }

        $products = $query->latest()->paginate(12)->withQueryString();

        return view('collections.index', compact('products', 'categories', 'search', 'selectedCategorySlug'));
    }
}
