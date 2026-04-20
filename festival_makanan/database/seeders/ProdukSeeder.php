<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Makanan;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produks = [
            [
                'nama' => 'Nasi Goreng Spesial Jakobi',
                'deskripsi' => 'Nasi goreng dengan bumbu rahasia khas restoran Jakobi, dilengkapi telur mata sapi, ayam suwir, dan kerupuk renyah.',
                'harga' => 25000,
                'kategori' => 'Makanan Utama',
                'tersedia' => true,
            ],
            [
                'nama' => 'Soto Ayam Ngawi',
                'deskripsi' => 'Soto ayam kuah bening khas Ngawi dengan tauge segar, telur rebus, dan perkedel kentang.',
                'harga' => 20000,
                'kategori' => 'Makanan Utama',
                'tersedia' => true,
            ],
            [
                'nama' => 'Ayam Bakar Madu',
                'deskripsi' => 'Ayam kampung pilihan dibakar dengan olesan madu dan kecap manis, disajikan dengan lalapan segar.',
                'harga' => 35000,
                'kategori' => 'Makanan Utama',
                'tersedia' => true,
            ],
            [
                'nama' => 'Bakso Jumbo Spesial',
                'deskripsi' => 'Bakso berukuran jumbo dengan isian daging sapi pilihan, disajikan dengan mie, tahu, dan kuah kaldu sapi.',
                'harga' => 22000,
                'kategori' => 'Makanan Utama',
                'tersedia' => true,
            ],
            [
                'nama' => 'Es Teh Jakobi',
                'deskripsi' => 'Teh manis dingin dengan campuran daun mint segar, menyegarkan di hari yang panas.',
                'harga' => 8000,
                'kategori' => 'Minuman',
                'tersedia' => true,
            ],
            [
                'nama' => 'Jus Alpukat',
                'deskripsi' => 'Jus alpukat segar dengan susu kental manis, kaya vitamin dan menyehatkan.',
                'harga' => 15000,
                'kategori' => 'Minuman',
                'tersedia' => true,
            ],
            [
                'nama' => 'Pisang Goreng Crispy',
                'deskripsi' => 'Pisang kepok pilihan digoreng dengan tepung crispy, disajikan dengan saus coklat dan keju.',
                'harga' => 12000,
                'kategori' => 'Cemilan',
                'tersedia' => true,
            ],
            [
                'nama' => 'Lumpia Sayur',
                'deskripsi' => 'Lumpia isi sayuran segar dengan kulit renyah, cocok untuk camilan sore.',
                'harga' => 10000,
                'kategori' => 'Cemilan',
                'tersedia' => true,
            ],
        ];

        foreach ($produks as $produk) {
            Makanan::create($produk);
        }
    }
}
