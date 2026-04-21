<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Nasi Pecel Ngawi',
                'description' => 'Nasi pecel khas Ngawi dengan bumbu kacang pilihan, dilengkapi sayur bayam, kacang panjang, tauge, dan daun kemangi segar. Disajikan dengan rempeyek kacang renyah dan sambal terasi pedas.',
                'price' => 15000,
                'category' => 'Makanan Utama',
                'image' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=600&h=600&fit=crop',
                'is_featured' => true,
            ],
            [
                'name' => 'Sate Ayam Pak Jakobi',
                'description' => 'Sate ayam kampung dengan bumbu kacang khas racikan Pak Jakobi. Daging ayam empuk dipotong kecil-kecil, ditusuk dan dibakar di atas arang kelapa. Disajikan dengan lontong dan acar timun.',
                'price' => 20000,
                'category' => 'Makanan Utama',
                'image' => 'https://images.unsplash.com/photo-1606471191009-63994c53433b?w=600&h=600&fit=crop',
                'is_featured' => true,
            ],
            [
                'name' => 'Rawon Ngawi Timur',
                'description' => 'Rawon daging sapi dengan kuah hitam pekat dari kluwek asli. Disajikan dengan nasi putih hangat, tauge pendek, telur asin, dan sambal terasi. Cita rasa autentik Ngawi Timur.',
                'price' => 25000,
                'category' => 'Makanan Utama',
                'image' => 'https://images.unsplash.com/photo-1596797038530-2c39fa8022d9?w=600&h=600&fit=crop',
                'is_featured' => true,
            ],
            [
                'name' => 'Lontong Sayur Ngawi',
                'description' => 'Lontong dengan kuah santan gurih berisi labu siam, tempe, dan tahu. Ditaburi bawang goreng dan kerupuk udang. Menu sarapan favorit warga Ngawi.',
                'price' => 12000,
                'category' => 'Makanan Utama',
                'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600&h=600&fit=crop',
                'is_featured' => false,
            ],
            [
                'name' => 'Es Dawet Ngawi',
                'description' => 'Es dawet segar dengan cendol pandan, santan kelapa, dan gula merah cair. Ditambahkan es serut untuk kesegaran maksimal. Minuman legendaris khas Ngawi.',
                'price' => 8000,
                'category' => 'Minuman',
                'image' => 'https://images.unsplash.com/photo-1544145945-f90425340c7e?w=600&h=600&fit=crop',
                'is_featured' => false,
            ],
            [
                'name' => 'Wedang Jahe Rempah',
                'description' => 'Wedang jahe hangat dengan campuran rempah-rempah pilihan: sereh, kayu manis, dan cengkeh. Cocok dinikmati saat cuaca dingin di malam festival.',
                'price' => 7000,
                'category' => 'Minuman',
                'image' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=600&h=600&fit=crop',
                'is_featured' => false,
            ],
            [
                'name' => 'Terang Bulan Mini',
                'description' => 'Terang bulan mini dengan berbagai topping: coklat, keju, kacang, dan wijen. Adonan tebal dan lembut, dipanggang sempurna. Jajanan favorit festival.',
                'price' => 10000,
                'category' => 'Jajanan',
                'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=600&h=600&fit=crop',
                'is_featured' => false,
            ],
            [
                'name' => 'Getuk Goreng Ngawi',
                'description' => 'Getuk goreng dari singkong pilihan, digoreng hingga kecoklatan dan renyah di luar namun lembut di dalam. Ditaburi gula halus. Oleh-oleh khas Ngawi.',
                'price' => 5000,
                'category' => 'Jajanan',
                'image' => 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=600&h=600&fit=crop',
                'is_featured' => false,
            ],
            [
                'name' => 'Bakso Bakar Festival',
                'description' => 'Bakso sapi jumbo dibakar dengan saus kacang pedas manis. Tekstur kenyal dengan aroma pembakaran yang menggugah selera. Menu spesial festival.',
                'price' => 15000,
                'category' => 'Jajanan',
                'image' => 'https://images.unsplash.com/photo-1563379091339-03b1cbb8e4c8?w=600&h=600&fit=crop',
                'is_featured' => false,
            ],
            [
                'name' => 'Es Jeruk Peras Segar',
                'description' => 'Jeruk peras asli tanpa campuran air, ditambahkan es batu dan sedikit gula. Kesegaran alami dari buah jeruk lokal Ngawi.',
                'price' => 6000,
                'category' => 'Minuman',
                'image' => 'https://images.unsplash.com/photo-1534353473418-4cfa6c56fd38?w=600&h=600&fit=crop',
                'is_featured' => false,
            ],
            [
                'name' => 'Ayam Goreng Kremes Ngawi',
                'description' => 'Ayam kampung goreng dengan kremesan renyah gurih. Dimarinasi dengan bumbu kuning tradisional selama 12 jam. Disajikan dengan lalapan dan sambal.',
                'price' => 22000,
                'category' => 'Makanan Utama',
                'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=600&h=600&fit=crop',
                'is_featured' => false,
            ],
            [
                'name' => 'Tahu Tek Ngawi',
                'description' => 'Tahu goreng dipotong-potong dengan lontong, tauge, dan kentang, disiram bumbu petis khas Jawa Timur. Ditaburi bawang goreng dan kerupuk.',
                'price' => 10000,
                'category' => 'Jajanan',
                'image' => 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=600&h=600&fit=crop',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
