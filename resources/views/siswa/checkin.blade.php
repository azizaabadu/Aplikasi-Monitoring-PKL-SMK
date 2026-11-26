@extends('layouts.student')

@section('title', 'Presensi & Kehadiran Siswa - PKL.ID')

@section('content')
<div class="space-y-6">

  @if (!$siswa)
    <section class="rounded-2xl border border-amber-200 bg-amber-50 p-6 text-amber-950">
      <h1 class="text-lg font-bold">Profil siswa belum terhubung</h1>
      <p class="mt-2 text-sm leading-6">
        Akun ini belum terhubung dengan data siswa, jadi presensi belum dapat ditampilkan atau dikirim.
        Hubungi administrator sekolah untuk menghubungkan akun dengan profil siswa yang benar.
      </p>
    </section>
  @else

  <!-- HEADER -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
        <span>Beranda</span>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Presensi & Kehadiran</span>
      </div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Presensi & Laporan Kondisi Siswa</h1>
      <p class="text-xs text-slate-500 mt-1">Pencatatan presensi mandiri dan pelaporan kondisi harian sesuai PRD Bagian 5 (K1).</p>
    </div>
    <div class="flex items-center gap-2.5">
      <a href="#riwayat-presensi" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-clock-rotate-left text-slate-500"></i>
        Riwayat Kehadiran
      </a>
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

  <!-- 2 KARTU UTAMA: FORM CHECK-IN & INFORMASI MITRA PENEMPATAN -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

    <!-- Kartu Kiri: Form Check-in Harian Siswa (7 Kolom) -->
    <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-6">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-4">
        <div>
          <div class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Presensi & Kondisi Harian</div>
          <div class="text-xs font-bold text-slate-800 mt-0.5">{{ $siswa->dudi->nama_dudi ?? 'Mitra Industri PKL' }}</div>
        </div>
        <div class="text-right">
          <div class="text-lg font-black text-slate-900 tracking-tight">{{ now()->translatedFormat('l, d F Y') }}</div>
          <div class="text-[11px] text-slate-500 font-medium">Jam server: {{ now()->format('H:i') }} WIB</div>
        </div>
      </div>

      @if ($todayCheckin)
        <!-- Ringkasan Check-in Hari Ini -->
        <div class="p-5 rounded-2xl bg-emerald-50 border border-emerald-200 space-y-3">
          <div class="flex items-center justify-between">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-extrabold bg-emerald-600 text-white">
              <i class="fa-solid fa-check"></i> Sudah Check-in Hari Ini
            </span>
            <span class="text-xs font-bold text-emerald-800">Jam Masuk: {{ substr($todayCheckin->jam_masuk, 0, 5) }} WIB</span>
          </div>
          <div class="grid grid-cols-2 gap-3 pt-2 text-xs">
            <div class="bg-white/80 p-3 rounded-xl border border-emerald-100">
              <span class="text-[10px] text-slate-500 uppercase font-bold block">Status Kehadiran</span>
              <span class="text-sm font-extrabold text-slate-900">{{ $todayCheckin->status }}</span>
            </div>
            <div class="bg-white/80 p-3 rounded-xl border border-emerald-100">
              <span class="text-[10px] text-slate-500 uppercase font-bold block">Kondisi Fisik / Lapangan</span>
              <span class="text-sm font-extrabold text-slate-900">
                @if ($todayCheckin->kondisi === 'baik')
                  <span class="text-emerald-700">Baik & Sehat</span>
                @elseif ($todayCheckin->kondisi === 'kurang_sehat')
                  <span class="text-amber-700">Kurang Sehat</span>
                @else
                  <span class="text-rose-700">Ada Kendala</span>
                @endif
              </span>
            </div>
          </div>
          @if ($todayCheckin->catatan)
            <div class="text-xs text-slate-700 bg-white/70 p-3 rounded-xl border border-emerald-100">
              <strong class="font-bold text-slate-900 block mb-0.5">Catatan Siswa:</strong>
              {{ $todayCheckin->catatan }}
            </div>
          @endif
        </div>
      @endif

      <!-- Form Pengisian / Pembaruan Presensi -->
      <form action="{{ route('siswa.checkin.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="space-y-1.5">
          <label class="block text-xs font-bold text-slate-800">1. Status Kehadiran Hari Ini</label>
          <div class="grid grid-cols-3 gap-3">
            <label class="cursor-pointer border rounded-xl p-3 flex flex-col items-center justify-center text-center transition hover:bg-slate-50 has-checked:border-sky-600 has-checked:bg-sky-50 has-checked:text-sky-900">
              <input type="radio" name="status" value="Hadir" {{ old('status', $todayCheckin?->status ?? 'Hadir') === 'Hadir' ? 'checked' : '' }} class="sr-only" />
              <i class="fa-solid fa-user-check text-base mb-1 text-sky-600"></i>
              <span class="text-xs font-extrabold">Hadir</span>
              <span class="text-[10px] text-slate-500 mt-0.5">Di lokasi PKL</span>
            </label>

            <label class="cursor-pointer border rounded-xl p-3 flex flex-col items-center justify-center text-center transition hover:bg-slate-50 has-checked:border-amber-600 has-checked:bg-amber-50 has-checked:text-amber-900">
              <input type="radio" name="status" value="Izin" {{ old('status', $todayCheckin?->status) === 'Izin' ? 'checked' : '' }} class="sr-only" />
              <i class="fa-solid fa-envelope-open-text text-base mb-1 text-amber-600"></i>
              <span class="text-xs font-extrabold">Izin</span>
              <span class="text-[10px] text-slate-500 mt-0.5">Keperluan dinas/keluarga</span>
            </label>

            <label class="cursor-pointer border rounded-xl p-3 flex flex-col items-center justify-center text-center transition hover:bg-slate-50 has-checked:border-rose-600 has-checked:bg-rose-50 has-checked:text-rose-900">
              <input type="radio" name="status" value="Sakit" {{ old('status', $todayCheckin?->status) === 'Sakit' ? 'checked' : '' }} class="sr-only" />
              <i class="fa-solid fa-heart-pulse text-base mb-1 text-rose-600"></i>
              <span class="text-xs font-extrabold">Sakit</span>
              <span class="text-[10px] text-slate-500 mt-0.5">Memerlukan istirahat</span>
            </label>
          </div>
          @error('status')
            <p class="text-[11px] text-rose-600 font-medium">{{ $message }}</p>
          @enderror
        </div>

        <div class="space-y-1.5">
          <label class="block text-xs font-bold text-slate-800">2. Kondisi Fisik & Keadaan Lapangan</label>
          <div class="grid grid-cols-3 gap-3">
            <label class="cursor-pointer border rounded-xl p-3 flex flex-col items-center justify-center text-center transition hover:bg-slate-50 has-checked:border-emerald-600 has-checked:bg-emerald-50 has-checked:text-emerald-900">
              <input type="radio" name="kondisi" value="baik" {{ old('kondisi', $todayCheckin?->kondisi ?? 'baik') === 'baik' ? 'checked' : '' }} class="sr-only" />
              <i class="fa-solid fa-face-smile text-base mb-1 text-emerald-600"></i>
              <span class="text-xs font-extrabold">Baik & Siap</span>
              <span class="text-[10px] text-slate-500 mt-0.5">Kondisi optimal</span>
            </label>

            <label class="cursor-pointer border rounded-xl p-3 flex flex-col items-center justify-center text-center transition hover:bg-slate-50 has-checked:border-amber-600 has-checked:bg-amber-50 has-checked:text-amber-900">
              <input type="radio" name="kondisi" value="kurang_sehat" {{ old('kondisi', $todayCheckin?->kondisi) === 'kurang_sehat' ? 'checked' : '' }} class="sr-only" />
              <i class="fa-solid fa-face-meh text-base mb-1 text-amber-600"></i>
              <span class="text-xs font-extrabold">Kurang Sehat</span>
              <span class="text-[10px] text-slate-500 mt-0.5">Flu / pusing / lelah</span>
            </label>

            <label class="cursor-pointer border rounded-xl p-3 flex flex-col items-center justify-center text-center transition hover:bg-slate-50 has-checked:border-rose-600 has-checked:bg-rose-50 has-checked:text-rose-900">
              <input type="radio" name="kondisi" value="ada_kendala" {{ old('kondisi', $todayCheckin?->kondisi) === 'ada_kendala' ? 'checked' : '' }} class="sr-only" />
              <i class="fa-solid fa-triangle-exclamation text-base mb-1 text-rose-600"></i>
              <span class="text-xs font-extrabold">Ada Kendala</span>
              <span class="text-[10px] text-slate-500 mt-0.5">Transportasi / sarana</span>
            </label>
          </div>
          @error('kondisi')
            <p class="text-[11px] text-rose-600 font-medium">{{ $message }}</p>
          @enderror
        </div>

        <div class="space-y-1.5">
          <label for="catatanCheckin" class="block text-xs font-bold text-slate-800">
            3. Catatan Tambahan <span class="text-slate-400 font-normal">(opsional, jelaskan jika izin/sakit/ada kendala)</span>
          </label>
          <textarea id="catatanCheckin" name="catatan" rows="3" placeholder="Contoh: Mengikuti sesi onboarding divisi engineering di ruang rapat Cyber Tower Lt. 3..." class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-xs focus:outline-none focus:border-sky-500">{{ old('catatan', $todayCheckin?->catatan) }}</textarea>
          @error('catatan')
            <p class="text-[11px] text-rose-600 font-medium">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="w-full py-3 px-4 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold shadow-md transition flex items-center justify-center gap-2">
          <i class="fa-solid fa-paper-plane text-sky-400"></i>
          <span>{{ $todayCheckin ? 'Perbarui Status Presensi Hari Ini' : 'Simpan Presensi Hari Ini' }}</span>
        </button>
      </form>
    </div>

    <!-- Kartu Kanan: Informasi Penempatan & Pembimbing PKL (5 Kolom) -->
    <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5 flex flex-col justify-between">
      <div class="space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
          <div class="text-xs font-extrabold text-slate-800 flex items-center gap-2">
            <i class="fa-solid fa-building-user text-sky-600"></i>
            Informasi Penempatan PKL
          </div>
          <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold">
            Status: Aktif
          </span>
        </div>

        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3 text-xs">
          <div>
            <span class="text-[10px] font-bold text-slate-400 uppercase block">Mitra DUDI / Industri</span>
            <span class="font-extrabold text-slate-900 text-sm">{{ $siswa->dudi->nama_dudi ?? 'PT Solusi Teknologi Nusantara' }}</span>
          </div>
          <div>
            <span class="text-[10px] font-bold text-slate-400 uppercase block">Alamat Kantor / Pabrik</span>
            <span class="font-medium text-slate-700 leading-relaxed">{{ $siswa->dudi->alamat ?? 'Nongsa Digital Park, Cyber Tower Lt. 3, Batam' }}</span>
          </div>
          <div class="grid grid-cols-2 gap-2 pt-1 border-t border-slate-200/60">
            <div>
              <span class="text-[10px] font-bold text-slate-400 uppercase block">Jam Mulai Kerja</span>
              <span class="font-extrabold text-slate-800">08:00 WIB</span>
            </div>
            <div>
              <span class="text-[10px] font-bold text-slate-400 uppercase block">Jam Pulang Kerja</span>
              <span class="font-extrabold text-slate-800">17:00 WIB</span>
            </div>
          </div>
        </div>

        <!-- Pembimbing Lapangan & Guru -->
        <div class="space-y-2 text-xs">
          <div class="p-3 rounded-xl border border-slate-200/70 flex items-center justify-between">
            <div>
              <span class="text-[10px] text-slate-400 font-bold uppercase block">Pembimbing Lapangan (DUDI)</span>
              <span class="font-bold text-slate-800">{{ $siswa->dudi->pimpinan ?? 'Ahmad Fauzi, S.Kom' }}</span>
            </div>
            <span class="w-8 h-8 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center font-bold">
              <i class="fa-solid fa-user-tie"></i>
            </span>
          </div>

          <div class="p-3 rounded-xl border border-slate-200/70 flex items-center justify-between">
            <div>
              <span class="text-[10px] text-slate-400 font-bold uppercase block">Guru Pembimbing Sekolah</span>
              <span class="font-bold text-slate-800">{{ $siswa->guru->nama ?? 'Dra. Sri Wahyuni, M.Pd' }}</span>
            </div>
            <span class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold">
              <i class="fa-solid fa-chalkboard-user"></i>
            </span>
          </div>
        </div>
      </div>

      <!-- Panduan PRD -->
      <div class="p-3.5 rounded-xl bg-sky-50 border border-sky-200 text-sky-900 text-[11px] leading-relaxed">
        <strong class="font-bold block mb-0.5"><i class="fa-solid fa-circle-info mr-1"></i> Ketentuan PRD:</strong>
        Check-in wajib dilakukan setiap hari kerja. Guru pembimbing dan pembimbing DUDI akan menerima notifikasi otomatis jika kondisi siswa dilaporkan <em>Kurang Sehat</em> atau <em>Ada Kendala</em>.
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
      <div class="text-2xl font-black text-slate-900">{{ $attendanceRate }}%</div>
      <div class="text-[11px] text-slate-500 font-medium">{{ $presentCount }} dari {{ $totalDays > 0 ? $totalDays : 1 }} Hari Tercatat</div>
      <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
        <div class="bg-emerald-500 h-full rounded-full" style="width: {{ min(100, $attendanceRate) }}%"></div>
      </div>
    </div>

    <!-- Total Kehadiran -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
      <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
        <span>Total Kehadiran</span>
        <i class="fa-solid fa-circle-check text-emerald-600"></i>
      </div>
      <div class="text-2xl font-black text-slate-900">{{ $presentCount }} <span class="text-xs font-semibold text-slate-500">Hari</span></div>
      <div class="text-[11px] text-emerald-700 font-bold">Hadir di lokasi kerja PKL</div>
    </div>

    <!-- Izin & Sakit -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
      <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
        <span>Izin / Sakit</span>
        <i class="fa-solid fa-notes-medical text-amber-600"></i>
      </div>
      <div class="text-2xl font-black text-slate-900">{{ $permitCount }} <span class="text-xs font-semibold text-slate-500">Hari</span></div>
      <div class="text-[11px] text-slate-500 font-medium">Izin resmi atau sakit</div>
    </div>

    <!-- Kondisi Diri -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-2">
      <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider flex items-center justify-between">
        <span>Kondisi Diri</span>
        <i class="fa-solid fa-shield-heart text-sky-600"></i>
      </div>
      <div class="text-2xl font-black text-slate-900">
        {{ $todayCheckin ? ucfirst(str_replace('_', ' ', $todayCheckin->kondisi)) : 'Belum Lapor' }}
      </div>
      <div class="text-[11px] text-slate-500 font-medium">Laporan status hari ini</div>
    </div>
  </div>

  <!-- RIWAYAT PRESENSI & TABEL -->
  <div id="riwayat-presensi" class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
    <div class="p-5 border-b border-slate-100 flex items-center justify-between">
      <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
        <i class="fa-solid fa-list-check text-sky-600"></i>
        Riwayat Presensi & Kondisi Harian Siswa
      </h3>
      <span class="text-xs font-bold text-slate-500">{{ $attendance->count() }} Catatan Tersimpan</span>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse text-xs">
        <thead>
          <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase text-[10px] tracking-wider">
            <th class="py-3 px-4">Tanggal</th>
            <th class="py-3 px-4">Jam Masuk</th>
            <th class="py-3 px-4">Status Kehadiran</th>
            <th class="py-3 px-4">Kondisi Siswa</th>
            <th class="py-3 px-4">Lokasi / Mitra</th>
            <th class="py-3 px-4">Catatan</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-slate-700">
          @forelse ($attendance as $record)
            <tr class="hover:bg-slate-50/60 transition">
              <td class="py-3.5 px-4 font-bold text-slate-900">
                {{ \Illuminate\Support\Carbon::parse($record->tanggal)->translatedFormat('d M Y') }}
              </td>
              <td class="py-3.5 px-4 font-semibold text-slate-600">
                {{ $record->jam_masuk ? substr($record->jam_masuk, 0, 5) . ' WIB' : '-' }}
              </td>
              <td class="py-3.5 px-4">
                @if ($record->status === 'Hadir')
                  <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                    <i class="fa-solid fa-check text-[9px]"></i> Hadir
                  </span>
                @elseif ($record->status === 'Izin')
                  <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-amber-50 text-amber-700 border border-amber-200">
                    <i class="fa-solid fa-clock text-[9px]"></i> Izin
                  </span>
                @else
                  <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-rose-50 text-rose-700 border border-rose-200">
                    <i class="fa-solid fa-heart-pulse text-[9px]"></i> Sakit
                  </span>
                @endif
              </td>
              <td class="py-3.5 px-4">
                @if ($record->kondisi === 'baik')
                  <span class="text-emerald-700 font-bold">Baik</span>
                @elseif ($record->kondisi === 'kurang_sehat')
                  <span class="text-amber-700 font-bold">Kurang Sehat</span>
                @else
                  <span class="text-rose-700 font-bold">Ada Kendala</span>
                @endif
              </td>
              <td class="py-3.5 px-4 text-slate-600">
                {{ $record->lokasi ?? '-' }}
              </td>
              <td class="py-3.5 px-4 text-slate-500 max-w-xs truncate">
                {{ $record->catatan ?? '-' }}
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center py-8 text-slate-400 font-medium">
                Belum ada data presensi yang tercatat.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  @endif

</div>
@endsection
