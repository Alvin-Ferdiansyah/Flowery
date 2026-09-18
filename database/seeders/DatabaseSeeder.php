<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'password' => 'password',
        ]);

        foreach ([
            ['name' => 'Buket Mawar Pink', 'slug' => 'buket-mawar-pink', 'description' => 'Rangkaian mawar artificial bernuansa pink yang manis untuk hadiah spesial.', 'variety' => 'Mawar artificial', 'colour' => 'Pink pastel', 'price' => 175000, 'image' => 'https://images.pexels.com/photos/15290942/pexels-photo-15290942.jpeg?auto=compress&cs=tinysrgb&w=800', 'stock' => 12],
            ['name' => 'Buket Lily Elegan', 'slug' => 'buket-lily-elegan', 'description' => 'Buket lily artificial dengan tampilan elegan untuk menyampaikan perhatian.', 'variety' => 'Lily artificial', 'colour' => 'Putih dan peach', 'price' => 210000, 'image' => 'https://images.pexels.com/photos/15290940/pexels-photo-15290940.jpeg?auto=compress&cs=tinysrgb&w=800', 'stock' => 8],
            ['name' => 'Buket Tulip Ceria', 'slug' => 'buket-tulip-ceria', 'description' => 'Rangkaian tulip artificial cerah untuk merayakan momen bahagia.', 'variety' => 'Tulip artificial', 'colour' => 'Kuning dan putih', 'price' => 190000, 'image' => 'https://images.pexels.com/photos/35468615/pexels-photo-35468615.jpeg?auto=compress&cs=tinysrgb&w=800', 'stock' => 10],
            ['name' => 'Buket Peony Romantis', 'slug' => 'buket-peony-romantis', 'description' => 'Buket peony artificial dengan perpaduan warna lembut dan romantis.', 'variety' => 'Peony artificial', 'colour' => 'Rose dan cream', 'price' => 225000, 'image' => 'https://images.pexels.com/photos/10671881/pexels-photo-10671881.jpeg?auto=compress&cs=tinysrgb&w=800', 'stock' => 6],
        ] as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product + ['is_active' => true]);
        }
    }
}
