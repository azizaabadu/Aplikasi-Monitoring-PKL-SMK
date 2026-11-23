@extends('layouts.admin')

@section('title', 'Pengaturan Sekolah, Sinkronisasi Sistem & Akun Administrator - Portal PKL.ID')

@section('content')
  <!-- 1. Breadcrumb & Status -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
        <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
        <span>Beranda</span>
      </a>
      <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Pengaturan Sekolah &amp; Akun</span>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 text-[11px]">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold tracking-wide">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
        SINKRONISASI AKTIF: 14 MENIT LALU
      </span>
      <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">
        ID UNIT: SMKN1-BTM-HUBIN
      </span>
    </div>
  </div>

  <!-- 2. Hero Header & Tombol Aksi -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="space-y-2.5 max-w-2xl">
      <div class="flex flex-wrap items-center gap-2">
        <span class="px-2.5 py-0.5 rounded bg-slate-100 border border-slate-200 text-slate-700 text-[9px] font-extrabold uppercase tracking-wider">
          SISTEM TATA KELOLA PKL VOKASI
        </span>
        <span class="px-2.5 py-0.5 rounded bg-sky-50 border border-sky-200 text-sky-700 text-[9px] font-extrabold tracking-wider">
          v2.4.8-RELEASE
        </span>
      </div>

      <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
        Pengaturan Sekolah, Sinkronisasi Sistem &amp; Akun Administrator
      </h1>

      <p class="text-xs text-slate-500 leading-relaxed">
        Konfigurasi profil kelembagaan SMK Negeri 1 Batam, manajemen integrasi API Kemendikbudristek/Dapodik/BSrE, parameter periode PKL Tahun Ajaran 2024/2025, serta pengaturan hak akses pengguna.
      </p>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 shrink-0">
      <button type="button" onclick="openInfoModal('Riwayat Log Aktivitas', '1. 08:30 WIB — Sinkronisasi rombel Dapodik berhasil oleh Drs. H. Mulyadi, M.T.\n2. Kemarin, 16:10 WIB — Pembaruan formula nilai akhir (60% DUDI / 40% Sekolah).')" class="px-4 py-2.5 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-2 transition">
        <i class="fa-solid fa-clock-rotate-left text-slate-500 text-xs"></i>
        <span>Riwayat Log Aktivitas</span>
      </button>

      <button type="button" onclick="showToast('Seluruh pengaturan sekolah, sinkronisasi, dan periode PKL berhasil disimpan.')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center gap-2 shadow-xs transition">
        <i class="fa-regular fa-floppy-disk text-xs text-sky-300"></i>
        <span>Simpan Seluruh Pengaturan</span>
      </button>
    </div>
  </div>

  <!-- 3. Tab Navigasi Pengaturan -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-2 shadow-xs overflow-x-auto">
    <div class="flex items-center gap-1.5 min-w-max text-xs">
      <button type="button" data-tab="tabProfil" onclick="switchPengaturanTab(this, 'tabProfil')" class="pengaturan-tab px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold flex items-center gap-2">
        <i class="fa-solid fa-school text-[11px] text-sky-300"></i>
        <span>1. Profil Sekolah &amp; Legalitas</span>
      </button>

      <button type="button" data-tab="tabApi" onclick="switchPengaturanTab(this, 'tabApi')" class="pengaturan-tab px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition">
        <i class="fa-solid fa-arrows-rotate text-[11px] text-slate-400"></i>
        <span>2. Sinkronisasi API Dapodik &amp; Vokasi</span>
        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
      </button>

      <button type="button" data-tab="tabPeriode" onclick="switchPengaturanTab(this, 'tabPeriode')" class="pengaturan-tab px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition">
        <i class="fa-regular fa-calendar-days text-[11px] text-slate-400"></i>
        <span>3. Periode &amp; Bobot Penilaian PKL</span>
      </button>

      <button type="button" data-tab="tabAkun" onclick="switchPengaturanTab(this, 'tabAkun')" class="pengaturan-tab px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition">
        <i class="fa-solid fa-users-gear text-[11px] text-slate-400"></i>
        <span>4. Manajemen Akun &amp; Akses</span>
      </button>
    </div>
  </div>

  <!-- 4. Grid Konten Utama -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-start">
    <div class="lg:col-span-7 space-y-5">
      <!-- Bagian 1: Identitas -->
      <section id="tabProfil" class="pengaturan-panel bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-4">
        <div class="flex items-start justify-between gap-3">
          <div>
            <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">BAGIAN 1</div>
            <h2 class="text-sm sm:text-base font-black text-slate-900">Data Identitas Satuan Pendidikan</h2>
          </div>
          <span class="px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">TERVERIFIKASI BAN-S/M</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 text-xs">
          <div class="sm:col-span-8 space-y-1">
            <label class="block text-[11px] font-bold text-slate-600">Nama Resmi Lembaga</label>
            <input type="text" value="SMK Negeri 1 Batam" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl font-extrabold text-slate-900">
          </div>
          <div class="sm:col-span-4 space-y-1">
            <label class="block text-[11px] font-bold text-slate-600">NPSN</label>
            <input type="text" value="10403982" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl font-extrabold text-slate-900">
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
            <div class="text-[9px] font-extrabold uppercase text-slate-400">KEPALA SEKOLAH</div>
            <div class="text-xs font-black text-slate-900 mt-0.5">Dr. Ir. Dwi Santoso, M.T.</div>
            <div class="text-[10px] text-slate-500">NIP. 19740912 199803 1 002</div>
          </div>
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
            <div class="text-[9px] font-extrabold uppercase text-slate-400">KOORDINATOR HUBIN</div>
            <div class="text-xs font-black text-slate-900 mt-0.5">Drs. H. Mulyadi, M.T.</div>
            <div class="text-[10px] text-slate-500">NIP. 19710404 199702 1 001</div>
          </div>
        </div>
      </section>

      <!-- Bagian 3: Periode & Bobot -->
      <section id="tabPeriode" class="pengaturan-panel bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-4">
        <div class="flex items-start justify-between gap-3">
          <div>
            <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">BAGIAN 3</div>
            <h2 class="text-sm sm:text-base font-black text-slate-900">Parameter Periode Pelaksanaan &amp; Bobot Nilai</h2>
          </div>
          <span class="px-3 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-800 text-[10px] font-extrabold">SEMESTER GENAP T.A. 2024/2025</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
            <div class="text-[9px] font-extrabold uppercase text-slate-400">TANGGAL MULAI PKL</div>
            <div class="font-black text-slate-900 mt-1">02 Januari 2025</div>
          </div>
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
            <div class="text-[9px] font-extrabold uppercase text-slate-400">TANGGAL SELESAI PKL</div>
            <div class="font-black text-slate-900 mt-1">24 Juni 2025</div>
          </div>
          <div class="p-3.5 rounded-xl bg-teal-50/70 border border-teal-200/80">
            <div class="text-[9px] font-extrabold uppercase text-teal-700">TOTAL DURASI</div>
            <div class="font-black text-teal-900 mt-1">6 Bulan (800 JP)</div>
          </div>
        </div>

        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2 text-xs">
          <div class="font-black text-slate-900">Formula Pembobotan: (N.DUDI &times; 60%) + (N.Sekolah &times; 40%) &bull; KKM 75.00</div>
          <div class="grid grid-cols-2 gap-2 text-[11px] font-extrabold">
            <div class="px-3 py-2 rounded-lg bg-[#13294B] text-white flex justify-between"><span>Evaluasi Mitra DUDI</span><span>60%</span></div>
            <div class="px-3 py-2 rounded-lg bg-sky-100 text-sky-900 flex justify-between"><span>Evaluasi Guru &amp; Laporan</span><span>40%</span></div>
          </div>
        </div>
      </section>

      <!-- Bagian 4: Manajemen Akun & Akses -->
      <section id="tabAkun" class="pengaturan-panel hidden bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-3 text-xs">
        <h2 class="text-sm font-black text-slate-900">Manajemen Akun &amp; Hak Akses</h2>
        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between">
          <div>
            <div class="font-extrabold text-slate-900">Drs. H. Mulyadi, M.T.</div>
            <div class="text-[10px] text-slate-500">Role: Admin Hubin &bull; Akses Penuh Sistem</div>
          </div>
          <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-extrabold">Aktif</span>
        </div>
      </section>
    </div>

    <div class="lg:col-span-5 space-y-5">
      <!-- Bagian 2: API Dapodik -->
      <section id="tabApi" class="pengaturan-panel bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-4 text-xs">
        <div class="flex items-start justify-between gap-2">
          <div>
            <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">BAGIAN 2</div>
            <h2 class="text-sm sm:text-base font-black text-slate-900">API Dapodik &amp; Ditjen Vokasi</h2>
          </div>
          <span class="px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">TERHUBUNG AKTIF</span>
        </div>

        <div class="px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 font-mono text-[11px] font-bold text-slate-700 truncate">
          https://api.vokasi.kemdikbud.go.id/v2
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
          <button type="button" onclick="showToast('Koneksi API Dapodik & Ditjen Vokasi normal (42ms).')" class="px-3 py-2 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700">
            Uji Koneksi API
          </button>
          <button type="button" onclick="showToast('Data rombel & guru pembimbing berhasil ditarik.')" class="px-3 py-2 rounded-xl bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-extrabold">
            Tarik Rombel &amp; Guru
          </button>
        </div>
      </section>

      <!-- TTE & BSRE -->
      <section class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-3.5 text-xs">
        <div class="flex items-start justify-between gap-2">
          <div>
            <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">BAGIAN 4</div>
            <h2 class="text-sm sm:text-base font-black text-slate-900">Tanda Tangan Elektronik &amp; BSRE</h2>
          </div>
          <span class="px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">SERTIFIKAT VALID</span>
        </div>

        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 text-[11px]">
          <div class="font-black text-slate-900">Dr. Ir. Dwi Santoso, M.T.</div>
          <div class="text-[10px] text-slate-500">Serial: 9021-TTE-BSRE-SMK1 &bull; Berlaku s.d. 31 Des 2026</div>
        </div>

        <button type="button" onclick="showToast('Sertifikat digital BSrE siap diperbarui melalui berkas .p12 / .crt.')" class="w-full py-2.5 px-4 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-extrabold text-slate-800">
          Perbarui Sertifikat Digital BSrE (.p12 / .crt)
        </button>
      </section>

      <!-- Sesi Admin -->
      <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-2 text-xs">
        <div class="flex items-center justify-between">
          <h2 class="text-xs font-black text-slate-900">Aktivitas Sesi Admin Saat Ini</h2>
          <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 text-[10px] font-extrabold">Aman</span>
        </div>
        <div class="text-[11px] text-slate-600 space-y-1">
          <div>IP: <strong class="font-mono text-slate-800">103.164.172.82</strong></div>
          <div>Masa Berlaku Token: <strong class="text-slate-800">05 Jam 42 Menit</strong></div>
        </div>
      </section>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  function switchPengaturanTab(btn, targetId) {
    document.querySelectorAll('.pengaturan-tab').forEach(el => {
      el.className = 'pengaturan-tab px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition';
    });
    btn.className = 'pengaturan-tab px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold flex items-center gap-2';

    if (targetId === 'tabAkun') {
      document.getElementById('tabAkun').classList.remove('hidden');
    } else {
      document.getElementById('tabAkun').classList.add('hidden');
      const panel = document.getElementById(targetId);
      if (panel) panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
  }
</script>
@endpush