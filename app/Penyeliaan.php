<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyeliaan extends Model
{
    protected $fillable = [
        'user_id', 'nama', 'no_matrik', 'tajuk', 'status', 'sem' 
    ];
}
