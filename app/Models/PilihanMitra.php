<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PilihanMitra extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'periode_pkl_id', 'dudi_id', 'prioritas'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function periodePkl(): BelongsTo
    {
        return $this->belongsTo(PeriodePkl::class);
    }

    public function dudi(): BelongsTo
    {
        return $this->belongsTo(Dudi::class);
    }
}
