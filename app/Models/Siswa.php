<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function dudi(): BelongsTo
    {
        return $this->belongsTo(Dudi::class, 'dudi_id');
    }

    public function jurnals(): HasMany
    {
        return $this->hasMany(Jurnal::class);
    }

    public function absensis(): HasMany
    {
        return $this->hasMany(Absensi::class);
    }

    public function penilaians(): HasMany
    {
        return $this->hasMany(Penilaian::class);
    }

    public function orangTua(): HasMany
    {
        return $this->hasMany(OrangTua::class);
    }

    public function pilihanMitras(): HasMany
    {
        return $this->hasMany(PilihanMitra::class);
    }

    public function penempatans(): HasMany
    {
        return $this->hasMany(Penempatan::class);
    }
}
