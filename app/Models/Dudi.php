<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dudi extends Model
{
    public function siswas()
{
    return $this->hasMany(Siswa::class, 'dudi_id');
}
}
