<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_home_page_shows_active_product_card_linking_to_its_detail_page(): void
    {
        $product = Product::create([
            'name' => 'Buket Mawar Pink',
            'slug' => 'buket-mawar-pink',
            'price' => 175000,
            'image' => 'https://example.com/mawar.jpg',
            'stock' => 5,
            'is_active' => true,
        ]);

        $response = $this->get(route('home'));

        $response->assertSee($product->name);
        $response->assertSee(route('flowers.show', $product->slug), false);
    }

    public function test_authenticated_user_sees_profile_link_in_home_navigation(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertSee('Profil');
        $response->assertSee(route('profile.edit'), false);
        $response->assertDontSee('>Masuk<', false);
    }

    public function test_collection_page_shows_all_active_products(): void
    {
        $activeProduct = Product::create([
            'name' => 'Buket Tulip Ceria',
            'slug' => 'buket-tulip-ceria',
            'price' => 190000,
            'image' => 'https://example.com/tulip.jpg',
            'stock' => 4,
            'is_active' => true,
        ]);

        $inactiveProduct = Product::create([
            'name' => 'Buket Tidak Tersedia',
            'slug' => 'buket-tidak-tersedia',
            'price' => 200000,
            'image' => 'https://example.com/inactive.jpg',
            'stock' => 0,
            'is_active' => false,
        ]);

        $response = $this->get(route('collections.index'));

        $response->assertSee($activeProduct->name);
        $response->assertSee(route('flowers.show', $activeProduct->slug), false);
        $response->assertDontSee($inactiveProduct->name);
    }
}
