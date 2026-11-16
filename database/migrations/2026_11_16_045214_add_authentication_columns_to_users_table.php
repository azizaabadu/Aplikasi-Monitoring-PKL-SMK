<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $addedUsername = ! Schema::hasColumn('users', 'username');
        $addedRole = ! Schema::hasColumn('users', 'peran');

        if ($addedUsername) {
            Schema::table('users', function (Blueprint $table): void {
                $table->string('username')->nullable()->after('name');
            });
        }

        if ($addedRole) {
            Schema::table('users', function (Blueprint $table): void {
                $table->enum('peran', ['siswa', 'guru', 'pembimbing_dudi', 'orang_tua', 'kepala_sekolah', 'admin'])
                    ->default('siswa')
                    ->after('password');
            });
        }

        if (! Schema::hasColumn('users', 'aktif')) {
            Schema::table('users', function (Blueprint $table): void {
                $table->boolean('aktif')->default(true)->after('peran');
            });
        }

        DB::table('users')
            ->whereNull('username')
            ->orderBy('id')
            ->chunkById(200, function ($users): void {
                foreach ($users as $user) {
                    $username = 'akun_'.$user->id;
                    $suffix = 1;

                    while (DB::table('users')->where('username', $username)->exists()) {
                        $username = 'akun_'.$user->id.'_'.$suffix;
                        $suffix++;
                    }

                    DB::table('users')->where('id', $user->id)->update(['username' => $username]);
                }
            });

        $hasUniqueUsernameIndex = collect(Schema::getIndexes('users'))
            ->contains(fn (array $index): bool => $index['unique'] && $index['columns'] === ['username']);

        if (! $hasUniqueUsernameIndex) {
            $duplicateUsernameExists = DB::table('users')
                ->select('username')
                ->whereNotNull('username')
                ->groupBy('username')
                ->havingRaw('COUNT(*) > 1')
                ->exists();

            if ($duplicateUsernameExists) {
                throw new LogicException('Username duplikat ditemukan. Rapikan username sebelum migrasi dilanjutkan.');
            }

            Schema::table('users', function (Blueprint $table): void {
                $table->unique('username');
            });
        }

        if ($addedRole) {
            $this->assignExistingProfileRoles();
        }

        DB::table('users')->whereNull('peran')->update(['peran' => 'siswa']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Keep account identifiers and roles: this migration may overlap columns in the base schema.
    }

    private function assignExistingProfileRoles(): void
    {
        foreach ([
            'siswas' => 'siswa',
            'gurus' => 'guru',
            'dudis' => 'pembimbing_dudi',
            'orang_tuas' => 'orang_tua',
        ] as $table => $role) {
            if (! Schema::hasTable($table) || ! Schema::hasColumn($table, 'user_id')) {
                continue;
            }

            DB::table('users')
                ->whereIn('id', DB::table($table)->select('user_id')->whereNotNull('user_id'))
                ->update(['peran' => $role]);
        }
    }
};
