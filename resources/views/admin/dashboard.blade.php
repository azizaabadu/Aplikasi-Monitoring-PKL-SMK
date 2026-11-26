@extends('layouts.admin')

@section('title', 'Dashboard Sekolah - Portal PKL.ID')

@section('content')
  <!-- Breadcrumb & Periode Aktif -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Dashboard Sekolah</span>
    </div>

    <div class="flex flex-wrap items-center gap-2">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold tracking-wide">
        <i class="fa-solid fa-circle text-[7px] text-emerald-500"></i>
        PERIODE AKTIF: T.A. 2026/2027 &bull; FASE 3 (PELAKSANAAN)
      </span>
      <button type="button" onclick="syncDashboardData()" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[10px] font-extrabold transition">
        <i class="fa-solid fa-rotate text-[10px] text-sky-600"></i>
        <span>Segarkan Data</span>
      </button>
    </div>
  </div>

  <!-- Hero Header & Aksi Cepat -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="space-y-2 max-w-2xl">
      <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-sky-50 border border-sky-200/80 text-sky-700 text-[10px] font-extrabold uppercase tracking-wider">
        <i class="fa-solid fa-gauge-high text-[10px]"></i>
        RINGKASAN EKSEKUTIF PKL SEKOLAH
      </span>
      <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
        Dashboard Monitoring Praktik Kerja Lapangan (PKL)
      </h1>
      <p class="text-xs text-slate-500 leading-relaxed">
        Pantau status penempatan siswa, kuota mitra DUDI per jurusan, kehadiran check-in harian, kepatuhan logbook, laporan pelanggaran DUDI, serta rekap penilaian akhir dalam satu tempat.
      </p>
    </div>

    <div class="flex flex-wrap sm:flex-nowrap lg:flex-col items-stretch gap-2 shrink-0 min-w-[215px]">
      <button type="button" onclick="openModal('modalNotifikasiSekolah')" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-solid fa-bell text-slate-500"></i>
        <span>Kirim Pemberitahuan</span>
      </button>

      <button type="button" onclick="exportDashboardReport()" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-solid fa-file-arrow-down text-slate-500"></i>
        <span>Unduh Ringkasan PKL</span>
      </button>

      <a href="{{ route('admin.manajemen-siswa') }}" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center justify-center gap-2 shadow-xs transition">
        <i class="fa-solid fa-arrow-right text-xs text-sky-300"></i>
        <span>Kelola Periode &amp; Penempatan</span>
      </a>
    </div>
  </div>

  <!-- 4 KPI Utama Sesuai PRD 5.8 -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- Penempatan Disetujui -->
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Penempatan Disetujui</span>
        <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-user-check"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">398</span>
        <span class="text-xs font-semibold text-slate-400">/ 420 Siswa</span>
      </div>
      <div class="text-[10px] text-slate-500 flex items-center justify-between">
        <span>Menunggu DUDI/Kepsek: <strong class="text-amber-600">14</strong></span>
        <span>Belum: <strong class="text-rose-600">8</strong></span>
      </div>
      <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
        <div class="h-full rounded-full bg-[#13294B]" style="width: 94.8%"></div>
      </div>
    </div>

    <!-- Kuota Mitra Terisi -->
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Kuota Mitra DUDI Terisi</span>
        <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-building"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">398</span>
        <span class="text-xs font-bold text-emerald-600">/ 445 Kursi (64 Mitra)</span>
      </div>
      <div class="text-[10px] text-slate-500">Sisa kuota tersedia: <strong class="text-slate-800">47 kursi</strong> lintas jurusan</div>
      <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
        <div class="h-full rounded-full bg-emerald-500" style="width: 89.4%"></div>
      </div>
    </div>

    <!-- Kehadiran & Kepatuhan Logbook Hari Ini -->
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Kehadiran &amp; Logbook Hari Ini</span>
        <span class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-clipboard-check"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">95.2%</span>
        <span class="text-xs font-semibold text-slate-400">Hadir Check-in</span>
      </div>
      <div class="text-[10px] text-slate-500 flex items-center justify-between">
        <span>Logbook Terkirim: <strong class="text-teal-700">91.4%</strong></span>
        <span>Sakit/Izin: <strong class="text-amber-600">19</strong></span>
      </div>
      <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
        <div class="h-full rounded-full bg-teal-600" style="width: 95.2%"></div>
      </div>
    </div>

    <!-- Pelanggaran DUDI & Siswa Perlu Perhatian -->
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Pelanggaran &amp; Perlu Perhatian</span>
        <span class="w-9 h-9 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-triangle-exclamation"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-rose-600">7</span>
        <span class="text-xs font-bold text-slate-600">Siswa Perlu Perhatian</span>
      </div>
      <div class="flex flex-wrap gap-1 text-[9px] font-extrabold">
        <span class="px-1.5 py-0.5 rounded bg-amber-50 text-amber-700">Ringan: 3</span>
        <span class="px-1.5 py-0.5 rounded bg-orange-50 text-orange-700">Sedang: 2</span>
        <span class="px-1.5 py-0.5 rounded bg-rose-50 text-rose-700">Berat: 1</span>
      </div>
    </div>
  </div>

  <!-- Ringkasan Status Penempatan per Jurusan (PRD 5.8) -->
  <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="text-sm font-black text-slate-900">Rekap Status Penempatan &amp; Kepatuhan per Jurusan</h2>
        <p class="text-[11px] text-slate-500">Data terhitung otomatis berdasarkan periode PKL aktif</p>
      </div>
      <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-full bg-slate-100 text-slate-700">4 Konsentrasi Keahlian</span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 text-xs">
      <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5">
        <div class="flex items-center justify-between">
          <span class="font-black text-slate-900">PPLG</span>
          <span class="text-[10px] font-extrabold text-emerald-700">112 / 120 Disetujui</span>
        </div>
        <div class="text-[11px] text-slate-500">Menunggu: 5 &bull; Belum: 3</div>
        <div class="text-[10px] font-bold text-sky-700">Kepatuhan Logbook: 94%</div>
      </div>

      <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5">
        <div class="flex items-center justify-between">
          <span class="font-black text-slate-900">TJKT</span>
          <span class="text-[10px] font-extrabold text-emerald-700">108 / 114 Disetujui</span>
        </div>
        <div class="text-[11px] text-slate-500">Menunggu: 4 &bull; Belum: 2</div>
        <div class="text-[10px] font-bold text-sky-700">Kepatuhan Logbook: 91%</div>
      </div>

      <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5">
        <div class="flex items-center justify-between">
          <span class="font-black text-slate-900">DKV</span>
          <span class="text-[10px] font-extrabold text-emerald-700">98 / 106 Disetujui</span>
        </div>
        <div class="text-[11px] text-slate-500">Menunggu: 5 &bull; Belum: 3</div>
        <div class="text-[10px] font-bold text-sky-700">Kepatuhan Logbook: 89%</div>
      </div>

      <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5">
        <div class="flex items-center justify-between">
          <span class="font-black text-slate-900">Animasi</span>
          <span class="text-[10px] font-extrabold text-emerald-700">80 / 80 Disetujui</span>
        </div>
        <div class="text-[11px] text-slate-500">Menunggu: 0 &bull; Belum: 0</div>
        <div class="text-[10px] font-bold text-sky-700">Kepatuhan Logbook: 96%</div>
      </div>
    </div>
  </section>

  <!-- Pintasan Modul Admin (PRD Bagian 8) & Siswa Perlu Perhatian -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
    <section class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900">Akses Cepat Modul Pengelolaan PKL</h2>
        <span class="text-[10px] font-bold text-slate-400">Sesuai Hak Akses Admin</span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
        <a href="{{ route('admin.dudi-mou') }}" class="p-3.5 rounded-xl bg-slate-50 hover:bg-sky-50/70 border border-slate-200/80 transition flex items-center justify-between">
          <div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-lg bg-sky-100 text-sky-700 flex items-center justify-center"><i class="fa-solid fa-building"></i></span>
            <div>
              <div class="font-extrabold text-slate-900">Kelola Mitra &amp; Kuota</div>
              <div class="text-[10px] text-slate-500 mt-0.5">64 mitra &bull; Kuota per jurusan &amp; akun DUDI</div>
            </div>
          </div>
          <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
        </a>

        <a href="{{ route('admin.manajemen-siswa') }}" class="p-3.5 rounded-xl bg-slate-50 hover:bg-sky-50/70 border border-slate-200/80 transition flex items-center justify-between">
          <div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center"><i class="fa-solid fa-sitemap"></i></span>
            <div>
              <div class="font-extrabold text-slate-900">Periode &amp; Penempatan</div>
              <div class="text-[10px] text-slate-500 mt-0.5">Masa pengajuan, plot mitra &amp; guru</div>
            </div>
          </div>
          <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
        </a>

        <a href="{{ route('admin.monitoring-pembimbing') }}" class="p-3.5 rounded-xl bg-slate-50 hover:bg-sky-50/70 border border-slate-200/80 transition flex items-center justify-between">
          <div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-lg bg-teal-100 text-teal-700 flex items-center justify-center"><i class="fa-solid fa-chalkboard-user"></i></span>
            <div>
              <div class="font-extrabold text-slate-900">Guru Pembimbing &amp; Monev</div>
              <div class="text-[10px] text-slate-500 mt-0.5">Batas siswa, kunjungan &amp; umpan balik</div>
            </div>
          </div>
          <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
        </a>

        <a href="{{ route('admin.rekapitulasi-nilai') }}" class="p-3.5 rounded-xl bg-slate-50 hover:bg-sky-50/70 border border-slate-200/80 transition flex items-center justify-between">
          <div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-700 flex items-center justify-center"><i class="fa-solid fa-award"></i></span>
            <div>
              <div class="font-extrabold text-slate-900">Kelola Penilaian &amp; Rilis</div>
              <div class="text-[10px] text-slate-500 mt-0.5">Komponen, bobot 100%, rilis &amp; ekspor</div>
            </div>
          </div>
          <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
        </a>
      </div>
    </section>

    <!-- Daftar Siswa Perlu Perhatian (PRD K2 & U2) -->
    <section class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-triangle-exclamation text-rose-500"></i>
          <span>Daftar Siswa Perlu Perhatian</span>
        </h2>
        <span class="text-[10px] font-extrabold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full">Otomatis Sistem</span>
      </div>

      <ul id="dashboardTodoList" class="space-y-2.5 text-xs">
        <li class="p-3 rounded-xl bg-rose-50/70 border border-rose-200/80 flex items-start justify-between gap-2">
          <div>
            <div class="font-extrabold text-slate-900">Bagas Saputra (XII TKJ 1) &bull; Pelanggaran Berat</div>
            <div class="text-[10px] text-rose-700 mt-0.5">Status Umpan Balik: Baru &bull; PT Citra Tubindo Tbk</div>
          </div>
          <span class="px-2 py-0.5 rounded bg-rose-600 text-white text-[9px] font-extrabold shrink-0">BARU</span>
        </li>
        <li class="p-3 rounded-xl bg-amber-50/70 border border-amber-200/80 flex items-start justify-between gap-2">
          <div>
            <div class="font-extrabold text-slate-900">Nadia Putri (XII PPLG 2) &bull; Tidak Isi Logbook 3 Hari</div>
            <div class="text-[10px] text-amber-800 mt-0.5">Melewati batas 2 hari kerja berturut-turut</div>
          </div>
          <span class="px-2 py-0.5 rounded bg-amber-500 text-white text-[9px] font-extrabold shrink-0">LOGBOOK</span>
        </li>
        <li class="p-3 rounded-xl bg-sky-50/70 border border-sky-200/80 flex items-start justify-between gap-2">
          <div>
            <div class="font-extrabold text-slate-900">Dimas Setiawan (XII PPLG 1) &bull; Check-in: Ada Kendala</div>
            <div class="text-[10px] text-sky-800 mt-0.5">Guru Pembimbing: Dra. Sri Wahyuni, M.Pd</div>
          </div>
          <span class="px-2 py-0.5 rounded bg-sky-600 text-white text-[9px] font-extrabold shrink-0">CHECK-IN</span>
        </li>
      </ul>
    </section>
  </div>

  <!-- Modal Kirim Pemberitahuan -->
  <div id="modalNotifikasiSekolah" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Kirim Pemberitahuan Dalam Aplikasi</h3>
        <button type="button" onclick="closeModal('modalNotifikasiSekolah')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handleKirimNotifikasi(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Peran Penerima</label>
          <select class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            <option>Semua Pengguna Aktif</option>
            <option>Siswa PKL</option>
            <option>Guru Pembimbing</option>
            <option>Pembimbing DUDI</option>
            <option>Orang Tua / Wali Siswa</option>
          </select>
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Isi Pemberitahuan</label>
          <textarea rows="3" required placeholder="Tulis pemberitahuan penting terkait pelaksanaan atau penilaian PKL..." class="w-full px-3 py-2 border border-slate-200 rounded-xl"></textarea>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modalNotifikasiSekolah')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Kirim</button>
        </div>
      </form>
    </div>
  </div>
@endsection
