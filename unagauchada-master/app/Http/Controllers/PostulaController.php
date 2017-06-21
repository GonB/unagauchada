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

    public function existe(Postula $p) {
        $id = 1;
        echo $p->user_id;
        foreach (Postula::find('id', $id) as $post) {
            if (($post->gauchada_id == $p->gauchada_id) &&
                ($post->user_id == $p->user_id)) {
                return true;
            }
            $id = $id + 1;
        }
        return false;
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
        
        // esto es para ver si ya existe la postulacion
        //los return son para ver como iban las variables
        $existe = True;
        $postulaciones = Postula::all();
        //return array($postulaciones, $gauch);
        foreach ($postulaciones  as $p) {
            //return $p;
            if (($p->gauchada_id == $gauchada->id) and ($p->user_id == Auth::id())) 
            {
                //return 'entra al if';
                $existe = False;
            }
        }

        if ($existe) {
            Postula::create([
                'user_id' => Auth::id(),
                'gauchada_id' => $gauchada->id,
            ]);
        }
        return redirect()->route('indexpublico_gauchada_path');
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
     * @param  \App\Postula  $postula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postula $postula)
    {
        //
    }
}
