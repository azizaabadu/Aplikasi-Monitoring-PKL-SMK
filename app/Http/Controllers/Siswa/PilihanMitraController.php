<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Dudi;
use App\Models\PeriodePkl;
use App\Models\PilihanMitra;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PilihanMitraController extends Controller
{
    public function index(Request $request, PeriodePkl $periodePkl): JsonResponse
    {
        $siswa = $request->user()->siswa()->firstOrFail();

        $pilihan = PilihanMitra::query()
            ->where('siswa_id', $siswa->id)
            ->where('periode_pkl_id', $periodePkl->id)
            ->with('dudi:id,nama_dudi,alamat,kontak,aktif')
            ->orderBy('prioritas')
            ->get();

        return response()->json([
            'periode' => $periodePkl->only(['id', 'tahun_ajaran', 'status', 'maks_pilihan_mitra']),
            'pilihan' => $pilihan,
        ]);
    }

    public function update(Request $request, PeriodePkl $periodePkl): JsonResponse
    {
        if ($periodePkl->status !== 'pengajuan') {
            throw ValidationException::withMessages([
                'periode' => 'Pilihan mitra hanya dapat diubah saat periode berstatus pengajuan.',
            ]);
        }

        $data = $request->validate([
            'dudi_ids' => ['required', 'array', 'min:1', 'max:'.$periodePkl->maks_pilihan_mitra],
            'dudi_ids.*' => ['required', 'integer', 'distinct', 'exists:dudis,id'],
        ]);

        $siswaId = $request->user()->siswa()->value('id');

        if ($siswaId === null) {
            throw (new ModelNotFoundException)->setModel(Siswa::class);
        }

        $pilihan = DB::transaction(function () use ($data, $periodePkl, $siswaId) {
            $siswa = Siswa::query()->lockForUpdate()->findOrFail($siswaId);

            if ($siswa->penempatans()->where('periode_pkl_id', $periodePkl->id)->exists()) {
                throw ValidationException::withMessages([
                    'periode' => 'Pilihan tidak dapat diubah setelah siswa ditempatkan.',
                ]);
            }

            $activeDudiCount = Dudi::query()
                ->whereIn('id', $data['dudi_ids'])
                ->where('aktif', true)
                ->whereHas('kuotas', fn ($query) => $query
                    ->where('periode_pkl_id', $periodePkl->id)
                    ->where('kuota', '>', 0))
                ->count();

            if ($activeDudiCount !== count($data['dudi_ids'])) {
                throw ValidationException::withMessages([
                    'dudi_ids' => 'Semua mitra pilihan harus aktif dan memiliki kuota pada periode ini.',
                ]);
            }

            PilihanMitra::query()
                ->where('siswa_id', $siswa->id)
                ->where('periode_pkl_id', $periodePkl->id)
                ->delete();

            foreach ($data['dudi_ids'] as $index => $dudiId) {
                PilihanMitra::create([
                    'siswa_id' => $siswa->id,
                    'periode_pkl_id' => $periodePkl->id,
                    'dudi_id' => $dudiId,
                    'prioritas' => $index + 1,
                ]);
            }

            return PilihanMitra::query()
                ->where('siswa_id', $siswa->id)
                ->where('periode_pkl_id', $periodePkl->id)
                ->with('dudi:id,nama_dudi')
                ->orderBy('prioritas')
                ->get();
        });

        return response()->json(['pilihan' => $pilihan]);
    }
}
