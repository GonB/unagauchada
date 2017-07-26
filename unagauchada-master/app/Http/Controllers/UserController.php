<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\input;
use App\Pago;
use App\Gauchada;
use App\Postula;
use Image;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perfil.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('perfil.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {  
        $user = User::find($user_id);
        $this->validate($request, [
                'name' => 'required|min:5',
                'email' => 'required|email',
            ]);
        $user->update($request->only('name', 'email','credits'));
        return redirect()->route('perfil_index_path');
    }

    public function update_image(Request $request)
    {
        if($request->hasFile('imagen')){
            $this->validate($request, [
                'imagen' => 'image',
            ]);
            $user = Auth::user();
            $image = $request->file('imagen');
            $filename = 'usuario' . $user->id . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/imagenes/usuarios/' . $filename));
            $user->imagen = $filename;
            $user->save();
        }
        return view('perfil.edit');
    }
    
    public function update_creditos(Pago $pago)
    {
       $user = User::find($pago->user_id);
       $user->credits=$user->credits+$pago->creditos;
       $user->save();
       return redirect()->route('home');
    }

    public function update_password(Request $request)
    {  
        $user = Auth::user();
        $this->validate($request, [
                'password' => 'required|min:6',
            ]);
        $user->password=bcrypt($request['password']);
        $user->save();
        return view('perfil.index');
    }
    public function edit_pass()
    {
        return view('perfil.updatepassword');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ver(User $user) {

        return view('perfil.show') -> with('user', $user);
    }

    public function buscarUser(Request $request)
    {
        $this->validate($request, [
            'nick' => 'required']);
       $users = User::where('nick','LIKE','%'.$request->nick.'%')->orderBy('id','desc')->paginate(10);
       return view('perfil.busqueda')->with('users', $users);
        
    }

    public function pointSum(User $user_pointSum, Gauchada $gauchada) 
    {
        //return $user_pointSum;
        //return $gauchada;
        $gauchada->titulo .= " [FINALIZADA]";
        $gauchada->activo=0;
        $gauchada->save();
        $user_pointSum->credits=$user_pointSum->credits + 1;
        $user_pointSum->score=$user_pointSum->score + 1;
        $user_pointSum->save();
        return redirect()->back();
    }

    public function pointNull(User $user_pointNull, Gauchada $gauchada) 
    {
        $gauchada->titulo .= " [FINALIZADA]";
        $gauchada->activo=0;
        $gauchada->save();
        $user_pointNull->credits=$user_pointNull->credits + 1;
        $user_pointNull->score=$user_pointNull->score + 0;
        $user_pointNull->save();
        return redirect()->back();
    }

    public function pointRes(User $user_pointRes, Gauchada $gauchada) 
    {
        $gauchada->titulo .= " [FINALIZADA]";
        $gauchada->activo=0;
        $gauchada->save();
        $user_pointRes->credits=$user_pointRes->credits + 1;
        if ($user_pointRes->score > 0) {
            $user_pointRes->score=$user_pointRes->score - 1;
        }   
        $user_pointRes->save();
        return redirect()->back();
    }

    public function historial(User $user){
        $gauchadas = DB::table('gauchadas')
                    ->where('user_id', '=', $user->id)
                    ->orderBy('id', 'desc')->get();

        $postulaciones = Postula::where('user_id', '=', $user->id)->orderBy('id','desc')->paginate(10);
        $realizadas = DB::table('gauchadas')
                        ->join('postulas', 'gauchadas.user_id', '=', 'postulas.user_id')
                        ->select('postulas.user_id', 'gauchadas.id', 'gauchadas.created_at')
                        ->where('gauchadas.activo', '=', '0')
                        ->where('gauchadas.seleccionado', '=', '1')
                        ->where('gauchadas.user_id', '=', $user->id)
                        ->get();
        return view('perfil.historial')->with('user',$user)->with('gauchadas',$gauchadas)->with('postulaciones',$postulaciones)->with('realizadas',$realizadas);

    }
    

}