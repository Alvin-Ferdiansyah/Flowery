<?php

namespace Database\Seeders;

use App\Models\Category;
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
        // Admin & Customer
        User::firstOrCreate([
            'email' => 'admin@flowery.test',
        ], [
            'name' => 'Admin Flowery',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

        User::firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'password' => 'password',
            'role' => 'customer',
        ]);

        // Kategori
        $categoriesData = [
            ['name' => 'Buket Mawar', 'slug' => 'buket-mawar'],
            ['name' => 'Buket Lily', 'slug' => 'buket-lily'],
            ['name' => 'Buket Tulip', 'slug' => 'buket-tulip'],
            ['name' => 'Buket Peony', 'slug' => 'buket-peony'],
            ['name' => 'Wisuda & Kelulusan', 'slug' => 'wisuda'],
            ['name' => 'Anniversary & Romantis', 'slug' => 'anniversary'],
            ['name' => 'Ulang Tahun', 'slug' => 'ulang-tahun'],
            ['name' => 'Dekorasi & Meja', 'slug' => 'dekorasi-rumah'],
        ];

        $cats = [];
        foreach ($categoriesData as $cat) {
            $cats[$cat['slug']] = Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        // Daftar Produk Bunga Lengkap
        $productsData = [
            [
                'name' => 'Buket Mawar Pink Pastel',
                'slug' => 'buket-mawar-pink',
                'category_id' => $cats['buket-mawar']->id,
                'description' => 'Rangkaian mawar artificial bernuansa pink yang manis dan lembut, cocok untuk hadiah romantis atau perayaan ulang tahun.',
                'variety' => 'Mawar artificial premium',
                'colour' => 'Pink pastel & cream',
                'price' => 175000,
                'image' => 'https://images.pexels.com/photos/15290942/pexels-photo-15290942.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 15,
            ],
            [
                'name' => 'Buket Lily Putih Elegan',
                'slug' => 'buket-lily-elegan',
                'category_id' => $cats['buket-lily']->id,
                'description' => 'Buket lily artificial dengan kelopak anggun berwarna putih bersih dipadukan foliage eucalyptus asri.',
                'variety' => 'Lily artificial casablanca',
                'colour' => 'Putih dan peach soft',
                'price' => 210000,
                'image' => 'https://images.pexels.com/photos/15290940/pexels-photo-15290940.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 12,
            ],
            [
                'name' => 'Buket Tulip Kuning Ceria',
                'slug' => 'buket-tulip-ceria',
                'category_id' => $cats['buket-tulip']->id,
                'description' => 'Rangkaian tulip cerah memancarkan energi positif dan kebahagiaan untuk sahabat tersayang.',
                'variety' => 'Tulip holland artificial',
                'colour' => 'Kuning cerah dan putih',
                'price' => 190000,
                'image' => 'https://images.pexels.com/photos/35468615/pexels-photo-35468615.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 10,
            ],
            [
                'name' => 'Buket Peony Romantis Blush',
                'slug' => 'buket-peony-romantis',
                'category_id' => $cats['buket-peony']->id,
                'description' => 'Buket peony mekar bertumpuk dengan perpaduan warna blush rose yang menawan hati.',
                'variety' => 'Peony artificial french',
                'colour' => 'Rose blush dan soft cream',
                'price' => 225000,
                'image' => 'https://images.pexels.com/photos/10671881/pexels-photo-10671881.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 8,
            ],
            [
                'name' => 'Buket Mawar Merah Crimson Passion',
                'slug' => 'buket-mawar-merah-crimson',
                'category_id' => $cats['anniversary']->id,
                'description' => 'Simbol cinta abadi dengan kelopak mawar merah beludru pekat yang mewah dan wrapping hitam matte.',
                'variety' => 'Mawar beludru artificial',
                'colour' => 'Merah maroon pekat',
                'price' => 240000,
                'image' => 'https://images.pexels.com/photos/931177/pexels-photo-931177.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 14,
            ],
            [
                'name' => 'Buket Wisuda Teddy Bear & Sunflower',
                'slug' => 'buket-wisuda-teddy-sunflower',
                'category_id' => $cats['wisuda']->id,
                'description' => 'Hadiah kelulusan terbaik lengkap dengan mini boneka toga wisuda dan bunga matahari artificial bersemangat.',
                'variety' => 'Bunga Matahari & Boneka',
                'colour' => 'Kuning emas & navy',
                'price' => 195000,
                'image' => 'https://images.pexels.com/photos/139398/pexels-photo-139398.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
            ],
            [
                'name' => 'Buket Lavender & Baby Breath Lilac',
                'slug' => 'buket-lavender-baby-breath',
                'category_id' => $cats['ulang-tahun']->id,
                'description' => 'Rangkaian lavender ungu menenangkan dengan taburan baby breath putih lembut nan estetik.',
                'variety' => 'Lavender & Baby breath',
                'colour' => 'Ungu lilac & putih',
                'price' => 165000,
                'image' => 'https://images.pexels.com/photos/1131458/pexels-photo-1131458.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 16,
            ],
            [
                'name' => 'Buket Hydrangea Biru Pastel Sky',
                'slug' => 'buket-hydrangea-biru-pastel',
                'category_id' => $cats['ulang-tahun']->id,
                'description' => 'Bunga hydrangea bermahkota lebat bernuansa biru langit menyejukkan mata dan hati.',
                'variety' => 'Hydrangea artificial',
                'colour' => 'Biru pastel & putih',
                'price' => 215000,
                'image' => 'https://images.pexels.com/photos/169190/pexels-photo-169190.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 11,
            ],
            [
                'name' => 'Vase Bunga Meja Eucalyptus & White Rose',
                'slug' => 'vase-meja-eucalyptus-white-rose',
                'category_id' => $cats['dekorasi-rumah']->id,
                'description' => 'Dekorasi bunga meja estetik gaya Scandinavian, siap diletakkan di ruang tamu atau meja kerja.',
                'variety' => 'Mawar putih & Eucalyptus',
                'colour' => 'Putih gading & hijau sage',
                'price' => 230000,
                'image' => 'https://images.pexels.com/photos/2072179/pexels-photo-2072179.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 9,
            ],
            [
                'name' => 'Buket Carnation Peach Sweet Mother',
                'slug' => 'buket-carnation-peach-sweet',
                'category_id' => $cats['buket-peony']->id,
                'description' => 'Buket anyelir (carnation) peach yang anggun, ungkapan rasa syukur dan kasih sayang penuh kehangatan.',
                'variety' => 'Anyelir artificial',
                'colour' => 'Peach soft & beige',
                'price' => 180000,
                'image' => 'https://images.pexels.com/photos/1028714/pexels-photo-1028714.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 13,
            ],
            [
                'name' => 'Buket Mawar Putih Pure Innocence',
                'slug' => 'buket-mawar-putih-pure',
                'category_id' => $cats['buket-mawar']->id,
                'description' => 'Mawar putih artificial melambangkan ketulusan dan kesucian cinta, dirangkai dengan gaya Korea kontemporer.',
                'variety' => 'Mawar putih artificial',
                'colour' => 'Putih salju & transparan wrap',
                'price' => 185000,
                'image' => 'https://images.pexels.com/photos/1408221/pexels-photo-1408221.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 10,
            ],
            [
                'name' => 'Buket Tulip Pink Sakura Spring',
                'slug' => 'buket-tulip-pink-sakura',
                'category_id' => $cats['buket-tulip']->id,
                'description' => 'Semarak musim semi dengan keanggunan bunga tulip artificial bernuansa sakura pink yang manis.',
                'variety' => 'Tulip soft petal',
                'colour' => 'Pink sakura & hijau muda',
                'price' => 195000,
                'image' => 'https://images.pexels.com/photos/2058498/pexels-photo-2058498.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 12,
            ],
        ];

        foreach ($productsData as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product + ['is_active' => true]);
        }
    }
}
