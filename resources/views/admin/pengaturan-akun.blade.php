@extends('layouts.admin')

@section('title', 'Pengaturan Periode PKL, Jurusan, Bobot Nilai & Akun - Portal PKL.ID')

@section('content')
  @php
    $periodeAktif = $periodeAktif ?? [
        'nama' => 'Semester Genap 2025/2026',
        'tanggal_mulai' => '2026-01-05',
        'tanggal_selesai' => '2026-06-26',
        'status' => 'Aktif', // Draft | Aktif | Selesai
    ];

    $daftarPeriode = $daftarPeriode ?? [
        ['nama' => 'Semester Ganjil 2025/2026', 'rentang' => 'Jul 2025 - Des 2025', 'status' => 'Selesai'],
        ['nama' => 'Semester Genap 2025/2026', 'rentang' => 'Jan 2026 - Jun 2026', 'status' => 'Aktif'],
        ['nama' => 'Semester Ganjil 2026/2027', 'rentang' => 'Jul 2026 - Des 2026', 'status' => 'Draft'],
    ];

    $jurusanKuota = $jurusanKuota ?? [
        ['kode' => 'PPLG', 'nama' => 'Pengembangan Perangkat Lunak dan Gim', 'kuota' => 150, 'terisi' => 132],
        ['kode' => 'TJKT', 'nama' => 'Teknik Jaringan Komputer dan Telekomunikasi', 'kuota' => 120, 'terisi' => 104],
        ['kode' => 'DKV', 'nama' => 'Desain Komunikasi Visual', 'kuota' => 100, 'terisi' => 90],
        ['kode' => 'Animasi', 'nama' => 'Animasi', 'kuota' => 75, 'terisi' => 72],
    ];

    $komponenBobot = $komponenBobot ?? [
        ['nama' => 'Evaluasi Pembimbing DUDI', 'bobot' => 45],
        ['nama' => 'Kedisiplinan, Kehadiran & Logbook', 'bobot' => 25],
        ['nama' => 'Evaluasi Guru Pembimbing & Laporan', 'bobot' => 30],
    ];
    $totalBobotAwal = collect($komponenBobot)->sum('bobot');

    $daftarAkun = $daftarAkun ?? [
        ['nama' => 'Admin PKL Sekolah', 'peran' => 'Admin PKL', 'cakupan' => 'Master data, periode, kuota, alokasi & rilis nilai', 'aktif' => true],
        ['nama' => 'Dra. Sri Wahyuni, M.Pd', 'peran' => 'Guru Pembimbing', 'cakupan' => 'Logbook, kondisi siswa, kunjungan & nilai bimbingan', 'aktif' => true],
        ['nama' => 'Ahmad Fauzi, S.Kom', 'peran' => 'Pembimbing DUDI', 'cakupan' => 'Terima/tolak penempatan, umpan balik & nilai DUDI', 'aktif' => true],
        ['nama' => 'Dr. Ir. Dwi Santoso, M.T.', 'peran' => 'Kepala Sekolah', 'cakupan' => 'Persetujuan akhir penempatan & monitoring sekolah', 'aktif' => true],
        ['nama' => 'Siti Nurhaliza', 'peran' => 'Siswa', 'cakupan' => 'Pengajuan mitra, logbook, check-in kondisi & lihat nilai dirilis', 'aktif' => true],
        ['nama' => 'Wali Siswa Siti Nurhaliza', 'peran' => 'Orang Tua', 'cakupan' => 'Penempatan disetujui, kehadiran/logbook & nilai dirilis', 'aktif' => true],
    ];

    $isPeriodeSelesai = ($periodeAktif['status'] ?? 'Aktif') === 'Selesai';
  @endphp

  <!-- 1. Breadcrumb & Status Periode -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
        <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
        <span>Beranda</span>
      </a>
      <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Pengaturan Periode, Jurusan, Bobot &amp; Akun</span>
    </div>

    <div class="flex flex-wrap items-center gap-2 text-[11px]">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
        PERIODE AKTIF: {{ strtoupper($periodeAktif['nama']) }}
      </span>
      <span id="badgeStatusPeriode" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full {{ $isPeriodeSelesai ? 'bg-slate-200 text-slate-800 border-slate-300' : 'bg-sky-50 text-sky-700 border-sky-200' }} border text-[10px] font-extrabold">
        STATUS: <span id="spanStatusPeriode">{{ strtoupper($periodeAktif['status']) }}</span>
      </span>
    </div>
  </div>

  <!-- 2. Hero Header & Aksi -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="space-y-2 max-w-2xl">
      <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 border border-slate-200 text-slate-700 text-[10px] font-extrabold uppercase tracking-wider">
        KONFIGURASI SISTEM PKL &bull; DATA DINAMIS
      </span>
      <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
        Pengaturan Periode PKL, Jurusan &amp; Kuota, Bobot Nilai, serta Akun Pengguna
      </h1>
      <p class="text-xs text-slate-500 leading-relaxed">
        Hanya satu periode PKL yang aktif pada satu waktu. Periode berstatus <strong>Selesai</strong> mengunci perubahan data periode, kuota jurusan tidak boleh lebih kecil dari jumlah terisi, dan total bobot komponen nilai wajib <strong>100%</strong>.
      </p>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 shrink-0">
      <button type="button" onclick="openInfoModal('Aturan Penguncian Periode & Bobot', '• Hanya 1 periode PKL yang berstatus Aktif pada satu waktu.\n• Periode Selesai mengunci perubahan data periode.\n• Kuota jurusan tidak boleh lebih kecil dari penempatan terisi.\n• Total bobot komponen penilaian wajib 100%.')" class="px-4 py-2.5 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-2 transition">
        <i class="fa-solid fa-circle-info text-slate-500 text-xs"></i>
        <span>Aturan Sistem</span>
      </button>

      <button type="button" onclick="simpanSemuaPengaturan()" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center gap-2 shadow-xs transition">
        <i class="fa-regular fa-floppy-disk text-xs text-sky-300"></i>
        <span>Simpan Pengaturan</span>
      </button>
    </div>
  </div>

  <!-- 3. Tab Navigasi -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-2 shadow-xs overflow-x-auto">
    <div class="flex items-center gap-1.5 min-w-max text-xs">
      <button type="button" data-tab="panelPeriode" onclick="switchTabPengaturan(this, 'panelPeriode')" class="tab-btn px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold flex items-center gap-2">
        <i class="fa-regular fa-calendar-days text-[11px] text-sky-300"></i>
        <span>1. Periode PKL</span>
      </button>
      <button type="button" data-tab="panelJurusan" onclick="switchTabPengaturan(this, 'panelJurusan')" class="tab-btn px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition">
        <i class="fa-solid fa-layer-group text-[11px] text-slate-400"></i>
        <span>2. Jurusan &amp; Kuota</span>
      </button>
      <button type="button" data-tab="panelBobot" onclick="switchTabPengaturan(this, 'panelBobot')" class="tab-btn px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition">
        <i class="fa-solid fa-scale-balanced text-[11px] text-slate-400"></i>
        <span>3. Bobot Penilaian (100%)</span>
      </button>
      <button type="button" data-tab="panelAkun" onclick="switchTabPengaturan(this, 'panelAkun')" class="tab-btn px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition">
        <i class="fa-solid fa-users-gear text-[11px] text-slate-400"></i>
        <span>4. Akun &amp; 6 Peran Pengguna</span>
      </button>
    </div>
  </div>

  <!-- 4. Konten Pengaturan -->
  <div class="space-y-5">
    <!-- Bagian 1: Periode PKL (PRD 5.1 & 6.7) -->
    <section id="panelPeriode" class="tab-panel bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-4">
      <div class="flex flex-wrap items-center justify-between gap-2">
        <div>
          <h2 class="text-sm sm:text-base font-black text-slate-900">Pengaturan Periode PKL (Hanya 1 Periode Aktif)</h2>
          <p class="text-[11px] text-slate-500">Data logbook, kehadiran, penempatan, dan nilai terikat ke periode. Periode <strong>Selesai</strong> mengunci perubahan data periode.</p>
        </div>
        <select id="selectStatusPeriode" onchange="ubahStatusPeriode(this.value)" class="px-3 py-1.5 rounded-xl border border-slate-200 bg-slate-50 text-xs font-extrabold text-slate-800">
          <option value="Draft" {{ ($periodeAktif['status'] ?? '') === 'Draft' ? 'selected' : '' }}>Status: Draft</option>
          <option value="Aktif" {{ ($periodeAktif['status'] ?? 'Aktif') === 'Aktif' ? 'selected' : '' }}>Status: Aktif</option>
          <option value="Selesai" {{ ($periodeAktif['status'] ?? '') === 'Selesai' ? 'selected' : '' }}>Status: Selesai (Terkunci)</option>
        </select>
      </div>

      <div id="periodeFieldsWrapper" class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
        <div class="space-y-1">
          <label class="block font-bold text-slate-700">Nama Periode Aktif</label>
          <input id="inputNamaPeriode" type="text" value="{{ $periodeAktif['nama'] }}" {{ $isPeriodeSelesai ? 'disabled' : '' }} class="periode-field w-full px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50 font-bold text-slate-900 disabled:bg-slate-100 disabled:text-slate-500">
        </div>
        <div class="space-y-1">
          <label class="block font-bold text-slate-700">Tanggal Mulai</label>
          <input id="inputTglMulai" type="date" value="{{ $periodeAktif['tanggal_mulai'] }}" {{ $isPeriodeSelesai ? 'disabled' : '' }} class="periode-field w-full px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50 font-bold text-slate-900 disabled:bg-slate-100 disabled:text-slate-500">
        </div>
        <div class="space-y-1">
          <label class="block font-bold text-slate-700">Tanggal Selesai</label>
          <input id="inputTglSelesai" type="date" value="{{ $periodeAktif['tanggal_selesai'] }}" {{ $isPeriodeSelesai ? 'disabled' : '' }} class="periode-field w-full px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50 font-bold text-slate-900 disabled:bg-slate-100 disabled:text-slate-500">
        </div>
      </div>

      <div class="pt-2 border-t border-slate-100">
        <div class="text-[10px] font-extrabold uppercase text-slate-400 mb-2">DAFTAR PERIODE TERCATAT</div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs">
          @foreach($daftarPeriode as $p)
            <div class="p-3.5 rounded-xl border {{ $p['status'] === 'Aktif' ? 'bg-emerald-50/60 border-emerald-200' : 'bg-slate-50 border-slate-200' }} flex items-center justify-between gap-2">
              <div>
                <div class="font-extrabold text-slate-900">{{ $p['nama'] }}</div>
                <div class="text-[10px] text-slate-500">{{ $p['rentang'] }}</div>
              </div>
              <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold {{ $p['status'] === 'Aktif' ? 'bg-emerald-100 text-emerald-800' : ($p['status'] === 'Selesai' ? 'bg-slate-200 text-slate-700' : 'bg-amber-100 text-amber-800') }}">
                {{ $p['status'] }}
              </span>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Bagian 2: Jurusan & Kuota per Jurusan (PRD 5.2 & 6.6) -->
    <section id="panelJurusan" class="tab-panel bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-4">
      <div class="flex flex-wrap items-center justify-between gap-2">
        <div>
          <h2 class="text-sm sm:text-base font-black text-slate-900">Jurusan &amp; Kuota per Jurusan pada Periode Aktif</h2>
          <p class="text-[11px] text-slate-500">Daftar jurusan diambil dinamis dari data sistem. Perubahan kuota tidak boleh lebih kecil dari jumlah penempatan yang sudah terisi.</p>
        </div>
        <button type="button" onclick="validasiSemuaKuotaJurusan()" class="px-3.5 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-[11px] font-extrabold">
          Simpan Kuota Jurusan
        </button>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-xs">
          <thead>
            <tr class="bg-slate-50/90 border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
              <th class="py-2.5 px-3">KODE JURUSAN</th>
              <th class="py-2.5 px-3">KOMPETENSI KEAHLIAN</th>
              <th class="py-2.5 px-3 text-center">TERISI</th>
              <th class="py-2.5 px-3 text-center">KUOTA PERIODE</th>
              <th class="py-2.5 px-3 text-center">SISA</th>
            </tr>
          </thead>
          <tbody id="jurusanKuotaBody" class="divide-y divide-slate-100">
            @foreach($jurusanKuota as $jk)
              @php $sisaAwal = max(0, (int) $jk['kuota'] - (int) $jk['terisi']); @endphp
              <tr data-terisi="{{ $jk['terisi'] }}" class="jurusan-row hover:bg-slate-50/60">
                <td class="py-3 px-3 font-black text-slate-900">{{ $jk['kode'] }}</td>
                <td class="py-3 px-3 text-slate-700 font-semibold">{{ $jk['nama'] }}</td>
                <td class="py-3 px-3 text-center font-extrabold text-emerald-700">{{ $jk['terisi'] }}</td>
                <td class="py-3 px-3 text-center">
                  <input
                    type="number"
                    min="{{ $jk['terisi'] }}"
                    value="{{ $jk['kuota'] }}"
                    oninput="cekKuotaBaris(this.closest('tr'), '{{ $jk['kode'] }}')"
                    class="input-kuota w-24 px-2.5 py-1 text-center font-extrabold border border-slate-200 rounded-lg text-slate-900"
                  >
                </td>
                <td class="py-3 px-3 text-center font-extrabold text-sky-700 sisa-kuota-cell">{{ $sisaAwal }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

    <!-- Bagian 3: Komponen & Bobot Penilaian 100% (PRD 5.7 & 6.5) -->
    <section id="panelBobot" class="tab-panel bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-4">
      <div class="flex flex-wrap items-center justify-between gap-2">
        <div>
          <h2 class="text-sm sm:text-base font-black text-slate-900">Komponen &amp; Bobot Penilaian (Total Wajib 100%)</h2>
          <p id="bobotStatusNote" class="text-[11px] {{ $totalBobotAwal === 100 ? 'text-emerald-700 font-semibold' : 'text-rose-700 font-bold' }}">
            Total bobot saat ini: <strong><span id="totalBobotVal">{{ $totalBobotAwal }}</span>%</strong> {{ $totalBobotAwal === 100 ? '(Valid — tepat 100%)' : '(Tidak valid — wajib tepat 100%)' }}
          </p>
        </div>
        <button type="button" onclick="simpanBobotPengaturan()" class="px-3.5 py-2 rounded-xl bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-extrabold">
          Simpan Bobot Nilai
        </button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs">
        @foreach($komponenBobot as $kb)
          <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 space-y-2">
            <div class="font-bold text-slate-800">{{ $kb['nama'] }}</div>
            <div class="flex items-center gap-2">
              <input
                type="number"
                min="0"
                max="100"
                value="{{ $kb['bobot'] }}"
                oninput="updateTotalBobotPengaturan()"
                class="bobot-pengaturan-input w-24 px-3 py-1.5 bg-white border border-slate-300 rounded-lg font-extrabold text-slate-900"
              >
              <span class="font-bold text-slate-500">%</span>
            </div>
          </div>
        @endforeach
      </div>
    </section>

    <!-- Bagian 4: Akun & 6 Peran Pengguna (PRD 4.1 & 6.8) -->
    <section id="panelAkun" class="tab-panel bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-4">
      <div>
        <h2 class="text-sm sm:text-base font-black text-slate-900">Manajemen Akun &amp; 6 Peran Pengguna Sistem</h2>
        <p class="text-[11px] text-slate-500">Peran tersedia: Admin PKL, Guru Pembimbing, Pembimbing DUDI, Kepala Sekolah, Siswa, dan Orang Tua.</p>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-xs">
          <thead>
            <tr class="bg-slate-50/90 border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
              <th class="py-2.5 px-3">PENGGUNA</th>
              <th class="py-2.5 px-3">PERAN</th>
              <th class="py-2.5 px-3">CAKUPAN HAK AKSES</th>
              <th class="py-2.5 px-3 text-right">STATUS AKUN</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @foreach($daftarAkun as $ak)
              <tr class="hover:bg-slate-50/60">
                <td class="py-3 px-3 font-extrabold text-slate-900">{{ $ak['nama'] }}</td>
                <td class="py-3 px-3">
                  <span class="px-2.5 py-0.5 rounded-full bg-sky-50 border border-sky-200 text-sky-800 text-[10px] font-extrabold">{{ $ak['peran'] }}</span>
                </td>
                <td class="py-3 px-3 text-slate-600">{{ $ak['cakupan'] }}</td>
                <td class="py-3 px-3 text-right">
                  <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
                    {{ $ak['aktif'] ? 'Aktif' : 'Nonaktif' }}
                  </span>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </div>
@endsection

@push('scripts')
<script>
  function switchTabPengaturan(btn, targetId) {
    document.querySelectorAll('.tab-btn').forEach(el => {
      el.className = 'tab-btn px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition';
    });
    btn.className = 'tab-btn px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold flex items-center gap-2';

    const panel = document.getElementById(targetId);
    if (panel) {
      panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
  }

  function ubahStatusPeriode(statusBaru) {
    const spanStatus = document.getElementById('spanStatusPeriode');
    const badgeStatus = document.getElementById('badgeStatusPeriode');
    const fields = document.querySelectorAll('.periode-field');
    const isSelesai = statusBaru === 'Selesai';

    if (spanStatus) spanStatus.textContent = statusBaru.toUpperCase();
    if (badgeStatus) {
      badgeStatus.className = `inline-flex items-center gap-1.5 px-3 py-1 rounded-full border text-[10px] font-extrabold ${isSelesai ? 'bg-slate-200 text-slate-800 border-slate-300' : 'bg-sky-50 text-sky-700 border-sky-200'}`;
    }
    fields.forEach(inp => inp.disabled = isSelesai);

    if (isSelesai) {
      showToast('Periode berstatus Selesai: perubahan data periode dikunci.');
    } else {
      showToast(`Status periode diperbarui menjadi ${statusBaru}.`);
    }
  }

  function cekKuotaBaris(row, kodeJurusan) {
    const terisi = parseInt(row.dataset.terisi || '0', 10);
    const input = row.querySelector('.input-kuota');
    const sisaCell = row.querySelector('.sisa-kuota-cell');
    const kuotaBaru = parseInt(input?.value || '0', 10);

    if (kuotaBaru < terisi) {
      showToast(`Kuota ${kodeJurusan} tidak boleh lebih kecil dari jumlah terisi (${terisi}).`);
      if (input) input.value = String(terisi);
      if (sisaCell) sisaCell.textContent = '0';
      return false;
    }

    if (sisaCell) sisaCell.textContent = String(Math.max(0, kuotaBaru - terisi));
    return true;
  }

  function validasiSemuaKuotaJurusan() {
    let valid = true;
    document.querySelectorAll('.jurusan-row').forEach(row => {
      const kode = row.querySelector('td')?.textContent.trim() || 'Jurusan';
      if (!cekKuotaBaris(row, kode)) {
        valid = false;
      }
    });
    if (valid) {
      showToast('Kuota per jurusan pada periode aktif berhasil disimpan.');
    }
    return valid;
  }

  function updateTotalBobotPengaturan() {
    const total = Array.from(document.querySelectorAll('.bobot-pengaturan-input'))
      .reduce((acc, el) => acc + (parseFloat(el.value || '0') || 0), 0);

    const valEl = document.getElementById('totalBobotVal');
    const noteEl = document.getElementById('bobotStatusNote');
    if (valEl) valEl.textContent = String(total);

    if (total === 100) {
      if (noteEl) {
        noteEl.className = 'text-[11px] text-emerald-700 font-semibold';
        noteEl.innerHTML = `Total bobot saat ini: <strong><span id="totalBobotVal">${total}</span>%</strong> (Valid — tepat 100%)`;
      }
      return true;
    } else {
      if (noteEl) {
        noteEl.className = 'text-[11px] text-rose-700 font-bold';
        noteEl.innerHTML = `Total bobot saat ini: <strong><span id="totalBobotVal">${total}</span>%</strong> (Tidak valid — wajib tepat 100%)`;
      }
      return false;
    }
  }

  function simpanBobotPengaturan() {
    if (!updateTotalBobotPengaturan()) {
      showToast('Total bobot penilaian wajib tepat 100% sebelum disimpan.');
      return false;
    }
    showToast('Komponen & bobot penilaian (100%) berhasil disimpan.');
    return true;
  }

  function simpanSemuaPengaturan() {
    if (!validasiSemuaKuotaJurusan()) return;
    if (!simpanBobotPengaturan()) return;
    showToast('Seluruh pengaturan periode, kuota jurusan, dan bobot nilai tersimpan.');
  }
</script>php
@endpush