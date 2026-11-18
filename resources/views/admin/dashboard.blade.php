@extends('layouts.admin')

@section('title', 'Dashboard Admin & Monitoring Pusat - Portal PKL.ID')

@section('content')
<div class="space-y-6">

  <!-- 1. HEADER & KONTROL PERIODE PKL -->
  <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
        <span>Portal Admin</span>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Dashboard Utama</span>
      </div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Dashboard Monitoring PKL Nasional</h1>
      <p class="text-xs text-slate-500 mt-1">Pusat kendali admin untuk mengelola mitra DUDI, kuota penempatan, verifikasi berkas, dan rekapitulasi seluruh jurusan.</p>
    </div>
    <div class="flex items-center gap-2.5">
      <span class="px-3.5 py-2 rounded-xl bg-sky-50 border border-sky-200 text-sky-800 text-xs font-extrabold flex items-center gap-2">
        <i class="fa-regular fa-calendar-days text-sky-600"></i> Periode Aktif: TA 2026/2027 Genap
      </span>
      <button onclick="alert('Membuka panel pengaturan periode PKL...')" class="px-4 py-2.5 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-sliders text-sky-400"></i> Kelola Periode PKL
      </button>
    </div>
  </div>

  <!-- 2. STATISTIK UTAMA (PRD 5.8: Sekolah / Kepala Sekolah & Admin) -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    
    <!-- Kartu 1: Total Siswa PKL -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
      <div class="flex items-center justify-between text-slate-500">
        <span class="text-[11px] font-extrabold uppercase tracking-wider">Total Siswa PKL</span>
        <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
          <i class="fa-solid fa-user-graduate"></i>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-slate-900">482</span>
        <span class="text-xs font-bold text-emerald-600">Active Students</span>
      </div>
      <p class="text-[11px] text-slate-500">Tersebar di 34 Mitra DUDI Aktif</p>
    </div>

    <!-- Kartu 2: Status Penempatan -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
      <div class="flex items-center justify-between text-slate-500">
        <span class="text-[11px] font-extrabold uppercase tracking-wider">Penempatan Disetujui</span>
        <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
          <i class="fa-solid fa-circle-check"></i>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-slate-900">465</span>
        <span class="text-xs font-bold text-slate-500">/ 482 Siswa</span>
      </div>
      <p class="text-[11px] text-amber-600 font-medium">17 Siswa menunggu konfirmasi akhir</p>
    </div>

    <!-- Kartu 3: Kehadiran Hari Ini -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
      <div class="flex items-center justify-between text-slate-500">
        <span class="text-[11px] font-extrabold uppercase tracking-wider">Kehadiran Hari Ini</span>
        <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
          <i class="fa-solid fa-fingerprint"></i>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-slate-900">97.8%</span>
        <span class="text-xs font-bold text-emerald-600">Optimum</span>
      </div>
      <p class="text-[11px] text-slate-500">471 Hadir • 8 Izin • 3 Sakit</p>
    </div>

    <!-- Kartu 4: Siswa Perlu Perhatian -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
      <div class="flex items-center justify-between text-slate-500">
        <span class="text-[11px] font-extrabold uppercase tracking-wider">Perlu Perhatian (K2)</span>
        <div class="w-9 h-9 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
          <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-rose-600">6</span>
        <span class="text-xs font-bold text-slate-500">Siswa</span>
      </div>
      <p class="text-[11px] text-rose-600 font-medium">Belum isi logbook > 2 hari / Kendala</p>
    </div>

  </div>

  <!-- 3. GRID UTAMA (KIRI: KUOTA MITRA & MONITORING JURUSAN | KANAN: DAFTAR PERLU PERHATIAN & PELANGGARAN) -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Bagian Kiri (7 Kolom): Kuota Mitra DUDI & Statistik Jurusan -->
    <div class="lg:col-span-7 space-y-6">
      
      <!-- Tabel Kuota & Kapasitas Mitra DUDI (PRD D1, D3) -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <div>
            <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-building text-sky-600"></i>
              Kapasitas & Kuota Mitra Industri (DUDI)
            </h3>
            <p class="text-xs text-slate-500">Pemantauan sisa kuota penempatan per jurusan secara real-time.</p>
          </div>
          <a href="#" class="text-xs font-bold text-sky-600 hover:underline">Kelola Mitra →</a>
        </div>

        <div class="space-y-3 text-xs">
          <!-- Mitra 1 -->
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
            <div class="flex justify-between items-center">
              <div class="font-extrabold text-slate-900">PT Solusi Teknologi Nusantara <span class="ml-2 px-2 py-0.5 rounded bg-sky-100 text-sky-800 text-[10px]">PPLG</span></div>
              <span class="text-emerald-700 font-bold">Terisi: 12 / 15 Kuota</span>
            </div>
            <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
              <div class="bg-sky-600 h-full rounded-full" style="width: 80%"></div>
            </div>
          </div>

          <!-- Mitra 2 -->
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
            <div class="flex justify-between items-center">
              <div class="font-extrabold text-slate-900">CV Kreasi Digital Batam <span class="ml-2 px-2 py-0.5 rounded bg-indigo-100 text-indigo-800 text-[10px]">TJKT</span></div>
              <span class="text-emerald-700 font-bold">Terisi: 8 / 10 Kuota</span>
            </div>
            <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
              <div class="bg-indigo-600 h-full rounded-full" style="width: 80%"></div>
            </div>
          </div>

          <!-- Mitra 3 -->
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
            <div class="flex justify-between items-center">
              <div class="font-extrabold text-slate-900">PT Batam Elektrindo Makmur <span class="ml-2 px-2 py-0.5 rounded bg-amber-100 text-amber-800 text-[10px]">TOI</span></div>
              <span class="text-rose-600 font-bold">Penuh: 20 / 20 Kuota</span>
            </div>
            <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
              <div class="bg-amber-500 h-full rounded-full" style="width: 100%"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Statistik Kepatuhan Logbook & Kehadiran per Jurusan -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-chart-line text-sky-600"></i>
            Kepatuhan Logbook & Kehadiran Per Jurusan
          </h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 text-center space-y-1">
            <div class="text-slate-400 font-bold uppercase text-[10px]">PPLG (RPL)</div>
            <div class="text-2xl font-black text-slate-900">98.2%</div>
            <div class="text-[10px] text-emerald-600 font-bold">Kepatuhan Tinggi</div>
          </div>
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 text-center space-y-1">
            <div class="text-slate-400 font-bold uppercase text-[10px]">TJKT (TKJ)</div>
            <div class="text-2xl font-black text-slate-900">94.5%</div>
            <div class="text-[10px] text-emerald-600 font-bold">Normal</div>
          </div>
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 text-center space-y-1">
            <div class="text-slate-400 font-bold uppercase text-[10px]">DKV (MM)</div>
            <div class="text-2xl font-black text-slate-900">91.0%</div>
            <div class="text-[10px] text-amber-600 font-bold">Perlu Pengingat</div>
          </div>
        </div>
      </div>

    </div>

    <!-- Bagian Kanan (5 Kolom): Daftar Perlu Perhatian & Pelanggaran Terbaru -->
    <div class="lg:col-span-5 space-y-6">
      
      <!-- Siswa Perlu Perhatian Khusus (PRD K2 & U2) -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-triangle-exclamation text-rose-500"></i>
            Siswa Perlu Perhatian Khusus
          </h3>
          <span class="px-2 py-0.5 rounded bg-rose-100 text-rose-800 text-[10px] font-extrabold">6 Siswa</span>
        </div>

        <div class="space-y-2.5 text-xs">
          <div class="p-3 rounded-xl bg-rose-50/60 border border-rose-200 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-full bg-rose-600 text-white font-bold flex items-center justify-center text-xs">AR</div>
              <div>
                <div class="font-extrabold text-slate-900">Ahmad Rizaldi (XII TJKT 2)</div>
                <div class="text-[11px] text-rose-700">Belum isi logbook 3 hari berturut-turut</div>
              </div>
            </div>
            <button onclick="alert('Menghubungi guru pembimbing...')" class="px-2.5 py-1 rounded-lg bg-white border border-rose-300 text-rose-700 font-bold hover:bg-rose-100">Tindak Lanjuti</button>
          </div>

          <div class="p-3 rounded-xl bg-amber-50/60 border border-amber-200 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-full bg-amber-600 text-white font-bold flex items-center justify-center text-xs">SN</div>
              <div>
                <div class="font-extrabold text-slate-900">Siti Nurhaliza (XII PPLG 1)</div>
                <div class="text-[11px] text-amber-700">Check-in: Melaporkan Kendala Kesehatan</div>
              </div>
            </div>
            <button onclick="alert('Meninjau check-in siswa...')" class="px-2.5 py-1 rounded-lg bg-white border border-amber-300 text-amber-800 font-bold hover:bg-amber-100">Tinjau</button>
          </div>
        </div>
      </div>

      <!-- Ringkasan Pelanggaran & Umpan Balik DUDI (PRD U1, U2) -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-shield-halved text-sky-600"></i>
            Umpan Balik & Pelanggaran DUDI
          </h3>
          <span class="text-[10px] font-bold text-slate-400 uppercase">Status Real-time</span>
        </div>

        <div class="space-y-3 text-xs">
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
            <div>
              <div class="font-extrabold text-slate-900 flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-rose-500"></span> Pelanggaran Kedisiplinan (Ringan)
              </div>
              <div class="text-[11px] text-slate-500 mt-0.5">Dilaporkan oleh PT Solusi Teknologi Nusantara</div>
            </div>
            <span class="px-2 py-1 rounded bg-amber-100 text-amber-900 font-bold text-[10px]">Sedang Ditindaklanjuti</span>
          </div>

          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
            <div>
              <div class="font-extrabold text-slate-900 flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Apresiasi Kinerja Siswa Vokasi
              </div>
              <div class="text-[11px] text-slate-500 mt-0.5">Dilaporkan oleh CV Kreasi Digital Batam</div>
            </div>
            <span class="px-2 py-1 rounded bg-emerald-100 text-emerald-900 font-bold text-[10px]">Selesai / Dibaca</span>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
@endsection