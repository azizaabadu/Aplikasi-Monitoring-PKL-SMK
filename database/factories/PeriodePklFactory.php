<?php

namespace Database\Factories;

use App\Models\PeriodePkl;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PeriodePkl>
 */
class PeriodePklFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tahun_ajaran' => now()->format('Y').'/'.now()->addYear()->format('Y'),
            'tanggal_mulai' => now()->addMonth()->toDateString(),
            'tanggal_selesai' => now()->addMonths(4)->toDateString(),
            'status' => 'pengajuan',
            'maks_pilihan_mitra' => 3,
            'batas_hari_tidak_isi' => 2,
            'batas_hari_isi_mundur' => 3,
        ];
    }
}
