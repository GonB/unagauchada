@extends('layouts.app')
<?php 
  use App\User; 
  use App\Postula;
?>
@section('content')
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $gauchada->titulo }}</h2>
            <p>{{ $gauchada->descripcion }}</p>
            <p>Fecha Limite: {{$gauchada->fecha_limite}}</p>
             <?php   $user= User::find($gauchada->user_id);
                    echo "Creado por $user->nick"
                  ?>
            <p>Postulantes:<br>
            @foreach(Postula::all() as $post)
              <?php
                if ($post->gauchada_id == $gauchada->id) {
                  $user_p = User::where('id', '=', $post->user_id)->first();
              ?>
                -{{$user_p -> nick}}<br>
              <?php
                }
              ?>
            @endforeach
            <p>Posteado {{ $gauchada->created_at->diffForHumans() }}</p>
        </div>
    </div>
    <hr>
@endsection