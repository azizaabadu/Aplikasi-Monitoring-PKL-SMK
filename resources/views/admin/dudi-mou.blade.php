@extends('layouts.admin')

@section('title', 'Kemitraan DUDI & MoU - Portal PKL.ID')

@section('content')
  <!-- Breadcrumb & Status -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
        <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
        <span>Beranda</span>
      </a>
      <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Kemitraan DUDI &amp; MoU</span>
    </div>

    <div class="flex flex-wrap items-center gap-2">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-700 text-[10px] font-extrabold tracking-wide">
        <i class="fa-solid fa-shield-halved text-sky-600"></i>
        KEMITRAAN DUDI MANDATORI 2026
      </span>
      <button type="button" onclick="showToast('Sinkronisasi data DUDI dengan pangkalan data Kemendikbud berhasil.')" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold tracking-wide transition">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
        SINKRON DUDI KEMENDIKBUD
      </button>
    </div>
  </div>

  <!-- Header & Aksi -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="flex items-start gap-3.5 max-w-2xl">
      <div class="w-1.5 h-14 rounded-full bg-[#13294B] shrink-0 mt-1"></div>
      <div>
        <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
          Kemitraan Dunia Usaha &amp; Industri (DUDI) dan MoU
        </h1>
        <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
          Pengelolaan data korporasi mitra vokasi, status berlaku dokumen MoU/hukum kerja sama, kuota tampung pemagangan, serta akreditasi industri berstandar Ditjen Pendidikan Vokasi.
        </p>
      </div>
    </div>

    <div class="flex flex-wrap lg:flex-col items-stretch sm:items-center lg:items-stretch gap-2 shrink-0 min-w-[200px]">
      <button type="button" onclick="openModal('modalTemplateMou')" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-regular fa-file-lines text-slate-500"></i>
        <span>Template Dokumen MoU</span>
      </button>

      <button type="button" onclick="exportDudiRekap()" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-solid fa-download text-slate-500"></i>
        <span>Ekspor PDF</span>
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
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">TOTAL MITRA DUDI AKTIF</span>
        <span class="w-9 h-9 rounded-xl bg-slate-100 text-[#13294B] flex items-center justify-center text-sm"><i class="fa-solid fa-building"></i></span>
      </div>
      <div id="kpiTotalMitra" class="text-3xl font-black text-slate-900">64</div>
      <div class="text-[11px] text-slate-500">Tier 1: <strong class="text-slate-800">18</strong> &bull; Tier 2: <strong class="text-slate-800">32</strong> &bull; Startup: <strong class="text-slate-800">14</strong></div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">DOKUMEN MOU BERLAKU</span>
        <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm"><i class="fa-regular fa-circle-check"></i></span>
      </div>
      <div class="text-3xl font-black text-slate-900">58</div>
      <div class="flex items-center gap-2 text-[11px]">
        <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-extrabold text-[10px]">90,6%</span>
        <span class="text-slate-500">Status legal aktif &amp; sah</span>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">MOU MENDEKATI KADALUARSA</span>
        <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-sm"><i class="fa-solid fa-triangle-exclamation"></i></span>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-slate-900">6</span>
        <span class="text-xs font-bold text-amber-600">&lt; 60 Hari</span>
      </div>
      <div class="flex items-center justify-between text-[11px]">
        <span class="text-amber-600 font-bold">Perlu perpanjangan segera</span>
        <button type="button" onclick="filterMitraByText('Kadaluarsa')" class="font-extrabold text-slate-800 hover:underline">Lihat Semua</button>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">TOTAL KUOTA MAGANG</span>
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

  <!-- Filter & Pencarian -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-xs space-y-3">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-3">
      <div class="lg:col-span-6 relative">
        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
        <input id="dudiSearchInput" oninput="applyDudiFilter()" type="text" placeholder="Cari nama perusahaan, bidang usaha, nomor MoU resmi..." class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-sky-500">
      </div>
      <div class="lg:col-span-2">
        <select id="dudiSektorSelect" onchange="applyDudiFilter()" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700">
          <option value="">Semua Sektor Industri</option>
          <option value="Tech">Tech Industry</option>
          <option value="Manufaktur">Manufaktur &amp; Energi</option>
          <option value="Telekomunikasi">BUMN Telekomunikasi</option>
          <option value="Kreatif">Ekonomi Kreatif Digital</option>
        </select>
      </div>
      <div class="lg:col-span-2">
        <select id="dudiStatusSelect" onchange="applyDudiFilter()" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700">
          <option value="">Semua Status MoU</option>
          <option value="Aktif">MoU Aktif Legal</option>
          <option value="Kadaluarsa">Mendekati Kadaluarsa</option>
        </select>
      </div>
      <div class="lg:col-span-2">
        <select id="dudiJurusanSelect" onchange="applyDudiFilter()" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700">
          <option value="">Seluruh Konsentrasi</option>
          <option value="PPLG">PPLG</option>
          <option value="TJKT">TJKT</option>
          <option value="DKV">DKV</option>
          <option value="Mekatronika">Mekatronika</option>
        </select>
      </div>
    </div>

    <div class="flex flex-wrap items-center gap-2 pt-1 text-[11px]">
      <span class="text-slate-400 font-semibold">Filter Aktif:</span>
      <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-bold text-[10px]">Kota Batam (Kepri)</span>
      <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-bold text-[10px]">Kurikulum Merdeka Vokasi 2024</span>
      <button type="button" onclick="resetDudiFilter()" class="text-amber-600 hover:underline font-bold text-[10px] ml-1">Reset Filter</button>
    </div>
  </div>

  <!-- Daftar Kartu Mitra -->
  <div id="dudiCardsList" class="space-y-4">
    <article class="dudi-card bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">
        <div class="flex items-start gap-3.5">
          <div class="w-11 h-11 rounded-xl bg-sky-50 border border-sky-200/80 text-sky-600 flex items-center justify-center text-base shrink-0"><i class="fa-solid fa-microchip"></i></div>
          <div class="space-y-1">
            <div class="flex flex-wrap items-center gap-2">
              <h3 class="text-base font-black text-slate-900">PT Solusi Teknologi Nusantara</h3>
              <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-600 text-[9px] font-extrabold uppercase">TIER 1 - TECH INDUSTRY</span>
              <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>MoU Aktif Legal</span>
            </div>
            <p class="text-xs text-slate-600">Software Development, Cloud Infrastructure &amp; AI Center</p>
            <p class="text-[11px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Batam Center Industrial Park Blok C-12, Kota Batam</p>
          </div>
        </div>
        <div class="lg:text-right bg-slate-50 border border-slate-200/80 rounded-xl px-3.5 py-2.5 shrink-0">
          <div class="text-[9px] font-extrabold uppercase text-slate-400">NOMOR REGISTRASI MOU</div>
          <div class="text-[11px] font-black text-slate-800 mt-0.5">421.5/SMKN1-BTM/PKS-DUDI/2024/102</div>
          <div class="text-[10px] font-bold text-emerald-600 mt-0.5">Berlaku Hingga: 14 Desember 2026</div>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 pt-3 border-t border-slate-100">
        <div class="lg:col-span-4 space-y-1">
          <div class="text-[9px] font-extrabold uppercase text-slate-400">SISWA &amp; JURUSAN REKOMENDASI</div>
          <div class="text-xs font-extrabold text-slate-900">14 Siswa Terdaftar <span class="font-semibold text-slate-500">(PPLG &amp; DKV)</span></div>
          <div class="text-[11px] text-slate-500">3 Lead Mentor Industri Khusus</div>
        </div>
        <div class="lg:col-span-8 space-y-1.5">
          <div class="text-[9px] font-extrabold uppercase text-slate-400">FASILITAS DISEDIAKAN PERUSAHAAN</div>
          <div class="flex flex-wrap gap-1.5 text-[10px] font-bold">
            <span class="px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200/70">Uang Saku Harian</span>
            <span class="px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200/70">Sertifikat BNSP</span>
            <span class="px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200/70">Akses Server Cloud AWS</span>
            <span class="px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200/70">Asuransi K3 Lengkap</span>
          </div>
        </div>
      </div>

      <div class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex items-center gap-2.5 text-xs">
          <span class="w-7 h-7 rounded-full bg-slate-200 text-slate-700 font-extrabold text-[10px] flex items-center justify-center">AF</span>
          <span class="text-slate-500">PIC DUDI: <strong class="text-slate-800">Ahmad Fauzi, S.Kom</strong> (Head of People)</span>
        </div>
        <div class="flex flex-wrap items-center gap-2">
          <button type="button" onclick="openInfoModal('Kontak PIC DUDI', 'Ahmad Fauzi, S.Kom (Head of People - PT Solusi Teknologi Nusantara) • Telp/WA: 0812-7788-1024')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold">Hubungi PIC</button>
          <button type="button" onclick="openInfoModal('Siswa Magang (14 Siswa)', '14 siswa aktif (PPLG & DKV) ditempatkan di Batam Center Industrial Park Blok C-12.')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold">Lihat Siswa Magang (14)</button>
          <button type="button" onclick="openModal('modalKelolaMou')" class="px-3.5 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-bold">Kelola Dokumen MoU</button>
        </div>
      </div>
    </article>

    <article class="dudi-card bg-white rounded-2xl border-2 border-amber-300/90 p-5 shadow-xs space-y-4">
      <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">
        <div class="flex items-start gap-3.5">
          <div class="w-11 h-11 rounded-xl bg-amber-50 border border-amber-200 text-amber-600 flex items-center justify-center text-base shrink-0"><i class="fa-solid fa-bullhorn"></i></div>
          <div class="space-y-1">
            <div class="flex flex-wrap items-center gap-2">
              <h3 class="text-base font-black text-slate-900">PT Cyber Media Utama</h3>
              <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-amber-50 border border-amber-300 text-amber-800 text-[10px] font-extrabold"><i class="fa-solid fa-clock"></i>MoU Mendekati Kadaluarsa: 28 Hari Tersisa</span>
            </div>
            <p class="text-xs text-slate-600">Digital Creative Agency, Web Production &amp; UI/UX Branding</p>
            <p class="text-[11px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Bengkong Harapan, Kota Batam</p>
          </div>
        </div>
        <div class="lg:text-right bg-amber-50/70 border border-amber-200 rounded-xl px-3.5 py-2.5 shrink-0">
          <div class="text-[9px] font-extrabold uppercase text-amber-700">PERINGATAN KADALUARSA</div>
          <div class="text-[11px] font-black text-slate-900 mt-0.5">421.5/SMKN1-BTM/PKS-DUDI/2022/134</div>
          <div class="text-[10px] font-extrabold text-rose-600 mt-0.5">Berakhir: 11 Juni 2026</div>
        </div>
      </div>
      <div class="pt-3 border-t border-amber-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex items-center gap-2.5 text-xs">
          <span class="w-7 h-7 rounded-full bg-amber-100 text-amber-800 font-extrabold text-[10px] flex items-center justify-center">RK</span>
          <span class="text-slate-500">Direktur HR: <strong class="text-slate-800">Rian Kusuma, S.Ds.</strong></span>
        </div>
        <div class="flex flex-wrap items-center gap-2">
          <button type="button" onclick="openInfoModal('Kontak Cepat HR', 'Rian Kusuma, S.Ds. (Direktur HR - PT Cyber Media Utama) • Telp/WA: 0813-6400-8821')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold">Kontak Cepat HR</button>
          <button type="button" onclick="showToast('Permohonan perpanjangan MoU PT Cyber Media Utama telah dikirim ke Bagian Legal.')" class="px-3.5 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-white text-[11px] font-extrabold">Ajukan Perpanjangan MoU Segera</button>
        </div>
      </div>
    </article>
  </div>

  <!-- Modal Tambah Mitra DUDI -->
  <div id="modalTambahMitra" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Tambah Mitra DUDI Baru</h3>
        <button type="button" onclick="closeModal('modalTambahMitra')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form method="POST" action="{{ route('admin.dudi-mou.store') }}" class="space-y-3 text-xs">
  @csrf
  <div>
    <label class="block font-bold text-slate-700 mb-1">Nama Perusahaan</label>
    <input id="inputNamaPerusahaan" name="nama_perusahaan" type="text" required placeholder="Contoh: PT Batam Cloud Systems" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
  </div>
  <div>
    <label class="block font-bold text-slate-700 mb-1">Bidang Usaha &amp; Sektor</label>
    <input id="inputBidangUsaha" name="bidang_usaha" type="text" required placeholder="Contoh: Cloud & DevOps • PPLG" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
  </div>
  <div>
    <label class="block font-bold text-slate-700 mb-1">Nomor MoU</label>
    <input id="inputNomorMou" name="nomor_mou" type="text" required value="421.5/SMKN1-BTM/PKS-DUDI/2026/150" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
  </div>
  <div class="flex justify-end gap-2 pt-2">
    <button type="button" onclick="closeModal('modalTambahMitra')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
    <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Simpan Mitra</button>
  </div>
