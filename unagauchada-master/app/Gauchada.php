<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gauchada extends Model
{
    protected $fillable = [
        'titulo', 'descripción', 'fecha_limite',
    ];
}
