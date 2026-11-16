<?php

namespace Database\Factories;

use App\Models\Dudi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dudi>
 */
class DudiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_dudi' => fake()->unique()->company(),
            'alamat' => fake()->address(),
            'pimpinan' => fake()->name(),
            'kontak' => fake()->phoneNumber(),
            'kuota' => fake()->numberBetween(1, 30),
            'aktif' => true,
        ];
    }
}
