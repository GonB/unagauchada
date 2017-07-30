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

    public function edit(Respuesta $respuesta)
    {
        return view('respuesta.edit')->with('respuesta', $respuesta);
    }

    public function update(Request $request, Respuesta $respuesta)
    {
         $this->validate($request, [
                'contenido' => 'required|min:15',
            ]);
        $respuesta->update(
            $request->only('contenido')
        );
        session()->flash('message', 'Respuesta Actualizada!');
        $comentario = Comentario::find($respuesta->comentario_id); 
        $gauchada = Gauchada::find($comentario->gauchada_id);
        return redirect()->route('gauchada_path', ['gauchada' => $gauchada]);
    }

    public function delete_confirm(Respuesta $respuesta)
    {
        return view('respuesta.delete')->with('respuesta', $respuesta);
    }

    public function delete(Respuesta $respuesta)
    {
        $comentario = Comentario::find($respuesta->comentario_id);
        $gauchada= Gauchada::find($comentario->gauchada_id);
        $respuesta->delete();
        return redirect()->route('gauchada_path', ['gauchada' => $gauchada]); 
    }
}
