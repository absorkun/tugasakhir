<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kendaraan>
 */
class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pemilik_id' => fake()->numberBetween(1, 10),
            'model' => fake()->text(30),
            'merek' => fake()->text(15),
            'nomor_polisi' => fake()->text(10),
            'nomor_mesin' => fake()->text(10),
            'tanggal_rilis' => fake()->date(),
        ];
    }
}
