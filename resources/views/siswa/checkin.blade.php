@extends('layouts.student')

@section('title', 'Presensi & Kehadiran Siswa - PKL.ID')

@section('content')
<div class="space-y-6">
  
  <!-- HEADER & TOMBOL AKSI ATAS -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
        <span>Beranda</span>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Presensi & Kehadiran</span>
      </div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Presensi & Kehadiran Mandiri</h1>
    </div>
    <div class="flex items-center gap-2.5">
      <button onclick="alert('Membuka modal riwayat presensi...')" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-clock-rotate-left text-slate-500"></i>
        Riwayat Presensi
      </button>
      <button onclick="alert('Membuka form pengajuan izin/sakit...')" class="px-4 py-2.5 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-file-circle-plus text-sky-400"></i>
        Ajukan Izin / Sakit
      </button>
    </div>
  </div>

  <!-- STATUS GEOFENCE & RADIUS BADGE -->
  <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-bold">
    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
    Radius Terverifikasi (15m dari Kantor PT Solusi Teknologi Nusantara)
  </div>

  <!-- 2 KARTU UTAMA: TERMINAL PRESENSI & GEOFENCE RADAR -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Kartu Kiri: Terminal Verifikasi Presensi (7 Kolom) -->
    <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-6 flex flex-col justify-between">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-4">
        <div>
          <div class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Terminal Verifikasi Presensi Siswa</div>
          <div class="text-xs font-bold text-slate-700 mt-0.5">PT Solusi Teknologi Nusantara • Divisi Rekayasa Perangkat Lunak</div>
        </div>
        <div class="text-right">
          <div class="text-xl font-black text-slate-900 tracking-tight">14:46:47 WIB</div>
          <div class="text-[11px] text-slate-500 font-medium">Jumat, 25 Oktober 2024</div>
        </div>
      </div>

      <!-- Jadwal Masuk & Pulang -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
          <div>
            <div class="text-[10px] font-bold text-slate-400 uppercase">Jadwal Masuk Kerja</div>
            <div class="text-xs font-extrabold text-slate-800 mt-0.5">07:30 – 08:00 WIB</div>
          </div>
          <div class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">
            <i class="fa-solid fa-check"></i>
          </div>
        </div>
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
          <div>
            <div class="text-[10px] font-bold text-slate-400 uppercase">Jadwal Selesai/Pulang</div>
            <div class="text-xs font-extrabold text-slate-800 mt-0.5">17:00 WIB</div>
          </div>
          <div class="w-7 h-7 rounded-lg bg-slate-200 text-slate-600 flex items-center justify-center font-bold text-xs">
            <i class="fa-solid fa-clock"></i>
          </div>
        </div>
      </div>

      <!-- Status Check-in Hari Ini -->
      <div class="p-4 rounded-xl bg-emerald-50/60 border border-emerald-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-xl bg-emerald-600 text-white font-bold flex items-center justify-center text-lg shadow-md shrink-0">
            RP
          </div>
          <div>
            <div class="text-xs font-bold text-slate-800">
              Masuk: <span class="text-emerald-700 font-extrabold">07:42 WIB</span>
              <span class="inline-flex ml-1.5 px-2 py-0.5 rounded text-[10px] font-extrabold bg-emerald-200 text-emerald-900">TEPAT WAKTU</span>
            </div>
            <div class="text-[11px] text-slate-500 mt-0.5">AI Face Biometric terverifikasi • Selfie Match 99.4%</div>
          </div>
        </div>
        <div>
          <span class="px-3 py-1.5 rounded-lg bg-white border border-emerald-300 text-emerald-800 text-xs font-extrabold shadow-sm">
            Sesi Pagi Selesai
          </span>
        </div>
      </div>

      <!-- Tombol Aksi Bawah -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
        <button disabled class="py-3 px-4 rounded-xl bg-slate-100 text-slate-400 text-xs font-bold cursor-not-allowed flex items-center justify-center gap-2">
          <span><i class="fa-solid fa-lock mr-1"></i> Presensi Masuk Selesai (07:42)</span>
        </button>
        <button onclick="alert('Presensi pulang otomatis terjadwal pukul 17:00 WIB.')" class="py-3 px-4 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold shadow-md transition flex items-center justify-center gap-2">
          <span><i class="fa-solid fa-location-dot mr-1"></i> Presensi Pulang (Aktif pkl 17:00 WIB)</span>
        </button>
      </div>
    </div>

    <!-- Kartu Kanan: Geofence & Radar Posisi Siswa (5 Kolom) -->
    <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4 flex flex-col justify-between">
      <div class="flex items-center justify-between">
        <div class="text-xs font-extrabold text-slate-800 flex items-center gap-1.5">
          <i class="fa-solid fa-map-location-dot text-sky-600"></i>
          Geofence & Radar Posisi Siswa
        </div>
        <span class="text-[11px] font-bold text-slate-500">Akurasi GPS ± 4 meter</span>
      </div>

      <!-- Simulasi Radar Visual -->
      <div class="relative w-full h-44 rounded-2xl bg-slate-900 overflow-hidden flex items-center justify-center border border-slate-800 shadow-inner">
        <!-- Lingkaran Radar Background -->
        <div class="absolute w-36 h-36 rounded-full border border-emerald-500/30 flex items-center justify-center">
          <div class="w-24 h-24 rounded-full border border-emerald-500/50 flex items-center justify-center">
            <div class="w-12 h-12 rounded-full bg-emerald-500/20 flex items-center justify-center animate-ping"></div>
          </div>
        </div>
        
        <!-- Badge Status di dalam Radar -->
        <div class="absolute top-3 right-3 px-2.5 py-0.5 rounded-full bg-emerald-500 text-slate-950 font-extrabold text-[10px] tracking-wide shadow">
          ● Di Dalam Zona
        </div>

        <!-- Titik Pusat / Posisi DUDI -->
        <div class="relative z-10 text-center space-y-1">
          <div class="w-8 h-8 rounded-full bg-emerald-400 text-slate-950 flex items-center justify-center mx-auto shadow-lg font-black text-xs">
            <i class="fa-solid fa-building"></i>
          </div>
          <div class="text-[10px] font-bold text-white bg-slate-950/80 px-2 py-0.5 rounded">Radius Kerja: Maks. 50 meter</div>
        </div>
      </div>

      <!-- Detail Koordinat -->
      <div class="space-y-1.5 text-xs">
        <div class="flex justify-between text-slate-600">
          <span class="font-medium">Titik Koordinat Terbaca:</span>
          <span class="font-bold text-slate-800">1.1298° N, 104.0531° E</span>
        </div>
        <div class="flex justify-between text-slate-600">
          <span class="font-medium">Jarak Saat Ini ke Pusat DUDI:</span>
          <span class="font-extrabold text-emerald-600">15 Meter (Aman)</span>
        </div>
        <div class="flex justify-between text-slate-600">
          <span class="font-medium">Alamat Kantor Mitra:</span>
          <span class="font-bold text-slate-800 truncate max-w-[200px]">Gedung Graha Pena Lt. 5, Batam</span>
        </div>
      </div>
    </div>

  </div>

