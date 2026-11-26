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
        // 1. Periksa apakah terdapat data logbook duplikat (siswa_id, tanggal) di database
        $duplicates = DB::table('jurnals')
            ->select('siswa_id', 'tanggal', DB::raw('count(*) as total'))
            ->groupBy('siswa_id', 'tanggal')
            ->having('total', '>', 1)
            ->get();

        if ($duplicates->isNotEmpty()) {
            $details = $duplicates->map(function ($d) {
                return "Siswa ID: {$d->siswa_id}, Tanggal: {$d->tanggal} ({$d->total} entri)";
            })->implode('; ');

            throw new RuntimeException(
                "Migrasi dihentikan demi integritas data! Ditemukan entri logbook duplikat pada tabel jurnals: [{$details}]. " .
                "Data tidak dihapus secara otomatis. Silakan tangani duplikat tersebut secara aman sebelum menerapkan batasan unik."
            );
        }

        // 2. Tambahkan unique constraint siswa_id + tanggal dan kolom catatan_guru untuk modul L4
        Schema::table('jurnals', function (Blueprint $table) {
            $table->unique(['siswa_id', 'tanggal'], 'jurnals_siswa_id_tanggal_unique');
            if (!Schema::hasColumn('jurnals', 'catatan_guru')) {
                $table->text('catatan_guru')->nullable()->after('catatan_pembimbing');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jurnals', function (Blueprint $table) {
            $table->dropUnique('jurnals_siswa_id_tanggal_unique');
            if (Schema::hasColumn('jurnals', 'catatan_guru')) {
                $table->dropColumn('catatan_guru');
            }
        });
    }
};
