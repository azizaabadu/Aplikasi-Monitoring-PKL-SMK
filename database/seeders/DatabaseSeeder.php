<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // <-- Pastikan ini ada di atas
use Illuminate\Support\Facades\Hash; // <-- Pastikan ini ada di atas

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Masukkan User::create di DALAM kurung kurawal fungsi run()
       User::create([
    'name' => 'Rizky Pratama',
    'username' => 'siswa2', // Ubah dari siswa1 menjadi siswa2
    'peran' => 'siswa',
    'password' => Hash::make('password123'),
]);
        // Memanggil seeder lain jika ada
        $this->call(DudiKuotaSeeder::class);
    }
}