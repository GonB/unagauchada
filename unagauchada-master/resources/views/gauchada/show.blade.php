@extends('layouts.app')
<?php 
  use App\User; 
  use App\Postula;
  use App\Comentario;
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
            <form action="{{route('create_comentario_path', ['gauchada' => $gauchada])}}" method='GET'>
              <small class="pull-right">
                <button type="submit" class="btn btn-warning" autofocus="">Añadir Comentario</button>
              </small>
            </form>
            <p>Postulantes:<br>

            <!-- SI ES MI GAUCHADA -->
            @if ($gauchada->user_id == Auth::id())
              @foreach(Postula::all() as $post)
                <?php
                  if ($post->gauchada_id == $gauchada->id) {
                    $user_p = User::where('id', '=', $post->user_id)->first();
                ?>
                  - <a href="{{ route('ver_perfil_path', ['user' => $user_p]) }}">{{$user_p -> nick}}</a>
                  <button type="submit" class="btn btn-info" autofocus="">Elegir</button>
                  <br>
                <?php
                  }
                ?>
              @endforeach
            <!-- SI NO ES MI GAUCHADA -->
            @else
              @foreach(Postula::all() as $post)
                <?php
                  if ($post->gauchada_id == $gauchada->id) {
                    $user_p = User::where('id', '=', $post->user_id)->first();
                ?>
                  - <a href="{{ route('ver_perfil_path', ['user' => $user_p]) }}">{{$user_p -> nick}}</a><br>
                <?php
                  }
                ?>
              @endforeach
            @endif



            <p>Posteado {{ $gauchada->created_at->diffForHumans() }}</p>


             <hr style="border-color:red;"><p><h3>Comentarios: </h3>
            @foreach(Comentario::all() as $comentario)
            <?php 
              if($comentario->gauchada_id == $gauchada->id){
                  $coment = Comentario::where('id', '=', $comentario->id)->first();
            ?>
                <hr style="border-color:red;"><p>{{$coment->contenido}}</p>
                 <p>{{User::find($coment->user_id)->name}}</p>
                 <p> {{$coment->created_at}}</p>
             <?php  
               }
             ?>

            @endforeach
        </div>
    </div>
    <hr>
@endsection
