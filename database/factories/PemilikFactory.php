<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemilik>
 */
class PemilikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'nomor_ktp' => fake()->text(16),
            'ttl' => fake()->date(),
            'alamat' => fake()->address(),
            'nomor_telepon' => fake()->text(12),
        ];
    }
}
