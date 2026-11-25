<?php

namespace App\Console\Commands;

use App\Models\OrangTua;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

#[Signature('orangtua:buat-akun-uji')]
#[Description('Membuat akun orang tua uji dan menghubungkannya ke siswa')]
class CreateParentDemoAccount extends Command
{
    public function handle(): int
    {
        if (! $this->laravel->environment('local')) {
            $this->error('Perintah ini hanya boleh dijalankan di lingkungan local.');

            return self::FAILURE;
        }

        $usernameSiswa = $this->ask('Username akun siswa yang akan dihubungkan', 'siswa_uji01');
        $akunSiswa = User::query()
            ->where('username', $usernameSiswa)
            ->where('peran', 'siswa')
            ->first();

        if ($akunSiswa === null) {
            $this->error('Akun siswa tidak ditemukan. Pastikan username benar dan perannya siswa.');

            return self::FAILURE;
        }

        $profilSiswa = Siswa::query()->where('user_id', $akunSiswa->id)->first();
        $dataSiswa = null;

        if ($profilSiswa === null) {
            $dataSiswa = [
                'nis' => $this->ask('NIS siswa'),
                'nama' => $this->ask('Nama siswa'),
                'kelas' => $this->ask('Kelas siswa'),
                'jurusan' => $this->ask('Jurusan siswa'),
            ];

            $studentValidator = Validator::make($dataSiswa, [
                'nis' => ['required', 'string', 'max:255', 'unique:siswas,nis'],
                'nama' => ['required', 'string', 'max:255'],
                'kelas' => ['required', 'string', 'max:255'],
                'jurusan' => ['required', 'string', 'max:255'],
            ]);

            if ($studentValidator->fails()) {
                $this->error('Data siswa belum valid:');

                foreach ($studentValidator->errors()->all() as $error) {
                    $this->line('- '.$error);
                }

                return self::FAILURE;
            }
        }

        $dataOrangTua = [
            'name' => $this->ask('Nama orang tua/wali', 'Orang Tua Uji'),
            'username' => $this->ask('Username login orang tua', 'ortu_uji02'),
            'email' => $this->ask('Email orang tua', 'ortu_uji02@example.test'),
        ];
        $password = $this->secret('Kata sandi orang tua (minimal 8 karakter)');
        $passwordConfirmation = $this->secret('Ulangi kata sandi orang tua');

        $parentValidator = Validator::make([
            ...$dataOrangTua,
            'password' => $password,
            'password_confirmation' => $passwordConfirmation,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($parentValidator->fails()) {
            $this->error('Data akun orang tua belum valid:');

            foreach ($parentValidator->errors()->all() as $error) {
                $this->line('- '.$error);
            }

            return self::FAILURE;
        }

        $akunOrangTua = DB::transaction(function () use ($akunSiswa, $profilSiswa, $dataSiswa, $dataOrangTua, $password): User {
            if ($profilSiswa === null) {
                $profilSiswa = new Siswa();
                $profilSiswa->user_id = $akunSiswa->id;
                $profilSiswa->nis = $dataSiswa['nis'];
                $profilSiswa->nama = $dataSiswa['nama'];
                $profilSiswa->kelas = $dataSiswa['kelas'];
                $profilSiswa->jurusan = $dataSiswa['jurusan'];
                $profilSiswa->save();
            }

            $akunOrangTua = User::create([
                ...$dataOrangTua,
                'password' => $password,
                'peran' => 'orang_tua',
                'aktif' => true,
            ]);

            OrangTua::create([
                'user_id' => $akunOrangTua->id,
                'siswa_id' => $profilSiswa->id,
                'nama_wali' => $dataOrangTua['name'],
            ]);

            return $akunOrangTua;
        });

        $this->newLine();
        $this->info('Akun orang tua dan tautan ke siswa berhasil dibuat.');
        $this->line('Username: '.$akunOrangTua->username);
        $this->line('Peran login: orang_tua');
        $this->newLine();
        $this->warn('Gunakan password yang tadi kamu masukkan. Password tidak ditampilkan di terminal.');

        return self::SUCCESS;
    }
}
