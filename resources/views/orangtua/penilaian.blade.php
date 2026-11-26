@extends('layouts.orangtua')

@section('title', 'Penilaian PKL Ananda - PKL.ID')

@section('content')
    <div class="mx-auto max-w-6xl space-y-6">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div><p class="text-xs font-semibold text-slate-500">Beranda <span class="px-1">/</span> Evaluasi &amp; Nilai</p><h1 class="mt-1 text-2xl font-black text-slate-900 sm:text-3xl">Penilaian PKL Ananda</h1><p class="mt-1 text-sm text-slate-500">Pantau catatan penilaian yang telah dikirim oleh pembimbing.</p></div>
            <button onclick="window.print()" class="inline-flex items-center gap-2 rounded-xl bg-[#0F1E38] px-4 py-2.5 text-xs font-bold text-white shadow-sm hover:bg-sky-800"><i class="fa-solid fa-print" aria-hidden="true"></i>Cetak halaman</button>
        </div>

        @forelse ($anakAnak as $anak)
            @php
                $siswa = $anak['student'];
                $dudiAssessment = $siswa->penilaians->firstWhere('penilai', 'Industri');
                $schoolAssessment = $siswa->penilaians->firstWhere('penilai', 'Guru');
            @endphp
            <section class="space-y-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 pb-4">
                    <div><h2 class="text-base font-black text-slate-900">{{ $siswa->nama }}</h2><p class="mt-1 text-xs text-slate-500">{{ $siswa->kelas }} · {{ $siswa->jurusan }} · {{ $anak['dudi']?->nama_dudi ?? 'Tempat PKL belum terhubung' }}</p></div>
                    <span class="rounded-full px-3 py-1 text-[10px] font-bold {{ $dudiAssessment && $schoolAssessment ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">{{ $dudiAssessment && $schoolAssessment ? 'Komponen penilaian tersedia' : 'Penilaian masih berjalan' }}</span>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    @foreach ([['Pembimbing DUDI', $dudiAssessment], ['Guru Pembimbing', $schoolAssessment]] as [$label, $assessment])
                        <article class="rounded-xl border border-slate-200 p-4">
                            <div class="flex items-center justify-between gap-2"><h3 class="text-xs font-extrabold text-slate-800">{{ $label }}</h3><span class="text-[10px] text-slate-400">{{ $assessment?->updated_at?->translatedFormat('d M Y') ?? 'Belum dinilai' }}</span></div>
                            @if ($assessment)
                                <div class="mt-4 grid grid-cols-2 gap-3">
                                    <div class="rounded-lg bg-slate-50 p-3"><p class="text-[10px] font-semibold text-slate-500">Teknis</p><p class="mt-1 text-xl font-black text-slate-900">{{ $assessment->nilai_teknis }}<span class="ml-1 text-[10px] font-semibold text-slate-400">/ 100</span></p></div>
                                    <div class="rounded-lg bg-slate-50 p-3"><p class="text-[10px] font-semibold text-slate-500">Nonteknis</p><p class="mt-1 text-xl font-black text-slate-900">{{ $assessment->nilai_non_teknis }}<span class="ml-1 text-[10px] font-semibold text-slate-400">/ 100</span></p></div>
                                </div>
                                @if ($assessment->catatan)<p class="mt-3 text-xs leading-relaxed text-slate-600"><strong>Catatan:</strong> {{ $assessment->catatan }}</p>@endif
                            @else
                                <p class="mt-4 rounded-lg bg-slate-50 p-3 text-xs text-slate-500">Nilai dari {{ strtolower($label) }} belum tersedia.</p>
                            @endif
                        </article>
                    @endforeach
                </div>
                <p class="text-[11px] leading-relaxed text-slate-500">Nilai akhir resmi belum ditampilkan karena bobot dan proses pengesahan akhir belum tersimpan dalam data penilaian.</p>
            </section>
        @empty
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-10 text-center"><p class="text-sm font-bold text-slate-800">Belum ada profil siswa yang terhubung.</p><p class="mt-1 text-xs text-slate-500">Hubungi administrator sekolah untuk memperbarui hubungan akun wali dan siswa.</p></div>
        @endforelse
    </div>
@endsection
