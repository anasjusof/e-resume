<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KajianDanPenyelidikan extends Model
{
    protected $fillable = [
        'user_id', 'tajuk', 'senarai_penyelidik', 'tahun_geran', 'sumber', 'status' 
    ];
}
