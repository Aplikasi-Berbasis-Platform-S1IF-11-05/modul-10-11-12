<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $makanan = Category::query()->updateOrCreate(
            ['slug' => 'makanan-berat'],
            [
                'name' => 'Makanan Berat',
                'description' => 'Hidangan utama khas dapur Mas Jakobi.',
            ]
        );

        $camilan = Category::query()->updateOrCreate(
            ['slug' => 'camilan'],
            [
                'name' => 'Camilan & Gorengan',
                'description' => 'Cemilan untuk menemani festival.',
            ]
        );

        $minuman = Category::query()->updateOrCreate(
            ['slug' => 'minuman'],
            [
                'name' => 'Minuman',
                'description' => 'Segar menemani santap.',
            ]
        );

        $items = [
            [
                'category_id' => $makanan->id,
                'name' => 'Nasi Pecel Ngawi Komplit',
                'slug' => 'nasi-pecel-ngawi-komplit',
                'description' => 'Nasi hangat dengan pecel sayur, rempeyek, telur, dan sambal kacang racikan dapur.',
                'price' => 25000,
                'extra_info' => "Disajikan dengan lauk pilihan.\nCocok untuk sarapan atau makan siang.",
                'stock' => 40,
                'image_path' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'category_id' => $makanan->id,
                'name' => 'Rawon Daging Sapi',
                'slug' => 'rawon-daging-sapi',
                'description' => 'Rawon kuah hitam kluwek dengan daging sapi empuk, dilengkapi taoge dan sambal.',
                'price' => 35000,
                'extra_info' => 'Kuah diperas fresh setiap pagi.',
                'stock' => 25,
                'image_path' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'category_id' => $camilan->id,
                'name' => 'Tempe Mendoan Set',
                'slug' => 'tempe-mendoan-set',
                'description' => 'Tempe mendoan garing di luar, lembut di dalam, disajikan dengan sambal kecap.',
                'price' => 15000,
                'extra_info' => 'Isi 5 potong per porsi.',
                'stock' => 60,
                'image_path' => 'https://images.unsplash.com/photo-1563379091339-03b21bc4a4f8?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'category_id' => $camilan->id,
                'name' => 'Lemper Ayam',
                'slug' => 'lemper-ayam',
                'description' => 'Lemper ketan dengan isian ayam suwir berbumbu.',
                'price' => 12000,
                'extra_info' => null,
                'stock' => 35,
                'image_path' => 'https://images.unsplash.com/photo-1541544336780-671e70d7eead?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'category_id' => $minuman->id,
                'name' => 'Es Jeruk Peras',
                'slug' => 'es-jeruk-peras',
                'description' => 'Jeruk lokal diperas langsung, es batu, tingkat kemanisan bisa disesuaikan.',
                'price' => 10000,
                'extra_info' => 'Tanpa pengawet.',
                'stock' => 80,
                'image_path' => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'category_id' => $minuman->id,
                'name' => 'Wedang Jahe Susu',
                'slug' => 'wedang-jahe-susu',
                'description' => 'Jahe segar direbus dengan susu dan gula aren hangat.',
                'price' => 12000,
                'extra_info' => 'Hidangan hangat — cocok untuk malam hari.',
                'stock' => 45,
                'image_path' => 'https://images.unsplash.com/photo-1544787210-282aa51e93f6?q=80&w=1000&auto=format&fit=crop',
            ],
        ];

        foreach ($items as $row) {
            Product::query()->updateOrCreate(
                ['slug' => $row['slug']],
                array_merge($row, [
                    'is_available' => true,
                ])
            );
        }
    }
}
