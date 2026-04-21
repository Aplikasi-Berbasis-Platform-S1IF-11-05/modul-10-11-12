<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Signature Beef Grill',
            'description' => 'Daging sapi pilihan dengan saus rahasia Mas Jakobi.',
            'price' => 85000,
            'image' => 'beef.jpg'
        ]);

        Product::create([
            'name' => 'Premium Pasta Carbonara',
            'description' => 'Pasta creamy dengan keju parmesan asli dan smoked beef.',
            'price' => 65000,
            'image' => 'pasta.jpg'
        ]);
        
        Product::create([
            'name' => 'Ocean Fresh Salmon',
            'description' => 'Salmon panggang segar dengan sayuran organik.',
            'price' => 120000,
            'image' => 'salmon.jpg'
        ]);
    }
}