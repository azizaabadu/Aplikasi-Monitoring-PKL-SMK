<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dudi;
use App\Models\DudiKuota;
use App\Models\Penempatan;
use App\Models\PeriodePkl;
use App\Models\PilihanMitra;
use App\Models\Siswa;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PenempatanController extends Controller
{
    public function index(PeriodePkl $periodePkl): JsonResponse
    {
        $penempatans = Penempatan::query()
            ->where('periode_pkl_id', $periodePkl->id)
            ->with([
                'siswa:id,nis,nama',
                'dudi:id,nama_dudi',
                'penetap:id,name',
            ])
            ->latest()
            ->paginate(25);

        return response()->json($penempatans);
    }

    public function store(Request $request, PeriodePkl $periodePkl): JsonResponse
    {
        if ($periodePkl->status !== 'pengajuan') {
            throw ValidationException::withMessages([
                'periode' => 'Penempatan hanya dapat dibuat saat periode berstatus pengajuan.',
            ]);
        }

        $data = $request->validate([
            'siswa_id' => ['required', 'integer', 'exists:siswas,id'],
            'dudi_id' => ['required', 'integer', 'exists:dudis,id'],
        ]);

        $penempatan = DB::transaction(function () use ($data, $periodePkl, $request): Penempatan {
            $siswa = Siswa::query()->lockForUpdate()->findOrFail($data['siswa_id']);

            if (Penempatan::query()
                ->where('siswa_id', $siswa->id)
                ->where('periode_pkl_id', $periodePkl->id)
                ->exists()) {
                throw ValidationException::withMessages([
                    'siswa_id' => 'Siswa sudah memiliki penempatan pada periode ini.',
                ]);
            }

            $pilihanTersedia = PilihanMitra::query()
                ->where('siswa_id', $siswa->id)
                ->where('periode_pkl_id', $periodePkl->id)
                ->where('dudi_id', $data['dudi_id'])
                ->exists();

            if (! $pilihanTersedia) {
                throw ValidationException::withMessages([
                    'dudi_id' => 'Siswa hanya dapat ditempatkan pada mitra yang dipilihnya.',
                ]);
            }

            $dudi = Dudi::query()->whereKey($data['dudi_id'])->where('aktif', true)->first();

            if ($dudi === null) {
                throw ValidationException::withMessages([
                    'dudi_id' => 'DUDI tidak ditemukan atau sudah nonaktif.',
                ]);
            }

            $kuota = DudiKuota::query()
                ->where('dudi_id', $dudi->id)
                ->where('periode_pkl_id', $periodePkl->id)
                ->lockForUpdate()
                ->first();

            if ($kuota === null) {
                throw ValidationException::withMessages([
                    'dudi_id' => 'Kuota DUDI belum diatur untuk periode ini.',
                ]);
            }

            $jumlahDitempatkan = Penempatan::query()
                ->where('dudi_id', $dudi->id)
                ->where('periode_pkl_id', $periodePkl->id)
                ->count();

            if ($jumlahDitempatkan >= $kuota->kuota) {
                throw ValidationException::withMessages([
                    'dudi_id' => 'Kuota DUDI untuk periode ini sudah penuh.',
                ]);
            }

            return Penempatan::create([
                'siswa_id' => $siswa->id,
                'periode_pkl_id' => $periodePkl->id,
                'dudi_id' => $dudi->id,
                'ditetapkan_oleh' => $request->user()->id,
            ]);
        });

        return response()->json($penempatan->load(['siswa:id,nis,nama', 'dudi:id,nama_dudi', 'periodePkl:id,tahun_ajaran']), 201);
    }
}
