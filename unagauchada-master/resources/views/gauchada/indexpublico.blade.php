
@extends('layouts.app') 
 <?php 
   use App\User;
  ?>
@section('content')
    @foreach($gauchada as $gauchada)
        <div class="row">
             <div class="col-md-8 col-md-offset-2">

                <small class="pull-left">

                  <h2>{{ $gauchada->titulo }}</h2>  
                  <p>{{ $gauchada->descripcion }}</p>
                  <p>Fecha Limite: {{$gauchada->fecha_limite}}</p>
                    <?php   $user= User::find($gauchada->user_id);
                    echo "Creado por $user->nick"
                  ?>
                  <p>Posteado: {{ $gauchada->created_at->diffForHumans() }}</p>
                  
                </small>
            </div>
        </div>
        <hr>
    @endforeach
@endsection