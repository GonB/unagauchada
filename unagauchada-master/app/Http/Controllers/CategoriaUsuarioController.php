<?php

namespace App\Http\Controllers;

use App\CategoriaUsuario;
use App\User;
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
        $error='';
        return view ('categoriausuario.index')->with(['error1' => $error]);
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

        $error='';
        $rangoCorrecto = True;
        $ri = $categoriausuario->rango_inicial;
        $rf = $categoriausuario->rango_final;

        if (($ri < 0) or ($ri >= $rf)){
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
            return view ('categoriausuario.index')->with(['error1' => $error]);
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
        $error = '';
        return view('categoriausuario.edit')-> with (['categoriaUsuario' => $categoriaUsuario])->with(['error1' => $error]);
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
        $error = '';
        $rangoCorrecto = True;
        $nombreCorrecto = True;
        $ri = $request->rango_inicial;
        $rf = $request->rango_final;
        $nom = $request->nombre;
        if (($ri < 0) or ($ri >= $rf)){
            $error = 'Categoría fuera de rango';
            $rangoCorrecto = false;
        } 
        foreach (CategoriaUsuario::all() as $cat) {
            if ((!((($ri < $cat->rango_inicial) and ($rf < $cat->rango_inicial)) 
                or (($ri > $cat->rango_final) and ($rf > $cat->rango_final))))
                and ($cat->id != $categoriaUsuario->id)) {
                $error = 'Categoría fuera de rango';
                $rangoCorrecto = False;
            }
            if (($cat->nombre == $nom) and ($cat->id != $categoriaUsuario->id)) {
                $error = 'Categoria ya existente';
                $nombreCorrecto = False;
            }
        }

        if (($rangoCorrecto) and ($nombreCorrecto)){
            $messages = ['nombre.required' => 'El nombre no puede ser vacío'];
            $this->validate($request, [
                'nombre' => 'required',
                'rango_inicial' => 'required',
                'rango_final' => 'required',
            ]);
            $categoriaUsuario->update(
                $request->only('nombre','rango_inicial','rango_final')
            );
            session()->flash('message', 'Categoria de Usuarios Actualizada!');
            return redirect()->route('index_categoriausuario_path');
        } else {            
            return view('categoriausuario.edit')-> with (['categoriaUsuario' => $categoriaUsuario])->with(['error1' => $error]);
        }
    }

    public function delete(CategoriaUsuario $categoriaUsuario, Request $request)
    {
        $error = '';
        $tiene_usuarios = False;
        foreach (User::all() as $usuario) {
            if (($usuario->score >= $categoriaUsuario->rango_inicial) 
                and ($usuario->score <= $categoriaUsuario->rango_final)) {
                $tiene_usuarios = True;
            }
        }
        if ($tiene_usuarios) {
            $error = 'No se puede eliminar una categoría con Usuarios';
            return view ('categoriausuario.index')->with(['error1' => $error]);
        } else {
            $categoriaUsuario->delete();
            session()->flash('message', 'Categoria de Usuarios Borrada!');
            return view ('categoriausuario.index')->with(['error1' => $error]);
        }
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
