<?php

namespace Database\Factories;

use App\Models\Dudi;
use App\Models\PeriodePkl;
use App\Models\PilihanMitra;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PilihanMitra>
 */
class PilihanMitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'siswa_id' => Siswa::factory(),
            'periode_pkl_id' => PeriodePkl::factory(),
            'dudi_id' => Dudi::factory(),
            'prioritas' => fake()->numberBetween(1, 3),
        ];
    }
}
