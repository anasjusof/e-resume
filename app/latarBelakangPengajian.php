<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class latarBelakangPengajian extends Model
{
    protected $fillable = [
        'user_id', 'institusi', 'tahap_kelulusan', 'nama_kelulusan' 
    ];
}
