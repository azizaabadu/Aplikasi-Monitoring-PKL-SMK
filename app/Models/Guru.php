<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function siswas()
{
    return $this->hasMany(Siswa::class, 'guru_id');
}
}
