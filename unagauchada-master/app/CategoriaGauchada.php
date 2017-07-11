<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaGauchada extends Model
{
    protected $fillable = [
        'nombre','user_id',
    ];
}
