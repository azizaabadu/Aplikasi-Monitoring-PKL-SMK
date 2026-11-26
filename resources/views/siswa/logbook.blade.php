@extends('layouts.student')

@section('title', 'Jurnal Aktivitas & Logbook Harian - Portal PKL.ID')

@section('content')
<div class="space-y-6">

  <!-- 1. HEADER & TOMBOL AKSI ATAS -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
        <span>Beranda</span>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Jurnal & Logbook</span>
      </div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Jurnal Aktivitas & Logbook Harian</h1>
      <p class="text-xs text-slate-500 mt-1">Pencatatan rekapitulasi pekerjaan teknis industri dan validasi pembimbing sesuai PRD Bagian 5 (L1, L2, L3).</p>
    </div>
    <div class="flex flex-wrap items-center gap-2.5">
      <button type="button" onclick="openCreateModal()" class="px-4 py-2.5 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-plus text-sky-400"></i>
        Tulis Jurnal Hari Ini
      </button>
    </div>
  </div>

  @if (session('status'))
    <div role="status" class="flex items-center gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold shadow-sm">
      <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
      <span>{{ session('status') }}</span>
    </div>
  @endif

  @if (session('error'))
    <div role="alert" class="flex items-center gap-3 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold shadow-sm">
      <i class="fa-solid fa-triangle-exclamation text-rose-600 text-base"></i>
      <span>{{ session('error') }}</span>
    </div>
  @endif

  @if ($errors->any())
    <div role="alert" class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
      <div class="font-bold flex items-center gap-2">
        <i class="fa-solid fa-circle-exclamation text-rose-600"></i>
        Terdapat kesalahan dalam pengisian formulir:
      </div>
      <ul class="list-disc list-inside space-y-0.5 text-[11px] pl-4">
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- 2. KARTU STATISTIK RINGKASAN LOGBOOK -->
  <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-1">
      <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
        <span>Total Entri</span>
        <i class="fa-solid fa-book-bookmark text-sky-600"></i>
      </div>
      <div class="text-2xl font-black text-slate-900">{{ $stats['total'] }}</div>
      <div class="text-[11px] text-slate-500 font-medium">Jurnal terdata</div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-1">
      <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
        <span>Disetujui DUDI</span>
        <i class="fa-solid fa-circle-check text-emerald-600"></i>
      </div>
      <div class="text-2xl font-black text-slate-900">{{ $stats['disetujui'] }}</div>
      <div class="text-[11px] text-emerald-700 font-bold">Sah dan terverifikasi</div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-1">
      <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
        <span>Menunggu Pengesahan</span>
        <i class="fa-solid fa-clock-rotate-left text-amber-600"></i>
      </div>
      <div class="text-2xl font-black text-slate-900">{{ $stats['pending'] }}</div>
      <div class="text-[11px] text-amber-700 font-medium">Dalam antrean mentor</div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-1">
      <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
        <span>Draf / Revisi</span>
        <i class="fa-solid fa-pen-ruler text-indigo-600"></i>
      </div>
      <div class="text-2xl font-black text-slate-900">{{ $stats['draft'] + $stats['ditolak'] }}</div>
      <div class="text-[11px] text-slate-500 font-medium">{{ $stats['draft'] }} Draf • {{ $stats['ditolak'] }} Perlu Revisi</div>
    </div>
  </div>

  <!-- 3. FILTER TAB -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
    <div class="flex flex-wrap items-center gap-2 text-xs font-bold">
      <a href="{{ route('siswa.logbook') }}" class="px-4 py-2 rounded-xl transition {{ empty($statusFilter) ? 'bg-[#0F1E38] text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100' }}">
        Semua Jurnal ({{ $stats['total'] }})
      </a>
      <a href="{{ route('siswa.logbook', ['status' => 'disetujui']) }}" class="px-4 py-2 rounded-xl transition {{ $statusFilter === 'disetujui' ? 'bg-[#0F1E38] text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100' }}">
        Disetujui ({{ $stats['disetujui'] }})
      </a>
      <a href="{{ route('siswa.logbook', ['status' => 'pending']) }}" class="px-4 py-2 rounded-xl transition {{ $statusFilter === 'pending' ? 'bg-[#0F1E38] text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100' }}">
        Menunggu Pengesahan ({{ $stats['pending'] }})
      </a>
      <a href="{{ route('siswa.logbook', ['status' => 'draft']) }}" class="px-4 py-2 rounded-xl transition {{ $statusFilter === 'draft' ? 'bg-[#0F1E38] text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100' }}">
        Draf Mandiri ({{ $stats['draft'] }})
      </a>
      <a href="{{ route('siswa.logbook', ['status' => 'ditolak']) }}" class="px-4 py-2 rounded-xl transition {{ $statusFilter === 'ditolak' ? 'bg-[#0F1E38] text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100' }}">
        Perlu Revisi ({{ $stats['ditolak'] }})
      </a>
    </div>

    <div>
      <span class="text-xs text-slate-500 font-semibold">
        Halaman {{ $logbooks->currentPage() }} dari {{ max(1, $logbooks->lastPage()) }}
      </span>
    </div>
  </div>

  <!-- 4. DAFTAR KARTU JURNAL HARIAN -->
  <div class="space-y-4">
    @forelse ($logbooks as $logbook)
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4 transition hover:border-slate-300">
        <!-- Baris Status & Tanggal -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
          <div class="flex items-center gap-2 flex-wrap">
            @if ($logbook->is_draft)
              <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-700 border border-slate-200 text-[10px] font-extrabold">
                ● DRAF MANDIRI (Belum Diajukan)
              </span>
            @elseif ($logbook->status === 'Disetujui')
              <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-extrabold">
                ● DISETUJUI PEMBIMBING DUDI
              </span>
            @elseif ($logbook->status === 'Pending')
              <span class="px-3 py-1 rounded-full bg-amber-50 text-amber-800 border border-amber-200 text-[10px] font-extrabold">
                ● MENUNGGU PENGESAHAN
              </span>
            @else
              <span class="px-3 py-1 rounded-full bg-rose-50 text-rose-700 border border-rose-200 text-[10px] font-extrabold">
                ● PERLU REVISI / DITOLAK
              </span>
            @endif

            @if ($logbook->terlambat)
              <span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-extrabold border border-amber-200">
                <i class="fa-solid fa-clock-rotate-left mr-1"></i> Terlambat Isi
              </span>
            @endif

            <span class="text-xs font-bold text-slate-700">
              <i class="fa-regular fa-calendar mr-1"></i>
              {{ \Illuminate\Support\Carbon::parse($logbook->tanggal)->translatedFormat('l, d F Y') }}
            </span>
            <span class="text-xs text-slate-400">•</span>
            <span class="text-xs font-medium text-slate-500">
              <i class="fa-regular fa-clock mr-1"></i>
              {{ $logbook->jam_mulai ? substr($logbook->jam_mulai, 0, 5) : '08:00' }} - {{ $logbook->jam_selesai ? substr($logbook->jam_selesai, 0, 5) : '17:00' }} WIB
            </span>
          </div>

          <div class="flex items-center gap-2">
            @if ($logbook->is_draft || $logbook->status !== 'Disetujui')
              <button type="button" onclick="openEditModal({{ $logbook->toJson() }})" class="px-3 py-1.5 rounded-lg bg-slate-50 hover:bg-slate-100 border border-slate-200 text-xs font-bold text-slate-700 flex items-center gap-1.5 transition">
                <i class="fa-solid fa-pen-to-square text-sky-600"></i> Sunting
              </button>
            @endif
          </div>
        </div>

        <!-- Konten Jurnal -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
          <div class="lg:col-span-8 space-y-3">
            <div>
              <h4 class="text-xs font-bold text-slate-400 uppercase mb-1">Uraian Kegiatan & Pekerjaan:</h4>
              <p class="text-xs text-slate-800 leading-relaxed font-medium whitespace-pre-line">{{ $logbook->kegiatan }}</p>
            </div>

            @if ($logbook->hasil)
              <div class="pt-2 border-t border-slate-100">
                <h4 class="text-xs font-bold text-emerald-800 uppercase mb-0.5 flex items-center gap-1">
                  <i class="fa-solid fa-circle-check text-[10px]"></i> Hasil / Capaian:
                </h4>
                <p class="text-xs text-slate-700 leading-relaxed whitespace-pre-line">{{ $logbook->hasil }}</p>
              </div>
            @endif

            @if ($logbook->kendala)
              <div class="pt-2 border-t border-slate-100">
                <h4 class="text-xs font-bold text-amber-800 uppercase mb-0.5 flex items-center gap-1">
                  <i class="fa-solid fa-triangle-exclamation text-[10px]"></i> Kendala & Solusi Teknis:
                </h4>
                <p class="text-xs text-slate-700 leading-relaxed whitespace-pre-line">{{ $logbook->kendala }}</p>
              </div>
            @endif

            @if ($logbook->catatan_pembimbing)
              <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1 text-xs mt-3">
                <div class="flex items-center gap-2">
                  <span class="w-6 h-6 rounded-full bg-[#0F1E38] text-white font-bold flex items-center justify-center text-[9px]">P</span>
                  <span class="font-bold text-slate-900">Catatan Pembimbing:</span>
                </div>
                <p class="text-slate-600 italic pl-8">{{ $logbook->catatan_pembimbing }}</p>
              </div>
            @endif
          </div>

          <!-- Kolom Foto Dokumentasi -->
          <div class="lg:col-span-4 bg-slate-50 p-4 rounded-xl border border-slate-200/60 space-y-3">
            <span class="text-[10px] font-bold text-slate-400 uppercase block">Bukti Dokumentasi Pekerjaan</span>
            @if ($logbook->foto)
              <a href="{{ asset('storage/' . $logbook->foto) }}" target="_blank" class="block rounded-xl overflow-hidden border border-slate-200 shadow-xs hover:opacity-90 transition">
                <img src="{{ asset('storage/' . $logbook->foto) }}" alt="Dokumentasi PKL" class="w-full h-36 object-cover" />
              </a>
              <a href="{{ asset('storage/' . $logbook->foto) }}" target="_blank" class="text-[11px] font-bold text-sky-600 hover:underline flex items-center gap-1">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Foto Resolusi Penuh
              </a>
            @else
              <div class="h-32 rounded-xl border border-dashed border-slate-200 bg-white flex flex-col items-center justify-center text-slate-400 space-y-1">
                <i class="fa-regular fa-image text-2xl"></i>
                <span class="text-[11px] font-medium">Tanpa Lampiran Foto</span>
              </div>
            @endif
          </div>
        </div>
      </div>
    @empty
      <div class="bg-white rounded-2xl border border-slate-200/80 p-12 text-center shadow-sm space-y-3">
        <div class="w-16 h-16 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto text-2xl">
          <i class="fa-solid fa-book-open"></i>
        </div>
        <h3 class="text-sm font-bold text-slate-800">Belum Ada Catatan Logbook</h3>
        <p class="text-xs text-slate-500 max-w-sm mx-auto">Mulai catat kegiatan PKL harian Anda secara rutin setiap hari kerja.</p>
        <button type="button" onclick="openCreateModal()" class="px-4 py-2 rounded-xl bg-[#0F1E38] text-white text-xs font-bold shadow-sm inline-flex items-center gap-2">
          <i class="fa-solid fa-plus text-sky-400"></i> Buat Logbook Pertama
        </button>
      </div>
    @endforelse

    <div class="pt-2">
      {{ $logbooks->links() }}
    </div>
  </div>

