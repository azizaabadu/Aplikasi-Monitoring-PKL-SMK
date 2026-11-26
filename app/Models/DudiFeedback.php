<?php

namespace App\Models;

use Database\Factories\DudiFeedbackFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DudiFeedback extends Model
{
    /** @use HasFactory<DudiFeedbackFactory> */
    use HasFactory;

    protected $fillable = ['dudi_id', 'siswa_id', 'kategori', 'judul', 'deskripsi', 'status'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function dudi(): BelongsTo
    {
        return $this->belongsTo(Dudi::class);
    }
}
