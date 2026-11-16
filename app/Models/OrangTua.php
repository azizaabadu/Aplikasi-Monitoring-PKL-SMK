<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    public function siswa()
{
    return $this->belongsTo(Siswa::class);
}
}
