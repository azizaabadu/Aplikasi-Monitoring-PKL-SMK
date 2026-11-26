@extends('layouts.guru')

@section('title', 'Penilaian & Sertifikat PKL - PKL.ID')

@section('content')
<div class="space-y-6">
    <!-- Feedback Alerts -->
    @if (session('status'))
        <div role="status" class="flex items-center gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold shadow-xs">
            <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div role="alert" class="flex items-center gap-3 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold shadow-xs">
            <i class="fa-solid fa-triangle-exclamation text-rose-600 text-base"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div role="alert" class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
            <div class="font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation text-rose-600"></i>
                Terdapat kesalahan dalam pengisian nilai:
            </div>
            <ul class="list-disc list-inside space-y-0.5 text-[11px] pl-4">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Header Halaman -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-black text-slate-900">Penilaian Akhir Siswa Bimbingan</h1>
            <p class="text-xs text-slate-500">Kelola komponen nilai sekolah, masukkan nilai aspek laporan/bimbingan siswa, dan tinjau rekap nilai industri sesuai PRD N3 &amp; N4.</p>
        </div>
        <div class="px-3.5 py-2 bg-indigo-50 border border-indigo-200 text-indigo-700 rounded-xl text-xs font-bold">
            Guru Pembimbing: {{ $guru->nama ?? auth()->user()->name }}
        </div>
    </div>

    <!-- Informasi Bobot Sesuai Aturan PRD -->
    <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-4 flex flex-wrap items-center justify-between gap-3 text-xs text-indigo-900">
        <div class="font-semibold flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center shrink-0">
                <i class="fa-solid fa-calculator"></i>
            </div>
            <div>
                <span>Komponen Pembobotan (Total 100%): </span>
                <strong>Sikap DUDI (30%)</strong> + <strong>Teknis DUDI (50%)</strong> + <strong>Logbook &amp; Laporan Guru (20%)</strong>
            </div>
        </div>
        <span class="text-[11px] text-indigo-700 bg-white px-3 py-1 rounded-lg border border-indigo-200 font-bold">
            <i class="fa-solid fa-user-check text-indigo-600 mr-1"></i> Data Tersimpan ke Database
        </span>
    </div>

    <!-- Tabel Daftar Penilaian Siswa Bimbingan -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="p-4 border-b border-slate-100 flex items-center justify-between">
            <h2 class="font-black text-sm text-slate-900">Daftar Nilai Siswa Bimbingan Anda</h2>
            <span class="text-xs font-bold text-slate-400">Total: {{ $siswas->count() }} Siswa</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] font-bold border-b border-slate-100">
                    <tr>
                        <th class="px-4 py-3">Siswa &amp; Mitra DUDI</th>
                        <th class="px-4 py-3">Sikap DUDI (30%)</th>
                        <th class="px-4 py-3">Teknis DUDI (50%)</th>
                        <th class="px-4 py-3">Nilai Laporan Guru (20%)</th>
                        <th class="px-4 py-3">Nilai Akhir</th>
                        <th class="px-4 py-3 text-right">Aksi Simpan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse ($siswas as $siswa)
                        @php
                            $nilaiDudi = $siswa->penilaians->firstWhere('penilai', 'Industri');
                            $nilaiGuru = $siswa->penilaians->firstWhere('penilai', 'Guru');
                            
                            $sikapDudi = $nilaiDudi ? $nilaiDudi->nilai_non_teknis : null;
                            $teknisDudi = $nilaiDudi ? $nilaiDudi->nilai_teknis : null;
                            $laporanGuru = $nilaiGuru ? $nilaiGuru->nilai_teknis : null;

                            $nilaiAkhir = ($sikapDudi !== null && $teknisDudi !== null && $laporanGuru !== null)
                                ? round(($sikapDudi * 0.3) + ($teknisDudi * 0.5) + ($laporanGuru * 0.2), 2)
                                : null;
                        @endphp
                        <tr class="hover:bg-slate-50/50">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 font-bold flex items-center justify-center text-xs">
                                        {{ strtoupper(substr($siswa->nama, 0, 2)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900">{{ $siswa->nama }}</div>
                                        <div class="text-[10px] text-slate-400">{{ $siswa->dudi->nama_dudi ?? 'Mitra PKL' }} &bull; NIS: {{ $siswa->nis }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                @if ($sikapDudi !== null)
                                    <span class="font-bold text-slate-800">{{ $sikapDudi }}</span>
                                    <span class="text-[10px] text-slate-400">(DUDI)</span>
                                @else
                                    <span class="text-slate-400 italic text-[11px]">Belum diisi</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if ($teknisDudi !== null)
                                    <span class="font-bold text-slate-800">{{ $teknisDudi }}</span>
                                    <span class="text-[10px] text-slate-400">(DUDI)</span>
                                @else
                                    <span class="text-slate-400 italic text-[11px]">Belum diisi</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <form id="formNilaiGuru-{{ $siswa->id }}" action="{{ route('guru.penilaian.store', $siswa) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    <input type="number" name="nilai_teknis" min="0" max="100" value="{{ old('nilai_teknis', $laporanGuru ?? 85) }}" required class="w-20 bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1 font-bold text-slate-900 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">
                                    <input type="hidden" name="nilai_non_teknis" value="{{ old('nilai_non_teknis', $nilaiGuru?->nilai_non_teknis ?? 85) }}">
                                </form>
                            </td>
                            <td class="px-4 py-3">
                                @if ($nilaiAkhir !== null)
                                    <span class="px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 font-black text-sm">
                                        {{ number_format($nilaiAkhir, 1, ',', '.') }}
                                    </span>
                                @else
                                    <span class="text-[11px] text-slate-400 italic">Menunggu DUDI/Guru</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right">
                                <button type="submit" form="formNilaiGuru-{{ $siswa->id }}" class="px-3.5 py-1.5 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg font-bold text-[11px] transition shadow-xs">
                                    <i class="fa-solid fa-floppy-disk mr-1"></i> Simpan
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-slate-400">
                                Belum ada siswa yang ditugaskan di bawah bimbingan Anda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
