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
    public function run(): void
    {
        Jurusan::firstOrCreate(['nama_jurusan' => 'PPLG']);
        Jurusan::firstOrCreate(['nama_jurusan' => 'TJKT']);
        Jurusan::firstOrCreate(['nama_jurusan' => 'DKV']);
        Jurusan::firstOrCreate(['nama_jurusan' => 'Animasi']);

        $periode = PeriodePkl::firstOrCreate(
            ['tahun_ajaran' => '2024/2025 Genap'],
            [
                'tanggal_mulai' => now()->startOfMonth()->toDateString(),
                'tanggal_selesai' => now()->addMonths(6)->toDateString(),
                'status' => 'berjalan',
                'maks_pilihan_mitra' => 3,
            ],
        );

        User::firstOrCreate(
            ['username' => 'admin1'],
            [
                'name' => 'Drs. H. Mulyadi, M.T.',
                'email' => 'admin@smkn1batam.sch.id',
                'peran' => 'admin',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ],
        );

        User::firstOrCreate(
            ['username' => 'kepsek1'],
            [
                'name' => 'Drs. H. Sudirman, M.Pd',
                'email' => 'kepala.sekolah@smkn1batam.sch.id',
                'peran' => 'kepala_sekolah',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ],
        );

        $userGuru = User::firstOrCreate(
            ['username' => 'guru1'],
            [
                'name' => 'Dra. Sri Wahyuni, M.Pd',
                'email' => 'sri.wahyuni@smkn1batam.sch.id',
                'peran' => 'guru',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ],
        );

        $guru = Guru::firstOrCreate(
            ['user_id' => $userGuru->id],
            [
                'nip' => '197804152005012003',
                'nama' => 'Dra. Sri Wahyuni, M.Pd',
                'kontak' => '081234567891',
            ],
        );

        $userDudi = User::firstOrCreate(
            ['username' => 'dudi1'],
            [
                'name' => 'Ahmad Fauzi, S.Kom',
                'email' => 'ahmad.fauzi@solusiteknologi.co.id',
                'peran' => 'pembimbing_dudi',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ],
        );
        $userDudi->forceFill(['peran' => 'pembimbing_dudi', 'aktif' => true])->save();

        $dudi = Dudi::firstOrCreate(
            ['nama_dudi' => 'PT Solusi Teknologi Nusantara'],
            [
                'user_id' => $userDudi->id,
                'alamat' => 'Nongsa Digital Park, Gedung Cyber Tower Lt. 3, Batam',
                'pimpinan' => 'Ahmad Fauzi, S.Kom',
                'kontak' => '0778-462310',
                'kuota' => 10,
                'aktif' => true,
            ],
        );
        if ($dudi->user_id === null) {
            $dudi->update(['user_id' => $userDudi->id]);
        }

        $userSiswa = User::updateOrCreate(
            ['username' => 'siswa2'],
            [
                'name' => 'Rizky Pratama',
                'email' => 'rizky.pratama@siswa.smkn1batam.sch.id',
                'peran' => 'siswa',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ],
        );

        $siswa = Siswa::updateOrCreate(
            ['user_id' => $userSiswa->id],
            [
                'nis' => '2026002',
                'nama' => 'Rizky Pratama',
                'kelas' => 'XII PPLG 1',
                'jurusan' => 'PPLG',
                'guru_id' => $guru->id,
                'dudi_id' => $dudi->id,
                'alamat' => 'Batam Center, Batam',
                'kontak' => '081298765432',
            ],
        );

        $userOrtu2 = User::updateOrCreate(
            ['username' => 'ortu2'],
            [
                'name' => 'Wali Rizky Pratama',
                'email' => 'wali.rizky@smkn1batam.sch.id',
                'peran' => 'orang_tua',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ],
        );

        OrangTua::updateOrCreate(
            ['user_id' => $userOrtu2->id],
            [
                'siswa_id' => $siswa->id,
                'nama_wali' => 'Wali Rizky Pratama',
                'kontak' => '081234567891',
                'alamat' => 'Batam',
            ],
        );

        $userOrtu = User::firstOrCreate(
            ['username' => 'ortu_uji01'],
            [
                'name' => 'Hendra Pratama',
                'email' => 'hendra.pratama@gmail.com',
                'peran' => 'orang_tua',
                'password' => Hash::make('password123'),
                'aktif' => true,
            ],
        );

        OrangTua::firstOrCreate(
            ['user_id' => $userOrtu->id, 'siswa_id' => $siswa->id],
            [
                'nama_wali' => 'Hendra Pratama',
                'kontak' => '081377889900',
                'alamat' => 'Batam',
            ],
        );

        Penempatan::firstOrCreate(
            ['siswa_id' => $siswa->id, 'periode_pkl_id' => $periode->id],
            ['dudi_id' => $dudi->id],
        );

        Absensi::firstOrCreate(
            ['siswa_id' => $siswa->id, 'tanggal' => now()->toDateString()],
            [
                'jam_masuk' => '07:42:00',
                'status' => 'Hadir',
                'kondisi' => 'baik',
                'catatan' => 'Hadir tepat waktu di kantor PT Solusi Teknologi Nusantara.',
                'lokasi' => 'PT Solusi Teknologi Nusantara',
            ],
        );

        Jurnal::firstOrCreate(
            ['siswa_id' => $siswa->id, 'tanggal' => now()->subDay()->toDateString()],
            [
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '17:00:00',
                'kegiatan' => 'Implementasi endpoint autentikasi pada sistem inventaris internal mitra.',
                'hasil' => 'Endpoint autentikasi berhasil dibuat.',
                'kendala' => null,
                'status' => 'Disetujui',
                'catatan_pembimbing' => 'Pekerjaan telah diperiksa.',
                'is_draft' => false,
                'terlambat' => false,
            ],
        );
    }
}