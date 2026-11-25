@extends('layouts.student')

@section('title', 'Dashboard Siswa - Portal PKL.ID')

@section('content')
<div class="space-y-6">

  <!-- 1. HERO SECTION: SELAMAT DATANG & STATUS HARI INI -->
  <section class="bg-gradient-to-r from-[#0F1E38] via-[#172B4D] to-[#1E3A6D] rounded-3xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden">
    <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
      
      <!-- Kolom Kiri: Sapaan & Status Penempatan -->
      <div class="lg:col-span-7 space-y-3">
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-xs font-semibold">
          <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
          Status PKL: Aktif Berjalan
        </span>
        
        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Selamat Datang, {{ $siswa->nama ?? 'Siswa' }}! 👋</h1>
        
        <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
          Siswa Kompetensi Keahlian <strong class="text-white">{{ $siswa->jurusan ?? 'PPLG' }}</strong> • Penempatan di <strong class="text-sky-300">{{ $siswa->dudi->nama_dudi ?? 'Mitra Industri' }}</strong>
        </p>

        <!-- Baris Info Kecil -->
        <div class="flex flex-wrap items-center gap-3 pt-2 text-xs font-medium text-slate-300">
          <div class="flex items-center gap-1.5 bg-white/10 px-3 py-1.5 rounded-xl border border-white/10">
            <i class="fa-solid fa-calendar-days text-sky-400"></i>
            <span>{{ $periodeAktif->tahun_ajaran ?? 'Tahun Ajaran Aktif' }}</span>
          </div>
          <div class="flex items-center gap-1.5 bg-emerald-500/20 px-3 py-1.5 rounded-xl border border-emerald-400/30 text-emerald-300">
            <i class="fa-solid fa-circle-check"></i>
            <span>Tingkat Presensi: {{ $attendanceRate }}%</span>
          </div>
          <div class="flex items-center gap-1.5 bg-white/10 px-3 py-1.5 rounded-xl border border-white/10">
            <i class="fa-solid fa-book text-sky-400"></i>
            <span>Logbook: {{ $approvedLogbooks }} Disetujui</span>
          </div>
        </div>

        @if ($todayLogbook)
          <div class="text-[11px] text-emerald-400 font-medium pt-1 flex items-center gap-1.5">
            <i class="fa-solid fa-circle-check"></i>
            <span>Logbook hari ini: <strong>{{ $todayLogbook->is_draft ? 'Draf Disimpan' : ($todayLogbook->status === 'Disetujui' ? 'Disetujui Pembimbing' : 'Menunggu Pengesahan') }}</strong></span>
          </div>
        @else
          <div class="text-[11px] text-amber-300 font-medium pt-1 flex items-center gap-1.5">
            <i class="fa-solid fa-clock"></i>
            <span>Anda belum mengisi logbook aktivitas untuk hari ini.</span>
          </div>
        @endif
      </div>

      <!-- Kolom Kanan: Card Aksi Presensi & Logbook Hari Ini -->
      <div class="lg:col-span-5 bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 space-y-4 shadow-lg">
        <div class="flex items-center justify-between">
          <span class="text-[10px] font-bold uppercase tracking-wider text-slate-300">Presensi Hari Ini</span>
          @if ($todayCheckin)
            <span class="px-2.5 py-0.5 rounded-full bg-emerald-500 text-slate-950 text-[10px] font-black tracking-wide">
              Hadir • {{ substr($todayCheckin->jam_masuk, 0, 5) }} WIB
            </span>
          @else
            <span class="px-2.5 py-0.5 rounded-full bg-amber-400 text-slate-950 text-[10px] font-black tracking-wide">
              Belum Check-in
            </span>
          @endif
        </div>

        @if ($todayCheckin)
          <div class="p-3 rounded-xl bg-white/10 border border-white/10 text-xs space-y-1">
            <div class="flex items-center justify-between">
              <span class="text-slate-300">Kondisi:</span>
              <span class="font-extrabold text-white">{{ ucfirst(str_replace('_', ' ', $todayCheckin->kondisi)) }}</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-slate-300">Status:</span>
              <span class="font-bold text-emerald-300">{{ $todayCheckin->status }}</span>
            </div>
          </div>
          <a href="{{ route('siswa.checkin') }}" class="w-full py-2.5 px-4 rounded-xl bg-white/20 hover:bg-white/30 text-white font-bold text-xs transition flex items-center justify-center gap-2">
            <i class="fa-solid fa-pen-to-square"></i>
            <span>Perbarui Status Presensi</span>
          </a>
        @else
          <a href="{{ route('siswa.checkin') }}" class="w-full py-3.5 px-4 rounded-xl bg-sky-400 hover:bg-sky-300 text-[#0F172A] font-extrabold text-xs shadow-lg transition flex items-center justify-center gap-2">
            <i class="fa-solid fa-user-check text-base"></i>
            <span>Check-in Mandiri Sekarang</span>
          </a>
        @endif

        <div class="flex items-center justify-between text-[11px] text-slate-300 pt-1 border-t border-white/10">
          <a href="{{ route('siswa.logbook') }}" class="text-sky-300 hover:underline font-bold flex items-center gap-1.5">
            <i class="fa-solid fa-book-journal-whills"></i>
            <span>{{ $todayLogbook ? 'Lihat Logbook Hari Ini' : 'Tulis Logbook Hari Ini' }}</span>
          </a>
          <a href="{{ route('siswa.checkin') }}" class="text-slate-300 hover:underline">
            Riwayat Presensi &rsaquo;
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- 2. GRID UTAMA: IKHTISAR KEHADIRAN (KIRI) & INFORMASI PEMBIMBING (KANAN) -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Bagian Kiri (8 Kolom): Ikhtisar Kehadiran & Jurnal Terbaru -->
    <div class="lg:col-span-8 space-y-6">
      
      <!-- 4 Kotak Statistik Ringkas -->
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
          <div class="text-[10px] font-bold text-slate-400 uppercase">Tingkat Hadir</div>
          <div class="text-xl font-black text-slate-900">{{ $attendanceRate }}%</div>
          <div class="text-[10px] text-emerald-600 font-bold">{{ $presentCount }} Hari Hadir</div>
        </div>
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
          <div class="text-[10px] font-bold text-slate-400 uppercase">Total Presensi</div>
          <div class="text-xl font-black text-slate-900">{{ $totalCheckins }}</div>
          <div class="text-[10px] text-slate-500 font-medium">Hari tercatat</div>
        </div>
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
          <div class="text-[10px] font-bold text-slate-400 uppercase">Logbook Sah</div>
          <div class="text-xl font-black text-emerald-700">{{ $approvedLogbooks }}</div>
          <div class="text-[10px] text-slate-500 font-medium">Disetujui DUDI</div>
        </div>
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
          <div class="text-[10px] font-bold text-slate-400 uppercase">Pending Review</div>
          <div class="text-xl font-black text-amber-700">{{ $pendingLogbooks }}</div>
          <div class="text-[10px] text-slate-500 font-medium">Menunggu respon</div>
        </div>
      </div>

      <!-- Tabel Jurnal Harian Terakhir -->
      <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
          <div>
            <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-clock-rotate-left text-sky-600"></i>
              Jurnal Aktivitas Terbaru
            </h3>
            <p class="text-xs text-slate-500 mt-0.5">Entri logbook harian yang terakhir dicatat.</p>
          </div>
          <a href="{{ route('siswa.logbook') }}" class="text-xs font-bold text-sky-600 hover:underline">
            Lihat Semua &rsaquo;
          </a>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse text-xs">
            <thead>
              <tr class="bg-slate-50 border-b border-slate-100 text-slate-500 font-bold uppercase text-[10px] tracking-wider">
                <th class="py-3 px-4">Tanggal & Waktu</th>
                <th class="py-3 px-4">Uraian Pekerjaan Teknis</th>
                <th class="py-3 px-4">Status Pengesahan</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
              @forelse ($recentLogbooks as $logbook)
                <tr class="hover:bg-slate-50/50 transition">
                  <td class="py-3.5 px-4 font-bold text-slate-900 whitespace-nowrap">
                    {{ \Illuminate\Support\Carbon::parse($logbook->tanggal)->translatedFormat('d M Y') }}
                    <span class="block text-[10px] font-normal text-slate-500">
                      {{ $logbook->jam_mulai ? substr($logbook->jam_mulai, 0, 5) : '08:00' }} - {{ $logbook->jam_selesai ? substr($logbook->jam_selesai, 0, 5) : '17:00' }} WIB
                    </span>
                  </td>
                  <td class="py-3.5 px-4">
                    <p class="line-clamp-2 text-slate-800 font-medium">{{ $logbook->kegiatan }}</p>
                  </td>
                  <td class="py-3.5 px-4 whitespace-nowrap">
                    @if ($logbook->is_draft)
                      <span class="px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 font-bold text-[10px]">
                        Draf
                      </span>
                    @elseif ($logbook->status === 'Disetujui')
                      <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold text-[10px]">
                        Disetujui
                      </span>
                    @elseif ($logbook->status === 'Pending')
                      <span class="px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-800 border border-amber-200 font-bold text-[10px]">
                        Pending
                      </span>
                    @else
                      <span class="px-2.5 py-0.5 rounded-full bg-rose-50 text-rose-700 border border-rose-200 font-bold text-[10px]">
                        Perlu Revisi
                      </span>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="3" class="text-center py-8 text-slate-400 font-medium">
                    Belum ada riwayat logbook yang tercatat.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Info Kontak Pembimbing Sekolah & DUDI -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-3">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold text-sky-600 uppercase tracking-wider">Sekolah (SMK)</span>
            <i class="fa-solid fa-school text-slate-400"></i>
          </div>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center font-bold text-slate-700">SW</div>
            <div>
              <div class="text-xs font-bold text-slate-900">{{ $siswa->guru->nama ?? 'Dra. Sri Wahyuni, M.Pd' }}</div>
              <div class="text-[11px] text-slate-500">Guru Pembimbing PKL, {{ $siswa->jurusan ?? 'PPLG' }}</div>
              <div class="text-[10px] text-slate-400">NIP: {{ $siswa->guru->nip ?? '197804152005012003' }}</div>
            </div>
          </div>
          @if ($siswa->guru?->kontak)
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siswa->guru->kontak) }}" target="_blank" class="w-full py-2 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold text-xs border border-emerald-200 transition flex items-center justify-center gap-2">
              <i class="fa-brands fa-whatsapp text-sm"></i> Hubungi WhatsApp Guru
            </a>
          @else
            <div class="text-[11px] text-slate-400 text-center py-1">Kontak guru belum ditambahkan</div>
          @endif
        </div>

        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-3">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider">Mitra Industri (DUDI)</span>
            <i class="fa-solid fa-building text-slate-400"></i>
          </div>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-sky-100 flex items-center justify-center font-bold text-sky-800">AF</div>
            <div>
              <div class="text-xs font-bold text-slate-900">{{ $siswa->dudi->pimpinan ?? 'Ahmad Fauzi, S.Kom' }}</div>
              <div class="text-[11px] text-slate-500">Pembimbing Lapangan</div>
              <div class="text-[10px] text-sky-600 font-semibold">{{ $siswa->dudi->nama_dudi ?? 'PT Solusi Teknologi Nusantara' }}</div>
            </div>
          </div>
          @if ($siswa->dudi?->kontak)
            <a href="tel:{{ $siswa->dudi->kontak }}" class="w-full py-2 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white font-bold text-xs transition flex items-center justify-center gap-2 shadow-sm">
              <i class="fa-solid fa-phone text-xs"></i> Kontak Kantor DUDI ({{ $siswa->dudi->kontak }})
            </a>
          @else
            <div class="text-[11px] text-slate-400 text-center py-1">Kontak DUDI belum ditambahkan</div>
          @endif
        </div>
      </div>

    </div>

    <!-- Bagian Kanan (4 Kolom): Kalender Ringkas & Ketentuan PKL -->
    <div class="lg:col-span-4 space-y-6">
      
      <!-- Kartu Ringkasan Penempatan -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-4">
        <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-briefcase text-sky-600"></i>
          Profil Penempatan
        </h3>

        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2 text-xs">
          <div>
            <span class="text-[10px] text-slate-400 uppercase font-bold block">Nama Lengkap Siswa</span>
            <span class="font-extrabold text-slate-800">{{ $siswa->nama ?? 'Rizky Pratama' }}</span>
          </div>
          <div>
            <span class="text-[10px] text-slate-400 uppercase font-bold block">NIS / NISN</span>
            <span class="font-medium text-slate-700">{{ $siswa->nis ?? '0058291823' }}</span>
          </div>
          <div>
            <span class="text-[10px] text-slate-400 uppercase font-bold block">Kelas & Kompetensi</span>
            <span class="font-medium text-slate-700">{{ $siswa->kelas ?? 'XII' }} — {{ $siswa->jurusan ?? 'PPLG' }}</span>
          </div>
          <div>
            <span class="text-[10px] text-slate-400 uppercase font-bold block">Alamat Perusahaan</span>
            <span class="font-medium text-slate-600 leading-relaxed">{{ $siswa->dudi->alamat ?? 'Nongsa Digital Park, Cyber Tower Lt. 3, Batam' }}</span>
          </div>
        </div>

        <div class="p-3.5 rounded-xl bg-sky-50 border border-sky-200 text-sky-900 text-[11px] leading-relaxed">
          <strong class="font-bold block mb-0.5"><i class="fa-solid fa-circle-info mr-1"></i> Ketentuan PRD Bagian 5:</strong>
          Siswa wajib melakukan check-in kondisi harian dan mengisi logbook aktivitas setiap hari kerja agar status PKL tetap aktif dan tercatat pada sistem monitoring sekolah.
        </div>
      </div>

    </div>

  </div>

</div>
@endsection
