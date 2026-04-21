<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Nasi Goreng Spesial',
            'price' => 18000,
            'description' => 'Nasi goreng dengan telur, ayam, dan kerupuk.',
            'image' => null,
            'stock' => 20,
            'category' => 'Makanan',
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Mie Goreng Jawa',
            'price' => 15000,
            'description' => 'Mie goreng khas Jawa dengan rasa manis gurih.',
            'image' => null,
            'stock' => 15,
            'category' => 'Makanan',
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Es Teh Manis',
            'price' => 5000,
            'description' => 'Minuman teh segar dan manis.',
            'image' => null,
            'stock' => 30,
            'category' => 'Minuman',
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Ayam Geprek',
            'price' => 17000,
            'description' => 'Ayam geprek pedas dengan sambal khas.',
            'image' => null,
            'stock' => 10,
            'category' => 'Makanan',
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Jus Jeruk',
            'price' => 8000,
            'description' => 'Jus jeruk segar tanpa pemanis buatan.',
            'image' => null,
            'stock' => 12,
            'category' => 'Minuman',
            'is_active' => true,
        ]);
    }
}