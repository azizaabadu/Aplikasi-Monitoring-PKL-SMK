<?php

namespace Database\Seeders;

use App\Models\Dudi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Akun Siswa
        User::updateOrCreate(
            ['username' => 'siswa2'],
            [
                'name'     => 'Rizky Pratama',
                'peran'    => 'siswa',
                'password' => Hash::make('password123'),
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


        // Memanggil seeder lain
        $this->call(DudiKuotaSeeder::class);
    }
}