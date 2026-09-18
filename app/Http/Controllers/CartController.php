<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    public function index()
    {
        $items = Session::get('cart', []);

        return view('cart', compact('items'));
    }

    public function add(Request $request): RedirectResponse
    {
        $request->validate([
            'product' => ['required', 'string'],
            'size' => ['required', 'integer', Rule::in([0, 45000, 85000])],
            'custom_note' => ['nullable', 'string', 'max:1000'],
            'card_message' => ['nullable', 'string', 'max:1000'],
        ]);

        $product = Product::where('slug', $request->product)
            ->where('is_active', true)
            ->firstOrFail();
        $sizeAdd = (int) $request->size;

        $sizeLabels = [0 => 'Standar', 45000 => 'Deluxe', 85000 => 'Grand'];

        $cart = Session::get('cart', []);
        $cart[] = [
            'id' => (string) Str::uuid(),
            'product_id' => $product->id,
            'name' => $product->name,
            'image' => $product->image,
            'size' => $sizeLabels[$sizeAdd] ?? 'Standar',
            'price' => $product->price + $sizeAdd,
            'custom_note' => $request->custom_note,
            'card_message' => $request->card_message,
        ];

        Session::put('cart', $cart);

        if ($request->boolean('checkout')) {
            return redirect()->route('checkout');
        }

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang.');
    }

    public function destroy(string $itemId): RedirectResponse
    {
        $items = collect(Session::get('cart', []))
            ->reject(fn (array $item): bool => $item['id'] === $itemId)
            ->values()
            ->all();

        Session::put('cart', $items);

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }
}
