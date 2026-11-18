@extends('layouts.student')

@section('title', 'Informasi Siswa & Profil Mitra DUDI - Portal PKL.ID')

@section('content')
<div class="space-y-6">

  <!-- 1. HEADER & TOMBOL AKSI ATAS -->
  <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
        <span>Beranda</span>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Data Siswa & DUDI</span>
      </div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Informasi Siswa & Profil Mitra DUDI</h1>
      <p class="text-xs text-slate-500 mt-1">Sinkronisasi biodata resmi vokasi dengan basis data operasional tempat Praktik Kerja Lapangan (PKL).</p>
    </div>
    <div class="flex items-center gap-2.5">
      <button onclick="alert('Membuka modal pembaruan kontak darurat...')" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-address-book text-slate-500"></i>
        Perbarui Kontak Darurat
      </button>
      <button onclick="alert('Mencetak Surat Penempatan PKL resmi...')" class="px-4 py-2.5 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-print text-sky-400"></i>
        Cetak Surat Penempatan PKL
      </button>
    </div>
  </div>

  <!-- 2. BANNER STATUS PENEMPATAN TERKUNCI (Sesuai Aturan PRD T6, T7 & 6.1) -->
  <div class="bg-sky-50/70 border border-sky-200/80 rounded-2xl p-4 flex flex-col lg:flex-row lg:items-center justify-between gap-3">
    <div class="flex items-start sm:items-center gap-3">
      <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center shrink-0">
        <i class="fa-solid fa-circle-check text-lg"></i>
      </div>
      <div>
        <div class="flex items-center gap-2 flex-wrap">
          <span class="text-xs font-extrabold text-slate-900">Status Penempatan: Disetujui & Terkunci</span>
          <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-extrabold">● Sah & Aktif</span>
        </div>
        <p class="text-[11px] text-slate-600 mt-0.5">
          Nomor Surat: 421.5/SMKN1-BTM/PKL-DUDI/2026/084 • Periode PKL: 06 Jan 2026 – 06 Jun 2026 (Tahun Ajaran 2026/2027)
        </p>
      </div>
    </div>
    <div class="flex items-center gap-2 self-start lg:self-center">
      <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status Data:</span>
      <span class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-emerald-700 font-extrabold text-[10px] flex items-center gap-1.5 shadow-sm">
        <i class="fa-solid fa-lock text-emerald-600"></i> TERKUNCI KEPALA SEKOLAH
      </span>
    </div>
  </div>

  <!-- 3. GRID UTAMA (KIRI: BIODATA, GURU, WALI | KANAN: MITRA DUDI, MENTOR, REKAN, FASILITAS) -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- KOLOM KIRI (6 Kolom) -->
    <div class="lg:col-span-6 space-y-6">
      
      <!-- KARTU BIODATA SISWA (Tabel: users, siswa, jurusan) -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5">
        <div class="flex items-start gap-4">
          <div class="relative shrink-0">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-sky-600 to-[#0F1E38] text-white font-extrabold text-xl flex items-center justify-center shadow-md">
              RP
            </div>
            <span class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full bg-emerald-500 border-2 border-white text-white flex items-center justify-center text-[9px]">
              <i class="fa-solid fa-check"></i>
            </span>
          </div>
          <div class="space-y-1 flex-1 min-w-0">
            <div class="flex items-center gap-2 flex-wrap">
              <h2 class="text-lg font-extrabold text-slate-900">Rizky Pratama</h2>
              <span class="px-2.5 py-0.5 rounded-md bg-sky-50 text-sky-700 border border-sky-200 text-[10px] font-extrabold">Kelas XII PPLG 1</span>
            </div>
            <div class="text-xs text-slate-500 font-medium">SMK Negeri 1 Batam • Rekayasa Perangkat Lunak & Gim</div>
            <div class="flex flex-wrap items-center gap-3 pt-1 text-[11px] text-slate-600">
              <span>NIS / NISN: <strong class="text-slate-900">0058291823</strong></span>
              <span>•</span>
              <span>Periode: <strong class="text-sky-700">2026/2027</strong></span>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 border-t border-slate-100">
          <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60">
            <div class="text-[10px] font-bold text-slate-400 uppercase">Email / Akun Siswa</div>
            <div class="text-xs font-bold text-slate-800 mt-1 flex items-center gap-1.5 truncate">
              <i class="fa-regular fa-envelope text-sky-600"></i>
              <span class="truncate">rizky.pratama@smkn1batam.sch.id</span>
            </div>
          </div>
          <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60">
            <div class="text-[10px] font-bold text-slate-400 uppercase">No. Telepon / WhatsApp</div>
            <div class="text-xs font-bold text-slate-800 mt-1 flex items-center gap-1.5">
              <i class="fa-brands fa-whatsapp text-emerald-600"></i>
              <span>+62 813-7281-9921</span>
            </div>
          </div>
        </div>

        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-1">
          <div class="text-[10px] font-bold text-slate-400 uppercase">Alamat Domisili Siswa</div>
          <div class="text-xs font-semibold text-slate-700 flex items-start gap-2">
            <i class="fa-solid fa-location-dot text-rose-500 mt-0.5 shrink-0"></i>
            <span>Perumahan Taman Raya Blok FE No. 18, Kel. Belian, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29464</span>
          </div>
        </div>
      </div>

      <!-- KARTU GURU PEMBIMBING SEKOLAH (Tabel: guru) -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-chalkboard-user text-sky-600"></i>
            Guru Pembimbing Sekolah
          </h3>
          <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-[10px] font-bold">Fasilitator PKL</span>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-800 font-extrabold flex items-center justify-center text-sm shrink-0">
              SW
            </div>
            <div>
              <div class="text-sm font-extrabold text-slate-900">Dra. Sri Wahyuni, M.Pd</div>
              <div class="text-[11px] text-slate-500">NIP. 19780312 200312 2 004</div>
              <div class="text-[11px] text-sky-700 font-semibold mt-0.5">Koordinator Kurikulum Vokasi RPL</div>
            </div>
          </div>
          <div class="flex items-center gap-2">
            <a href="https://wa.me/628120000000" target="_blank" title="Hubungi via WhatsApp" class="w-9 h-9 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 flex items-center justify-center transition">
              <i class="fa-brands fa-whatsapp text-sm"></i>
            </a>
            <a href="mailto:sri.wahyuni@smkn1batam.sch.id" title="Kirim Email" class="w-9 h-9 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-700 border border-slate-200 flex items-center justify-center transition">
              <i class="fa-regular fa-envelope text-sm"></i>
            </a>
            <button onclick="alert('Menampilkan jadwal kunjungan monitoring guru (K3)...')" class="px-3 py-2 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold transition flex items-center gap-1.5 shadow-sm">
              <i class="fa-regular fa-calendar-check text-sky-400"></i> Jadwal Visitasi
            </button>
          </div>
        </div>

        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-start gap-2.5 text-xs text-slate-600">
          <i class="fa-solid fa-circle-info text-sky-600 mt-0.5 shrink-0"></i>
          <span>Monitoring berkala oleh guru pembimbing dilakukan setiap <strong>2 pekan sekali</strong> secara luring maupun melalui evaluasi logbook pada portal PKL.</span>
        </div>
      </div>

      <!-- KARTU KONTAK DARURAT ORANG TUA / WALI (Tabel: orang_tua_siswa) -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-kit-medical text-rose-500"></i>
            Kontak Darurat Orang Tua / Wali
          </h3>
          <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Terhubung Akun Wali</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 items-center">
          <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60">
            <div class="text-[10px] font-bold text-slate-400 uppercase">Nama Wali</div>
            <div class="text-xs font-extrabold text-slate-900 mt-0.5">Bpk. Bambang Pratama</div>
            <div class="text-[10px] text-slate-500">Hubungan: Ayah Kandung</div>
          </div>

          <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60">
            <div class="text-[10px] font-bold text-slate-400 uppercase">Nomor Telepon</div>
            <div class="text-xs font-extrabold text-slate-900 mt-0.5">0812-3456-7890</div>
            <div class="text-[10px] text-emerald-600 font-bold">● Siaga 24 Jam</div>
          </div>

          <div>
            <a href="tel:081234567890" class="w-full py-3 px-3 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 font-extrabold text-xs transition flex items-center justify-center gap-1.5">
              <i class="fa-solid fa-phone-volume"></i> Panggil Sekarang
            </a>
          </div>
        </div>
      </div>

    </div>

    <!-- KOLOM KANAN (6 Kolom) -->
    <div class="lg:col-span-6 space-y-6">
      
      <!-- KARTU PROFIL MITRA INDUSTRI / DUDI (Tabel: mitra) -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5">
        <div class="flex items-start justify-between gap-3">
          <div class="flex items-start gap-3.5">
            <div class="w-12 h-12 rounded-2xl bg-slate-100 text-[#0F1E38] flex items-center justify-center text-xl border border-slate-200 shrink-0">
              <i class="fa-solid fa-building"></i>
            </div>
            <div>
              <div class="flex items-center gap-1.5">
                <h2 class="text-base font-extrabold text-slate-900">PT Solusi Teknologi Nusantara</h2>
                <i class="fa-solid fa-circle-check text-sky-600 text-xs" title="Mitra Terverifikasi"></i>
              </div>
              <p class="text-xs text-slate-500 mt-0.5">Bidang Usaha: Industri Perangkat Lunak & Konsultan Teknologi Informasi</p>
            </div>
          </div>
          <span class="px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200 text-[10px] font-extrabold shrink-0">
            MITRA AKTIF
          </span>
        </div>

        <!-- Preview Lokasi / Peta -->
        <div class="space-y-2">
          <div class="flex items-center justify-between text-[11px]">
            <span class="font-bold text-slate-400 uppercase tracking-wider">Lokasi Penempatan Kantor</span>
            <a href="https://maps.google.com" target="_blank" class="text-sky-600 hover:underline font-bold flex items-center gap-1">
              Buka di Google Maps <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
            </a>
          </div>
          <div class="relative rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 p-4 flex flex-col justify-between h-32">
            <div class="flex items-center justify-between text-xs text-slate-500">
              <span class="bg-white/90 backdrop-blur px-2.5 py-1 rounded-lg font-bold text-slate-700 shadow-sm">
                <i class="fa-solid fa-map-pin text-rose-500 mr-1"></i> Kawasan Industri Batam Center
              </span>
              <span class="bg-white/90 backdrop-blur px-2 py-1 rounded-lg text-[10px] font-bold text-slate-600 shadow-sm">
                Kontak: (0778) 451-890
              </span>
            </div>
            <div class="bg-white/95 backdrop-blur p-2.5 rounded-xl border border-slate-200/80 shadow-sm flex items-center gap-2 text-xs font-semibold text-slate-800">
              <i class="fa-solid fa-location-dot text-rose-600 shrink-0"></i>
              <span class="truncate">Batam Center Industrial Park Blok C-12, Jl. Raja Isa, Kota Batam 29461</span>
            </div>
          </div>
        </div>

        <!-- Jam Kerja & Hari Libur Mitra (Sesuai Aturan 6.6) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-white border border-slate-200 text-sky-600 flex items-center justify-center shrink-0">
              <i class="fa-regular fa-clock"></i>
            </div>
            <div>
              <div class="text-[10px] font-bold text-slate-400 uppercase">Jam Kerja Operasional</div>
              <div class="text-xs font-extrabold text-slate-900 mt-0.5">Senin – Jumat, 08:00 – 17:00</div>
            </div>
          </div>
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-white border border-slate-200 text-sky-600 flex items-center justify-center shrink-0">
              <i class="fa-solid fa-briefcase"></i>
            </div>
            <div>
              <div class="text-[10px] font-bold text-slate-400 uppercase">Ketentuan Hari Kerja</div>
              <div class="text-xs font-extrabold text-slate-900 mt-0.5">5 Hari Kerja (Sabtu & Minggu Libur)</div>
            </div>
          </div>
        </div>
      </div>

      <!-- KARTU PEMBIMBING LAPANGAN / MENTOR DUDI (Tabel: pembimbing_dudi) -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-user-tie text-sky-600"></i>
            Pembimbing Lapangan / Mentor DUDI
          </h3>
          <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-extrabold">Terhubung</span>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-xl bg-[#0F1E38] text-white font-extrabold flex items-center justify-center text-sm shrink-0">
              AF
            </div>
            <div>
              <div class="flex items-center gap-1.5">
                <span class="text-sm font-extrabold text-slate-900">Ahmad Fauzi, S.Kom</span>
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
              </div>
              <div class="text-[11px] text-slate-500">Lead Software Engineer • Divisi Web & API</div>
              <div class="text-[11px] text-sky-700 font-semibold mt-0.5">Pengesah Logbook & Penilai Lapangan</div>
            </div>
          </div>
          <div class="flex items-center gap-2">
            <a href="https://wa.me/628130000000" target="_blank" class="px-3.5 py-2 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold transition flex items-center gap-1.5 shadow-sm">
              <i class="fa-brands fa-whatsapp text-emerald-400"></i> Hubungi Mentor
            </a>
            <a href="mailto:ahmad.fauzi@solusitek.co.id" class="w-9 h-9 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-700 border border-slate-200 flex items-center justify-center transition">
              <i class="fa-regular fa-envelope text-sm"></i>
            </a>
          </div>
        </div>

        <!-- Ringkasan Validasi Logbook & Umpan Balik DUDI -->
        <div class="grid grid-cols-2 gap-3 pt-2">
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 text-center">
            <div class="text-[10px] font-bold text-slate-400 uppercase">Logbook Disahkan</div>
            <div class="text-xl font-black text-slate-900 mt-0.5">24 / 24</div>
            <div class="text-[10px] font-bold text-emerald-600 mt-0.5">100% Tervalidasi (L3)</div>
          </div>
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 text-center">
            <div class="text-[10px] font-bold text-slate-400 uppercase">Umpan Balik DUDI</div>
            <div class="text-xl font-black text-slate-900 mt-0.5">2 Catatan</div>
            <div class="text-[10px] font-bold text-sky-700 mt-0.5">Apresiasi & Saran (U5)</div>
          </div>
        </div>
      </div>

      <!-- KARTU REKAN SATU TIM PENEMPATAN -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-users text-sky-600"></i>
            Rekan Satu Mitra Penempatan (3 Siswa)
          </h3>
          <span class="text-[11px] font-semibold text-slate-500">Jurusan PPLG</span>
        </div>

        <div class="space-y-2.5 text-xs">
          <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-full bg-[#0F1E38] text-white font-bold flex items-center justify-center text-[11px]">RP</div>
              <div>
                <div class="font-extrabold text-slate-900">Rizky Pratama <span class="ml-1 px-1.5 py-0.5 rounded bg-sky-100 text-sky-800 text-[9px]">Anda</span></div>
                <div class="text-[11px] text-slate-500">Divisi Backend & Database Intern</div>
              </div>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold">Check-in: Hadir</span>
          </div>

          <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-full bg-teal-700 text-white font-bold flex items-center justify-center text-[11px]">FR</div>
              <div>
                <div class="font-extrabold text-slate-900">Fani Rahmawati</div>
                <div class="text-[11px] text-slate-500">Divisi Frontend Web Intern</div>
              </div>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold">Check-in: Hadir</span>
          </div>

          <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-full bg-indigo-700 text-white font-bold flex items-center justify-center text-[11px]">DS</div>
              <div>
                <div class="font-extrabold text-slate-900">Dimas Setiawan</div>
                <div class="text-[11px] text-slate-500">Divisi QA Testing & Technical Docs</div>
              </div>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold">Check-in: Hadir</span>
          </div>
        </div>
      </div>

      <!-- KARTU FASILITAS & KETENTUAN DUDI -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-clipboard-list text-sky-600"></i>
            Fasilitas & Ketentuan DUDI
          </h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
          <div class="p-3.5 rounded-xl bg-sky-50/60 border border-sky-200/70 space-y-1.5">
            <div class="w-7 h-7 rounded-lg bg-sky-100 text-sky-700 flex items-center justify-center">
              <i class="fa-solid fa-code-branch text-xs"></i>
            </div>
            <div class="font-extrabold text-slate-900">Akses GitLab & VPN</div>
            <p class="text-[11px] text-slate-600 leading-snug">Akses repository aktif grup pkl-2026</p>
          </div>

          <div class="p-3.5 rounded-xl bg-emerald-50/60 border border-emerald-200/70 space-y-1.5">
            <div class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center">
              <i class="fa-solid fa-id-card text-xs"></i>
            </div>
            <div class="font-extrabold text-slate-900">Kartu Akses Gedung</div>
            <p class="text-[11px] text-slate-600 leading-snug">ID Card #STN-PKL-024 Lantai 2</p>
          </div>

          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5">
            <div class="w-7 h-7 rounded-lg bg-slate-200 text-slate-700 flex items-center justify-center">
              <i class="fa-solid fa-shield-halved text-xs"></i>
            </div>
            <div class="font-extrabold text-slate-900">Keselamatan Kerja (K3)</div>
            <p class="text-[11px] text-slate-600 leading-snug">Standar SOP & perlindungan peserta PKL aktif</p>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
@endsection