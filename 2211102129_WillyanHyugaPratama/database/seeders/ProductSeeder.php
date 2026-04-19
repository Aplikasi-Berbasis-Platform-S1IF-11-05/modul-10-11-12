<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Nasi Liwet Lintah Barat',
                'category' => 'Menu Utama',
                'badge' => 'Favorit Festival',
                'description' => 'Nasi gurih dengan ayam suwir, telur pindang, sambal hijau, dan kerupuk renyah yang disajikan hangat untuk pengunjung festival.',
                'price' => 28000,
                'image_url' => '/images/products/nasi-liwet.svg',
                'featured' => true,
            ],
            [
                'name' => 'Sate Sapi Ngawi Timur',
                'category' => 'Signature Grill',
                'badge' => 'Best Seller',
                'description' => 'Sate sapi empuk dengan bumbu kacang kental, lontong, dan taburan bawang goreng untuk cita rasa yang kuat.',
                'price' => 32000,
                'image_url' => '/images/products/sate-sapi.svg',
                'featured' => true,
            ],
            [
                'name' => 'Es Dawet Festival',
                'category' => 'Minuman',
                'badge' => 'Paling Segar',
                'description' => 'Minuman tradisional dengan santan lembut, gula aren, dan cendol hijau yang cocok menemani hidangan pedas.',
                'price' => 15000,
                'image_url' => '/images/products/es-dawet.svg',
                'featured' => true,
            ],
            [
                'name' => 'Ayam Bakar Jalur Barat',
                'category' => 'Menu Utama',
                'badge' => 'Pedas Manis',
                'description' => 'Ayam bakar dengan olesan bumbu kecap rempah yang meresap sampai ke daging dan disajikan bersama sambal terasi.',
                'price' => 30000,
                'image_url' => '/images/products/ayam-bakar.svg',
                'featured' => false,
            ],
            [
                'name' => 'Pisang Goreng Keju Ladest',
                'category' => 'Snack',
                'badge' => 'Camilan Cepat',
                'description' => 'Pisang goreng renyah dengan lelehan keju dan susu kental manis, cocok untuk pengunjung yang ingin kudapan ringan.',
                'price' => 12000,
                'image_url' => '/images/products/pisang-goreng.svg',
                'featured' => false,
            ],
            [
                'name' => 'Kopi Susu Pasar Timur',
                'category' => 'Minuman',
                'badge' => 'Baru',
                'description' => 'Kopi susu dengan karakter roasted yang halus, dilengkapi es dan foam tipis untuk menyegarkan suasana festival.',
                'price' => 18000,
                'image_url' => '/images/products/kopi-susu.svg',
                'featured' => false,
            ],
        ];

        foreach ($products as $product) {
            $slug = Str::slug($product['name']);

            Product::updateOrCreate(
                ['slug' => $slug],
                array_merge($product, ['slug' => $slug])
            );
        }
    }
}
