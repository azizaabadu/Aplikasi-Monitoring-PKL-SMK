<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect(Request $request, string $provider): RedirectResponse
    {
        $request->session()->put('oauth_peran', $request->query('peran', 'siswa'));

        $driver = $provider === 'belajarid' ? 'google' : $provider;
        $socialite = Socialite::driver($driver);

        if ($provider === 'belajarid') {
            $socialite->with(['hd' => 'belajar.id']);
        }

        return $socialite->redirect();
    }

    public function callback(Request $request, string $provider): RedirectResponse
    {
        $driver = $provider === 'belajarid' ? 'google' : $provider;

        try {
            $socialUser = Socialite::driver($driver)->user();
        } catch (\Throwable $e) {
            return redirect()->route('login')
                ->withErrors(['oauth' => 'Gagal masuk menggunakan ' . strtoupper($provider) . '. Silakan coba lagi.']);
        }

        $email = $socialUser->getEmail();
        if (! $email) {
            return redirect()->route('login')
                ->withErrors(['oauth' => 'Email dari akun tidak ditemukan.']);
        }

        if ($provider === 'belajarid' && ! str_ends_with(strtolower($email), '@belajar.id')) {
            return redirect()->route('login')
                ->withErrors(['oauth' => 'Login Belajar.id wajib menggunakan akun email @belajar.id.']);
        }

        $peranPilihan = $request->session()->pull('oauth_peran', 'siswa');
        $peranMapping = [
            'siswa' => 'siswa',
            'guru' => 'guru',
            'dudi' => 'pembimbing_dudi',
            'ortu' => 'orang_tua',
            'kepsek' => 'kepala_sekolah',
            'admin' => 'admin',
        ];
        $peranDefault = $peranMapping[$peranPilihan] ?? 'siswa';

        $user = User::where('email', $email)->first();

        if (! $user) {
            $baseUsername = Str::before($email, '@');
            $username = Str::slug($baseUsername, '_');
            if ($username === '' || User::where('username', $username)->exists()) {
                $username = ($username ?: 'user') . '_' . Str::lower(Str::random(4));
            }

            $user = User::create([
                'name' => $socialUser->getName() ?: $baseUsername,
                'username' => $username,
                'email' => $email,
                'password' => Hash::make(Str::random(24)),
                'peran' => $peranDefault,
            ]);
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}