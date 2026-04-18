<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class UserFactory
 *
 * Factory untuk model User yang digunakan untuk menghasilkan data palsu (dummy data)
 * guna keperluan testing atau pengisian database awal.
 */
class UserFactory extends Factory {
    protected static ?string $password;

    /**
     * Mendefinisikan status default dari model yang dihasilkan.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}