<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Sate Ayam Bumbu Kacang Ngawi',
                'category' => 'Makanan Utama',
                'description' => 'Sate ayam empuk dengan bumbu kacang gurih, lontong, dan sambal kecap khas restoran Mas Jakobi.',
                'price' => 28000,
                'stock' => 80,
                'is_available' => true,
                'image_url' => 'https://images.unsplash.com/photo-1529563021893-cc83c992d75d?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'Nasi Goreng Rempah Timur',
                'category' => 'Makanan Utama',
                'description' => 'Nasi goreng dengan racikan rempah pilihan, telur mata sapi, dan kerupuk renyah.',
                'price' => 32000,
                'stock' => 65,
                'is_available' => true,
                'image_url' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'Ayam Bakar Ladesh',
                'category' => 'Paket Spesial',
                'description' => 'Ayam bakar madu pedas dengan nasi hangat, lalapan segar, dan sambal cobek.',
                'price' => 36000,
                'stock' => 70,
                'is_available' => true,
                'image_url' => 'https://images.unsplash.com/photo-1606843046080-45bf7a23c39f?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'Tahu Crispy Festival',
                'category' => 'Cemilan',
                'description' => 'Tahu crispy garing di luar lembut di dalam, disajikan dengan bubuk cabai dan saus keju.',
                'price' => 18000,
                'stock' => 120,
                'is_available' => true,
                'image_url' => 'https://images.unsplash.com/photo-1625943553852-781c6dd46faa?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'Es Teh Jeruk Segar',
                'category' => 'Minuman',
                'description' => 'Perpaduan teh melati, jeruk peras, dan es batu untuk menyegarkan suasana festival.',
                'price' => 12000,
                'stock' => 150,
                'is_available' => true,
                'image_url' => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'Kopi Susu Aren Barista',
                'category' => 'Minuman',
                'description' => 'Kopi robusta lokal dengan susu segar dan gula aren untuk penikmat kopi festival.',
                'price' => 22000,
                'stock' => 95,
                'is_available' => true,
                'image_url' => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=900&q=80',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}
