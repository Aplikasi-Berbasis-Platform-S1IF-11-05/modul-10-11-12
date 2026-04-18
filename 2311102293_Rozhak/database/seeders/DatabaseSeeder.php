<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * Seeder utama yang bertanggung jawab untuk mengisi database dengan data awal (seed data).
 * Mengatur populasi data untuk kategori dan produk default restoran Mas Jakobi.
 */
class DatabaseSeeder extends Seeder {
    use WithoutModelEvents;

    /**
     * Jalankan proses seeding ke database aplikasi.
     *
     * @return void
     */
    public function run(): void {
        $makanan = Category::create([
            'name' => 'Makanan Khas',
            'slug' => Str::slug('Makanan Khas')
        ]);

        $minuman = Category::create([
            'name' => 'Minuman Segar',
            'slug' => Str::slug('Minuman Segar')
        ]);

        Product::create([ // Ning Ngawi aku teko nagih janji Kutho iki cen ngangeni Sliramu tak anti-anti ning alun-alun Ngawi Roso iki iseh podo, ora ono sing bedo Madep mantep karo kowe Nek ra kowe ora wae
            'category_id' => $makanan->id,
            'name' => 'Pecel Pincuk Ngawi',
            'description' => 'Nasi pecel autentik khas Ngawi dengan bumbu kacang rahasia Mas Jokowi.',
            'price' => 15000,
            'image' => 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/a781aa17-87d6-4831-b055-6c8158feba04_Go-Biz_20221020_213831.jpeg'
        ]);

        Product::create([
            'category_id' => $makanan->id,
            'name' => 'Tepo Tahu',
            'description' => 'Lontong tepo dipadukan dengan tahu telor dan kuah kecap manis pedas.',
            'price' => 18000,
            'image' => 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/c9bfd67f-da83-4e9f-9636-0fca2dc296e2_Go-Biz_20210805_200807.jpeg'
        ]);

        Product::create([
            'category_id' => $minuman->id,
            'name' => 'Wedang Cemue',
            'description' => 'Minuman hangat santan jahe dengan taburan roti tawar dan kacang tanah.',
            'price' => 10000,
            'image' => 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/e2359d86-4fa8-4c89-9133-0e223c7b337e_IMG_20200930_154102_802.jpg'
        ]);
    }
}