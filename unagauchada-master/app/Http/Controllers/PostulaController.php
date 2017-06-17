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
        $gauch=Gauchada::find($_GET['gauchada']);
        $post=Postula::find($_GET['gauchada']);
         Postula::create([
                'user_id' => Auth::id(),
             'gauchada_id' => $gauch->id,
               ]);
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
