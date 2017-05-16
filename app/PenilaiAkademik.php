<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenilaiAkademik extends Model
{
    protected $fillable = [
        'user_id', 'nama', 'tajuk_projek', 'tahun', 'peringkat'
    ];
}
