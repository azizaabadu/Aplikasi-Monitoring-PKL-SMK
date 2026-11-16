<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dudi;
use App\Models\Guru;
use App\Models\OrangTua;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    private const ROLES = ['siswa', 'guru', 'pembimbing_dudi', 'orang_tua', 'kepala_sekolah', 'admin'];

    public function index(): JsonResponse
    {
        $users = User::query()
            ->select(['id', 'name', 'username', 'email', 'peran', 'aktif', 'created_at'])
            ->orderBy('name')
            ->paginate(25);

        return response()->json($users);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'peran' => ['required', Rule::in(self::ROLES)],
            'aktif' => ['sometimes', 'boolean'],
        ]);

        unset($data['password_confirmation']);

        $user = User::create($data);

        return response()->json($user->only(['id', 'name', 'username', 'email', 'peran', 'aktif']), 201);
    }

    public function update(Request $request, User $user): JsonResponse
    {
        $data = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'username' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['sometimes', 'required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed'],
            'peran' => ['sometimes', 'required', Rule::in(self::ROLES)],
            'aktif' => ['sometimes', 'boolean'],
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        unset($data['password_confirmation']);

        $deactivatingUser = array_key_exists('aktif', $data) && ! filter_var($data['aktif'], FILTER_VALIDATE_BOOLEAN);

        if ($user->is($request->user()) && ($deactivatingUser || ($data['peran'] ?? 'admin') !== 'admin')) {
            return response()->json(['message' => 'Akun administrator yang sedang digunakan tidak dapat dinonaktifkan atau mengganti peran sendiri.'], 422);
        }

        $demotingAdmin = $user->peran === 'admin' && isset($data['peran']) && $data['peran'] !== 'admin';

        if ($user->peran === 'admin' && ($deactivatingUser || $demotingAdmin) && $user->aktif) {
            $activeAdmins = User::query()->where('peran', 'admin')->where('aktif', true)->count();

            if ($activeAdmins <= 1) {
                return response()->json(['message' => 'Setidaknya satu administrator aktif harus dipertahankan.'], 422);
            }
        }

        $user->update($data);

        return response()->json($user->refresh()->only(['id', 'name', 'username', 'email', 'peran', 'aktif']));
    }

    public function linkProfile(Request $request, User $user): JsonResponse
    {
        $data = $request->validate([
            'profile_type' => ['required', Rule::in(['siswa', 'guru', 'pembimbing_dudi', 'orang_tua'])],
            'profile_id' => ['required', 'integer'],
        ]);

        $profileClass = match ($data['profile_type']) {
            'siswa' => Siswa::class,
            'guru' => Guru::class,
            'pembimbing_dudi' => Dudi::class,
            'orang_tua' => OrangTua::class,
        };

        if ($user->peran !== $data['profile_type']) {
            throw ValidationException::withMessages([
                'profile_type' => 'Jenis profil harus sesuai dengan peran akun.',
            ]);
        }

        $profileId = $data['profile_id'];

        DB::transaction(function () use ($profileClass, $profileId, $user): void {
            User::query()->lockForUpdate()->findOrFail($user->id);

            /** @var Model $profile */
            $profile = $profileClass::query()->lockForUpdate()->findOrFail($profileId);

            if ($profile->getAttribute('user_id') !== null && (int) $profile->getAttribute('user_id') !== $user->id) {
                throw ValidationException::withMessages([
                    'profile_id' => 'Profil tersebut sudah terhubung ke akun lain.',
                ]);
            }

            $alreadyLinked = match (true) {
                $profile instanceof Siswa => Siswa::query()->where('user_id', $user->id)->where('id', '<>', $profile->id)->exists(),
                $profile instanceof Guru => Guru::query()->where('user_id', $user->id)->where('id', '<>', $profile->id)->exists(),
                $profile instanceof Dudi => Dudi::query()->where('user_id', $user->id)->where('id', '<>', $profile->id)->exists(),
                $profile instanceof OrangTua => OrangTua::query()->where('user_id', $user->id)->where('id', '<>', $profile->id)->exists(),
                default => false,
            };

            if ($alreadyLinked) {
                throw ValidationException::withMessages([
                    'profile_id' => 'Akun sudah terhubung ke profil lain dengan jenis yang sama.',
                ]);
            }

            $profile->setAttribute('user_id', $user->id);
            $profile->save();
        });

        return response()->json([
            'message' => 'Profil berhasil ditautkan ke akun.',
            'user' => $user->only(['id', 'name', 'username', 'peran']),
            'profile_type' => $data['profile_type'],
            'profile_id' => $profileId,
        ]);
    }
}
