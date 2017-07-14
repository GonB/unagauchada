<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaUsuario extends Model
{
     protected $fillable = [
        'rango_inicial','rango_final', 'nombre',
    ];
}
