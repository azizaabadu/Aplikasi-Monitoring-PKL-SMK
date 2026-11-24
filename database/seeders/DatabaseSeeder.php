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

    /**
     * Seed the application's database.
     */
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

        // 2. Akun Pembimbing DUDI
        $pembimbingDudi = User::updateOrCreate(
            ['username' => 'dudi1'],
            [
                'name'     => 'Ahmad Fauzi, S.Kom',
                'peran'    => 'pembimbing_dudi',
                'password' => Hash::make('password123'),
            ]
        );

        // 3. Hubungkan Pembimbing DUDI ke Data Mitra
        Dudi::updateOrCreate(
            ['user_id' => $pembimbingDudi->id],
            [
                'nama_dudi' => 'PT Solusi Teknologi Nusantara',
                'alamat'    => 'Jl. Ahmad Yani No. 45, Batam',
                'kontak'    => '081234567890',
                'aktif'     => true,
            ]
        );

        // 4. Memanggil seeder lain jika ada
        // $this->call(DudiKuotaSeeder::class);
    }
}