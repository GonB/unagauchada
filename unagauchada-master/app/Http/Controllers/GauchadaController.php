<?php

namespace App\Http\Controllers;

use App\Gauchada;
use Illuminate\Http\Request;

class GauchadaController extends Controller
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
    public function create()
    {
        return view('gauchada.create');
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

           return  Gauchada::create([
            'titulo' => $gauchada['titulo'],
            'descripcion' => $gauchada['descripcion'],
            'fecha_limite' => $gauchada['fecha_limite'],
            ]);

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
        //
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
