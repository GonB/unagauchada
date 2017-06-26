<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = [
        'comentario_id','user_id', 'contenido', 'created_at',
    ];
}
