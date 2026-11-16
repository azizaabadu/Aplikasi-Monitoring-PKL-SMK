<?php

namespace Database\Factories;

use App\Models\Dudi;
use App\Models\DudiKuota;
use App\Models\PeriodePkl;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DudiKuota>
 */
class DudiKuotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dudi_id' => Dudi::factory(),
            'periode_pkl_id' => PeriodePkl::factory(),
            'kuota' => fake()->numberBetween(1, 30),
        ];
    }
}
