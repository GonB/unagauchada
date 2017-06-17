<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postula extends Model
{
    protected $fillable = [
        'user_id','gauchada_id','seleccionado'
    ];
}