<!-- 4 KARTU STATISTIK RINGKASAN KEHADIRAN -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
  
  <!-- Tingkat Kehadiran -->
  <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
    <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
      <span>Tingkat Kehadiran</span>
      <i class="fa-solid fa-chart-pie text-sky-600"></i>
    </div>
    <div class="text-2xl font-black text-slate-900">98.5% <span class="text-xs font-bold text-emerald-600">+1.2%</span></div>
    <div class="text-[11px] text-slate-500 font-medium">59 dari 60 Hari</div>
    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
      <div class="bg-emerald-500 h-full rounded-full" style="width: 98.5%"></div>
    </div>
  </div>

  <!-- Hadir Tepat Waktu -->
  <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
    <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
      <span>Hadir Tepat Waktu</span>
      <i class="fa-solid fa-circle-check text-emerald-600"></i>
    </div>
    <div class="text-2xl font-black text-slate-900">56 <span class="text-xs font-semibold text-slate-500">Hari Presensi</span></div>
    <div class="text-[11px] text-emerald-700 font-bold">✨ Rekor kedisiplinan prima</div>
  </div>

  <!-- Terlambat (Dispensasi) -->
  <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
    <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
      <span>Terlambat (Dispensasi)</span>
      <i class="fa-solid fa-stopwatch text-amber-600"></i>
    </div>
    <div class="text-2xl font-black text-slate-900">1x <span class="text-xs font-bold text-amber-700">12 Menit</span></div>
    <div class="text-[11px] text-slate-500 font-medium">Dispensasi kendala transportasi resmi</div>
  </div>

  <!-- Izin / Sakit Disetujui -->
  <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
    <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
      <span>Izin / Sakit Disetujui</span>
      <i class="fa-solid fa-file-invoice text-sky-600"></i>
    </div>
    <div class="text-2xl font-black text-slate-900">0 <span class="text-xs font-semibold text-slate-500">Hari Absen</span></div>
    <div class="text-[11px] text-slate-500 font-medium">Tidak ada pemotongan jam PKL</div>
  </div>

