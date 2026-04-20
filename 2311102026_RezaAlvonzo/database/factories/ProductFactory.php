<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Makanan Utama', 'Cemilan', 'Minuman', 'Paket Spesial'];

        return [
            'name' => fake()->unique()->words(3, true),
            'category' => fake()->randomElement($categories),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(10000, 75000),
            'stock' => fake()->numberBetween(10, 200),
            'is_available' => fake()->boolean(90),
            'image_url' => fake()->imageUrl(600, 400, 'food', true, 'festival-makanan'),
        ];
    }
}
