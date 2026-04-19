<?php
// Buswiryawan Raditya Boenyamin
// 2311102090

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // === MAKANAN UTAMA ===
            [
                'name'         => 'Nasi Pecel Spesial Jakobi',
                'description'  => 'Nasi pecel khas Ngawi dengan bumbu kacang istimewa, dilengkapi tempe goreng crispy, rempeyek, dan lalapan segar. Resep warisan turun-temurun yang sudah menemani pelanggan sejak 1995.',
                'price'        => 25000,
                'category'     => 'makanan',
                'image'        => 'nasi-pecel.jpg',
                'is_available' => true,
                'stock'        => 50,
                'portion'      => '1 porsi',
            ],
            [
                'name'         => 'Soto Daging Sapi Ngawi',
                'description'  => 'Soto bening khas Ngawi dengan potongan daging sapi empuk, tauge, telur rebus, dan bawang goreng. Disajikan panas dengan pelengkap kerupuk dan sambal.',
                'price'        => 30000,
                'category'     => 'makanan',
                'image'        => 'soto-daging.jpg',
                'is_available' => true,
                'stock'        => 40,
                'portion'      => '1 mangkok',
            ],
            [
                'name'         => 'Ayam Goreng Kremes Festival',
                'description'  => 'Ayam kampung pilihan digoreng crispy dengan balutan kremes gurih yang renyah. Satu porsi terdiri dari 1 potong ayam, nasi, lalapan, dan sambal terasi.',
                'price'        => 35000,
                'category'     => 'makanan',
                'image'        => 'ayam-kremes.jpg',
                'is_available' => true,
                'stock'        => 30,
                'portion'      => '1 porsi + nasi',
            ],
            [
                'name'         => 'Gudeg Ngawi Komplit',
                'description'  => 'Gudeg khas Ngawi dengan jackfruit muda yang dimasak 8 jam menggunakan tungku tradisional. Dilengkapi opor ayam, krecek, dan telur pindang.',
                'price'        => 32000,
                'category'     => 'makanan',
                'image'        => 'gudeg.jpg',
                'is_available' => true,
                'stock'        => 25,
                'portion'      => '1 porsi',
            ],
            [
                'name'         => 'Rawon Hitam Spesial',
                'description'  => 'Rawon dengan kuah hitam pekat dari kluwek asli, daging sapi segar dipotong dadu besar, disajikan dengan tauge pendek, kerupuk udang, dan sambal.',
                'price'        => 33000,
                'category'     => 'makanan',
                'image'        => 'rawon.jpg',
                'is_available' => true,
                'stock'        => 35,
                'portion'      => '1 mangkok',
            ],
            [
                'name'         => 'Tahu Tempe Bacem',
                'description'  => 'Tahu dan tempe dibacem dengan gula merah dan rempah pilihan selama 4 jam, menghasilkan cita rasa manis-gurih yang meresap sempurna ke dalam.',
                'price'        => 15000,
                'category'     => 'makanan',
                'image'        => 'tahu-tempe-bacem.jpg',
                'is_available' => true,
                'stock'        => 60,
                'portion'      => '4 potong',
            ],

            // === MINUMAN ===
            [
                'name'         => 'Es Dawet Ireng Jakobi',
                'description'  => 'Minuman tradisional khas Purworejo dengan dawet berwarna hitam dari abu merang, santan kelapa segar, gula merah cair, dan es batu serut. Segar dan menyehatkan.',
                'price'        => 12000,
                'category'     => 'minuman',
                'image'        => 'es-dawet.jpg',
                'is_available' => true,
                'stock'        => 80,
                'portion'      => '1 gelas',
            ],
            [
                'name'         => 'Wedang Uwuh Hangat',
                'description'  => 'Minuman herbal khas Jogja dengan rempah pilihan: kayu secang, jahe, cengkeh, kayu manis, dan kapulaga. Menghangatkan tubuh dan menjaga imunitas.',
                'price'        => 10000,
                'category'     => 'minuman',
                'image'        => 'wedang-uwuh.jpg',
                'is_available' => true,
                'stock'        => 70,
                'portion'      => '1 cangkir',
            ],
            [
                'name'         => 'Es Teh Tarik Susu',
                'description'  => 'Teh hitam pilihan yang ditarik hingga berbusa sempurna, dipadukan susu kental manis dan es batu. Proses tarik membuat tekstur teh menjadi lembut dan creamy.',
                'price'        => 8000,
                'category'     => 'minuman',
                'image'        => 'teh-tarik.jpg',
                'is_available' => true,
                'stock'        => 100,
                'portion'      => '1 gelas',
            ],
            [
                'name'         => 'Jus Alpukat Coklat',
                'description'  => 'Alpukat segar diblender lembut dengan susu dan es batu, disiram coklat cair di atasnya. Kaya nutrisi dan mengenyangkan.',
                'price'        => 15000,
                'category'     => 'minuman',
                'image'        => 'jus-alpukat.jpg',
                'is_available' => true,
                'stock'        => 45,
                'portion'      => '1 gelas besar',
            ],

            // === DESSERT ===
            [
                'name'         => 'Klepon Gula Merah',
                'description'  => 'Kue tradisional dari tepung ketan berisi gula merah lumer, dibalut parutan kelapa segar. Dibuat fresh setiap pagi, lembut di luar dan meledak manis di dalam.',
                'price'        => 10000,
                'category'     => 'dessert',
                'image'        => 'klepon.jpg',
                'is_available' => true,
                'stock'        => 90,
                'portion'      => '5 buah',
            ],
            [
                'name'         => 'Es Campur Festival',
                'description'  => 'Kombinasi cincau hitam, kolang-kaling, nata de coco, alpukat, dan mutiara sagu dalam kuah santan dan sirup merah segar. Spesial untuk merayakan festival!',
                'price'        => 18000,
                'category'     => 'dessert',
                'image'        => 'es-campur.jpg',
                'is_available' => true,
                'stock'        => 50,
                'portion'      => '1 porsi',
            ],
            [
                'name'         => 'Puding Singkong Pandan',
                'description'  => 'Puding lembut dari singkong parut dengan aroma pandan wangi, disajikan dengan saus gula merah dan taburan kelapa muda. Dessert tradisional yang melegakan.',
                'price'        => 12000,
                'category'     => 'dessert',
                'image'        => 'puding-singkong.jpg',
                'is_available' => true,
                'stock'        => 40,
                'portion'      => '1 porsi',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
