<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('absensis', function (Blueprint $table) {
            if (!Schema::hasColumn('absensis', 'kondisi')) {
                $table->string('kondisi')->default('baik')->after('status');
            }
            if (!Schema::hasColumn('absensis', 'catatan')) {
                $table->text('catatan')->nullable()->after('kondisi');
            }
        });

        Schema::table('jurnals', function (Blueprint $table) {
            if (!Schema::hasColumn('jurnals', 'jam_mulai')) {
                $table->time('jam_mulai')->nullable()->after('tanggal');
            }
            if (!Schema::hasColumn('jurnals', 'jam_selesai')) {
                $table->time('jam_selesai')->nullable()->after('jam_mulai');
            }
            if (!Schema::hasColumn('jurnals', 'hasil')) {
                $table->text('hasil')->nullable()->after('kegiatan');
            }
            if (!Schema::hasColumn('jurnals', 'kendala')) {
                $table->text('kendala')->nullable()->after('hasil');
            }
            if (!Schema::hasColumn('jurnals', 'terlambat')) {
                $table->boolean('terlambat')->default(false)->after('status');
            }
            if (!Schema::hasColumn('jurnals', 'is_draft')) {
                $table->boolean('is_draft')->default(false)->after('terlambat');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absensis', function (Blueprint $table) {
            $table->dropColumn(['kondisi', 'catatan']);
        });

        Schema::table('jurnals', function (Blueprint $table) {
            $table->dropColumn(['jam_mulai', 'jam_selesai', 'hasil', 'kendala', 'terlambat', 'is_draft']);
        });
    }
};
