<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Sate Ayam Bumbu Kacang',
                'category' => 'Menu Utama',
                'price' => 25000,
                'description' => 'Sate ayam khas dengan bumbu kacang gurih manis dan lontong hangat.',
                'image_url' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=1200',
                'is_available' => true,
            ],
            [
                'name' => 'Nasi Goreng Rempah Ngawi',
                'category' => 'Menu Utama',
                'price' => 22000,
                'description' => 'Nasi goreng dengan racikan rempah lokal, telur mata sapi, dan acar segar.',
                'image_url' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=1200',
                'is_available' => true,
            ],
            [
                'name' => 'Es Teh Pandan Gula Aren',
                'category' => 'Minuman',
                'price' => 12000,
                'description' => 'Minuman segar perpaduan teh melati, pandan, dan gula aren cair.',
                'image_url' => 'https://images.unsplash.com/photo-1499636136210-6f4ee915583e?w=1200',
                'is_available' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
