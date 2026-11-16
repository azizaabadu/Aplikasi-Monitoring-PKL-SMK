<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DudiKuota extends Model
{
    use HasFactory;

    protected $fillable = ['dudi_id', 'periode_pkl_id', 'kuota'];

    protected function casts(): array
    {
        return ['kuota' => 'integer'];
    }

    public function dudi(): BelongsTo
    {
        return $this->belongsTo(Dudi::class);
    }

    public function periodePkl(): BelongsTo
    {
        return $this->belongsTo(PeriodePkl::class);
    }
}
