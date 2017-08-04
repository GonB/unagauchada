<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;
use App\Gauchada;
use Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Gauchada $gauchada)
    {
       $comentario= new Comentario;
       return view ('comentario.create')->with(['comentario' => $comentario, 'gauchada' =>$gauchada]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $comentario, Gauchada $gauchada)
    {
            $this->validate($comentario, [
                'contenido' => 'required|min:15',
            ]);
            Comentario::create([
                'user_id' => Auth::id(),
                'gauchada_id' => $gauchada->id,
                'contenido' => $comentario['contenido'],
                session()->flash('message', '¡Nuevo comentario añadido!')
            ]);
             return view('gauchada.show')->with(['gauchada' => $gauchada]);
         }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        return view('comentario.edit')->with('comentario',$comentario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
         $this->validate($request, [
                'contenido' => 'required|min:15',
            ]);
        $comentario->update(
            $request->only('contenido')
        );
        session()->flash('message', 'Comentario Actualizado!');
        $gauchada = Gauchada::find($comentario->gauchada_id);
        return redirect()->route('gauchada_path', ['gauchada' => $gauchada]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function delete_confirm(Comentario $comentario)
    {
        return view('comentario.delete')->with('comentario', $comentario);
    }


    public function delete(Comentario $comentario)
    {
        $gauchada=Gauchada::find($comentario->gauchada_id);
       $comentario->delete();
       session()->flash('message', '¡Comentario eliminado!');
       return redirect()->route('gauchada_path', ['gauchada' => $gauchada]);
    }
}
