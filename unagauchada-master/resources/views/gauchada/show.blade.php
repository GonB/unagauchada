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
            <h3>Comentarios: </h3>
            @foreach(Comentario::all() as $comentario)
            <?php 
              if($comentario->gauchada_id == $gauchada->id){
                  $coment = Comentario::where('id', '=', $comentario->gauchada_id)->first();
              }
             ?>
              <hr style="border-color:red;"><p>{{$comentario->contenido}}</p>
             <p>Comentado por: {{User::find($comentario->user_id)->name}}</p>

            @endforeach
        </div>
    </div>
    <hr>
@endsection