</div>

<!-- TABEL RIWAYAT KEHADIRAN BULANAN -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
  
  <!-- Header Tabel -->
  <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h3 class="text-base font-extrabold text-slate-900">Riwayat Kehadiran Bulanan</h3>
      <p class="text-xs text-slate-500 mt-0.5">Data presensi logistik terintegrasi sistem pembimbing DUDI dan verifikator sekolah.</p>
    </div>
    <div class="flex items-center gap-3">
      <span class="text-xs font-bold text-slate-600 bg-slate-100 px-3 py-2 rounded-xl border border-slate-200"><i class="fa-regular fa-calendar mr-1"></i> Oktober 2024</span>
      <button onclick="alert('Mengekspor rekap presensi...')" class="px-3.5 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-1.5">
        <i class="fa-solid fa-download text-slate-500"></i>
        Export Rekap
      </button>
    </div>
  </div>

  <!-- Tabel Data -->
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse text-xs">
      <thead>
        <tr class="bg-slate-50/70 border-b border-slate-200/80 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">
          <th class="py-3.5 px-6">Tanggal & Hari</th>
          <th class="py-3.5 px-4">Jam Masuk</th>
          <th class="py-3.5 px-4">Jam Pulang</th>
          <th class="py-3.5 px-4">Durasi Kerja</th>
          <th class="py-3.5 px-4">Verifikasi & Lokasi</th>
          <th class="py-3.5 px-4">Status</th>
          <th class="py-3.5 px-6">Verifikator DUDI</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
        
        <!-- Baris 1 -->
        <tr class="hover:bg-slate-50/50 transition">
          <td class="py-4 px-6 font-bold text-slate-900">25 Okt 2024 <span class="block text-[11px] font-normal text-slate-500">Jumat</span></td>
          <td class="py-4 px-4 font-bold text-emerald-700">07:42 WIB</td>
          <td class="py-4 px-4 text-slate-400 italic">Belum Pulang</td>
          <td class="py-4 px-4 text-slate-400">—</td>
          <td class="py-4 px-4">
            <div class="flex items-center gap-2">
              <span class="w-6 h-6 rounded-full bg-slate-200 flex items-center justify-center text-[10px] font-bold"><i class="fa-solid fa-user text-slate-600"></i></span>
              <div>
                <div class="font-bold text-slate-800">15m dari DUDI</div>
                <div class="text-[10px] text-slate-500">IP 103.144.xxx.12</div>
              </div>
            </div>
          </td>
          <td class="py-4 px-4">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
              ● Hadir Tepat Waktu
            </span>
          </td>
          <td class="py-4 px-6">
            <div class="font-bold text-slate-800">Ahmad Fauzi, S.Kom</div>
            <div class="text-[10px] text-emerald-600 font-semibold">Otomatis / Valid</div>
          </td>
        </tr>

        <!-- Baris 2 -->
        <tr class="hover:bg-slate-50/50 transition">
          <td class="py-4 px-6 font-bold text-slate-900">24 Okt 2024 <span class="block text-[11px] font-normal text-slate-500">Kamis</span></td>
          <td class="py-4 px-4 font-bold text-emerald-700">07:38 WIB</td>
          <td class="py-4 px-4 font-bold text-slate-800">17:05 WIB</td>
          <td class="py-4 px-4 text-slate-800">9 Jam 27 Menit</td>
          <td class="py-4 px-4">
            <div class="flex items-center gap-2">
              <span class="w-6 h-6 rounded-full bg-slate-200 flex items-center justify-center text-[10px] font-bold"><i class="fa-solid fa-user text-slate-600"></i></span>
              <div>
                <div class="font-bold text-slate-800">12m dari DUDI</div>
                <div class="text-[10px] text-slate-500">IP 103.144.xxx.12</div>
              </div>
            </div>
          </td>
          <td class="py-4 px-4">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
              ● Hadir Tepat Waktu
            </span>
          </td>
          <td class="py-4 px-6">
            <div class="font-bold text-slate-800">Ahmad Fauzi, S.Kom</div>
            <div class="text-[10px] text-slate-500">Diverifikasi Pukul 17:15</div>
          </td>
        </tr>

        <!-- Baris 3 -->
        <tr class="hover:bg-slate-50/50 transition">
          <td class="py-4 px-6 font-bold text-slate-900">23 Okt 2024 <span class="block text-[11px] font-normal text-slate-500">Rabu</span></td>
          <td class="py-4 px-4 font-bold text-amber-700">08:12 WIB</td>
          <td class="py-4 px-4 font-bold text-slate-800">17:10 WIB</td>
          <td class="py-4 px-4 text-slate-800">8 Jam 58 Menit</td>
          <td class="py-4 px-4">
            <div class="flex items-center gap-2">
              <span class="w-6 h-6 rounded-full bg-slate-200 flex items-center justify-center text-[10px] font-bold"><i class="fa-solid fa-user text-slate-600"></i></span>
              <div>
                <div class="font-bold text-slate-800">18m dari DUDI</div>
                <div class="text-[10px] text-slate-500">IP 180.252.xxx.90</div>
              </div>
            </div>
          </td>
          <td class="py-4 px-4">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-amber-50 text-amber-700 border border-amber-200">
              ● Terlambat (Dispensasi)
            </span>
          </td>
          <td class="py-4 px-6">
            <div class="font-bold text-slate-800">Ahmad Fauzi, S.Kom</div>
            <div class="text-[10px] text-amber-700 font-semibold">Acc: Kendala Transportasi Batam</div>
          </td>
        </tr>

        <!-- Baris 4 -->
        <tr class="hover:bg-slate-50/50 transition">
          <td class="py-4 px-6 font-bold text-slate-900">22 Okt 2024 <span class="block text-[11px] font-normal text-slate-500">Selasa</span></td>
          <td class="py-4 px-4 font-bold text-emerald-700">07:40 WIB</td>
          <td class="py-4 px-4 font-bold text-slate-800">17:00 WIB</td>
          <td class="py-4 px-4 text-slate-800">9 Jam 20 Menit</td>
          <td class="py-4 px-4">
            <div class="flex items-center gap-2">
              <span class="w-6 h-6 rounded-full bg-slate-200 flex items-center justify-center text-[10px] font-bold"><i class="fa-solid fa-user text-slate-600"></i></span>
              <div>
                <div class="font-bold text-slate-800">14m dari DUDI</div>
                <div class="text-[10px] text-slate-500">IP 103.144.xxx.12</div>
              </div>
            </div>
          </td>
          <td class="py-4 px-4">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
              ● Hadir Tepat Waktu
            </span>
          </td>
          <td class="py-4 px-6">
            <div class="font-bold text-slate-800">Ahmad Fauzi, S.Kom</div>
            <div class="text-[10px] text-slate-500">Diverifikasi Pukul 17:02</div>
          </td>
        </tr>

      </tbody>
    </table>
  </div>

  <!-- Footer Pagination -->
  <div class="p-4 bg-slate-50/50 border-t border-slate-200/80 flex items-center justify-between text-xs text-slate-500 font-medium">
    <div>Menampilkan 4 dari 22 entri bulan Oktober 2024</div>
    <div class="flex items-center gap-1">
      <button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-slate-400 cursor-not-allowed"><i class="fa-solid fa-chevron-left"></i></button>
      <button class="px-3 py-1.5 rounded-lg border border-sky-500 bg-sky-600 text-white font-bold">1</button>
      <button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700"><i class="fa-solid fa-chevron-right"></i></button>
    </div>
  </div>

</div>

</div>
@endsection