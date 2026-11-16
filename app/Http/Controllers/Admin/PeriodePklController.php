<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeriodePkl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PeriodePklController extends Controller
{
    private const STATUSES = ['persiapan', 'pengajuan', 'berjalan', 'penilaian', 'selesai'];

    public function index(): JsonResponse
    {
        return response()->json(
            PeriodePkl::query()
                ->withCount(['kuotas', 'pilihanMitras', 'penempatans'])
                ->orderByDesc('tanggal_mulai')
                ->paginate(20)
        );
    }

    public function store(Request $request): JsonResponse
    {
        $periodePkl = PeriodePkl::create($this->validatedData($request));

        return response()->json($periodePkl, 201);
    }

    public function show(PeriodePkl $periodePkl): JsonResponse
    {
        return response()->json($periodePkl->loadCount(['kuotas', 'pilihanMitras', 'penempatans']));
    }

    public function update(Request $request, PeriodePkl $periodePkl): JsonResponse
    {
        $periodePkl->update($this->validatedData($request, $periodePkl));

        return response()->json($periodePkl->refresh());
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request, ?PeriodePkl $periodePkl = null): array
    {
        $required = $periodePkl === null ? 'required' : 'sometimes';
        $tanggalMulai = $request->input('tanggal_mulai')
            ?? $periodePkl?->tanggal_mulai?->toDateString()
            ?? 'today';

        return $request->validate([
            'tahun_ajaran' => [$required, 'string', 'max:20'],
            'tanggal_mulai' => [$required, 'date'],
            'tanggal_selesai' => [$required, 'date', 'after_or_equal:'.$tanggalMulai],
            'status' => ['sometimes', 'required', Rule::in(self::STATUSES)],
            'maks_pilihan_mitra' => [$required, 'integer', 'min:1', 'max:255'],
            'batas_hari_tidak_isi' => [$required, 'integer', 'min:0', 'max:30'],
            'batas_hari_isi_mundur' => [$required, 'integer', 'min:0', 'max:30'],
        ]);
    }
}
