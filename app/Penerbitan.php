<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbitan extends Model
{
    protected $fillable = [
        'user_id', 'maklumat_penerbitan', 'tahap' 
    ];
}
