@extends('layouts.dudi')

@section('title', 'Dashboard Pembimbing DUDI - Portal PKL.ID')

@section('content')
  <!-- Feedback Status & Error Alerts -->
  @if (session('status'))
    <div role="status" class="mb-5 flex items-center gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold shadow-xs">
      <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
      <span>{{ session('status') }}</span>
    </div>
  @endif

  @if (session('error'))
    <div role="alert" class="mb-5 flex items-center gap-3 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold shadow-xs">
      <i class="fa-solid fa-triangle-exclamation text-rose-600 text-base"></i>
      <span>{{ session('error') }}</span>
    </div>
  @endif

  @if ($errors->any())
    <div role="alert" class="mb-5 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
      <div class="font-bold flex items-center gap-2">
        <i class="fa-solid fa-circle-exclamation text-rose-600"></i>
        Terdapat kesalahan dalam pengisian formulir:
      </div>
      <ul class="list-disc list-inside space-y-0.5 text-[11px] pl-4">
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- Breadcrumb & Info Mitra -->
  <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Dashboard Pembimbing DUDI</span>
    </div>

    <div class="flex items-center gap-2">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 border border-indigo-200 text-indigo-700 text-[10px] font-extrabold tracking-wide">
        <i class="fa-solid fa-building text-[9px]"></i>
        MITRA: {{ strtoupper($dudi->nama_dudi ?? 'MITRA INDUSTRI') }}
      </span>
    </div>
  </div>

  <!-- Hero Header -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5 mb-5">
    <div class="space-y-2 max-w-2xl">
      <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-sky-50 border border-sky-200/80 text-sky-700 text-[10px] font-extrabold uppercase tracking-wider">
        <i class="fa-solid fa-user-tie text-[10px]"></i>
        PANEL PEMBIMBING LAPANGAN
      </span>
      <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
        Selamat Datang, {{ $dudi->pimpinan ?? auth()->user()->name }}
      </h1>
      <p class="text-xs text-slate-500 leading-relaxed">
        Kelola pengesahan logbook harian siswa magang di mitra Anda, berikan umpan balik atau revisi, serta masukkan nilai kompetensi lapangan secara tepat waktu sesuai PRD L3 dan N2.
      </p>
    </div>

    <div class="flex flex-wrap items-center gap-2 shrink-0">
      <a href="{{ route('dudi.umpan-balik.create') ?? '#' }}" class="px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-white rounded-xl text-[11px] font-extrabold flex items-center gap-2 shadow-xs transition">
        <i class="fa-solid fa-triangle-exclamation text-xs"></i>
        <span>Tulis Umpan Balik / Pelanggaran</span>
      </a>
    </div>
  </div>

  <!-- 3 KPI Utama Dashboard DUDI -->
  <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
    <!-- Siswa di Mitra -->
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Siswa Bimbingan di Mitra</span>
        <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-users"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">{{ $totalSiswa }}</span>
        <span class="text-xs font-semibold text-slate-400">Siswa Aktif</span>
      </div>
      <div class="text-[10px] text-slate-500">Khusus Mitra {{ $dudi->nama_dudi }}</div>
    </div>

    <!-- Logbook Menunggu Pengesahan -->
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Logbook Menunggu Pengesahan</span>
        <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-clock-rotate-left"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-amber-600">{{ $pendingLogbooks->count() }}</span>
        <span class="text-xs font-semibold text-slate-400">Laporan Menunggu</span>
      </div>
      <div class="text-[10px] text-slate-500">Perlu divalidasi pembimbing lapangan</div>
    </div>

    <!-- Penilaian Lapangan Belum Diisi -->
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Status Penilaian Lapangan</span>
        <span class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-award"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">{{ $ratedCount }} / {{ $totalSiswa }}</span>
        <span class="text-xs font-semibold text-slate-400">Siswa Selesai Dinilai</span>
      </div>
      <div class="text-[10px] text-indigo-700 font-bold">Komponen Teknis &amp; Sikap Industri</div>
    </div>
  </div>

  <!-- Konten Utama: Validasi Logbook & Penilaian Siswa -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
    
    <!-- Logbook Menunggu Pengesahan (Modul L3) -->
    <section class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-book-open text-sky-600"></i>
          <span>Logbook Menunggu Pengesahan (L3)</span>
        </h2>
        <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 border border-amber-200">
          {{ $pendingLogbooks->count() }} Menunggu
        </span>
      </div>

      <div class="space-y-3 text-xs">
        @forelse ($pendingLogbooks as $item)
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2.5">
            <div class="flex items-center justify-between">
              <div>
                <span class="font-extrabold text-slate-900">{{ $item->siswa->nama }}</span>
                <span class="text-[10px] text-slate-400 ml-1.5">
                  {{ $item->siswa->kelas }} {{ $item->siswa->jurusan }} &bull; {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                  ({{ substr($item->jam_mulai, 0, 5) }} - {{ substr($item->jam_selesai, 0, 5) }} WIB)
                </span>
                @if ($item->terlambat)
                  <span class="ml-1 px-1.5 py-0.5 rounded text-[9px] bg-rose-50 text-rose-700 border border-rose-200 font-bold">Diisi Terlambat</span>
                @endif
              </div>
              <span class="px-2 py-0.5 rounded bg-amber-100 text-amber-800 text-[9px] font-extrabold">
                Menunggu Pengesahan
              </span>
            </div>

            <div class="p-2.5 rounded-lg bg-white border border-slate-200/60 space-y-1.5 text-slate-700">
              <p><strong>Kegiatan:</strong> {{ $item->kegiatan }}</p>
              @if ($item->hasil)
                <p><strong>Hasil / Capaian:</strong> {{ $item->hasil }}</p>
              @endif
              @if ($item->kendala)
                <p class="text-amber-800"><strong>Kendala:</strong> {{ $item->kendala }}</p>
              @endif
              @if ($item->foto)
                <div class="pt-1">
                  <a href="{{ asset('storage/' . $item->foto) }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] text-sky-600 font-bold hover:underline">
                    <i class="fa-solid fa-image"></i> Lihat Foto Dokumentasi
                  </a>
                </div>
              @endif
            </div>

            <!-- Tombol Aksi Backend: Minta Revisi & Sahkan -->
            <div class="flex items-center justify-end gap-2 pt-1">
              <button type="button" onclick="openRejectModal({{ $item->id }}, '{{ addslashes($item->siswa->nama) }}')" class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-700 font-bold text-[11px] transition">
                <i class="fa-solid fa-rotate-left mr-1"></i> Minta Revisi
              </button>

              <form action="{{ route('dudi.logbook.approve', $item) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="px-3.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-[11px] shadow-xs transition">
                  <i class="fa-solid fa-check mr-1"></i> Sahkan Logbook
                </button>
              </form>
            </div>
          </div>
        @empty
          <div class="p-8 text-center text-slate-400 bg-slate-50 rounded-xl space-y-2 border border-dashed border-slate-200">
            <i class="fa-solid fa-circle-check text-emerald-500 text-2xl"></i>
            <p class="text-xs font-semibold text-slate-600">Semua logbook siswa telah disahkan atau belum ada pengajuan baru.</p>
          </div>
        @endforelse
      </div>
    </section>

    <!-- Daftar Siswa Magang di Mitra & Input Nilai Cepat (Modul N2) -->
    <section class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-id-card text-indigo-600"></i>
          <span>Daftar Siswa &amp; Penilaian Industri</span>
        </h2>
        <span class="text-[10px] font-bold text-slate-400">Total: {{ $totalSiswa }} Siswa</span>
      </div>

      <div class="space-y-3 text-xs">
        @forelse ($siswas as $siswa)
          @php
            $nilaiIndustri = $siswa->penilaians->firstWhere('penilai', 'Industri');
          @endphp
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2">
            <div class="flex items-center justify-between">
              <div>
                <div class="font-extrabold text-slate-900">{{ $siswa->nama }}</div>
                <div class="text-[10px] text-slate-500">{{ $siswa->kelas }} {{ $siswa->jurusan }} &bull; NIS: {{ $siswa->nis }}</div>
              </div>
              @if ($nilaiIndustri)
                <span class="px-2.5 py-1 rounded bg-emerald-50 text-emerald-700 font-bold text-[10px] border border-emerald-200">
                  Sudah Dinilai
                </span>
              @else
                <span class="px-2.5 py-1 rounded bg-amber-50 text-amber-700 font-bold text-[10px] border border-amber-200">
                  Belum Dinilai
                </span>
              @endif
            </div>

            <!-- Form Simpan Nilai Industri (PRD N2) -->
            <form action="{{ route('dudi.penilaian.store', $siswa) }}" method="POST" class="pt-2 border-t border-slate-200/60 space-y-2">
              @csrf
              <div class="grid grid-cols-2 gap-2">
                <div>
                  <label class="text-[10px] font-bold text-slate-600 block mb-0.5">Teknis (0-100) <span class="text-rose-500">*</span></label>
                  <input type="number" name="nilai_teknis" min="0" max="100" value="{{ old('nilai_teknis', $nilaiIndustri?->nilai_teknis) }}" required class="w-full px-2.5 py-1.5 bg-white border border-slate-200 rounded-lg font-bold text-slate-800 focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                  <label class="text-[10px] font-bold text-slate-600 block mb-0.5">Sikap / Etika (0-100) <span class="text-rose-500">*</span></label>
                  <input type="number" name="nilai_non_teknis" min="0" max="100" value="{{ old('nilai_non_teknis', $nilaiIndustri?->nilai_non_teknis) }}" required class="w-full px-2.5 py-1.5 bg-white border border-slate-200 rounded-lg font-bold text-slate-800 focus:outline-none focus:border-indigo-500">
                </div>
              </div>
              <div>
                <label class="text-[10px] font-bold text-slate-600 block mb-0.5">Catatan / Evaluasi Lapangan</label>
                <input type="text" name="catatan" value="{{ old('catatan', $nilaiIndustri?->catatan) }}" placeholder="Catatan etos kerja atau kemajuan siswa..." class="w-full px-2.5 py-1.5 bg-white border border-slate-200 rounded-lg text-xs focus:outline-none focus:border-indigo-500">
              </div>
              <div class="flex justify-end pt-1">
                <button type="submit" class="px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-bold text-[11px] shadow-xs transition">
                  <i class="fa-solid fa-floppy-disk mr-1"></i> Simpan Nilai Industri
                </button>
              </div>
            </form>
          </div>
        @empty
          <div class="p-6 text-center text-slate-400 bg-slate-50 rounded-xl">
            Belum ada siswa yang ditempatkan di mitra Anda.
          </div>
        @endforelse
      </div>
    </section>
  </div>

  <!-- Modal Permintaan Revisi Logbook (PRD L3) -->
  <div id="modalRevisiLogbook" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-sm font-black text-slate-900">Catatan Revisi Logbook</h3>
          <p id="rejectModalSiswaName" class="text-[11px] text-slate-500">Siswa: -</p>
        </div>
        <button type="button" onclick="closeRejectModal()" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>

      <form id="formRejectLogbook" method="POST" action="" class="space-y-3 text-xs">
        @csrf
        <div>
          <label class="block font-bold text-slate-700 mb-1">Alasan / Catatan Perbaikan <span class="text-rose-500">*</span></label>
          <textarea name="catatan" rows="3" required placeholder="Tuliskan bagian kegiatan yang kurang jelas atau perlu diperbaiki siswa..." class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:border-rose-500"></textarea>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeRejectModal()" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold hover:bg-slate-50">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white font-extrabold transition">
            Kirim Permintaan Revisi
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
@push('scripts')
<script>
  function openRejectModal(jurnalId, namaSiswa) {
    const modal = document.getElementById('modalRevisiLogbook');
    const form = document.getElementById('formRejectLogbook');
    const label = document.getElementById('rejectModalSiswaName');
    
    form.action = `/dudi/logbook/${jurnalId}/reject`;
    label.innerText = `Siswa: ${namaSiswa}`;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeRejectModal() {
    const modal = document.getElementById('modalRevisiLogbook');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }
</script>
@endpush
