<?php

namespace Database\Seeders;

use App\Models\Dudi;
use App\Models\DudiKuota;
use App\Models\PeriodePkl;
use Illuminate\Database\Seeder;

class DudiKuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeriodePkl::query()
            ->where('status', 'pengajuan')
            ->each(function (PeriodePkl $periodePkl): void {
                Dudi::query()
                    ->where('aktif', true)
                    ->each(function (Dudi $dudi) use ($periodePkl): void {
                        DudiKuota::query()->firstOrCreate(
                            [
                                'dudi_id' => $dudi->id,
                                'periode_pkl_id' => $periodePkl->id,
                            ],
                            ['kuota' => $dudi->kuota],
                        );
                    });
            });
    }
}
