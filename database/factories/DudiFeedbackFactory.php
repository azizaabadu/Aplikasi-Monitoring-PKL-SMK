<?php

namespace Database\Factories;

use App\Models\Dudi;
use App\Models\DudiFeedback;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DudiFeedback>
 */
class DudiFeedbackFactory extends Factory
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
            'siswa_id' => Siswa::factory(),
            'kategori' => fake()->randomElement(['Apresiasi', 'Kendala', 'Pelanggaran']),
            'judul' => fake()->sentence(4),
            'deskripsi' => fake()->paragraph(),
            'status' => 'baru',
        ];
    }
}
