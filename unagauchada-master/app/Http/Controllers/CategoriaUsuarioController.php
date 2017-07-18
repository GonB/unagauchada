<?php

namespace App\Http\Controllers;

use App\CategoriaUsuario;
use Illuminate\Http\Request;

class CategoriaUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('categoriausuario.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriausuario= new CategoriaUsuario;
        return view('categoriausuario.create')->with(['categoriausuario' => $categoriausuario]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $categoriausuario)
    {
        $messages = ['nombre.unique' => 'Categoría ya existente'];
         $this->validate($categoriausuario, [
            'nombre' => 'required|unique:categoria_usuarios',
            'rango_inicial' => 'required',
            'rango_final' => 'required',
        ],
        $messages);
        CategoriaUsuario::create([
            'nombre' => $categoriausuario['nombre'],
            'rango_inicial' => $categoriausuario['rango_inicial'],
            'rango_final' => $categoriausuario['rango_final'],
        ]);
        return redirect()->route('index_admin_path');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriaUsuario  $categoriaUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaUsuario $categoriaUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriaUsuario  $categoriaUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaUsuario $categoriaUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriaUsuario  $categoriaUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaUsuario $categoriaUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriaUsuario  $categoriaUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaUsuario $categoriaUsuario)
    {
        //
    }
}
