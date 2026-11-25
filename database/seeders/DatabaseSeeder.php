<?php

namespace Database\Seeders;

use App\Models\Dudi;
use App\Models\User;
use App\Models\Siswa;
use App\Models\OrangTua; // <--- Menggunakan model OrangTua
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Akun User Siswa
        $userSiswa = User::updateOrCreate(
            ['username' => 'siswa2'],
            [
                'name'     => 'Rizky Pratama',
                'peran'    => 'siswa',
                'password' => Hash::make('password123'),
            ]
        );

        // 1b. MEMBUAT PROFIL SISWA
        $siswaProfile = Siswa::updateOrCreate(
            ['user_id' => $userSiswa->id],
            [
                'nis'     => '2026002',
                'nama'    => 'Rizky Pratama',
                'kelas'   => 'XII RPL 1',
                'jurusan' => 'Rekayasa Perangkat Lunak',
            ]
        );

        // 2. Akun Guru Pembimbing
        User::updateOrCreate(
            ['username' => 'guru1'],
            [
                'name'     => 'Budi Santoso, S.Pd',
                'peran'    => 'guru',
                'password' => Hash::make('password123'),
            ]
        );

        // 3. Akun Pembimbing DUDI
        $pembimbingDudi = User::updateOrCreate(
            ['username' => 'dudi1'],
            [
                'name'     => 'Ahmad Fauzi, S.Kom',
                'peran'    => 'pembimbing_dudi',
                'password' => Hash::make('password123'),
            ]
        );

        // 4. Data Mitra DUDI
        Dudi::updateOrCreate(
            ['user_id' => $pembimbingDudi->id],
            [
                'nama_dudi' => 'PT Solusi Teknologi Nusantara',
                'alamat'    => 'Jl. Ahmad Yani No. 45, Batam',
                'kontak'    => '081234567890',
                'aktif'     => true,
            ]
        );

        // 5. Akun Administrator
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name'     => 'Administrator',
                'peran'    => 'admin',
                'password' => Hash::make('password123'),
            ]
        );

        // 6. Akun Orang Tua & Relasi ke Siswa (Tabel orang_tuas)
        $userOrtu = User::updateOrCreate(
            ['username' => 'ortu2'],
            [
                'name'     => 'Wali Rizky Pratama',
                'peran'    => 'orang_tua',
                'password' => Hash::make('password123'),
            ]
        );

        // Menghubungkan Akun Orang Tua ke Profil Siswa
        if ($siswaProfile) {
            OrangTua::updateOrCreate(
                ['user_id' => $userOrtu->id],
                [
                    'siswa_id'  => $siswaProfile->id,
                    'nama_wali' => 'Wali Rizky Pratama',
                    'kontak'    => '081234567891',
                    'alamat'    => 'Batam',
                ]
            );
        }

        // Memanggil seeder lain
        $this->call(DudiKuotaSeeder::class);
    }
}