</form>
      </form>
    </div>
  </div>

  <!-- Modal Template MoU & Kelola MoU -->
  <div id="modalTemplateMou" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Template Dokumen MoU &amp; PKS</h3>
        <button type="button" onclick="closeModal('modalTemplateMou')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="space-y-2 text-xs">
        <button type="button" onclick="triggerDownload('template-pks-dudi-2026.txt', 'FORMAT PKS KEMITRAAN DUDI VOKASI 2026'); showToast('Template PKS 2026 diunduh.')" class="w-full p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 flex items-center justify-between font-bold">
          <span>Format Standar PKS DUDI 2026</span>
          <i class="fa-solid fa-download text-sky-600"></i>
        </button>
        <button type="button" onclick="triggerDownload('template-mou-industri.txt', 'TEMPLATE NOTA KESEPAHAMAN INDUSTRI'); showToast('Template MoU diunduh.')" class="w-full p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 flex items-center justify-between font-bold">
          <span>Template Nota Kesepahaman (MoU)</span>
          <i class="fa-solid fa-download text-sky-600"></i>
        </button>
      </div>
    </div>
  </div>

  <div id="modalKelolaMou" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Kelola Dokumen MoU</h3>
        <button type="button" onclick="closeModal('modalKelolaMou')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <p class="text-xs text-slate-600">Status dokumen: <strong>Aktif &amp; Terverifikasi</strong>. Anda dapat mengunduh salinan resmi atau mengajukan adendum kuota siswa.</p>
      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal('modalKelolaMou'); triggerDownload('dokumen-mou-aktif.txt', 'SALINAN DOKUMEN MOU AKTIF'); showToast('Dokumen MoU berhasil diunduh.')" class="px-4 py-2 rounded-xl bg-[#13294B] text-white text-xs font-extrabold">Unduh Dokumen</button>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  function exportDudiRekap() {
    triggerDownload('rekap-kemitraan-dudi.csv', "Perusahaan,Status MoU,Nomor Registrasi\nPT Solusi Teknologi Nusantara,Aktif,421.5/SMKN1-BTM/PKS-DUDI/2024/102\nPT Cyber Media Utama,Mendekati Kadaluarsa,421.5/SMKN1-BTM/PKS-DUDI/2022/134\n", 'text/csv;charset=utf-8;');
    showToast('Rekap kemitraan DUDI berhasil diunduh.');
  }

  function applyDudiFilter() {
    const q = (document.getElementById('dudiSearchInput').value || '').toLowerCase();
    const sektor = (document.getElementById('dudiSektorSelect').value || '').toLowerCase();
    const status = (document.getElementById('dudiStatusSelect').value || '').toLowerCase();
    const jurusan = (document.getElementById('dudiJurusanSelect').value || '').toLowerCase();

    document.querySelectorAll('.dudi-card').forEach(card => {
      const text = card.innerText.toLowerCase();
      const match = (!q || text.includes(q)) && (!sektor || text.includes(sektor)) && (!status || text.includes(status)) && (!jurusan || text.includes(jurusan));
      card.classList.toggle('hidden', !match);
    });
  }

  function filterMitraByText(keyword) {
    document.getElementById('dudiSearchInput').value = keyword;
    applyDudiFilter();
    showToast(`Menampilkan mitra dengan status "${keyword}".`);
  }

  function resetDudiFilter() {
    document.getElementById('dudiSearchInput').value = '';
    document.getElementById('dudiSektorSelect').value = '';
    document.getElementById('dudiStatusSelect').value = '';
    document.getElementById('dudiJurusanSelect').value = '';
    applyDudiFilter();
    showToast('Filter mitra DUDI direset.');
  }

  function handleTambahMitra(e) {
    e.preventDefault();
    const nama = document.getElementById('inputNamaPerusahaan').value.trim();
    const bidang = document.getElementById('inputBidangUsaha').value.trim();
    const nomou = document.getElementById('inputNomorMou').value.trim();

    const list = document.getElementById('dudiCardsList');
    const article = document.createElement('article');
    article.className = 'dudi-card bg-white rounded-2xl border border-sky-200 p-5 shadow-xs space-y-3';
    article.innerHTML = `
      <div class="flex flex-wrap items-center justify-between gap-2">
        <div>
          <h3 class="text-base font-black text-slate-900">${nama}</h3>
          <p class="text-xs text-slate-600">${bidang}</p>
        </div>
        <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">MoU Aktif Legal</span>
      </div>
      <div class="text-[11px] text-slate-500">Nomor MoU: <strong class="text-slate-800">${nomou}</strong></div>
    `;
    list.prepend(article);

    const kpi = document.getElementById('kpiTotalMitra');
    kpi.textContent = String(parseInt(kpi.textContent || '64', 10) + 1);

    e.target.reset();
    closeModal('modalTambahMitra');
    showToast(`Mitra ${nama} berhasil ditambahkan.`);
  }
</script>
@endpush