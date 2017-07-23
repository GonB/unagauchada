<?php

namespace App\Http\Controllers;

use App\Admin;
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
        $messages = ['Desde.before' => 'Fecha Invalida, "Desde" debe ser menor a "Hasta"',
                    'Hasta.before_or_equal' =>'Fecha Invalida, "Hasta" debe ser menor o igual a la fecha actual',
                    ];
        $this->validate($request, [
            'Desde' => 'required|date|after:$request["Hasta"]',
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
