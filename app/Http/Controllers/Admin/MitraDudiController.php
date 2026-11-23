<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MitraDudi;
use Illuminate\Http\Request;

class MitraDudiController extends Controller
{
    public function index()
    {
        $mitras = MitraDudi::latest()->get();
        return view('admin.dudi-mou', compact('mitras'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'bidang_usaha'    => 'required|string|max:255',
            'nomor_mou'       => 'required|string|max:255',
        ]);

        MitraDudi::create([
            'nama_perusahaan' => $validated['nama_perusahaan'],
            'bidang_usaha'    => $validated['bidang_usaha'],
            'nomor_mou'       => $validated['nomor_mou'],
            'status_mou'      => 'MoU Aktif Legal',
        ]);

        return redirect()
            ->route('admin.dudi-mou')
            ->with('toast_success', 'Mitra ' . $validated['nama_perusahaan'] . ' berhasil disimpan ke database.');
    }
}