<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Dudi;
use App\Models\Guru;
use App\Models\Jurnal;
use App\Models\Jurusan;
use App\Models\OrangTua;
use App\Models\Penempatan;
use App\Models\PeriodePkl;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with complete, professional, PRD-compliant data.
     */
    public function run(): void
    {
        // 1. Jurusan
        $jurusanPplg = Jurusan::firstOrCreate(['nama_jurusan' => 'PPLG']);
        Jurusan::firstOrCreate(['nama_jurusan' => 'TJKT']);
        Jurusan::firstOrCreate(['nama_jurusan' => 'DKV']);
        Jurusan::firstOrCreate(['nama_jurusan' => 'Animasi']);

        // 2. Periode PKL
        $periode = PeriodePkl::firstOrCreate(
            ['tahun_ajaran' => '2024/2025 Genap'],
            [
                'tanggal_mulai' => now()->startOfMonth()->toDateString(),
                'tanggal_selesai' => now()->addMonths(6)->toDateString(),
                'status' => 'berjalan',
                'maks_pilihan_mitra' => 3,
            ]
        );

        // 3. Admin PKL
        User::firstOrCreate(
            ['username' => 'admin1'],
            [
                'name' => 'Drs. H. Mulyadi, M.T.',
                'email' => 'admin@smkn1batam.sch.id',
                'peran' => 'admin',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ]
        );

        // 3b. Kepala Sekolah (PRD T6, 5.8)
        User::firstOrCreate(
            ['username' => 'kepsek1'],
            [
                'name' => 'Drs. H. Sudirman, M.Pd',
                'email' => 'kepala.sekolah@smkn1batam.sch.id',
                'peran' => 'kepala_sekolah',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ]
        );

        // 4. Guru Pembimbing
        $userGuru = User::firstOrCreate(
            ['username' => 'guru1'],
            [
                'name' => 'Dra. Sri Wahyuni, M.Pd',
                'email' => 'sri.wahyuni@smkn1batam.sch.id',
                'peran' => 'guru',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ]
        );

        $guru = Guru::firstOrCreate(
            ['user_id' => $userGuru->id],
            [
                'nip' => '197804152005012003',
                'nama' => 'Dra. Sri Wahyuni, M.Pd',
                'kontak' => '081234567891',
            ]
        );

        // 5. Pembimbing Lapangan DUDI & Data Mitra
        $userDudi = User::firstOrCreate(
            ['username' => 'dudi1'],
            [
                'name' => 'Ahmad Fauzi, S.Kom',
                'email' => 'ahmad.fauzi@solusiteknologi.co.id',
                'peran' => 'pembimbing_dudi',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ]
        );

        $dudi = Dudi::firstOrCreate(
            ['nama_dudi' => 'PT Solusi Teknologi Nusantara'],
            [
                'user_id' => $userDudi->id,
                'alamat' => 'Nongsa Digital Park, Gedung Cyber Tower Lt. 3, Batam',
                'pimpinan' => 'Ahmad Fauzi, S.Kom',
                'kontak' => '0778-462310',
                'kuota' => 10,
                'aktif' => true,
            ]
        );
        if (!$dudi->user_id) {
            $dudi->update(['user_id' => $userDudi->id]);
        }

        // 6. Akun Siswa (Rizky Pratama)
        $userSiswa = User::firstOrCreate(
            ['username' => 'siswa2'],
            [
                'name' => 'Rizky Pratama',
                'email' => 'rizky.pratama@siswa.smkn1batam.sch.id',
                'peran' => 'siswa',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ]
        );

        $siswa = Siswa::firstOrCreate(
            ['user_id' => $userSiswa->id],
            [
                'nis' => '0058291823',
                'nama' => 'Rizky Pratama',
                'kelas' => 'XII',
                'jurusan' => 'PPLG',
                'guru_id' => $guru->id,
                'dudi_id' => $dudi->id,
                'alamat' => 'Batam Center, Batam',
                'kontak' => '081298765432',
            ]
        );
        $siswa->update(['guru_id' => $guru->id, 'dudi_id' => $dudi->id]);

        // 7. Akun Orang Tua (Bapak Hendra Pratama)
        $userOrtu = User::firstOrCreate(
            ['username' => 'ortu_uji01'],
            [
                'name' => 'Hendra Pratama',
                'email' => 'hendra.pratama@gmail.com',
                'peran' => 'orang_tua',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ]
        );

        OrangTua::firstOrCreate(
            ['user_id' => $userOrtu->id, 'siswa_id' => $siswa->id],
            [
                'nama_ayah' => 'Hendra Pratama',
                'kontak' => '081377889900',
            ]
        );

        // 8. Penempatan
        Penempatan::firstOrCreate(
            ['siswa_id' => $siswa->id, 'periode_pkl_id' => $periode->id],
            [
                'dudi_id' => $dudi->id,
            ]
        );

        // 9. Data Check-in Hari Ini (PRD K1)
        Absensi::firstOrCreate(
            ['siswa_id' => $siswa->id, 'tanggal' => now()->toDateString()],
            [
                'jam_masuk' => '07:42:00',
                'status' => 'Hadir',
                'kondisi' => 'baik',
                'catatan' => 'Hadir tepat waktu di kantor PT Solusi Teknologi Nusantara.',
                'lokasi' => 'PT Solusi Teknologi Nusantara',
            ]
        );

        // 10. Data Logbook Contoh Terverifikasi (PRD L1, L2, L3)
        Jurnal::firstOrCreate(
            ['siswa_id' => $siswa->id, 'tanggal' => now()->subDay()->toDateString()],
            [
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '17:00:00',
                'kegiatan' => 'Implementasi REST API Autentikasi JWT pada sistem inventaris internal mitra.',
                'hasil' => 'Berhasil menyelesaikan middleware JWT token verification dan Axios interceptor.',
                'kendala' => 'Sempat terjadi token expiration loop, berhasil diatasi dengan refresh token flow.',
                'status' => 'Disetujui',
                'catatan_pembimbing' => 'Kerja bagus, penanganan edge-case token kedaluwarsa sudah rapi dan siap masuk staging.',
                'is_draft' => false,
                'terlambat' => false,
            ]
        );
    }
}
