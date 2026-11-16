<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

#[Signature('app:create-admin')]
#[Description('Buat akun administrator pertama untuk aplikasi.')]
class CreateAdminUser extends Command
{
    public function handle(): int
    {
        if (User::query()->where('peran', 'admin')->exists()) {
            $this->components->error('Akun administrator sudah tersedia.');

            return self::FAILURE;
        }

        $name = trim((string) $this->ask('Nama administrator'));
        $username = trim((string) $this->ask('Username administrator'));
        $email = trim((string) $this->ask('Email administrator'));
        $password = (string) $this->secret('Kata sandi (minimal 8 karakter)');
        $passwordConfirmation = (string) $this->secret('Ulangi kata sandi');

        $data = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $passwordConfirmation,
        ];

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->components->error($error);
            }

            return self::FAILURE;
        }

        User::create([
            'name' => $name,
            'username' => $username,
            'email' => $data['email'],
            'password' => $password,
            'peran' => 'admin',
            'aktif' => true,
        ]);

        $this->components->info('Akun administrator berhasil dibuat.');

        return self::SUCCESS;
    }
}
