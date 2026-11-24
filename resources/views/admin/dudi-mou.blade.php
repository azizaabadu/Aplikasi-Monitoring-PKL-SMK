@extends('layouts.admin')

@section('title', 'Kelola Mitra DUDI & Kuota - Portal PKL.ID')

@section('content')
  <!-- Breadcrumb & Status -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
        <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
        <span>Beranda</span>
      </a>
      <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Kelola Mitra DUDI &amp; Kuota</span>
    </div>

    <div class="flex flex-wrap items-center gap-2">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-700 text-[10px] font-extrabold tracking-wide">
        <i class="fa-solid fa-calendar-check text-sky-600"></i>
        PERIODE PKL T.A. 2026/2027
      </span>
      <button type="button" onclick="openModal('modalUsulanMitra')" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-50 hover:bg-amber-100 border border-amber-200 text-amber-800 text-[10px] font-extrabold tracking-wide transition">
        <i class="fa-solid fa-clock-rotate-left"></i>
        <span>3 Usulan Mitra Siswa Menunggu Verifikasi</span>
      </button>
    </div>
  </div>

  <!-- Header & Aksi -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="flex items-start gap-3.5 max-w-2xl">
      <div class="w-1.5 h-14 rounded-full bg-[#13294B] shrink-0 mt-1"></div>
      <div>
        <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
          Data Mitra DUDI, Kuota Jurusan &amp; Akun Pembimbing
        </h1>
        <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
          Kelola profil perusahaan/instansi mitra, atur kuota penerimaan per jurusan pada periode aktif, buat akun pembimbing lapangan (DUDI), serta tinjau riwayat kerja sama tahun ke tahun.
        </p>
      </div>
    </div>

    <div class="flex flex-wrap lg:flex-col items-stretch sm:items-center lg:items-stretch gap-2 shrink-0 min-w-[215px]">
      <button type="button" onclick="openModal('modalTambahPembimbingDudi')" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-solid fa-user-tie text-sky-600"></i>
        <span>Buat Akun Pembimbing DUDI</span>
      </button>

      <button type="button" onclick="exportDudiRekap()" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-solid fa-file-export text-slate-500"></i>
        <span>Ekspor Data Mitra &amp; Kuota</span>
      </button>

      <button type="button" onclick="openModal('modalTambahMitra')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center justify-center gap-2 shadow-xs transition">
        <i class="fa-solid fa-plus text-xs"></i>
        <span>Tambah Mitra DUDI Baru</span>
      </button>
    </div>
  </div>

  <!-- 4 KPI -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">MITRA DUDI AKTIF</span>
        <span class="w-9 h-9 rounded-xl bg-slate-100 text-[#13294B] flex items-center justify-center text-sm"><i class="fa-solid fa-building"></i></span>
      </div>
      <div id="kpiTotalMitra" class="text-3xl font-black text-slate-900">64</div>
      <div class="text-[11px] text-slate-500">Mitra Diarsipkan (Nonaktif): <strong class="text-slate-800">9</strong></div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">AKUN PEMBIMBING DUDI</span>
        <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm"><i class="fa-solid fa-user-tie"></i></span>
      </div>
      <div class="text-3xl font-black text-slate-900">82</div>
      <div class="text-[11px] text-slate-500">Terhubung ke masing-masing mitra</div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">USULAN MITRA SISWA (T8)</span>
        <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-sm"><i class="fa-solid fa-hourglass-half"></i></span>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-slate-900">3</span>
        <span class="text-xs font-bold text-amber-600">Menunggu Verifikasi</span>
      </div>
      <div class="flex items-center justify-between text-[11px]">
        <span class="text-slate-500">Diajukan mandiri oleh siswa</span>
        <button type="button" onclick="openModal('modalUsulanMitra')" class="font-extrabold text-sky-700 hover:underline">Tinjau</button>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">TOTAL KUOTA PERIODE INI</span>
        <span class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-sm"><i class="fa-solid fa-briefcase"></i></span>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-slate-900">445</span>
        <span class="text-xs font-semibold text-slate-400">Kursi Siswa</span>
      </div>
      <div class="space-y-1.5">
        <div class="flex items-center justify-between text-[10px]">
          <span class="text-slate-500">Terisi: <strong class="text-slate-800">398</strong> (89,4%)</span>
          <span class="px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 font-extrabold">Sisa 47 Kursi</span>
        </div>
        <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
          <div class="h-full rounded-full bg-teal-600" style="width: 89.4%"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Filter & Pencarian (PRD D3) -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-xs space-y-3">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-3">
      <div class="lg:col-span-5 relative">
        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
        <input id="dudiSearchInput" oninput="applyDudiFilter()" type="text" placeholder="Cari nama mitra, alamat/wilayah, atau bidang usaha..." class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-sky-500">
      </div>
      <div class="lg:col-span-3">
        <select id="dudiJurusanSelect" onchange="applyDudiFilter()" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700">
          <option value="">Semua Jurusan</option>
          <option value="PPLG">PPLG</option>
          <option value="TJKT">TJKT</option>
          <option value="DKV">DKV</option>
          <option value="Animasi">Animasi</option>
        </select>
      </div>
      <div class="lg:col-span-2">
        <select id="dudiStatusSelect" onchange="applyDudiFilter()" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700">
          <option value="">Semua Status Mitra</option>
          <option value="Aktif">Aktif</option>
          <option value="Nonaktif">Nonaktif (Arsip)</option>
        </select>
      </div>
      <div class="lg:col-span-2">
        <button type="button" onclick="resetDudiFilter()" class="w-full px-3 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-600 flex items-center justify-center gap-1.5">
          <i class="fa-solid fa-rotate-left text-[10px]"></i>
          <span>Reset Filter</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Daftar Kartu Mitra -->
  <div id="dudiCardsList" class="space-y-4">
    <article class="dudi-card bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">
        <div class="flex items-start gap-3.5">
          <div class="w-11 h-11 rounded-xl bg-sky-50 border border-sky-200/80 text-sky-600 flex items-center justify-center text-base shrink-0">
            <i class="fa-solid fa-microchip"></i>
          </div>
          <div class="space-y-1">
            <div class="flex flex-wrap items-center gap-2">
              <h3 class="text-base font-black text-slate-900">PT Solusi Teknologi Nusantara</h3>
              <span class="status-mitra-badge inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
                <i class="fa-solid fa-circle text-[7px] text-emerald-500"></i> Aktif
              </span>
            </div>
            <p class="text-xs text-slate-600">Bidang Usaha: Software Development &amp; Cloud Infrastructure</p>
            <p class="text-[11px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Batam Center Industrial Park Blok C-12, Kota Batam</p>
            <p class="text-[11px] text-slate-500"><i class="fa-solid fa-phone mr-1 text-slate-400"></i>Kontak: 0812-7788-1024 (hrd@solusiteknologi.co.id)</p>
          </div>
        </div>

        <!-- Kuota per Jurusan & Sisa Kuota (PRD D1 & D3) -->
        <div class="lg:text-right bg-slate-50 border border-slate-200/80 rounded-xl px-4 py-3 shrink-0 space-y-1.5">
          <div class="text-[9px] font-extrabold uppercase text-slate-400">KUOTA PER JURUSAN (PERIODE AKTIF)</div>
          <div class="flex flex-wrap lg:justify-end gap-1.5 text-[10px] font-extrabold">
            <span class="px-2 py-0.5 rounded bg-sky-100 text-sky-800">PPLG: 10/12 (Sisa 2)</span>
            <span class="px-2 py-0.5 rounded bg-indigo-100 text-indigo-800">DKV: 4/4 (Penuh)</span>
          </div>
          <div class="text-[10px] text-slate-500">Total Terisi: <strong class="text-slate-800">14 / 16 Kursi</strong></div>
        </div>
      </div>

      <div class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex items-center gap-2.5 text-xs">
          <span class="w-7 h-7 rounded-full bg-slate-200 text-slate-700 font-extrabold text-[10px] flex items-center justify-center">
            <i class="fa-solid fa-user-tie"></i>
          </span>
          <span class="text-slate-500">Pembimbing Lapangan DUDI: <strong class="text-slate-800">Ahmad Fauzi, S.Kom</strong> (Head of Engineering)</span>
        </div>

        <div class="flex flex-wrap items-center gap-2">
          <button type="button" onclick="openInfoModal('Riwayat Kerja Sama Mitra (D5)', 'PT Solusi Teknologi Nusantara:\n• T.A. 2024/2025: 12 Siswa (Rata-rata nilai: 89.4, Apresiasi: 8)\n• T.A. 2025/2026: 15 Siswa (Rata-rata nilai: 90.1, Apresiasi: 11)\n• T.A. 2026/2027: 14 Siswa (Berjalan)')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5">
            <i class="fa-solid fa-clock-rotate-left text-slate-400"></i>
            <span>Riwayat Kerja Sama</span>
          </button>
          <button type="button" onclick="openModal('modalAturKuota')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5">
            <i class="fa-solid fa-sliders text-sky-600"></i>
            <span>Atur Kuota Jurusan</span>
          </button>
          <button type="button" onclick="toggleStatusMitra(this, 'PT Solusi Teknologi Nusantara')" class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-700 text-[11px] font-bold flex items-center gap-1.5">
            <i class="fa-solid fa-box-archive"></i>
            <span>Nonaktifkan</span>
          </button>
        </div>
      </div>
    </article>

    <article class="dudi-card bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">
        <div class="flex items-start gap-3.5">
          <div class="w-11 h-11 rounded-xl bg-teal-50 border border-teal-200 text-teal-600 flex items-center justify-center text-base shrink-0">
            <i class="fa-solid fa-network-wired"></i>
          </div>
          <div class="space-y-1">
            <div class="flex flex-wrap items-center gap-2">
              <h3 class="text-base font-black text-slate-900">PT Cyber Media Utama</h3>
              <span class="status-mitra-badge inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
                <i class="fa-solid fa-circle text-[7px] text-emerald-500"></i> Aktif
              </span>
            </div>
            <p class="text-xs text-slate-600">Bidang Usaha: Digital Creative Agency, Web Production &amp; UI/UX</p>
            <p class="text-[11px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Bengkong Harapan, Kota Batam</p>
            <p class="text-[11px] text-slate-500"><i class="fa-solid fa-phone mr-1 text-slate-400"></i>Kontak: 0813-6400-8821 (hr@cybermedia.id)</p>
          </div>
        </div>

        <div class="lg:text-right bg-slate-50 border border-slate-200/80 rounded-xl px-4 py-3 shrink-0 space-y-1.5">
          <div class="text-[9px] font-extrabold uppercase text-slate-400">KUOTA PER JURUSAN (PERIODE AKTIF)</div>
          <div class="flex flex-wrap lg:justify-end gap-1.5 text-[10px] font-extrabold">
            <span class="px-2 py-0.5 rounded bg-sky-100 text-sky-800">PPLG: 4/6 (Sisa 2)</span>
            <span class="px-2 py-0.5 rounded bg-purple-100 text-purple-800">Animasi: 5/6 (Sisa 1)</span>
          </div>
          <div class="text-[10px] text-slate-500">Total Terisi: <strong class="text-slate-800">9 / 12 Kursi</strong></div>
        </div>
      </div>

      <div class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex items-center gap-2.5 text-xs">
          <span class="w-7 h-7 rounded-full bg-slate-200 text-slate-700 font-extrabold text-[10px] flex items-center justify-center">
            <i class="fa-solid fa-user-tie"></i>
          </span>
          <span class="text-slate-500">Pembimbing Lapangan DUDI: <strong class="text-slate-800">Rian Kusuma, S.Ds.</strong> (Lead Designer)</span>
        </div>

        <div class="flex flex-wrap items-center gap-2">
          <button type="button" onclick="openInfoModal('Riwayat Kerja Sama Mitra (D5)', 'PT Cyber Media Utama:\n• T.A. 2025/2026: 8 Siswa (Rata-rata nilai: 87.5)\n• T.A. 2026/2027: 9 Siswa (Berjalan)')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5">
            <i class="fa-solid fa-clock-rotate-left text-slate-400"></i>
            <span>Riwayat Kerja Sama</span>
          </button>
          <button type="button" onclick="openModal('modalAturKuota')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5">
            <i class="fa-solid fa-sliders text-sky-600"></i>
            <span>Atur Kuota Jurusan</span>
          </button>
          <button type="button" onclick="toggleStatusMitra(this, 'PT Cyber Media Utama')" class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-700 text-[11px] font-bold flex items-center gap-1.5">
            <i class="fa-solid fa-box-archive"></i>
            <span>Nonaktifkan</span>
          </button>
        </div>
      </div>
    </article>
  </div>

  <!-- Modal Tambah Mitra DUDI (PRD D1) -->
  <div id="modalTambahMitra" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Tambah Mitra DUDI Baru</h3>
        <button type="button" onclick="closeModal('modalTambahMitra')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handleTambahMitra(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Nama Mitra / Perusahaan</label>
          <input id="inputNamaPerusahaan" name="nama" type="text" required placeholder="Contoh: PT Batam Cloud Systems" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Bidang Usaha</label>
          <input id="inputBidangUsaha" name="bidang_usaha" type="text" required placeholder="Contoh: Cloud Infrastructure & DevOps" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Alamat Lengkap</label>
          <input id="inputAlamatMitra" name="alamat" type="text" required placeholder="Contoh: Nongsa Digital Park, Batam" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Kontak PIC</label>
            <input id="inputKontakMitra" name="kontak" type="text" required placeholder="0812-xxxx-xxxx" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Jurusan &amp; Kuota Awal</label>
            <input id="inputKuotaMitra" name="kuota" type="text" required value="PPLG: 6" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
          </div>
        </div>
        <div class="flex justify-end gap-2 pt-2">
          <button type="button" onclick="closeModal('modalTambahMitra')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Simpan Mitra</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Buat Akun Pembimbing DUDI (PRD D2) -->
  <div id="modalTambahPembimbingDudi" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Buat Akun Pembimbing Lapangan (DUDI)</h3>
        <button type="button" onclick="closeModal('modalTambahPembimbingDudi')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handleTambahPembimbingDudi(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Mitra DUDI Terhubung</label>
          <select class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            <option>PT Solusi Teknologi Nusantara</option>
            <option>PT Cyber Media Utama</option>
            <option>PT Citra Tubindo Tbk</option>
          </select>
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Nama Pembimbing DUDI</label>
          <input type="text" required placeholder="Contoh: Budi Santoso, S.T." class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Jabatan</label>
            <input type="text" required placeholder="Supervisor IT" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Username Login</label>
            <input type="text" required placeholder="dudi_budi" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
          </div>
        </div>
        <div class="flex justify-end gap-2 pt-2">
          <button type="button" onclick="closeModal('modalTambahPembimbingDudi')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Buat Akun DUDI</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Atur Kuota & Usulan Mitra Siswa -->
  <div id="modalAturKuota" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Atur Kuota Mitra per Jurusan</h3>
        <button type="button" onclick="closeModal('modalAturKuota')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="space-y-2.5 text-xs">
        <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-200">
          <span class="font-bold text-slate-800">PPLG</span>
          <input type="number" min="0" value="12" class="w-20 px-2.5 py-1 border border-slate-200 rounded-lg text-right font-bold">
        </div>
        <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-200">
          <span class="font-bold text-slate-800">DKV</span>
          <input type="number" min="0" value="4" class="w-20 px-2.5 py-1 border border-slate-200 rounded-lg text-right font-bold">
        </div>
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal('modalAturKuota')" class="px-3.5 py-2 rounded-xl border border-slate-200 text-xs font-bold">Batal</button>
        <button type="button" onclick="closeModal('modalAturKuota'); showToast('Kuota jurusan untuk periode aktif berhasil disimpan.')" class="px-4 py-2 rounded-xl bg-[#13294B] text-white text-xs font-extrabold">Simpan Kuota</button>
      </div>
    </div>
  </div>

  <div id="modalUsulanMitra" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Verifikasi Usulan Mitra Siswa (T8)</h3>
        <button type="button" onclick="closeModal('modalUsulanMitra')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="p-3 rounded-xl bg-amber-50/70 border border-amber-200 text-xs space-y-1">
        <div class="font-extrabold text-slate-900">CV Kreasi Digital Batam</div>
        <div class="text-[11px] text-slate-600">Diusulkan oleh: <strong>Rizky Pratama (XII PPLG 1)</strong></div>
        <div class="text-[10px] text-slate-500">Alamat: Komplek Ruko Nagoya Hill Blok R2</div>
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal('modalUsulanMitra'); showToast('Usulan mitra ditolak.')" class="px-3.5 py-2 rounded-xl border border-rose-200 text-rose-700 text-xs font-bold">Tolak</button>
        <button type="button" onclick="closeModal('modalUsulanMitra'); showToast('Usulan mitra disetujui dan ditambahkan sebagai mitra resmi.')" class="px-4 py-2 rounded-xl bg-emerald-600 text-white text-xs font-extrabold">Setujui Mitra Resmi</button>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  function exportDudiRekap() {
    triggerDownload('data-mitra-kuota-pkl.csv', "Nama Mitra,Bidang Usaha,Status,Kuota Terisi\nPT Solusi Teknologi Nusantara,Software & Cloud,Aktif,14/16\nPT Cyber Media Utama,Creative Agency,Aktif,9/12\n", 'text/csv;charset=utf-8;');
    showToast('Data mitra & kuota berhasil diekspor.');
  }

  function applyDudiFilter() {
    const q = (document.getElementById('dudiSearchInput').value || '').toLowerCase();
    const jurusan = (document.getElementById('dudiJurusanSelect').value || '').toLowerCase();
    const status = (document.getElementById('dudiStatusSelect').value || '').toLowerCase();

    document.querySelectorAll('.dudi-card').forEach(card => {
      const text = card.innerText.toLowerCase();
      const match = (!q || text.includes(q)) && (!jurusan || text.includes(jurusan)) && (!status || text.includes(status));
      card.classList.toggle('hidden', !match);
    });
  }

  function resetDudiFilter() {
    document.getElementById('dudiSearchInput').value = '';
    document.getElementById('dudiJurusanSelect').value = '';
    document.getElementById('dudiStatusSelect').value = '';
    applyDudiFilter();
    showToast('Filter mitra DUDI direset.');
  }

  function toggleStatusMitra(btn, namaMitra) {
    const card = btn.closest('.dudi-card');
    const badge = card.querySelector('.status-mitra-badge');
    const isCurrentlyActive = badge.textContent.includes('Aktif');

    if (isCurrentlyActive) {
      badge.className = 'status-mitra-badge inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-slate-100 border border-slate-300 text-slate-600 text-[10px] font-extrabold';
      badge.innerHTML = '<i class="fa-solid fa-box-archive text-[9px]"></i> Nonaktif (Arsip)';
      btn.className = 'px-3 py-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-700 text-[11px] font-bold flex items-center gap-1.5';
      btn.innerHTML = '<i class="fa-solid fa-rotate-left"></i><span>Aktifkan Kembali</span>';
      showToast(`${namaMitra} dinonaktifkan (riwayat tetap tersimpan).`);
    } else {
      badge.className = 'status-mitra-badge inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold';
      badge.innerHTML = '<i class="fa-solid fa-circle text-[7px] text-emerald-500"></i> Aktif';
      btn.className = 'px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-700 text-[11px] font-bold flex items-center gap-1.5';
      btn.innerHTML = '<i class="fa-solid fa-box-archive"></i><span>Nonaktifkan</span>';
      showToast(`${namaMitra} kembali aktif untuk penempatan.`);
    }
  }

  function handleTambahMitra(e) {
    e.preventDefault();
    const nama = document.getElementById('inputNamaPerusahaan').value.trim();
    const bidang = document.getElementById('inputBidangUsaha').value.trim();
    const alamat = document.getElementById('inputAlamatMitra').value.trim();
    const kuota = document.getElementById('inputKuotaMitra').value.trim();

    const list = document.getElementById('dudiCardsList');
    const article = document.createElement('article');
    article.className = 'dudi-card bg-white rounded-2xl border border-sky-200 p-5 shadow-xs space-y-3';
    article.innerHTML = `
      <div class="flex flex-wrap items-center justify-between gap-2">
        <div>
          <h3 class="text-base font-black text-slate-900">${nama}</h3>
          <p class="text-xs text-slate-600">Bidang Usaha: ${bidang}</p>
          <p class="text-[11px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>${alamat}</p>
        </div>
        <div class="text-right space-y-1">
          <span class="status-mitra-badge inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold"><i class="fa-solid fa-circle text-[7px] text-emerald-500"></i> Aktif</span>
          <div class="text-[10px] font-bold text-sky-700">Kuota: ${kuota}</div>
        </div>
      </div>
    `;
    list.prepend(article);

    const kpi = document.getElementById('kpiTotalMitra');
    kpi.textContent = String(parseInt(kpi.textContent || '64', 10) + 1);

    e.target.reset();
    closeModal('modalTambahMitra');
    showToast(`Mitra ${nama} berhasil ditambahkan.`);
  }

  function handleTambahPembimbingDudi(e) {
    e.preventDefault();
    e.target.reset();
    closeModal('modalTambahPembimbingDudi');
    showToast('Akun Pembimbing Lapangan DUDI berhasil dibuat.');
  }
</script>
@endpush