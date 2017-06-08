<?php

namespace App\Http\Controllers;

use App\Gauchada;
use Illuminate\Http\Request;
use Auth;

class GauchadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gauchada = Gauchada::orderBy('id','desc')->paginate(10);

        return view ('gauchada.index')->with(['gauchada' => $gauchada]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $gauchada = new Gauchada;
        return view('gauchada.create')->with(['gauchada' => $gauchada]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $gauchada)
    {
         $this->validate($gauchada, [
        'titulo' => 'required',
        'descripcion' => 'required',
    ]);
    Gauchada::create([
            'user_id' => Auth::id(),
            'titulo' => $gauchada['titulo'],
            'descripcion' => $gauchada['descripcion'],
            'fecha_limite' => $gauchada['fecha_limite'],
            ]);
     return redirect()->route('gauchadas_path');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gauchada  $gauchada
     * @return \Illuminate\Http\Response
     */
    public function show(Gauchada $gauchada_id)
    {

        return view('gauchada.show')-> with(['gauchada => $gauchada']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gauchada  $gauchada
     * @return \Illuminate\Http\Response
     */
    public function edit(Gauchada $gauchada)
    {
        return view( 'gauchada.edit')-> with (['gauchada' => $gauchada]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gauchada  $gauchada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gauchada $gauchada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gauchada  $gauchada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gauchada $gauchada)
    {
        //
    }
}
