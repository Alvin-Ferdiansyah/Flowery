<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class CartCheckoutTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_checkout_button_adds_the_product_to_cart_and_redirects_to_checkout(): void
    {
        $product = Product::create([
            'name' => 'Buket Mawar Pink',
            'slug' => 'buket-mawar-pink',
            'price' => 175000,
            'image' => 'https://example.com/mawar.jpg',
            'stock' => 5,
            'is_active' => true,
        ]);

        $response = $this->post(route('cart.add'), [
            'product' => $product->slug,
            'size' => 45000,
            'custom_note' => 'Pita warna cream',
            'card_message' => 'Selamat ulang tahun',
            'checkout' => 1,
        ]);

        $response->assertRedirect(route('checkout'));
        $response->assertSessionHas('cart.0.product_id', $product->id);
        $response->assertSessionHas('cart.0.price', 220000);
        $response->assertSessionHas('cart.0.size', 'Deluxe');
    }

    public function test_cart_rejects_an_unavailable_bouquet_size(): void
    {
        $product = Product::create([
            'name' => 'Buket Mawar Pink',
            'slug' => 'buket-mawar-pink',
            'price' => 175000,
            'image' => 'https://example.com/mawar.jpg',
            'stock' => 5,
            'is_active' => true,
        ]);

        $response = $this->post(route('cart.add'), [
            'product' => $product->slug,
            'size' => 1000,
        ]);

        $response->assertSessionHasErrors(['size']);
        $response->assertSessionMissing('cart');
    }
}
