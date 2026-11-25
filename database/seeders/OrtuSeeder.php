<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrtuSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'ortu_bambang'],
            [
                'name'     => 'Bpk. Bambang Pratama',
                'password' => Hash::make('password123'),
                'peran'    => 'orang_tua', // Samakan dengan pilihan peran di form login ('orang_tua' atau 'ortu')
                'aktif'    => true,
            ]
        );
    }
}