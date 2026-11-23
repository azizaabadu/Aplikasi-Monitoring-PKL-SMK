@extends('layouts.admin')

@section('title', 'Distribusi & Monitoring Kinerja Guru Pembimbing PKL - Portal PKL.ID')

@section('content')
  <!-- 1. Breadcrumb & Badge Supervisi -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
        <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
        <span>Beranda</span>
      </a>
      <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Monitoring &amp; Guru Pembimbing</span>
    </div>

    <div class="flex flex-wrap items-center gap-3">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold tracking-wide">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
        SUPERVISI LAPANGAN AKTIF: PEKAN KE-14
      </span>
      <span class="text-[11px] text-slate-400 font-medium">
        Sinkronisasi Terakhir: 10 Menit Lalu
      </span>
    </div>
  </div>

  <!-- 2. Hero Header & Tombol Aksi -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="space-y-2.5 max-w-2xl">
      <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-sky-50 border border-sky-200/80 text-sky-700 text-[10px] font-extrabold uppercase tracking-wider">
        <i class="fa-solid fa-user-check text-[10px]"></i>
        PORTAL HUBIN &amp; MONEV VOKASI
      </span>

      <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
        Distribusi &amp; Monitoring Kinerja Guru Pembimbing PKL
      </h1>

      <p class="text-xs text-slate-500 leading-relaxed">
        Alokasi guru pembimbing sekolah, supervisi jadwal visitasi lapangan, validasi SPPD/SPT monev, serta pemantauan keaktifan verifikasi jurnal siswa secara real-time.
      </p>
    </div>

    <div class="flex flex-col sm:flex-row lg:flex-col items-stretch gap-2 shrink-0 min-w-[210px]">
      <button type="button" onclick="openModal('modalJadwalTerpadu')" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-regular fa-calendar-plus text-slate-500"></i>
        <span>Jadwal Visitasi Terpadu</span>
      </button>

      <button type="button" onclick="downloadRekapMonev()" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-solid fa-file-arrow-down text-slate-500"></i>
        <span>Unduh Rekap Monev</span>
      </button>

      <button type="button" onclick="openModal('modalTambahGuru')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center justify-center gap-2 shadow-xs transition">
        <i class="fa-solid fa-user-plus text-xs"></i>
        <span>+ Tambah Penugasan Guru</span>
      </button>
    </div>
  </div>

  <!-- 3. 4 Kartu Metrik Utama -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-600 leading-snug">Guru Pembimbing Ditugaskan</span>
        <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm shrink-0">
          <i class="fa-solid fa-chalkboard-user"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-2">
        <span id="kpiTotalGuru" class="text-3xl font-black text-slate-900 tracking-tight">18</span>
        <span class="text-xs font-semibold text-slate-400">Guru Produktif</span>
      </div>
      <div class="space-y-2">
        <div class="flex items-center justify-between gap-2 text-[10px]">
          <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold">
            <i class="fa-solid fa-circle-check mr-0.5"></i> Rasio Ideal
          </span>
          <span class="text-slate-400 font-medium">1 : 22.4 Siswa PKL</span>
        </div>
        <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
          <div class="h-full rounded-full bg-[#13294B]" style="width: 100%"></div>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-600 leading-snug">Total Sesi Visitasi DUDI</span>
        <span class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-sm shrink-0">
          <i class="fa-solid fa-route"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900 tracking-tight">92</span>
        <span class="text-xs font-semibold text-slate-400">/ 128 Sesi Target</span>
      </div>
      <div class="space-y-2">
        <div class="flex items-center justify-between gap-2 text-[10px]">
          <span class="px-2 py-0.5 rounded-full bg-teal-50 text-teal-700 font-extrabold">71.8% Tercapai</span>
          <span class="text-slate-400 font-medium">Semester Berjalan</span>
        </div>
        <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
          <div class="h-full rounded-full bg-teal-600" style="width: 71.8%"></div>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-600 leading-snug">Logbook Siswa Terevaluasi</span>
        <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm shrink-0">
          <i class="fa-regular fa-clock"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-slate-900 tracking-tight">94.2%</span>
        <span class="text-xs font-extrabold text-emerald-600">Respon Kilat</span>
      </div>
      <div class="space-y-2">
        <div class="flex items-center justify-between gap-2 text-[10px]">
          <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold">&rarr; +4.8% Hari Ini</span>
          <span class="text-slate-400 font-medium">1.842 Entri Jurnal</span>
        </div>
        <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
          <div class="h-full rounded-full bg-emerald-500" style="width: 94.2%"></div>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-600 leading-snug">Anggaran SPT &amp; Monev</span>
        <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm shrink-0">
          <i class="fa-solid fa-wallet"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-slate-900 tracking-tight">78%</span>
        <span class="text-xs font-semibold text-slate-400">Terserap Efisien</span>
      </div>
      <div class="space-y-2">
        <div class="flex items-center justify-between gap-2 text-[10px]">
          <span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 font-extrabold">Terverifikasi</span>
          <span class="text-slate-400 font-medium">Bendahara Hubin SMKN 1</span>
        </div>
        <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
          <div class="h-full rounded-full bg-amber-500" style="width: 78%"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- 4. Filter Jurusan & Pencarian Guru -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-3.5 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-3">
    <div class="relative flex-1">
      <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
      <input
        id="guruSearchInput"
        oninput="filterGuruTable()"
        type="text"
        placeholder="Cari nama guru, NIP, atau nama mitra..."
        class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-sky-500 transition"
      >
    </div>

    <div class="flex flex-wrap items-center gap-2 text-[11px]">
      <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 mr-1">JURUSAN:</span>
      <button type="button" data-jurusan="" onclick="selectGuruJurusan(this, '')" class="jurusan-btn px-3 py-1.5 rounded-lg bg-[#13294B] text-white font-bold">Semua</button>
      <button type="button" data-jurusan="PPLG" onclick="selectGuruJurusan(this, 'PPLG')" class="jurusan-btn px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">PPLG</button>
      <button type="button" data-jurusan="TJKT" onclick="selectGuruJurusan(this, 'TJKT')" class="jurusan-btn px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">TJKT</button>
      <button type="button" data-jurusan="DKV" onclick="selectGuruJurusan(this, 'DKV')" class="jurusan-btn px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">DKV</button>
      <button type="button" data-jurusan="Animasi" onclick="selectGuruJurusan(this, 'Animasi')" class="jurusan-btn px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">Animasi</button>
    </div>
  </div>

  <!-- 5. Tabel Beban Bimbingan -->
  <section class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
    <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
      <div class="flex items-start gap-3">
        <span class="w-8 h-8 rounded-lg bg-sky-50 text-sky-700 flex items-center justify-center text-sm shrink-0 mt-0.5">
          <i class="fa-solid fa-clipboard-list"></i>
        </span>
        <div>
          <h2 class="text-sm font-black text-slate-900">Beban Bimbingan &amp; Progres Visitasi Lapangan</h2>
          <p class="text-[11px] text-slate-500 mt-0.5">Daftar guru pembimbing teknis terdaftar T.A. 2024/2025 Genap</p>
        </div>
      </div>

      <div class="flex flex-wrap items-center gap-2 text-[10px] font-extrabold">
        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700">
          <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
          16 Guru Aktif Normal
        </span>
        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-700">
          <i class="fa-solid fa-triangle-exclamation text-[9px]"></i>
          2 Butuh Konfirmasi SPT
        </span>
      </div>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse text-xs">
        <thead>
          <tr class="bg-slate-50/90 border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
            <th class="py-3 px-4">FOTO &amp; NAMA GURU / NIP</th>
            <th class="py-3 px-3">JURUSAN BINAAN</th>
            <th class="py-3 px-3">SISWA PKL</th>
            <th class="py-3 px-3">MITRA DUDI NAUNGAN</th>
            <th class="py-3 px-3">PROGRES VISITASI LAPANGAN</th>
            <th class="py-3 px-3">VALIDASI JURNAL</th>
            <th class="py-3 px-3">STATUS SPT</th>
            <th class="py-3 px-4 text-right">AKSI</th>
          </tr>
        </thead>
        <tbody id="guruTableBody" class="divide-y divide-slate-100">
          <tr class="guru-row hover:bg-slate-50/70 align-top">
            <td class="py-4 px-4">
              <div class="font-extrabold text-slate-900">Dra. Sri Wahyuni, M.Pd</div>
              <div class="text-[10px] text-slate-400 mt-0.5">NIP. 19780412 200501 2 004</div>
            </td>
            <td class="py-4 px-3">
              <span class="inline-block px-2 py-0.5 rounded bg-sky-100 text-sky-800 text-[10px] font-extrabold">PPLG</span>
              <div class="text-[10px] text-slate-400 mt-1">XII PPLG 1 &amp; 2</div>
            </td>
            <td class="py-4 px-3 font-black text-slate-900">28 <span class="text-[11px] font-semibold text-slate-500">Siswa</span></td>
            <td class="py-4 px-3">
              <div class="font-extrabold text-slate-800">6 Mitra Industri</div>
              <div class="text-[10px] text-slate-500 mt-0.5">PT STN, Telkom, Infinite, Cyber Media</div>
            </td>
            <td class="py-4 px-3 font-extrabold text-emerald-600">5 / 6 Mitra (83.3%)</td>
            <td class="py-4 px-3 font-black text-slate-900">96% Tepat Waktu</td>
            <td class="py-4 px-3">
              <span class="spt-badge inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">SPT Terverifikasi</span>
            </td>
            <td class="py-4 px-4 text-right">
              <button type="button" onclick="openInfoModal('Detail Pembimbing', 'Dra. Sri Wahyuni, M.Pd membimbing 28 siswa pada 6 mitra industri dengan rata-rata verifikasi jurnal 1.2 jam.')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-[10px] font-bold text-slate-700">Detail</button>
            </td>
          </tr>

          <tr class="guru-row hover:bg-slate-50/70 align-top">
            <td class="py-4 px-4">
              <div class="font-extrabold text-slate-900">Hendra Saputra, S.T., M.Kom</div>
              <div class="text-[10px] text-slate-400 mt-0.5">NIP. 19890814 201505 1 002</div>
            </td>
            <td class="py-4 px-3">
              <span class="inline-block px-2 py-0.5 rounded bg-indigo-100 text-indigo-800 text-[10px] font-extrabold">PPLG &amp; GIM</span>
              <div class="text-[10px] text-slate-400 mt-1">XII RPLB</div>
            </td>
            <td class="py-4 px-3 font-black text-slate-900">22 <span class="text-[11px] font-semibold text-slate-500">Siswa</span></td>
            <td class="py-4 px-3">
              <div class="font-extrabold text-slate-800">4 Startup DUDI</div>
              <div class="text-[10px] text-slate-500 mt-0.5">Software House Batam Center</div>
            </td>
            <td class="py-4 px-3 font-extrabold text-amber-600">2 / 4 Mitra (50.0%)</td>
            <td class="py-4 px-3 font-black text-slate-900">86% Review</td>
            <td class="py-4 px-3">
              <span class="spt-badge inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-700 text-[10px] font-extrabold">Revisi SPT Monev</span>
            </td>
            <td class="py-4 px-4 text-right">
              <button type="button" onclick="verifikasiSptRow(this, 'Hendra Saputra, S.T., M.Kom')" class="px-2.5 py-1 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-[10px] font-bold text-white">Verifikasi SPT</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- 6. Jadwal Visitasi & Aktivitas Sistem -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
    <section class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex flex-wrap items-center justify-between gap-2">
        <div>
          <h2 class="text-sm font-black text-slate-900">Jadwal Visitasi Lapangan Terpadu</h2>
          <p class="text-[11px] text-slate-500">Periode: 28 Oktober - 02 November 2024</p>
        </div>
        <button type="button" onclick="openModal('modalAjukanKunjungan')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700">
          + Ajukan Jadwal Kunjungan
        </button>
      </div>

      <div id="jadwalVisitasiList" class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs">
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
          <div class="text-[10px] font-extrabold text-emerald-700">Senin, 28 Okt</div>
          <div class="font-extrabold text-slate-900">PT Infineon Diskon Nongsa</div>
          <div class="text-[11px] text-sky-700 font-bold">Ir. Bambang Sujatmiko</div>
        </div>
        <div class="p-3.5 rounded-xl bg-sky-50/70 border border-sky-200 space-y-1">
          <div class="text-[10px] font-extrabold text-sky-700">Rabu, 30 Okt &bull; 09:30 WIB</div>
          <div class="font-extrabold text-slate-900">PT Citra Tubindo Tbk</div>
          <div class="text-[11px] text-sky-700 font-bold">Dra. Sri Wahyuni, M.Pd</div>
        </div>
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
          <div class="text-[10px] font-extrabold text-amber-700">Jumat, 01 Nov</div>
          <div class="font-extrabold text-slate-900">PT Sat Nusapersada Tbk</div>
          <div class="text-[11px] text-sky-700 font-bold">Hendra Saputra, M.Kom</div>
        </div>
      </div>
    </section>

    <section class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-4">
      <div class="space-y-3">
        <h2 class="text-sm font-black text-slate-900">Aktivitas Sistem</h2>
        <div class="text-xs space-y-2.5">
          <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200/70">
            <div class="font-bold text-slate-800">Dra. Sri Wahyuni mengunggah Berita Acara Visitasi PT Citra Tubindo Tbk.</div>
            <div class="text-[10px] text-slate-400 mt-0.5">14 Menit yang lalu &bull; Dokumen SPPD Valid</div>
          </div>
          <div class="p-2.5 rounded-xl bg-amber-50/70 border border-amber-200/70">
            <div class="font-bold text-amber-900">2 guru pembimbing belum menyerahkan laporan monev tengah semester.</div>
            <div class="text-[10px] text-amber-700 mt-0.5">2 Jam yang lalu</div>
          </div>
        </div>
      </div>
      <button type="button" onclick="openInfoModal('Riwayat Supervisi (64 Log)', 'Menampilkan log verifikasi jurnal, unggah berita acara kunjungan, dan persetujuan SPT pembimbing PKL.')" class="w-full py-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 text-[11px] font-extrabold text-slate-800">
        Buka Semua Riwayat Supervisi (64 Log)
      </button>
    </section>
  </div>

  <!-- Modal Tambah Penugasan Guru -->
  <div id="modalTambahGuru" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Tambah Penugasan Guru Pembimbing</h3>
        <button type="button" onclick="closeModal('modalTambahGuru')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handleTambahGuru(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Nama Guru &amp; Gelar</label>
          <input id="inputNamaGuru" type="text" required placeholder="Contoh: Rina Marlina, S.Kom" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Jurusan</label>
            <select id="inputJurusanGuru" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              <option>PPLG</option>
              <option>TJKT</option>
              <option>DKV</option>
              <option>Animasi</option>
            </select>
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Jumlah Siswa</label>
            <input id="inputJumlahSiswa" type="number" min="1" value="20" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
          </div>
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Mitra DUDI Naungan</label>
          <input id="inputMitraGuru" type="text" required placeholder="Contoh: PT Solusi Teknologi Nusantara" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div class="flex justify-end gap-2 pt-2">
          <button type="button" onclick="closeModal('modalTambahGuru')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Simpan Penugasan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Jadwal Terpadu & Ajukan Kunjungan -->
  <div id="modalJadwalTerpadu" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-lg w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Jadwal Visitasi Lapangan Terpadu</h3>
        <button type="button" onclick="closeModal('modalJadwalTerpadu')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="space-y-2 text-xs">
        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200"><strong>Rabu, 30 Okt (09:30 WIB)</strong> &mdash; PT Citra Tubindo Tbk (Dra. Sri Wahyuni, M.Pd)</div>
        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200"><strong>Jumat, 01 Nov (10:00 WIB)</strong> &mdash; PT Sat Nusapersada Tbk (Hendra Saputra, M.Kom)</div>
      </div>
      <div class="flex justify-end">
        <button type="button" onclick="closeModal('modalJadwalTerpadu')" class="px-4 py-2 rounded-xl bg-[#13294B] text-white text-xs font-extrabold">Tutup</button>
      </div>
    </div>
  </div>

  <div id="modalAjukanKunjungan" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Ajukan Jadwal Kunjungan</h3>
        <button type="button" onclick="closeModal('modalAjukanKunjungan')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handleAjukanKunjungan(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Tanggal &amp; Hari</label>
          <input id="inputTanggalKunjungan" type="text" required placeholder="Contoh: Sabtu, 02 Nov" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Nama Mitra DUDI</label>
          <input id="inputMitraKunjungan" type="text" required placeholder="Contoh: PT Batamindo Investment" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Guru Pembimbing</label>
          <input id="inputPembimbingKunjungan" type="text" required placeholder="Contoh: Drs. Budi Haryono" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modalAjukanKunjungan')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Ajukan Jadwal</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  let activeGuruJurusan = '';

  function selectGuruJurusan(btn, jurusan) {
    activeGuruJurusan = jurusan;
    document.querySelectorAll('.jurusan-btn').forEach(el => {
      el.className = 'jurusan-btn px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition';
    });
    btn.className = 'jurusan-btn px-3 py-1.5 rounded-lg bg-[#13294B] text-white font-bold';
    filterGuruTable();
  }

  function filterGuruTable() {
    const q = (document.getElementById('guruSearchInput').value || '').toLowerCase();
    document.querySelectorAll('.guru-row').forEach(row => {
      const text = row.innerText.toLowerCase();
      const match = (!q || text.includes(q)) && (!activeGuruJurusan || text.includes(activeGuruJurusan.toLowerCase()));
      row.classList.toggle('hidden', !match);
    });
  }

  function verifikasiSptRow(btn, namaGuru) {
    const badge = btn.closest('tr').querySelector('.spt-badge');
    if (badge) {
      badge.className = 'spt-badge inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold';
      badge.textContent = 'SPT Terverifikasi';
    }
    btn.remove();
    showToast(`SPT Monev ${namaGuru} berhasil diverifikasi.`);
  }

  function downloadRekapMonev() {
    triggerDownload('rekap-monev-pembimbing.csv', "Nama Guru,Jurusan,Siswa PKL,Status SPT\nDra. Sri Wahyuni M.Pd,PPLG,28,SPT Terverifikasi\nHendra Saputra M.Kom,PPLG & GIM,22,Revisi SPT Monev\n", 'text/csv;charset=utf-8;');
    showToast('Rekap Monev pembimbing berhasil diunduh.');
  }

  function handleTambahGuru(e) {
    e.preventDefault();
    const nama = document.getElementById('inputNamaGuru').value.trim();
    const jurusan = document.getElementById('inputJurusanGuru').value;
    const jumlah = document.getElementById('inputJumlahSiswa').value;
    const mitra = document.getElementById('inputMitraGuru').value.trim();

    const tr = document.createElement('tr');
    tr.className = 'guru-row hover:bg-slate-50/70 align-top bg-sky-50/40';
    tr.innerHTML = `
      <td class="py-4 px-4"><div class="font-extrabold text-slate-900">${nama}</div><div class="text-[10px] text-emerald-600 font-bold mt-0.5">Penugasan Baru</div></td>
      <td class="py-4 px-3"><span class="inline-block px-2 py-0.5 rounded bg-sky-100 text-sky-800 text-[10px] font-extrabold">${jurusan}</span></td>
      <td class="py-4 px-3 font-black text-slate-900">${jumlah} <span class="text-[11px] font-semibold text-slate-500">Siswa</span></td>
      <td class="py-4 px-3 font-extrabold text-slate-800">${mitra}</td>
      <td class="py-4 px-3 font-bold text-sky-700">0 / 1 Mitra (Baru)</td>
      <td class="py-4 px-3 font-bold text-slate-700">Menunggu Jurnal</td>
      <td class="py-4 px-3"><span class="spt-badge inline-flex items-center px-2.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-700 text-[10px] font-extrabold">Draft SPT</span></td>
      <td class="py-4 px-4 text-right"><button type="button" onclick="verifikasiSptRow(this, '${nama}')" class="px-2.5 py-1 rounded-lg bg-[#13294B] text-[10px] font-bold text-white">Verifikasi SPT</button></td>
    `;
    document.getElementById('guruTableBody').prepend(tr);

    const kpi = document.getElementById('kpiTotalGuru');
    kpi.textContent = String(parseInt(kpi.textContent || '18', 10) + 1);

    e.target.reset();
    closeModal('modalTambahGuru');
    showToast(`Penugasan ${nama} (${jurusan}) berhasil ditambahkan.`);
  }

  function handleAjukanKunjungan(e) {
    e.preventDefault();
    const tgl = document.getElementById('inputTanggalKunjungan').value.trim();
    const mitra = document.getElementById('inputMitraKunjungan').value.trim();
    const pembimbing = document.getElementById('inputPembimbingKunjungan').value.trim();

    const card = document.createElement('div');
    card.className = 'p-3.5 rounded-xl bg-sky-50/60 border border-sky-200 space-y-1';
    card.innerHTML = `<div class="text-[10px] font-extrabold text-sky-700">${tgl}</div><div class="font-extrabold text-slate-900">${mitra}</div><div class="text-[11px] text-sky-700 font-bold">${pembimbing}</div>`;
    document.getElementById('jadwalVisitasiList').prepend(card);

    e.target.reset();
    closeModal('modalAjukanKunjungan');
    showToast(`Jadwal kunjungan ke ${mitra} berhasil diajukan.`);
  }
</script>
@endpush