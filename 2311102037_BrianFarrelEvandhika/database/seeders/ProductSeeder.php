<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::insert([
            [
                'name' => 'Sate Ayam Ngawi',
                'description' => 'Sate ayam khas ngawi dengan bumbu kacang rahasia jendral ladesh.',
                'price' => 25000,
                'image_url' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=500&auto=format&fit=crop&q=60'
            ],
            [
                'name' => 'Pecel Lele Mas Jakobi',
                'description' => 'Pecel lele renyah dengan sambal tomat pedas khas timur.',
                'price' => 15000,
                'image_url' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=500&auto=format&fit=crop&q=60'
            ],
            [
                'name' => 'Nasi Goreng Spesial',
                'description' => 'Nasi goreng pakai telur mata sapi dan ayam suwir.',
                'price' => 20000,
                'image_url' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=500&auto=format&fit=crop&q=60'
            ],
        ]);
    }
}