</div>

<!-- MODAL: TULIS JURNAL BARU -->
<div id="createModal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl w-full max-w-xl max-h-[90vh] overflow-y-auto p-6 space-y-4">
    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
      <div>
        <h3 class="text-base font-extrabold text-slate-900">Tulis Logbook Kegiatan Harian</h3>
        <p class="text-[11px] text-slate-500">Isi uraian pekerjaan yang telah Anda laksanakan di tempat PKL.</p>
      </div>
      <button type="button" onclick="closeCreateModal()" class="w-8 h-8 rounded-lg hover:bg-slate-100 text-slate-500 flex items-center justify-center">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <form action="{{ route('siswa.logbook.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
      @csrf

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Tanggal Kegiatan</label>
          <input type="date" name="tanggal" max="{{ now()->toDateString() }}" value="{{ old('tanggal', now()->toDateString()) }}" required class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500 font-semibold text-slate-800" />
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Jam Mulai</label>
          <input type="text" name="jam_mulai" placeholder="08:00" value="{{ old('jam_mulai', '08:00') }}" required class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500 font-semibold text-slate-800" />
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Jam Selesai</label>
          <input type="text" name="jam_selesai" placeholder="17:00" value="{{ old('jam_selesai', '17:00') }}" required class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500 font-semibold text-slate-800" />
        </div>
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Uraian Kegiatan / Pekerjaan Teknis <span class="text-rose-500">*</span></label>
        <textarea name="kegiatan" rows="3" required placeholder="Jelaskan secara detail modul, perbaikan, atau tugas industri yang Anda kerjakan hari ini..." class="w-full px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500 text-xs">{{ old('kegiatan') }}</textarea>
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Hasil / Capaian Kerja (opsional)</label>
        <textarea name="hasil" rows="2" placeholder="Contoh: Modul autentikasi selesai dan telah lolos uji coba..." class="w-full px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500 text-xs">{{ old('hasil') }}</textarea>
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Kendala & Pemecahan Masalah (opsional)</label>
        <textarea name="kendala" rows="2" placeholder="Contoh: Mengalami kendala koneksi database, diatasi dengan mengubah konfigurasi port..." class="w-full px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500 text-xs">{{ old('kendala') }}</textarea>
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Foto Bukti Dokumentasi Kegiatan (Maks 2MB, JPG/PNG)</label>
        <input type="file" name="foto" accept="image/*" class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs" />
      </div>

      <div class="flex items-center justify-end gap-2.5 pt-3 border-t border-slate-100">
        <button type="button" onclick="closeCreateModal()" class="px-4 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-bold hover:bg-slate-50">
          Batal
        </button>
        <button type="submit" name="action" value="draft" class="px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
          Simpan Draf
        </button>
        <button type="submit" name="action" value="submit" class="px-4 py-2.5 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white font-bold shadow-sm transition">
          Kirim Pengesahan
        </button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL: SUNTING LOGBOOK -->
