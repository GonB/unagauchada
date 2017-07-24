<?php

namespace App\Http\Controllers;

use App\Gauchada;
use App\CategoriaGauchada;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\input;
use App\User;
use App\Postula;
use DateTime;

class GauchadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gauchada = Gauchada::orderBy('id','desc')->paginate(10);

        foreach ($gauchada as $gau) {
            if ($gau->activo) {
                $hoy= new DateTime();
                if ($gau->fecha_limite < $hoy->format('Y-m-d')) {
                    $gau->titulo .= " [VENCIDA]";
                    $gau->activo=false;
                    $gau->save();
                }
            }
        }

        return view ('gauchada.index')->with(['gauchada' => $gauchada]);
    }

    public function indexpublico()
    {
        $gauchada = Gauchada::orderBy('id','desc')->paginate(10);
        
        foreach ($gauchada as $gau) {
            if ($gau->activo) {
                $hoy= new DateTime();
                if ($gau->fecha_limite < $hoy->format('Y-m-d')) {
                    $gau->titulo .= " [VENCIDA]";
                    $gau->activo=false;
                    $gau->save();
                }
            }
        }

        return view ('gauchada.indexpublico')->with(['gauchada' => $gauchada]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gauchada = new Gauchada;
        return view('gauchada.create')->with(['gauchada' => $gauchada]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $gauchada)
    {
        $user=User::find(Auth::id());
        if($user->credits>=1){
            $this->validate($gauchada, [
                'titulo' => 'required|min:5',
                'descripcion' => 'required|min:15',
                'fecha_limite' => 'required|after:today'
            ]);
            Gauchada::create([
                'user_id' => Auth::id(),
                'titulo' => $gauchada['titulo'],
                'descripcion' => $gauchada['descripcion'],
                'categoria' => $gauchada['categoria'],
                'fecha_limite' => $gauchada['fecha_limite'],
            ]);
            $user->credits=$user->credits-1;
            $user->save();
            return redirect()->route('gauchadas_path');
        } else
            return view('gauchada.error');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gauchada  $gauchada
     * @return \Illuminate\Http\Response
     */
    public function show(Gauchada $gauchada)
    {
        return view('gauchada.show')->with(['gauchada' => $gauchada]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gauchada  $gauchada
     * @return \Illuminate\Http\Response
     */
    public function edit(Gauchada $gauchada)
    {
        return view( 'gauchada.edit')-> with (['gauchada' => $gauchada]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gauchada  $gauchada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gauchada $gauchada)
    {
        $gauchada->update(
            $request->only('titulo', 'descripcion', 'fecha_limite')
        );
        session()->flash('message', 'Gauchada Actualizada!');
        return redirect()->route('gauchada_path', ['gauchada' => $gauchada]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gauchada  $gauchada
     * @return \Illuminate\Http\Response
     */
    public function delete(Gauchada $gauchada)
    {
        foreach (Postula::all() as $post) {
            if ($post->gauchada_id == $gauchada->id) {
                $post->delete();
            }
        }
        $gauchada->delete();
        $gau = Gauchada::orderBy('id','desc')->paginate(10);
        return view ('gauchada.indexpublico')->with(['gauchada' => $gau]);
    }


    public function search(Request $request)
    {        
        $this->validate($request, [
            'titulo' => 'required|min:3',
        ]);
        $gauchada = Gauchada::where('titulo', 'LIKE','%'.$request->titulo.'%')->orderBy('id','desc')->paginate(10);
        if($request->titulo != "") {
            return view ('gauchada.indexpublico')->with(['gauchada' => $gauchada]);
        }
    }

  
    public function categorizar(Request $request) 
    {
        //return $request['categoria'];
        if($request['categoria'] != 100) {
            $gauchada = Gauchada::where('categoria', 'LIKE', $request['categoria'])->orderBy('id','desc')->paginate(10);
            return view ('gauchada.indexpublico')->with(['gauchada' => $gauchada]);
        } else {
            $gauchada = Gauchada::orderBy('id','desc')->paginate(10);
            return view ('gauchada.indexpublico')->with(['gauchada' => $gauchada]);
        }
    } 


    public function despublicar(Gauchada $gauchada)
    {
        $gauchada->titulo .= " [DESPUBLICADA]";
        $gauchada->activo=false;
        $gauchada->save();
        return redirect()->route('gauchadas_path');
    }
}
