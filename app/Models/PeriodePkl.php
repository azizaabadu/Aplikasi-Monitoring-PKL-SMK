<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PeriodePkl extends Model
{
    use HasFactory;

    protected $table = 'periode_pkl';

    protected $fillable = [
        'tahun_ajaran',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'maks_pilihan_mitra',
        'batas_hari_tidak_isi',
        'batas_hari_isi_mundur',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
            'maks_pilihan_mitra' => 'integer',
            'batas_hari_tidak_isi' => 'integer',
            'batas_hari_isi_mundur' => 'integer',
        ];
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
