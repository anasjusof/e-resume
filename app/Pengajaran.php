<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajaran extends Model
{
    protected $fillable = [
        'user_id', 'kod_kursus', 'nama_kursus', 'sem', 'bil_pelajar', 'tahap' 
    ];
}
