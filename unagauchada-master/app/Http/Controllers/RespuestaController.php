<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use App\Respuesta;
use App\Gauchada;
use Auth;

class RespuestaController extends Controller
{
    public function create(Comentario $comentario)
    {
       $respuesta= new Respuesta;
       return view ('respuesta.create')->with(['comentario' => $comentario, 'respuesta' =>$respuesta]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $respuesta, Comentario $comentario)
    {
            $this->validate($respuesta, [
                'contenido' => 'required|min:10',
            ]);
            Respuesta::create([
                'comentario_id' => $comentario->id,
                'user_id' => Auth::user()->id,
                'contenido' => $respuesta['contenido'],
            ]);
             return view('gauchada.show')->with(['gauchada' => Gauchada::find($comentario->gauchada_id)]);
         }

}
