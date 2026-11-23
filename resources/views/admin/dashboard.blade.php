@extends('layouts.admin')

@section('title', 'Beranda / Dashboard - Portal PKL.ID')

@section('content')
  <!-- Breadcrumb & Status -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Beranda / Dashboard</span>
    </div>

    <div class="flex flex-wrap items-center gap-2">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold tracking-wide">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
        SEMESTER GENAP AKTIF &bull; PEKAN KE-14
      </span>
      <button type="button" onclick="syncDashboardData()" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[10px] font-extrabold transition">
        <i class="fa-solid fa-rotate text-[9px] text-sky-600"></i>
        <span>Sinkronkan Ringkasan</span>
      </button>
    </div>
  </div>

  <!-- Hero Header & Aksi Cepat -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="space-y-2 max-w-2xl">
      <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-sky-50 border border-sky-200/80 text-sky-700 text-[10px] font-extrabold uppercase tracking-wider">
        <i class="fa-solid fa-gauge-high text-[10px]"></i>
        RINGKASAN EKSEKUTIF HUBIN &amp; PKL
      </span>
      <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
        Dashboard Monitoring Program Praktik Kerja Lapangan (PKL)
      </h1>
      <p class="text-xs text-slate-500 leading-relaxed">
        Pantau kesiapan penempatan siswa, keaktifan kemitraan DUDI &amp; MoU, progres visitasi guru pembimbing, serta rekap nilai dan sertifikasi industri dalam satu tampilan terpadu.
      </p>
    </div>

    <div class="flex flex-wrap sm:flex-nowrap lg:flex-col items-stretch gap-2 shrink-0 min-w-[210px]">
      <button type="button" onclick="openModal('modalPengumumanHubin')" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-regular fa-bell text-slate-500"></i>
        <span>Kirim Pengumuman Hubin</span>
      </button>

      <button type="button" onclick="exportDashboardReport()" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-solid fa-file-arrow-down text-slate-500"></i>
        <span>Unduh Laporan Ringkas</span>
      </button>

      <a href="{{ route('admin.manajemen-siswa') }}" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center justify-center gap-2 shadow-xs transition">
        <i class="fa-solid fa-arrow-right text-xs text-sky-300"></i>
        <span>Kelola Penempatan Siswa</span>
      </a>
    </div>
  </div>

  <!-- 4 KPI Utama -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Siswa Aktif PKL</span>
        <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm"><i class="fa-solid fa-user-graduate"></i></span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">398</span>
        <span class="text-xs font-semibold text-slate-400">/ 420 Siswa</span>
      </div>
      <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
        <div class="h-full rounded-full bg-[#13294B]" style="width: 94.8%"></div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Mitra DUDI Terhubung</span>
        <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm"><i class="fa-solid fa-building"></i></span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">64</span>
        <span class="text-xs font-bold text-emerald-600">58 MoU Aktif</span>
      </div>
      <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
        <div class="h-full rounded-full bg-emerald-500" style="width: 90.6%"></div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Progres Visitasi Pembimbing</span>
        <span class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-sm"><i class="fa-solid fa-route"></i></span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">71.8%</span>
        <span class="text-xs font-semibold text-slate-400">92 / 128 Sesi</span>
      </div>
      <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
        <div class="h-full rounded-full bg-teal-600" style="width: 71.8%"></div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Nilai &amp; Sertifikat Terbit</span>
        <span class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-sm"><i class="fa-solid fa-award"></i></span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">350</span>
        <span class="text-xs font-bold text-indigo-600">BSrE Verified</span>
      </div>
      <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
        <div class="h-full rounded-full bg-indigo-600" style="width: 83.3%"></div>
      </div>
    </div>
  </div>

  <!-- Pintasan Modul & Agenda Terbaru -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
    <section class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900">Akses Cepat Modul Utama</h2>
        <span class="text-[10px] font-bold text-slate-400">6 Modul Terintegrasi</span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
        <a href="{{ route('admin.dudi-mou') }}" class="p-3.5 rounded-xl bg-slate-50 hover:bg-sky-50/70 border border-slate-200/80 transition flex items-center justify-between">
          <div>
            <div class="font-extrabold text-slate-900">Kemitraan DUDI &amp; MoU</div>
            <div class="text-[10px] text-slate-500 mt-0.5">64 mitra &bull; 6 MoU perlu cek</div>
          </div>
          <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
        </a>

        <a href="{{ route('admin.monitoring-pembimbing') }}" class="p-3.5 rounded-xl bg-slate-50 hover:bg-sky-50/70 border border-slate-200/80 transition flex items-center justify-between">
          <div>
            <div class="font-extrabold text-slate-900">Monitoring &amp; Pembimbing</div>
            <div class="text-[10px] text-slate-500 mt-0.5">18 guru pembimbing &bull; 94.2% jurnal</div>
          </div>
          <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
        </a>

        <a href="{{ route('admin.manajemen-siswa') }}" class="p-3.5 rounded-xl bg-slate-50 hover:bg-sky-50/70 border border-slate-200/80 transition flex items-center justify-between">
          <div>
            <div class="font-extrabold text-slate-900">Manajemen Siswa &amp; Penempatan</div>
            <div class="text-[10px] text-slate-500 mt-0.5">398 terplot &bull; 22 menunggu</div>
          </div>
          <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
        </a>

        <a href="{{ route('admin.rekapitulasi-nilai') }}" class="p-3.5 rounded-xl bg-slate-50 hover:bg-sky-50/70 border border-slate-200/80 transition flex items-center justify-between">
          <div>
            <div class="font-extrabold text-slate-900">Rekapitulasi Nilai &amp; Sertifikat</div>
            <div class="text-[10px] text-slate-500 mt-0.5">Rata-rata NA 88.6 &bull; 350 sertifikat</div>
          </div>
          <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
        </a>
      </div>
    </section>

    <section class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900">Catatan Tindak Lanjut Hari Ini</h2>
        <button type="button" onclick="openModal('modalTambahCatatan')" class="text-[11px] font-extrabold text-sky-700 hover:underline">+ Tambah</button>
      </div>

      <ul id="dashboardTodoList" class="space-y-2.5 text-xs">
        <li class="p-3 rounded-xl bg-amber-50/70 border border-amber-200/80 flex items-center justify-between gap-2">
          <span class="font-bold text-slate-800">Konfirmasi perpanjangan MoU 6 mitra industri</span>
          <button type="button" onclick="this.closest('li').remove(); showToast('Tindak lanjut MoU ditandai selesai.')" class="px-2.5 py-1 rounded-lg bg-white border border-amber-200 text-[10px] font-extrabold text-amber-800">Selesai</button>
        </li>
        <li class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between gap-2">
          <span class="font-bold text-slate-800">Validasi 32 sertifikat digital menunggu TTE BSrE</span>
          <button type="button" onclick="this.closest('li').remove(); showToast('Validasi TTE BSrE ditandai selesai.')" class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-[10px] font-extrabold text-slate-700">Selesai</button>
        </li>
      </ul>
    </section>
  </div>

  <!-- Modal Pengumuman Hubin -->
  <div id="modalPengumumanHubin" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Kirim Pengumuman Hubin</h3>
        <button type="button" onclick="closeModal('modalPengumumanHubin')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handleKirimPengumuman(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Tujuan Penerima</label>
          <select class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            <option>Seluruh Guru Pembimbing &amp; Siswa PKL</option>
            <option>Guru Pembimbing PKL</option>
            <option>Mitra DUDI Terdaftar</option>
          </select>
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Isi Pengumuman</label>
          <textarea rows="3" required placeholder="Tulis informasi jadwal monev, pengumpulan laporan, atau batas nilai..." class="w-full px-3 py-2 border border-slate-200 rounded-xl"></textarea>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modalPengumumanHubin')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Kirim Sekarang</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Tambah Catatan -->
  <div id="modalTambahCatatan" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Tambah Catatan Tindak Lanjut</h3>
        <button type="button" onclick="closeModal('modalTambahCatatan')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handleTambahCatatan(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Judul Tugas / Catatan</label>
          <input id="inputCatatanHubin" type="text" required placeholder="Contoh: Cek kehadiran siswa rombel XII PPLG 2" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modalTambahCatatan')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Simpan</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  function syncDashboardData() {
    showToast('Ringkasan dashboard PKL berhasil disinkronkan.');
  }

  function exportDashboardReport() {
    triggerDownload('ringkasan-dashboard-pkl.csv', "Metrik,Nilai\nSiswa Aktif PKL,398 / 420\nMitra DUDI Terhubung,64 (58 MoU Aktif)\nProgres Visitasi,71.8%\nSertifikat Terbit,350\n", 'text/csv;charset=utf-8;');
    showToast('Laporan ringkas dashboard berhasil diunduh.');
  }

  function handleKirimPengumuman(e) {
    e.preventDefault();
    e.target.reset();
    closeModal('modalPengumumanHubin');
    showToast('Pengumuman Hubin berhasil dikirim.');
  }

  function handleTambahCatatan(e) {
    e.preventDefault();
    const text = document.getElementById('inputCatatanHubin').value.trim();
    if (text) {
      const li = document.createElement('li');
      li.className = 'p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between gap-2';
      li.innerHTML = `<span class="font-bold text-slate-800">${text}</span><button type="button" onclick="this.closest('li').remove(); showToast('Catatan ditandai selesai.')" class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-[10px] font-extrabold text-slate-700">Selesai</button>`;
      document.getElementById('dashboardTodoList').prepend(li);
    }
    e.target.reset();
    closeModal('modalTambahCatatan');
    showToast('Catatan tindak lanjut ditambahkan.');
  }
</script>
@endpush