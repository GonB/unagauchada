<?php

namespace App\Http\Controllers;

use App\Pago;
use Illuminate\Http\Request;
use Auth;
use App\User;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pago.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pago= new Pago;
        return view('pago.create')->with(['pago' => $pago]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $pago)
    {
         $this->validate($pago, [
        'numero_tarjeta' => 'required|min:16',
        'cod_seguridad' => 'required|min:3',
        'vencimiento' => 'required|after:today',
        'creditos' => 'required|max:999',
    ]);
    Pago::create([
            'user_id' => Auth::id(),
            'numero_tarjeta' => $pago['numero_tarjeta'],
            'cod_seguridad' => $pago['cod_seguridad'],
            'vencimiento' => $pago['vencimiento'],
            'creditos' => $pago['creditos'],
            ]);
    return redirect()->route('update_creditos_path')->with(['pago' =>$pago]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
