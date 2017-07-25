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
        $error = '';
        $categoriausuario= new CategoriaUsuario;
        return view('categoriausuario.create')->with(['categoriausuario' => $categoriausuario])->with(['error1' => $error]);
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

        $rangoCorrecto = True;
        $ri = $categoriausuario->rango_inicial;
        $rf = $categoriausuario->rango_final;

        if (($ri < 1) or ($ri >= $rf)){
            $rangoCorrecto = false;
        } else {
            foreach (CategoriaUsuario::all() as $cat) {
                if (!((($ri < $cat->rango_inicial) and ($rf < $cat->rango_inicial)) 
                    or (($ri > $cat->rango_final) and ($rf > $cat->rango_final)))) {
                    $rangoCorrecto = False;
                }
            }
        }

        if ($rangoCorrecto) {
            CategoriaUsuario::create([
                'nombre' => $categoriausuario['nombre'],
                'rango_inicial' => $categoriausuario['rango_inicial'],
                'rango_final' => $categoriausuario['rango_final'],
            ]);
            return view ('categoriausuario.index');
        } else {
            $error='Categoria fuera de rango.';
            $categoriausuario= new CategoriaUsuario;
            return view('categoriausuario.create')->with(['categoriausuario' => $categoriausuario])->with(['error1' => $error]);
        }
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
