<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        $throttleKey = Str::transliterate(
            Str::lower($credentials['username'].'|'.$request->ip())
        );

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            return back()->withErrors([
                'username' => "Terlalu banyak percobaan. Coba lagi dalam {$seconds} detik.",
            ])->onlyInput('username');
        }

        if (! Auth::attempt([
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'aktif' => true,
        ], $request->boolean('remember'))) {
            RateLimiter::hit($throttleKey, 60);

            return back()->withErrors([
                'username' => 'Username atau kata sandi tidak sesuai, atau akun tidak aktif.',
            ])->onlyInput('username');
        }

        RateLimiter::clear($throttleKey);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
