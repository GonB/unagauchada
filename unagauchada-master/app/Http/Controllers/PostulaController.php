<?php

namespace App\Http\Controllers;

use App\Postula;
use Illuminate\Http\Request;
use App\Gauchada;
use Auth;

class PostulaController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Gauchada $gauchada)
    {
        $post=Postula::find($gauchada->id);

        Postula::create([
            'user_id' => Auth::id(),
            'gauchada_id' => $gauchada->id,
        ]);

        return redirect()->route('indexpublico_gauchada_path');
    }

    public function choose(Postula $postula)
    {
        $postula->seleccionado = 1;
        $postula->save();
        return redirect()->back();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Postula  $postula
     * @return \Illuminate\Http\Response
     */
    public function show(Postula $postula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postula  $postula
     * @return \Illuminate\Http\Response
     */
    public function edit(Postula $postula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postula  $postula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postula $postula)
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
        $postulaciones = Postula::all();
        foreach ($postulaciones  as $p) {
            if (($p->gauchada_id == $gauchada->id) and ($p->user_id == Auth::id())) 
            {
                $p -> delete();
            }
        }
        return redirect()->route('indexpublico_gauchada_path');
    }
}
