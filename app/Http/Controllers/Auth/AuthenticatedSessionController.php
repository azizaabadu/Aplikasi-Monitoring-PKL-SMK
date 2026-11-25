<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input termasuk field 'peran' (termasuk ortu / orang_tua)
        $credentials = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
            'peran'    => [
                'required',
                'string',
                Rule::in(['admin', 'guru', 'dudi', 'orang_tua', 'ortu', 'siswa']),
            ],
        ]);

        $peranDipilih = strtolower(trim($credentials['peran']));

        $throttleKey = Str::transliterate(
            Str::lower($credentials['username'].'|'.$request->ip())
        );

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            return back()
                ->withInput($request->only('username', 'peran', 'remember'))
                ->with('error', "Terlalu banyak percobaan. Coba lagi dalam {$seconds} detik.");
        }

        // 2. Cocokkan kredensial beserta kolom peran dan status aktif di database
        if (! Auth::attempt([
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'peran'    => $peranDipilih,
            'aktif'    => true,
        ], $request->boolean('remember'))) {
            RateLimiter::hit($throttleKey, 60);

            return back()
                ->withInput($request->only('username', 'peran', 'remember'))
                ->with('error', 'Username, kata sandi, peran salah, atau akun belum aktif.');
        }

        RateLimiter::clear($throttleKey);
        $request->session()->regenerate();

        // 3. Arahkan pengguna ke dashboard sesuai perannya masing-masing
        $user = Auth::user();
        $peranUser = strtolower(trim((string) $user->peran));

        if ($peranUser === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($peranUser === 'guru') {
            return redirect()->route('guru.dashboard');
        } elseif ($peranUser === 'dudi') {
            return redirect()->route('dudi.dashboard');
        } elseif (in_array($peranUser, ['orang_tua', 'ortu'], true)) {
            // Pastikan nama route ini sama persis dengan yang ada di routes/web.php (misal: orangtua.dashboard atau ortu.dashboard)
            return redirect()->route('orangtua.dashboard');
        }

        return redirect()->route('siswa.dashboard');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}