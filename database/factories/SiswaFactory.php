<?php

namespace Database\Factories;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(['peran' => 'siswa']),
            'nis' => fake()->unique()->numerify('##########'),
            'nama' => fake()->name(),
            'kelas' => fake()->randomElement(['XI', 'XII']),
            'jurusan' => fake()->randomElement(['RPL', 'TKJ', 'AKL']),
            'alamat' => fake()->address(),
            'kontak' => fake()->phoneNumber(),
        ];
    }
}
