<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'name' => 'Pecel Ngawi Spesial',
            'description' => 'Nasi pecel khas Ngawi dengan bumbu kacang yang gurih dan pedas, disajikan dengan berbagai sayuran segar dan rempeyek renyah.',
            'price' => 15000,
            'image' => 'pecel_ngawi.png',
            'category' => 'Main Course',
            'stock' => 50,
            'rating' => 4.9,
        ]);

        \App\Models\Product::create([
            'name' => 'Sate Ayam Madura Ngawi',
            'description' => 'Sate ayam dengan potongan daging yang empuk, dibakar dengan bumbu kecap manis dan disajikan dengan saus kacang yang kental.',
            'price' => 25000,
            'image' => 'sate_ayam.png',
            'category' => 'Main Course',
            'stock' => 30,
            'rating' => 4.8,
        ]);

        \App\Models\Product::create([
            'name' => 'Tahu Telur Pak Ndut',
            'description' => 'Tahu goreng yang dibalut dengan telur kocok, disajikan dengan tauge, timun, dan guyuran bumbu kacang petis yang lezat.',
            'price' => 18000,
            'image' => 'tahu_telur.png',
            'category' => 'Main Course',
            'stock' => 40,
            'rating' => 4.7,
        ]);

        \App\Models\Product::create([
            'name' => 'Lapis Ngawi Keju',
            'description' => 'Kue lapis lembut dengan aroma pandan dan taburan keju melimpah di atasnya, cocok untuk oleh-oleh.',
            'price' => 35000,
            'image' => 'lapis_ngawi.png',
            'category' => 'Snack',
            'stock' => 20,
            'rating' => 4.9,
        ]);

        \App\Models\Product::create([
            'name' => 'Es Dawet Ayu Ngawi',
            'description' => 'Minuman segar dengan cendol pandan, santan gurih, dan gula merah asli yang manisnya pas.',
            'price' => 8000,
            'image' => 'es_dawet.png',
            'category' => 'Beverage',
            'stock' => 100,
            'rating' => 4.6,
        ]);
        
        \App\Models\Product::create([
            'name' => 'Keripik Tempe Ngawi',
            'description' => 'Keripik tempe tipis dan sangat renyah, dibumbui dengan rempah pilihan khas Ngawi.',
            'price' => 12000,
            'image' => 'keripik_tempe.jpg',
            'category' => 'Snack',
            'stock' => 80,
            'rating' => 4.8,
        ]);
    }
}
