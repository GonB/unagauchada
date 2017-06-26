<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\input;
use App\Pago;


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
                'password' => 'required|min:6'
            ]);
        $user->update($request->only('name', 'email','password','credits'));
        return redirect()->route('perfil_index_path');
    }
    
    public function update_creditos(Pago $pago)
    {
       $user = User::find($pago->user_id);
       $user->credits=$user->credits+$pago->creditos;
       $user->save();
       return redirect()->route('home');
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
    public function search(Request $request)
    {
        if (empty(Input::get('search'))) return redirect()->back();
    
        $search = urlencode(e(Input::get('search')));
        $user = User::where('nick', $search) -> first();
        if ($user != null) {
            return redirect()->route('ver_perfil_path', ['user' => $user]);
        }else
            redirect()->route('home');
   
    }
}