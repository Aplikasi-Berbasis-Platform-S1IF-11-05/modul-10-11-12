<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produks = [
            [
                'nama_produk' => 'Nasi Pecel Ngawi',
                'deskripsi'   => 'Nasi pecel khas Ngawi dengan sambal kacang pilihan dan lauk lengkap.',
                'harga'       => 15000,
                'kategori'    => 'Makanan',
                'tersedia'    => true,
            ],
            [
                'nama_produk' => 'Soto Ayam Kampung',
                'deskripsi'   => 'Soto ayam kampung segar dengan kuah bening dan rempah pilihan.',
                'harga'       => 18000,
                'kategori'    => 'Makanan',
                'tersedia'    => true,
            ],
            [
                'nama_produk' => 'Es Dawet Jakobi',
                'deskripsi'   => 'Minuman segar dawet cendol dengan santan dan gula merah asli.',
                'harga'       => 8000,
                'kategori'    => 'Minuman',
                'tersedia'    => true,
            ],
            [
                'nama_produk' => 'Bakmi Goreng Spesial',
                'deskripsi'   => 'Mie goreng telur dengan topping ayam suwir dan kerupuk.',
                'harga'       => 20000,
                'kategori'    => 'Makanan',
                'tersedia'    => true,
            ],
            [
                'nama_produk' => 'Klepon Isi Gula',
                'deskripsi'   => 'Kue tradisional klepon dari tepung ketan isi gula merah.',
                'harga'       => 10000,
                'kategori'    => 'Dessert',
                'tersedia'    => true,
            ],
            [
                'nama_produk' => 'Es Teh Manis Jumbo',
                'deskripsi'   => 'Teh manis dingin segar ukuran jumbo untuk menemani makan.',
                'harga'       => 5000,
                'kategori'    => 'Minuman',
                'tersedia'    => true,
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}
