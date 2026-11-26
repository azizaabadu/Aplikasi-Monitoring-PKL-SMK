@extends('layouts.dudi') {{-- Atau layouts.app / layout khusus DUDI --}}

@section('title', 'Dashboard Pembimbing DUDI - Portal PKL.ID')

@section('content')
  <!-- Breadcrumb & Info Mitra -->
  <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Dashboard Pembimbing DUDI</span>
    </div>

    <div class="flex items-center gap-2">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 border border-indigo-200 text-indigo-700 text-[10px] font-extrabold tracking-wide">
        <i class="fa-solid fa-building text-[9px]"></i>
        MITRA: PT SOLUSI TEKNOLOGI NUSANTARA
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
        Selamat Datang, Bapak Ahmad Fauzi, S.Kom
      </h1>
      <p class="text-xs text-slate-500 leading-relaxed">
        Kelola pengesahan logbook harian siswa magang, berikan umpan balik atau laporan pelanggaran, serta masukkan nilai komponen lapangan secara tepat waktu.
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
        <span class="text-3xl font-black text-slate-900">14</span>
        <span class="text-xs font-semibold text-slate-400">Siswa Aktif</span>
      </div>
      <div class="text-[10px] text-slate-500">Lintas Jurusan (PPLG &amp; DKV)</div>
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
        <span class="text-3xl font-black text-amber-600">3</span>
        <span class="text-xs font-semibold text-slate-400">Laporan Baru</span>
      </div>
      <div class="text-[10px] text-slate-500">Perlu divalidasi hari ini</div>
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
        <span class="text-3xl font-black text-slate-900">10 / 14</span>
        <span class="text-xs font-semibold text-slate-400">Siswa Selesai Dinilai</span>
      </div>
      <div class="text-[10px] text-indigo-700 font-bold">Komponen Sikap &amp; Teknis (60%)</div>
    </div>
  </div>

  <!-- Daftar Logbook Menunggu Pengesahan (Modul L3) & Siswa Bimbingan -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
    <!-- Logbook Menunggu Validasi -->
    <section class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-book-open text-sky-600"></i>
          <span>Logbook Menunggu Pengesahan (L3)</span>
        </h2>
        <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-full bg-amber-50 text-amber-700">3 Pending</span>
      </div>

      <div class="space-y-3 text-xs">
        <!-- Item Logbook 1 -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2">
          <div class="flex items-center justify-between">
            <div>
              <span class="font-extrabold text-slate-900">Rizky Pratama</span>
              <span class="text-[10px] text-slate-400 ml-1.5">XII PPLG 1 &bull; 23 Nov 2026</span>
            </div>
            <span class="px-2 py-0.5 rounded bg-amber-100 text-amber-800 text-[9px] font-extrabold">Menunggu Pengesahan</span>
          </div>
          <p class="text-slate-600 bg-white p-2.5 rounded-lg border border-slate-200/60">
            <strong>Kegiatan:</strong> Implementasi integrasi endpoint REST API login menggunakan Laravel Sanctum. <br>
            <strong>Hasil:</strong> Berhasil melakukan pengujian via Postman tanpa kendala.
          </p>
          <div class="flex items-center justify-end gap-2 pt-1">
            <button type="button" onclick="openModal('modalRevisiLogbook')" class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-700 font-bold text-[11px]">
              Minta Revisi
            </button>
            <button type="button" onclick="showToast('Logbook Rizky Pratama berhasil disahkan.')" class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-[11px]">
              Sahkan Logbook
            </button>
          </div>
        </div>

        <!-- Item Logbook 2 -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2">
          <div class="flex items-center justify-between">
            <div>
              <span class="font-extrabold text-slate-900">Siti Nurhaliza</span>
              <span class="text-[10px] text-slate-400 ml-1.5">XII PPLG 2 &bull; 23 Nov 2026</span>
            </div>
            <span class="px-2 py-0.5 rounded bg-amber-100 text-amber-800 text-[9px] font-extrabold">Menunggu Pengesahan</span>
          </div>
          <p class="text-slate-600 bg-white p-2.5 rounded-lg border border-slate-200/60">
            <strong>Kegiatan:</strong> Desksi UI/UX halaman dashboard utama menggunakan Figma.
          </p>
          <div class="flex items-center justify-end gap-2 pt-1">
            <button type="button" onclick="openModal('modalRevisiLogbook')" class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-700 font-bold text-[11px]">
              Minta Revisi
            </button>
            <button type="button" onclick="showToast('Logbook Siti Nurhaliza berhasil disahkan.')" class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-[11px]">
              Sahkan Logbook
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Daftar Siswa Magang di Mitra & Input Nilai Cepat -->
    <section class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900 flex items-center gap-2">
          <i class="fa-solid id-card text-indigo-600"></i>
          <span>Daftar Siswa Bimbingan Lapangan</span>
        </h2>
        <span class="text-[10px] font-bold text-slate-400">Total: 14 Siswa</span>
      </div>

      <div class="space-y-2.5 text-xs">
        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between">
          <div>
            <div class="font-extrabold text-slate-900">Rizky Pratama</div>
            <div class="text-[10px] text-slate-500">XII PPLG 1 &bull; Status: Hadir</div>
          </div>
          <span class="px-2.5 py-1 rounded bg-emerald-50 text-emerald-700 font-bold text-[10px]">Nilai: 92</span>
        </div>

        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between">
          <div>
            <div class="font-extrabold text-slate-900">Siti Nurhaliza</div>
            <div class="text-[10px] text-slate-500">XII PPLG 2 &bull; Status: Hadir</div>
          </div>
          <span class="px-2.5 py-1 rounded bg-emerald-50 text-emerald-700 font-bold text-[10px]">Nilai: 88</span>
        </div>

        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between">
          <div>
            <div class="font-extrabold text-slate-900">Dimas Setiawan</div>
            <div class="text-[10px] text-slate-500">XII PPLG 1 &bull; Status: Hadir</div>
          </div>
          <span class="px-2.5 py-1 rounded bg-amber-50 text-amber-700 font-bold text-[10px]">Belum Dinilai</span>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal Permintaan Revisi Logbook (PRD L3) -->
  <div id="modalRevisiLogbook" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Catatan Revisi Logbook (Wajib Diisi)</h3>
        <button type="button" onclick="closeModal('modalRevisiLogbook')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handleRevisiLogbook(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Alasan / Catatan Perbaikan</label>
          <textarea rows="3" required placeholder="Tuliskan bagian kegiatan yang kurang jelas atau perlu diperbaiki oleh siswa..." class="w-full px-3 py-2 border border-slate-200 rounded-xl"></textarea>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modalRevisiLogbook')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-rose-600 text-white font-extrabold">Kirim Permintaan Revisi</button>
        </div>
      </form>
    </div>
  </div>
@endsection
