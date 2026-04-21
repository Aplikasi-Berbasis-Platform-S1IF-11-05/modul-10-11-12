<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Product::create([
            'name' => 'Pecel Lele Ngawi Timur',
            'description' => 'Lele krispi dengan sambal rahasia warisan Mas Jakobi.',
            'price' => 25000,
        ]);

        Product::create([
            'name' => 'Es Teh Kampul Jendral',
            'description' => 'Kesegaran hakiki dari Ngawi Barat untuk rakyat.',
            'price' => 8000,
        ]);

        Product::create([
            'name' => 'Sate Taichan Ladesh',
            'description' => 'Sate pedas yang mampu membakar semangat 19 ribu lapangan kerja.',
            'price' => 35000,
        ]);
    }
}