<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
   protected $fillable = [
        'user_id','numero_tarjeta','cod_seguridad','vencimiento','creditos'
    ];
}
