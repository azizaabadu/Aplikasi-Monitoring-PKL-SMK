@extends('layouts.kepsek')

@section('title', 'Persetujuan Penempatan Siswa (T6) - Portal Kepala Sekolah')

@section('content')
<div class="space-y-6">

    <!-- HEADER & AKSI UTAMA -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
                <span>Beranda Eksekutif</span>
                <span>/</span>
                <span class="text-slate-800 font-semibold">Persetujuan Penempatan</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Persetujuan Daftar Akhir Penempatan (T6)</h1>
            <p class="text-xs text-slate-500 mt-1">Sesuai PRD Bagian 5 (T6): Pengesahan resmi Kepala Sekolah sebelum siswa dapat melihat penempatan mitra PKL.</p>
        </div>

        @if ($stats['menunggu'] > 0)
            <form action="{{ route('kepsek.penempatan.setujui') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengesahkan SELURUH daftar penempatan siswa yang masih menunggu persetujuan?')">
                @csrf
                <input type="hidden" name="action" value="all">
                <button type="submit" class="px-5 py-3 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold shadow-md transition flex items-center gap-2">
                    <i class="fa-solid fa-stamp text-sky-400"></i>
                    <span>Sahkan Seluruh Penempatan ({{ $stats['menunggu'] }})</span>
                </button>
            </form>
        @endif
    </div>

    @if (session('status'))
        <div role="status" class="flex items-center gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold shadow-sm">
            <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div role="alert" class="flex items-center gap-3 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold shadow-sm">
            <i class="fa-solid fa-triangle-exclamation text-rose-600 text-base"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <!-- 3 KARTU STATISTIK PENEMPATAN -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Total Penempatan Diajukan</span>
            <div class="text-2xl font-black text-slate-900">{{ $stats['total'] }}</div>
            <span class="text-[11px] text-slate-500 font-medium">Siswa terploting oleh Admin PKL</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-emerald-700 uppercase tracking-wider block">Disahkan Kepala Sekolah</span>
            <div class="text-2xl font-black text-emerald-700">{{ $stats['disetujui'] }}</div>
            <span class="text-[11px] text-emerald-600 font-bold">Penempatan resmi dan aktif</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-amber-700 uppercase tracking-wider block">Menunggu Pengesahan</span>
            <div class="text-2xl font-black {{ $stats['menunggu'] > 0 ? 'text-amber-600' : 'text-slate-900' }}">{{ $stats['menunggu'] }}</div>
            <span class="text-[11px] text-slate-500 font-medium">Belum disahkan pimpinan</span>
        </div>
    </div>

    <!-- FILTER & DAFTAR TABEL -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        
        <!-- Filter Bar -->
        <div class="p-4 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-slate-50/50">
            <form method="GET" action="{{ route('kepsek.penempatan') }}" class="flex flex-wrap items-center gap-2">
                <select name="jurusan" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:border-amber-500">
                    <option value="">Semua Kompetensi Keahlian</option>
                    @foreach ($jurusanList as $jur)
                        <option value="{{ $jur }}" {{ $jurusanFilter === $jur ? 'selected' : '' }}>{{ $jur }}</option>
                    @endforeach
                </select>

                <select name="status" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:border-amber-500">
                    <option value="">Semua Status Pengesahan</option>
                    <option value="menunggu_persetujuan" {{ $statusFilter === 'menunggu_persetujuan' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                    <option value="disetujui" {{ $statusFilter === 'disetujui' ? 'selected' : '' }}>Disahkan</option>
                </select>

                @if ($jurusanFilter || $statusFilter)
                    <a href="{{ route('kepsek.penempatan') }}" class="px-3 py-2 rounded-xl text-xs font-bold text-slate-500 hover:text-slate-800">
                        Reset Filter
                    </a>
                @endif
            </form>

            <span class="text-xs font-semibold text-slate-500">
                Menampilkan {{ $penempatans->count() }} data
            </span>
        </div>

        <!-- Tabel Penempatan Siswa -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase text-[10px] tracking-wider">
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Nama Siswa & NIS</th>
                        <th class="py-3 px-4">Jurusan</th>
                        <th class="py-3 px-4">Mitra DUDI & Lokasi</th>
                        <th class="py-3 px-4">Guru Pembimbing</th>
                        <th class="py-3 px-4">Status Pengesahan (T6)</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse ($penempatans as $index => $pen)
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-400">
                                {{ $penempatans->firstItem() + $index }}
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="font-extrabold text-slate-900 block">{{ $pen->siswa->nama ?? 'Siswa' }}</span>
                                <span class="text-[10px] text-slate-500 font-medium">NIS: {{ $pen->siswa->nis ?? '-' }} • Kelas {{ $pen->siswa->kelas ?? 'XII' }}</span>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="font-bold text-slate-800">{{ $pen->siswa->jurusan ?? 'PPLG' }}</span>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="font-extrabold text-slate-900 block">{{ $pen->dudi->nama_dudi ?? 'Mitra DUDI' }}</span>
                                <span class="text-[10px] text-slate-500 block truncate max-w-xs">{{ $pen->dudi->alamat ?? '-' }}</span>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="font-semibold text-slate-800">{{ $pen->siswa->guru->nama ?? 'Dra. Sri Wahyuni, M.Pd' }}</span>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                @if ($pen->status === 'disetujui')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <i class="fa-solid fa-check text-[9px]"></i> Disahkan Resmi
                                    </span>
                                    @if ($pen->disetujui_pada)
                                        <span class="block text-[9px] text-slate-400 mt-0.5">
                                            {{ \Illuminate\Support\Carbon::parse($pen->disetujui_pada)->translatedFormat('d M Y') }}
                                        </span>
                                    @endif
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-extrabold bg-amber-50 text-amber-800 border border-amber-200">
                                        <i class="fa-solid fa-clock text-[9px]"></i> Menunggu Persetujuan
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                @if ($pen->status !== 'disetujui')
                                    <form action="{{ route('kepsek.penempatan.setujui') }}" method="POST" onsubmit="return confirm('Sahkan penempatan siswa ini?')">
                                        @csrf
                                        <input type="hidden" name="action" value="single">
                                        <input type="hidden" name="penempatan_id" value="{{ $pen->id }}">
                                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-[#0F1E38] hover:bg-[#1E3A6D] text-white font-bold text-xs shadow-xs transition flex items-center gap-1.5 mx-auto">
                                            <i class="fa-solid fa-check text-sky-400"></i> Sahkan
                                        </button>
                                    </form>
                                @else
                                    <span class="text-emerald-600 font-bold text-xs"><i class="fa-solid fa-circle-check"></i> Sah</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-10 text-slate-400 font-medium">
                                Tidak ada data penempatan yang sesuai dengan filter pencarian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $penempatans->links() }}
        </div>
    </div>

</div>
@endsection