<div id="editModal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl w-full max-w-xl max-h-[90vh] overflow-y-auto p-6 space-y-4">
    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
      <div>
        <h3 class="text-base font-extrabold text-slate-900">Sunting Logbook</h3>
        <p class="text-[11px] text-slate-500">Perbarui rincian logbook sebelum atau sesudah catatan evaluasi.</p>
      </div>
      <button type="button" onclick="closeEditModal()" class="w-8 h-8 rounded-lg hover:bg-slate-100 text-slate-500 flex items-center justify-center">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
      @csrf
      @method('PUT')

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Jam Mulai</label>
          <input type="text" id="editJamMulai" name="jam_mulai" required class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500 font-semibold" />
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Jam Selesai</label>
          <input type="text" id="editJamSelesai" name="jam_selesai" required class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500 font-semibold" />
        </div>
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Uraian Kegiatan</label>
        <textarea id="editKegiatan" name="kegiatan" rows="3" required class="w-full px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500"></textarea>
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Hasil / Capaian</label>
        <textarea id="editHasil" name="hasil" rows="2" class="w-full px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500"></textarea>
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Kendala & Solusi</label>
        <textarea id="editKendala" name="kendala" rows="2" class="w-full px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500"></textarea>
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Ganti Foto Bukti (opsional)</label>
        <input type="file" name="foto" accept="image/*" class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 text-xs" />
      </div>

      <div class="flex items-center justify-end gap-2.5 pt-3 border-t border-slate-100">
        <button type="button" onclick="closeEditModal()" class="px-4 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-bold hover:bg-slate-50">
          Batal
        </button>
        <button type="submit" name="action" value="draft" class="px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
          Simpan Draf
        </button>
        <button type="submit" name="action" value="submit" class="px-4 py-2.5 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white font-bold shadow-sm transition">
          Kirim Pengesahan
        </button>
      </div>
    </form>
  </div>
</div>


@endsection
