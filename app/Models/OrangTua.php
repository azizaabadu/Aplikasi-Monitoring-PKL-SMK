<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrangTua extends Model
{
    protected $fillable = ['user_id', 'siswa_id', 'nama_ayah', 'nama_ibu', 'nama_wali', 'kontak', 'alamat'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
