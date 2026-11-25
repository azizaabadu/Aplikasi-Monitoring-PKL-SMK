<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penempatan extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'periode_pkl_id', 'dudi_id', 'ditetapkan_oleh', 'status', 'disetujui_pada'];

    protected $casts = [
        'disetujui_pada' => 'datetime',
    ];

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

    public function penetap(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ditetapkan_oleh');
    }
}
