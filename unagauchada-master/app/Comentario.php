<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'user_id','gauchada_id', 'contenido', 'created_at',
    ];
}
