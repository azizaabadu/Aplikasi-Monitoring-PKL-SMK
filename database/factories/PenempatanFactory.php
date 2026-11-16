<?php

namespace Database\Factories;

use App\Models\Dudi;
use App\Models\Penempatan;
use App\Models\PeriodePkl;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Penempatan>
 */
class PenempatanFactory extends Factory
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
            'ditetapkan_oleh' => User::factory()->state(['peran' => 'admin']),
        ];
    }
}
