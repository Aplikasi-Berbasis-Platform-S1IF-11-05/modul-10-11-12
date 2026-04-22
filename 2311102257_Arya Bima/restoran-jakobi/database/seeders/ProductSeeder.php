<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'nama_produk' => 'Nasi Goreng Spesial',
            'deskripsi'   => 'Nasi goreng dengan ayam suwir, telur, dan kerupuk udang. Rasa gurih dan pedas.',
            'harga'       => 25000,
            'kategori'    => 'Makanan Utama',
            'gambar'      => 'https://picsum.photos/id/1015/300/200'
        ]);

        Product::create([
            'nama_produk' => 'Mie Ayam Bakso',
            'deskripsi'   => 'Mie kuning dengan ayam cincang dan bakso sapi segar.',
            'harga'       => 18000,
            'kategori'    => 'Makanan Utama',
            'gambar'      => 'https://picsum.photos/id/201/300/200'
        ]);

        Product::create([
            'nama_produk' => 'Es Teh Manis',
            'deskripsi'   => 'Es teh dengan gula pasir asli, segar dan manis.',
            'harga'       => 8000,
            'kategori'    => 'Minuman',
            'gambar'      => 'https://picsum.photos/id/301/300/200'
        ]);

        Product::create([
            'nama_produk' => 'Sate Ayam',
            'deskripsi'   => 'Sate ayam 5 tusuk dengan bumbu kacang dan lontong.',
            'harga'       => 22000,
            'kategori'    => 'Makanan Utama',
            'gambar'      => 'https://picsum.photos/id/401/300/200'
        ]);

        Product::create([
            'nama_produk' => 'Rendang Daging',
            'deskripsi'   => 'Daging sapi empuk dimasak dengan rempah khas Padang.',
            'harga'       => 35000,
            'kategori'    => 'Makanan Utama',
            'gambar'      => 'https://picsum.photos/id/501/300/200'
        ]);
    }
}