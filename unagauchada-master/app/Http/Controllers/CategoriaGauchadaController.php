<?php

namespace App\Http\Controllers;

use App\CategoriaGauchada;
use Auth;
use Illuminate\Http\Request;

class CategoriaGauchadaController extends Controller
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
        $categoriagauchada = new CategoriaGauchada;
        return view('categoriagauchada.create')->with(['categoriagauchada' => $categoriagauchada]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $categoriagauchada)
    {
        $messages = ['nombre.unique' => 'Categoría ya existente'];
        $this->validate($categoriagauchada, [
            'nombre' => 'required|unique:categoria_gauchadas',
        ]);
        CategoriaGauchada::create([
            'user_id' => Auth::id(),
            'nombre' => $categoriagauchada['nombre'],
        ]);
        return redirect()->route('index_admin_path');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriaGauchada  $categoriaGauchada
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaGauchada $categoriaGauchada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriaGauchada  $categoriaGauchada
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaGauchada $categoriaGauchada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriaGauchada  $categoriaGauchada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaGauchada $categoriaGauchada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriaGauchada  $categoriaGauchada
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaGauchada $categoriaGauchada)
    {
        //
    }
}
