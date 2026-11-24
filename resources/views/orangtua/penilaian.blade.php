@extends('layouts.orangtua')

@section('title', 'Evaluasi Nilai & Sertifikasi Ananda - Portal Orang Tua PKL.ID')

@section('content')
<div class="space-y-6">

    @forelse ($anakAnak as $anak)
        @php
            $siswa = $anak['student'];
            $dudi = $anak['dudi'];
            $guru = $anak['teacher'];
            $mentor = $anak['mentor'];
        @endphp

        <!-- 1. BREADCRUMB & HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-1">
                    <a href="{{ route('orangtua.dashboard') }}" class="hover:text-sky-600 transition">Beranda</a>
                    <span>/</span>
                    <span class="text-slate-800">Evaluasi & Nilai</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                    Evaluasi Nilai & Capaian PKL
                </h1>
                <p class="text-xs text-slate-500 mt-1">
                    Transkrip hasil penilaian Praktik Kerja Lapangan ananda {{ $siswa->nama ?? 'Siswa' }} yang telah diverifikasi sekolah.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <button onclick="window.print()" class="inline-flex items-center gap-2 rounded-xl bg-[#0F1E38] px-4 py-2.5 text-xs font-bold text-white shadow-sm transition hover:bg-[#1E3A6D]">
                    <i class="fa-solid fa-file-arrow-down text-sky-400"></i>
                    <span>Unduh Transkrip Nilai Resmi (PDF)</span>
                </button>
            </div>
        </div>

        <!-- 2. HERO CUMULATIVE SCORE BANNER -->
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0F1E38] via-[#162F56] to-[#1E3A6D] p-6 text-white shadow-xl sm:p-8">
            <div class="relative z-10 grid grid-cols-1 gap-6 lg:grid-cols-12 lg:items-center">
                
                <div class="space-y-2 lg:col-span-8">
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-400/30 bg-emerald-500/20 px-3 py-1 text-[11px] font-extrabold text-emerald-300">
                        <i class="fa-solid fa-circle-check"></i> Status: Nilai Telah Dirilis Resmi
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black tracking-tight">
                        Predikat: A (Sangat Memuaskan)
                    </h2>
                    <p class="text-xs leading-relaxed text-slate-300 max-w-2xl">
                        Ananda <strong class="text-white">{{ $siswa->nama ?? 'Rizky Pratama' }}</strong> telah menuntaskan seluruh kewajiban Praktik Kerja Lapangan di <strong class="text-white">{{ $dudi?->nama_dudi ?? 'PT Solusi Teknologi Nusantara' }}</strong> dengan pencapaian kompetensi di atas standar kelulusan vokasi.
                    </p>
                </div>

                <div class="flex flex-col items-center justify-center rounded-2xl border border-white/15 bg-white/10 p-6 backdrop-blur-md lg:col-span-4 text-center">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-300">Nilai Akhir Kumulatif</span>
                    <div class="text-5xl font-black text-white tracking-tight my-1">
                        94.2
                    </div>
                    <span class="text-xs text-emerald-300 font-extrabold">Skala 100 • Lulus Kompeten</span>
                </div>

            </div>
        </section>

        <!-- 3. DETAIL BOBOT & KOMPONEN NILAI SESUAI PRD 6.5 -->
        <section class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h2 class="text-base font-black text-slate-900">Rincian Komponen Penilaian</h2>
                    <p class="text-xs text-slate-500">Perhitungan nilai akhir berdasarkan bobot resmi kurikulum sekolah (PRD Bagian 6.5)</p>
                </div>
                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-black text-slate-700">Total Bobot: 100%</span>
            </div>

            <!-- Tabel Komponen Nilai -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 border-b border-slate-100">
                        <tr>
                            <th class="py-3.5 px-4">Komponen Penilaian</th>
                            <th class="py-3.5 px-4">Penilai</th>
                            <th class="py-3.5 px-4 text-center">Bobot</th>
                            <th class="py-3.5 px-4 text-center">Nilai Angka</th>
                            <th class="py-3.5 px-4 text-right">Kontribusi ke Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-4">
                                <p class="font-extrabold text-slate-900">Sikap dan Etika Kerja</p>
                                <p class="text-[11px] text-slate-500">Kedisiplinan, integritas, inisiatif, dan komunikasi kerja</p>
                            </td>
                            <td class="py-4 px-4 font-semibold text-slate-800">
                                Pembimbing DUDI ({{ $mentor?->name ?? 'Ahmad Fauzi, S.Kom' }})
                            </td>
                            <td class="py-4 px-4 text-center font-bold text-slate-600">30%</td>
                            <td class="py-4 px-4 text-center font-black text-slate-900 text-sm">95</td>
                            <td class="py-4 px-4 text-right font-black text-sky-700 text-sm">28.5</td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-4">
                                <p class="font-extrabold text-slate-900">Keterampilan Teknis & Kejuruan</p>
                                <p class="text-[11px] text-slate-500">Penyelesaian proyek, pemecahan masalah bug, standar kode</p>
                            </td>
                            <td class="py-4 px-4 font-semibold text-slate-800">
                                Pembimbing DUDI ({{ $mentor?->name ?? 'Ahmad Fauzi, S.Kom' }})
                            </td>
                            <td class="py-4 px-4 text-center font-bold text-slate-600">50%</td>
                            <td class="py-4 px-4 text-center font-black text-slate-900 text-sm">93</td>
                            <td class="py-4 px-4 text-right font-black text-sky-700 text-sm">46.5</td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-4">
                                <p class="font-extrabold text-slate-900">Kelengkapan Logbook & Laporan Akhir</p>
                                <p class="text-[11px] text-slate-500">Konsistensi jurnal harian, sistematika laporan tertulis</p>
                            </td>
                            <td class="py-4 px-4 font-semibold text-slate-800">
                                Guru Pembimbing ({{ $guru?->name ?? 'Dra. Sri Wahyuni, M.Pd' }})
                            </td>
                            <td class="py-4 px-4 text-center font-bold text-slate-600">20%</td>
                            <td class="py-4 px-4 text-center font-black text-slate-900 text-sm">96</td>
                            <td class="py-4 px-4 text-right font-black text-sky-700 text-sm">19.2</td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-slate-50/80 font-black text-slate-900 border-t-2 border-slate-200">
                        <tr>
                            <td colspan="2" class="py-4 px-4 text-sm font-extrabold">Nilai Akhir Terhitung</td>
                            <td class="py-4 px-4 text-center font-black text-sm">100%</td>
                            <td class="py-4 px-4 text-center text-slate-400">—</td>
                            <td class="py-4 px-4 text-right text-emerald-700 text-base font-black">94.2</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

        <!-- 4. DOKUMEN SERTIFIKASI & CATATAN EVALUASI (2 KOLOM) -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
            
            <!-- Dokumen Sertifikat Digital (7 Kolom) -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4 lg:col-span-7">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <h2 class="text-base font-black text-slate-900">Sertifikat Praktik Kerja Lapangan</h2>
                    <span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-[10px] font-bold text-emerald-700">Diverifikasi BKK</span>
                </div>

                <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50/60 p-6 flex flex-col items-center justify-center text-center space-y-3">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-100 text-amber-700 text-2xl">
                        <i class="fa-solid fa-certificate"></i>
                    </div>
                    <div>
                        <p class="text-sm font-black text-slate-900">Sertifikat Resmi Industri Telah Diterbitkan</p>
                        <p class="text-xs text-slate-500 mt-0.5">Nomor Registrasi: CERT-PKL/SMKN1-BTM/2024/0942</p>
                    </div>
                    <p class="text-xs text-slate-600 max-w-md leading-relaxed">
                        Sertifikat diterbitkan secara bersama oleh Kepala SMKN 1 Batam dan Pimpinan PT Solusi Teknologi Nusantara, membuktikan kelulusan ananda pada standar industri.
                    </p>
                    <button onclick="alert('Mengunduh salinan berkas digital sertifikat PKL...')" class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2 text-xs font-bold text-white transition hover:bg-slate-800">
                        <i class="fa-solid fa-download"></i> Unduh Salinan Sertifikat (PDF)
                    </button>
                </div>
            </div>

            <!-- Catatan Evaluasi Akhir (5 Kolom) -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4 lg:col-span-5">
                <h2 class="text-base font-black text-slate-900">Catatan Dewan Pembimbing</h2>

                <div class="space-y-3">
                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 space-y-1.5">
                        <div class="flex items-center justify-between text-[11px]">
                            <span class="font-extrabold text-slate-900">Mentor DUDI (Ahmad Fauzi, S.Kom)</span>
                            <span class="text-slate-400">Rekomendasi</span>
                        </div>
                        <p class="text-xs text-slate-600 italic leading-relaxed">
                            "Rizky memiliki potensi besar sebagai Software Engineer junior. Sangat siap memasuki dunia kerja maupun melanjutkan ke jenjang perguruan tinggi."
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 space-y-1.5">
                        <div class="flex items-center justify-between text-[11px]">
                            <span class="font-extrabold text-slate-900">Guru Pembimbing (Dra. Sri Wahyuni)</span>
                            <span class="text-slate-400">Laporan</span>
                        </div>
                        <p class="text-xs text-slate-600 italic leading-relaxed">
                            "Laporan tertulis disusun secara sistematis, rapi, dan melampirkan seluruh bukti dokumentasi logbook tanpa kendala administratif."
                        </p>
                    </div>
                </div>
            </div>

        </div>

    @empty
        <div class="rounded-3xl border border-slate-200 bg-white p-12 text-center shadow-sm max-w-lg mx-auto">
            <h2 class="text-lg font-black text-slate-900">Belum Ada Data Penilaian</h2>
        </div>
    @endforelse

</div>
@endsection
