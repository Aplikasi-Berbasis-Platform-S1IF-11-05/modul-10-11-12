<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create([
            'nama_produk' => 'Bakso Sapi',
            'kategori'    => 'Soup',
            'harga'       => 32000,
            'stok'        => 17,
            'rating'      => 5.0,
            'deskripsi'   => 'Bakso daging terbaik dengan kuah kaldu sapi asli Ngawi Timur yang gurih dan segar.'
        ]);

        Produk::create([
            'nama_produk' => 'Ayam Goreng',
            'kategori'    => 'Main Course',
            'harga'       => 20000,
            'stok'        => 12,
            'rating'      => 5.0,
            'deskripsi'   => 'Ayam goreng kremes dengan rempah pilihan, tekstur empuk di dalam dan kriuk di luar.'
        ]);

        Produk::create([
            'nama_produk' => 'Es Jeruk Peras',
            'kategori'    => 'Drink',
            'harga'       => 10000,
            'stok'        => 50,
            'rating'      => 4.8,
            'deskripsi'   => 'Kesegaran jeruk peras asli dari perkebunan warga Ngawi Barat.'
        ]);
    }
}
