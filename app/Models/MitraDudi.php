<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraDudi extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'bidang_usaha',
        'nomor_mou',
        'status_mou',
    ];
}