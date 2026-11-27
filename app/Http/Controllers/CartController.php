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
            'wrapping_color' => ['nullable', 'string', 'max:50'],
            'ribbon_color' => ['nullable', 'string', 'max:50'],
            'flower_tone' => ['nullable', 'string', 'max:50'],
            'extra_addons' => ['nullable', 'array'],
            'extra_addons.*' => ['string'],
            'custom_note' => ['nullable', 'string', 'max:1000'],
            'card_message' => ['nullable', 'string', 'max:1000'],
        ]);

        $product = Product::where('slug', $request->product)
            ->where('is_active', true)
            ->firstOrFail();
        $sizeAdd = (int) $request->size;

        $sizeLabels = [0 => 'Standar', 45000 => 'Deluxe', 85000 => 'Grand'];

        // Hitung biaya addons
        $addonPrices = [
            'boneka_wisuda' => 25000,
            'lampu_led' => 15000,
            'balon_foil' => 10000,
            'cokelat' => 20000,
            'paper_bag_premium' => 12000,
        ];

        $selectedAddons = $request->input('extra_addons', []);
        $addonsTotal = 0;
        foreach ($selectedAddons as $addonKey) {
            $addonsTotal += $addonPrices[$addonKey] ?? 0;
        }

        $cart = Session::get('cart', []);
        $cart[] = [
            'id' => (string) Str::uuid(),
            'product_id' => $product->id,
            'name' => $product->name,
            'image' => $product->image,
            'size' => $sizeLabels[$sizeAdd] ?? 'Standar',
            'wrapping_color' => $request->wrapping_color ?: 'Pink Pastel (Default)',
            'ribbon_color' => $request->ribbon_color ?: 'Satin Cream (Default)',
            'flower_tone' => $request->flower_tone ?: 'Sesuai Foto Asli',
            'extra_addons' => $selectedAddons,
            'price' => $product->price + $sizeAdd + $addonsTotal,
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
