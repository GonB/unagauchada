<?php

namespace App\Http\Controllers;

use App\CategoriaGauchada;
use App\Gauchada;
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
        return view ('CategoriaGauchada.index');
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
        return view( 'categoriagauchada.edit')-> with (['categoriaGauchada' => $categoriaGauchada]);
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
        $messages = ['nombre.unique' => 'Categoría ya existente'];
        $messages = ['nombre.required' => 'El nombre no puede ser vacío'];
        $this->validate($request, [
            'nombre' => 'required|unique:categoria_gauchadas',
        ]);
        $categoriaGauchada->update(
            $request->only('nombre')
        );
        session()->flash('message', 'Categoria de Gauchada Actualizada!');
        return redirect()->route('index_categoriagauchada_path');
    }

    public function delete(CategoriaGauchada $categoriaGauchada, Request $request)
    {
        $tiene_gauchadas = False;
        foreach (Gauchada::all() as $gauchada) {
            if ($gauchada->categoria == $categoriaGauchada->id) {
                $tiene_gauchadas = True;
            }
        }
        if ($tiene_gauchadas) {
            //JavaScript::alert('Existen Gauchadas en esta categoria, no se puede eliminar.');
            return redirect()->route('index_categoriagauchada_path');
        } else {
            $categoriaGauchada->delete();
            session()->flash('message', 'Gauchada Borrada!');
            return redirect()->route('index_categoriagauchada_path');
        }
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
