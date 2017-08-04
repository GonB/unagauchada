<?php

namespace App\Http\Controllers;

use App\Admin;
use App\CategoriaUsuario;
use Illuminate\Http\Request;
use App\User;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ranking()
    {
        $users = DB::table('users')
                    ->select('id','nick', 'score', 'email')
                    ->orderBy('score','desc')->get();
        return view ('admin.ranking')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gananciasForm()
    {
        return view('admin.ganancias');
    }

    public function gananciasShow( Request $request)
    {
        $fecha = $request['Hasta'];
        $messages = ['Desde.before' => 'Fecha inválida, "Desde" debe ser menor a "Hasta"',
                    'Hasta.before_or_equal' =>'Fecha inválida, "Hasta" debe ser menor o igual a la fecha actual',
                    ];
        $this->validate($request, [
            'Desde' => 'required|date',
            'Hasta' => 'required|date|before_or_equal:today',
        ],
        $messages);
        $ganancias = DB::table('pagos')
                    ->select('creditos')
                    ->whereBetween('created_at', array($request["Desde"], $request["Hasta"]))->get();
        $sum = 0;
        foreach ($ganancias as $ganancias) {
            $sum = $sum + $ganancias->creditos;
        }
        return view('admin.gananciasshow')->with('sum', $sum);    
    }

    public function cambioCat(Request $request, User $user) {
        $cat = CategoriaUsuario::find($request->categoria);
        $user->score=$cat->rango_inicial;
        $user->save();
        return view('perfil.show') -> with('user', $user);
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
