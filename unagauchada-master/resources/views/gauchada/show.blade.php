@extends('layouts.app')

@section('content')
     <div class="row">
        <div class="col-md-12">
            <h2>{{ $gauchada->titulo }}</h2>
            <p>{{ $gauchada->descripcion }}</p>
            <p>{{$gauchada->fecha_limite}}</p>
             <?php   $user= User::find($gauchada->user_id);
                    echo "Creado por $user->nick"
                  ?>
            <p>Posteado {{ $gauchada->created_at->diffForHumans() }}</p>
        </div>
    </div>
    <hr>
@endsection