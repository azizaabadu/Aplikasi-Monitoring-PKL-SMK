<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function guru()
{
    return $this->belongsTo(Guru::class, 'guru_id');
}

public function dudi()
{
    return $this->belongsTo(Dudi::class, 'dudi_id');
}

public function jurnals()
{
    return $this->hasMany(Jurnal::class);
}

public function absensis()
{
    return $this->hasMany(Absensi::class);
}

public function penilaians()
{
    return $this->hasMany(Penilaian::class);
}
}
