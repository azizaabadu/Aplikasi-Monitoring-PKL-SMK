<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dudi;
use App\Models\DudiKuota;
use App\Models\Penempatan;
use App\Models\PeriodePkl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DudiKuotaController extends Controller
{
    public function show(Dudi $dudi, PeriodePkl $periodePkl): JsonResponse
    {
        $quota = DudiKuota::query()
            ->where('dudi_id', $dudi->id)
            ->where('periode_pkl_id', $periodePkl->id)
            ->firstOrFail();

        return response()->json($quota->load(['dudi:id,nama_dudi', 'periodePkl:id,tahun_ajaran']));
    }

    public function update(Request $request, Dudi $dudi, PeriodePkl $periodePkl): JsonResponse
    {
        $data = $request->validate([
            'kuota' => ['required', 'integer', 'min:0', 'max:65535'],
        ]);

        $quota = DB::transaction(function () use ($dudi, $periodePkl, $data): DudiKuota {
            $lockedDudi = Dudi::query()->lockForUpdate()->findOrFail($dudi->id);

            if (! $lockedDudi->aktif) {
                throw ValidationException::withMessages([
                    'dudi_id' => 'Kuota tidak dapat diatur untuk DUDI nonaktif.',
                ]);
            }

            $quota = DudiKuota::query()
                ->where('dudi_id', $lockedDudi->id)
                ->where('periode_pkl_id', $periodePkl->id)
                ->lockForUpdate()
                ->first();

            $currentPlacements = Penempatan::query()
                ->where('dudi_id', $lockedDudi->id)
                ->where('periode_pkl_id', $periodePkl->id)
                ->count();

            if ($data['kuota'] < $currentPlacements) {
                throw ValidationException::withMessages([
                    'kuota' => 'Kuota tidak boleh lebih kecil daripada jumlah siswa yang sudah ditempatkan.',
                ]);
            }

            if ($quota === null) {
                return DudiKuota::create([
                    'dudi_id' => $lockedDudi->id,
                    'periode_pkl_id' => $periodePkl->id,
                    'kuota' => $data['kuota'],
                ]);
            }

            $quota->update(['kuota' => $data['kuota']]);

            return $quota->refresh();
        });

        return response()->json($quota->load(['dudi:id,nama_dudi', 'periodePkl:id,tahun_ajaran']));
    }
}
