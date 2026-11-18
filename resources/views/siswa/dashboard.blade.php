@extends('layouts.student')

@section('title', 'Dashboard Siswa - Portal PKL.ID')

@section('content')
<div class="space-y-6">

  <!-- 1. HERO SECTION: SELAMAT DATANG & PRESENSI REAL-TIME -->
  <section class="bg-gradient-to-r from-[#0F1E38] via-[#172B4D] to-[#1E3A6D] rounded-3xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden">
    <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
      
      <!-- Kolom Kiri: Sapaan & Status Penempatan -->
      <div class="lg:col-span-7 space-y-3">
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-xs font-semibold">
          <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
          Sistem Terhubung + DUDI Mode
        </span>
        
        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Selamat Pagi, Rizky Pratama! 👋</h1>
        
        <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
          Siswa Kompetensi Keahlian <strong class="text-white">Pengembangan Perangkat Lunak & Gim (PPLG)</strong> • Penempatan di <strong class="text-sky-300">PT Solusi Teknologi Nusantara</strong>
        </p>

        <!-- Baris Info Kecil -->
        <div class="flex flex-wrap items-center gap-3 pt-2 text-xs font-medium text-slate-300">
          <div class="flex items-center gap-1.5 bg-white/10 px-3 py-1.5 rounded-xl border border-white/10">
            <i class="fa-solid fa-calendar-days text-sky-400"></i>
            <span>Minggu ke-12 dari 24</span>
          </div>
          <div class="flex items-center gap-1.5 bg-emerald-500/20 px-3 py-1.5 rounded-xl border border-emerald-400/30 text-emerald-300">
            <i class="fa-solid fa-circle-check"></i>
            <span>Status: Aktif & Terverifikasi</span>
          </div>
          <div class="flex items-center gap-1.5 bg-white/10 px-3 py-1.5 rounded-xl border border-white/10">
            <i class="fa-solid fa-clock text-sky-400"></i>
            <span>Target Jam: 480 / 600 Jam</span>
          </div>
        </div>

        <div class="text-[11px] text-emerald-400 font-medium pt-1 flex items-center gap-1.5">
          <i class="fa-solid fa-circle-check"></i>
          <span>Jurnal Harian kemarin telah disetujui Mentor DUDI (Ahmad Fauzi, S.Kom)</span>
        </div>
      </div>

      <!-- Kolom Kanan: Card Aksi Presensi Real-Time -->
      <div class="lg:col-span-5 bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 space-y-4 shadow-lg">
        <div class="flex items-center justify-between">
          <span class="text-[10px] font-bold uppercase tracking-wider text-slate-300">Presensi Real-Time</span>
          <span class="px-2.5 py-0.5 rounded-full bg-emerald-500 text-slate-950 text-[10px] font-black tracking-wide">Geofence Siap</span>
        </div>

        <a href="{{ route('siswa.checkin') }}" class="w-full py-3.5 px-4 rounded-xl bg-sky-400 hover:bg-sky-300 text-[#0F172A] font-extrabold text-xs shadow-lg transition flex items-center justify-center gap-2">
          <i class="fa-solid fa-fingerprint text-base"></i>
          <span>Presensi Masuk Sekarang</span>
        </a>

        <div class="flex items-center justify-between text-[11px] text-slate-300 pt-1">
          <span class="flex items-center gap-1.5">
            <i class="fa-solid fa-location-dot text-emerald-400"></i>
            Radius 15m dari Kantor DUDI — Sesuai
          </span>
          <a href="{{ route('siswa.checkin') }}" class="text-sky-300 hover:underline font-bold">
            <i class="fa-solid fa-file-lines mr-1"></i> Ajukan Izin / Sakit
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- 2. GRID UTAMA: IKHTISAR JAM KERJA (KIRI) & KALENDER BULANAN (KANAN) -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Bagian Kiri (8 Kolom): Ikhtisar Jam Kerja & Kehadiran + Grafik Batang -->
    <div class="lg:col-span-8 space-y-6">
      
      <!-- Kartu Ikhtisar Jam Kerja & Kehadiran -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 border-b border-slate-100">
          <div>
            <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-chart-line text-sky-600"></i>
              Ikhtisar Jam Kerja & Kehadiran
            </h3>
            <p class="text-xs text-slate-500">Minggu ke-12 (21 Okt - 25 Okt 2024)</p>
          </div>
          <span class="text-xs font-bold text-slate-600 bg-slate-100 px-3 py-1.5 rounded-xl border border-slate-200">
            Jam Efektif (Target 8.0 jam/hari)
          </span>
        </div>

        <!-- 4 Kotak Kecil Statistik -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-1">
            <div class="text-[10px] font-bold text-slate-400 uppercase">Tingkat Kehadiran</div>
            <div class="text-lg font-black text-slate-900">98.5% <span class="text-[10px] text-emerald-600 font-bold">+1.2%</span></div>
            <div class="text-[10px] text-slate-500">59 dari 60 Hari</div>
          </div>
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-1">
            <div class="text-[10px] font-bold text-slate-400 uppercase">Tepat Waktu</div>
            <div class="text-lg font-black text-slate-900">96% <span class="text-[10px] text-slate-500 font-medium">Disiplin</span></div>
            <div class="text-[10px] text-slate-500">Rata-rata 07:42 WIB</div>
          </div>
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-1">
            <div class="text-[10px] font-bold text-slate-400 uppercase">Keterlambatan</div>
            <div class="text-lg font-black text-amber-700">1x <span class="text-xs font-bold text-slate-600">12 Menit</span></div>
            <div class="text-[10px] text-slate-500">Toleransi DUDI 15m</div>
          </div>
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-1">
            <div class="text-[10px] font-bold text-slate-400 uppercase">Izin / Sakit</div>
            <div class="text-lg font-black text-slate-900">0 <span class="text-xs font-semibold text-slate-500">Nihil</span></div>
            <div class="text-[10px] text-slate-500">Kondisi Prima</div>
          </div>
        </div>

        <!-- Grafik Akumulasi Jam Harian (Visual Simulasi Bar) -->
        <div class="space-y-3 pt-2">
          <div class="flex items-center justify-between text-xs font-bold text-slate-700">
            <span>Grafik Akumulasi Jam Harian</span>
            <span class="text-sky-600">Total Minggu Ini: 40.2 Jam</span>
          </div>

          <div class="grid grid-cols-5 gap-3 pt-2 items-end h-32 px-4 bg-slate-50 rounded-2xl border border-slate-200/60">
            <!-- Senin -->
            <div class="flex flex-col items-center gap-1 h-full justify-end">
              <span class="text-[10px] font-bold text-slate-600">8.5h</span>
              <div class="w-full bg-[#172B4D] rounded-t-lg h-[85%]"></div>
              <span class="text-[10px] text-slate-500 font-medium">Sen (21)</span>
            </div>
            <!-- Selasa -->
            <div class="flex flex-col items-center gap-1 h-full justify-end">
              <span class="text-[10px] font-bold text-slate-600">8.0h</span>
              <div class="w-full bg-[#172B4D] rounded-t-lg h-[80%]"></div>
              <span class="text-[10px] text-slate-500 font-medium">Sel (22)</span>
            </div>
            <!-- Rabu -->
            <div class="flex flex-col items-center gap-1 h-full justify-end">
              <span class="text-[10px] font-bold text-slate-600">8.2h</span>
              <div class="w-full bg-[#172B4D] rounded-t-lg h-[82%]"></div>
              <span class="text-[10px] text-slate-500 font-medium">Rab (23)</span>
            </div>
            <!-- Kamis -->
            <div class="flex flex-col items-center gap-1 h-full justify-end">
              <span class="text-[10px] font-bold text-slate-600">8.0h</span>
              <div class="w-full bg-[#172B4D] rounded-t-lg h-[80%]"></div>
              <span class="text-[10px] text-slate-500 font-medium">Kam (24)</span>
            </div>
            <!-- Jumat -->
            <div class="flex flex-col items-center gap-1 h-full justify-end">
              <span class="text-[10px] font-bold text-slate-600">7.5h</span>
              <div class="w-full bg-sky-500 rounded-t-lg h-[75%]"></div>
              <span class="text-[10px] text-slate-500 font-medium">Jum (25)</span>
            </div>
          </div>
        </div>

      </div>

      <!-- Jurnal & Logbook Aktivitas Terakhir -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <div>
            <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-book-open text-sky-600"></i>
              Jurnal & Logbook Aktivitas
            </h3>
            <p class="text-xs text-slate-500">Dokumentasi kompetensi berbasis industri harian</p>
          </div>
          <a href="{{ route('siswa.logbook') }}" class="px-3.5 py-2 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl transition flex items-center gap-1.5 shadow-sm">
            <i class="fa-solid fa-plus text-sky-400"></i> Tulis Jurnal Harian
          </a>
        </div>

        <!-- Banner Peringatan Belum Isi Hari Ini -->
        <div class="p-3.5 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-between text-xs">
          <div class="flex items-center gap-2.5">
            <i class="fa-solid fa-triangle-exclamation text-amber-600 text-base"></i>
            <div>
              <strong class="text-amber-900">Unggah Jurnal Hari Ini (Batas: 18:00 WIB)</strong>
              <div class="text-[11px] text-amber-700">Jangan lupa lampirkan dokumentasi screenshot atau git commit log.</div>
            </div>
          </div>
          <span class="px-2.5 py-1 rounded bg-amber-200 text-amber-900 font-extrabold text-[10px]">Belum Diisi</span>
        </div>

        <!-- Tabel Riwayat Logbook Ringkas -->
        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs">
            <thead>
              <tr class="bg-slate-50 text-slate-500 font-extrabold uppercase text-[10px] border-b border-slate-200">
                <th class="py-2.5 px-3">Tanggal / Waktu</th>
                <th class="py-2.5 px-3">Ringkasan Aktivitas / Pekerjaan</th>
                <th class="py-2.5 px-3">Capaian Teknis</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
              <tr class="hover:bg-slate-50/50">
                <td class="py-3 px-3 font-bold text-slate-900">Kamis, 24 Okt 2024 <span class="block text-[10px] font-normal text-slate-500">08:00 - 17:00 WIB</span></td>
                <td class="py-3 px-3">Implementasi REST API autentikasi JWT. Membangun middleware token verification & refresh token dengan Go Fiber.</td>
                <td class="py-3 px-3"><span class="px-2 py-0.5 rounded bg-sky-50 text-sky-700 font-bold text-[10px] border border-sky-200">Backend Eng</span></td>
              </tr>
              <tr class="hover:bg-slate-50/50">
                <td class="py-3 px-3 font-bold text-slate-900">Rabu, 23 Okt 2024 <span class="block text-[10px] font-normal text-slate-500">08:15 - 17:10 WIB</span></td>
                <td class="py-3 px-3">Slicing UI dashboard Figma ke Tailwind CSS. Menyesuaikan responsivitas tablet/desktop dan integrasi dark mode tokens.</td>
                <td class="py-3 px-3"><span class="px-2 py-0.5 rounded bg-purple-50 text-purple-700 font-bold text-[10px] border border-purple-200">Frontend Dev</span></td>
              </tr>
              <tr class="hover:bg-slate-50/50">
                <td class="py-3 px-3 font-bold text-slate-900">Selasa, 22 Okt 2024 <span class="block text-[10px] font-normal text-slate-500">08:00 - 17:00 WIB</span></td>
                <td class="py-3 px-3">Database Schema Design PostgreSQL. Perancangan relasi ERD modul penilai DUDI dan normalisasi tabel logbook.</td>
                <td class="py-3 px-3"><span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-bold text-[10px] border border-emerald-200">Database Arch</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Info Kontak Pembimbing & DUDI -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-3">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold text-sky-600 uppercase tracking-wider">Sekolah (SMK)</span>
            <i class="fa-solid fa-school text-slate-400"></i>
          </div>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center font-bold text-slate-700">SW</div>
            <div>
              <div class="text-xs font-bold text-slate-900">Dra. Sri Wahyuni, M.Pd</div>
              <div class="text-[11px] text-slate-500">Guru Pembimbing PKL, PPLG</div>
              <div class="text-[10px] text-slate-400">NIP. 19780312 200312 2 004</div>
            </div>
          </div>
          <a href="https://whatsapp.com" target="_blank" class="w-full py-2 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold text-xs border border-emerald-200 transition flex items-center justify-center gap-2">
            <i class="fa-brands fa-whatsapp text-sm"></i> WhatsApp
          </a>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-3">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider">Mitra Industri (DUDI)</span>
            <i class="fa-solid fa-building text-slate-400"></i>
          </div>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-sky-100 flex items-center justify-center font-bold text-sky-800">AF</div>
            <div>
              <div class="text-xs font-bold text-slate-900">Ahmad Fauzi, S.Kom</div>
              <div class="text-[11px] text-slate-500">Senior Lead Developer</div>
              <div class="text-[10px] text-sky-600 font-semibold">PT Solusi Teknologi Nusantara</div>
            </div>
          </div>
          <button onclick="alert('Membuka chat mentor DUDI...')" class="w-full py-2 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white font-bold text-xs transition flex items-center justify-center gap-2 shadow-sm">
            <i class="fa-solid fa-comments text-xs"></i> Chat Mentor DUDI
          </button>
        </div>
      </div>

    </div>

    <!-- Bagian Kanan (4 Kolom): Kalender Bulanan, Agenda & Target Capaian -->
    <div class="lg:col-span-4 space-y-6">
      
      <!-- Kartu Kalender Kehadiran Bulanan -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-4">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-regular fa-calendar text-sky-600"></i> Oktober 2024
          </h3>
          <div class="flex gap-1">
            <button class="p-1 rounded hover:bg-slate-100 text-slate-500">‹</button>
            <button class="p-1 rounded hover:bg-slate-100 text-slate-500">›</button>
          </div>
        </div>

        <!-- Grid Hari -->
        <div class="grid grid-cols-7 gap-1 text-center text-[11px] font-bold text-slate-400">
          <div>Min</div><div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
        </div>

        <!-- Grid Tanggal -->
        <div class="grid grid-cols-7 gap-1.5 text-center text-xs font-semibold text-slate-700">
          <div class="text-slate-300 py-1">29</div>
          <div class="text-slate-300 py-1">30</div>
          <div class="py-1">1</div>
          <div class="py-1">2</div>
          <div class="py-1 bg-emerald-50 text-emerald-700 rounded-lg font-bold">3</div>
          <div class="py-1">4</div>
          <div class="py-1 text-slate-400">5</div>
          
          <div class="py-1 text-slate-400">6</div>
          <div class="py-1">7</div>
          <div class="py-1">8</div>
          <div class="py-1">9</div>
          <div class="py-1">10</div>
          <div class="py-1">11</div>
          <div class="py-1 text-slate-400">12</div>
          
          <div class="py-1 text-slate-400">13</div>
          <div class="py-1">14</div>
          <div class="py-1">15</div>
          <div class="py-1">16</div>
          <div class="py-1">17</div>
          <div class="py-1">18</div>
          <div class="py-1 text-slate-400">19</div>
          
          <div class="py-1 text-slate-400">20</div>
          <div class="py-1 bg-emerald-50 text-emerald-700 rounded-lg">21</div>
          <div class="py-1 bg-emerald-50 text-emerald-700 rounded-lg">22</div>
          <div class="py-1 bg-emerald-50 text-emerald-700 rounded-lg">23</div>
          <div class="py-1 bg-emerald-50 text-emerald-700 rounded-lg">24</div>
          <div class="py-1 bg-sky-600 text-white rounded-lg font-bold shadow">25</div>
          <div class="py-1 text-slate-400">26</div>

          <div class="py-1 text-slate-400">27</div>
          <div class="py-1">28</div>
          <div class="py-1">29</div>
          <div class="py-1">30</div>
          <div class="py-1">31</div>
          <div class="text-slate-300 py-1">1</div>
          <div class="text-slate-300 py-1">2</div>
        </div>

        <div class="flex items-center justify-between text-[10px] text-slate-500 pt-2 border-t border-slate-100">
          <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Hadir Sesuai Jadwal</span>
          <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-sky-600"></span> Hari Berjalan</span>
        </div>
        <div class="text-[10px] text-slate-400 text-center">Periode: 1 Agu 2024 – 31 Jan • <strong>Total 6 Bulan</strong></div>
      </div>

      <!-- Agenda & Tenggat PKL -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-xs font-extrabold text-slate-900 flex items-center gap-1.5">
            <i class="fa-solid fa-bell text-sky-600"></i> Agenda & Tenggat PKL
          </h3>
          <span class="px-2 py-0.5 rounded-full bg-sky-50 text-sky-700 font-bold text-[10px]">3 Kegiatan</span>
        </div>

        <div class="space-y-3 text-xs">
          <!-- Item 1 -->
          <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60 space-y-1">
            <div class="flex items-center justify-between font-bold text-slate-800">
              <span>Monitoring Guru Pembimbing</span>
              <span class="text-[10px] bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded">Hari Ini</span>
            </div>
            <div class="text-[11px] text-slate-500">Jumat, 25 Okt 2024 • 10:00 WIB</div>
            <p class="text-[11px] text-slate-600">Kunjungan On-Site Ruang Rapat Lt. 5</p>
          </div>

          <!-- Item 2 -->
          <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60 space-y-1">
            <div class="flex items-center justify-between font-bold text-slate-800">
              <span>Evaluasi Tengah!</span>
              <span class="text-[10px] bg-amber-100 text-amber-800 px-2 py-0.5 rounded">Minggu Depan</span>
            </div>
            <div class="text-[11px] text-slate-500">Rabu, 30 Okt 2024 • Penilaian Mentor</div>
            <p class="text-[11px] text-slate-600">Rubrik: Kinerja Teknis & Sikap Kerja</p>
          </div>

          <!-- Item 3 -->
          <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60 space-y-1">
            <div class="flex items-center justify-between font-bold text-slate-800">
              <span>Batas Unggah Laporan</span>
              <span class="text-[10px] bg-rose-100 text-rose-800 px-2 py-0.5 rounded">5 Nov</span>
            </div>
            <div class="text-[11px] text-slate-500">Format PDF sesuai Pedoman Vokasi 2024</div>
            <p class="text-[11px] text-sky-600 font-bold hover:underline cursor-pointer">Unggah ke menu Laporan →</p>
          </div>
        </div>
      </div>

      <!-- Target Capaian Kompetensi PKL -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-xs font-extrabold text-slate-900 flex items-center gap-1.5">
            <i class="fa-solid fa-bullseye text-sky-600"></i> Target Capaian Capaian PKL
          </h3>
          <span class="text-[10px] font-extrabold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">Rata-rata 90%</span>
        </div>

        <div class="space-y-3 text-xs">
          <div>
            <div class="flex justify-between font-bold text-slate-700 mb-1">
              <span>Backend & Database Management</span>
              <span class="text-sky-700 font-black">85%</span>
            </div>
            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
              <div class="bg-sky-600 h-full rounded-full" style="width: 85%"></div>
            </div>
            <div class="text-[10px] text-slate-400 mt-0.5">API Integration, PostgreSQL query design</div>
          </div>

          <div>
            <div class="flex justify-between font-bold text-slate-700 mb-1">
              <span>Version Control & Git Collaboration</span>
              <span class="text-sky-700 font-black">90%</span>
            </div>
            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
              <div class="bg-sky-600 h-full rounded-full" style="width: 90%"></div>
            </div>
            <div class="text-[10px] text-slate-400 mt-0.5">Branching workflow, pull request reviews</div>
          </div>

          <div>
            <div class="flex justify-between font-bold text-slate-700 mb-1">
              <span>Soft Skills & Etika Profesional</span>
              <span class="text-emerald-700 font-black">95%</span>
            </div>
            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
              <div class="bg-emerald-500 h-full rounded-full" style="width: 95%"></div>
            </div>
            <div class="text-[10px] text-slate-400 mt-0.5">Komunikasi tim, ketepatan waktu & inisiatif</div>
          </div>
        </div>

        <button onclick="alert('Mengunduh Transkrip Progres Magang (PDF)...')" class="w-full py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition flex items-center justify-center gap-2 border border-slate-200">
          <i class="fa-solid fa-file-arrow-down"></i> Unduh Transkrip Progres Magang (PDF)
        </button>
      </div>

    </div>

  </div>

</div>
@endsection