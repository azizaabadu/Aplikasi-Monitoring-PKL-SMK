<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dudi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_dudi',
        'alamat',
        'pimpinan',
        'kontak',
        'kuota',
        'aktif',
    ];

    protected function casts(): array
    {
        return [
            'kuota' => 'integer',
            'aktif' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function siswas(): HasMany
    {
        return $this->hasMany(Siswa::class, 'dudi_id');
    }

    public function kuotas(): HasMany
    {
        return $this->hasMany(DudiKuota::class);
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
