<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gauchada extends Model
{
    protected $fillable = [
        'user_id','titulo', 'descripcion', 'fecha_limite',
    ];
}
