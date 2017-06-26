@extends('layouts.app')
<?php 
  use App\User; 
  use App\Postula;
  use App\Comentario;
  use App\Gauchada;
?>
@section('content')
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $gauchada->titulo }}</h2>
            <p>{{ $gauchada->descripcion }}</p>
            <p>Fecha Limite: {{$gauchada->fecha_limite}}</p>
            <?php   $user= User::find($gauchada->user_id); ?>
            Creado por: <a href="{{ route('ver_perfil_path', ['user' => $user]) }}">{{ $user -> nick }}</a>
            <p>Postulantes:<br>

            <!-- ME FIJO SI YA HAY ALGUNO ELEGIDO -->
            <?php 
                $hay = False;
                foreach(Postula::all() as $post) {
                    //$gau = $post -> gauchada_id para conseguir -> usuario_id
                    $gau = Gauchada::where('id', '=', $post->gauchada_id) -> first();
                    if (($post->seleccionado == 1) && ($gauchada->id == $post->gauchada_id)) {
                        $hay = True;
                        $postu_eleg = User::where('id', '=', $post->user_id) -> first();
                    }
                }
            ?>

            <!-- SI ES MI GAUCHADA -->
            @if ($gauchada->user_id == Auth::id())
              <?php $es_mia = True; ?>
              @foreach(Postula::all() as $post)
                <?php
                  if ($post->gauchada_id == $gauchada->id) {
                    $user_p = User::where('id', '=', $post->user_id)->first();
                ?>
                    - <a href="{{ route('ver_perfil_path', ['user' => $user_p]) }}">{{ $user_p -> nick }}</a>
                    <?php
                    if (! $hay) { ?>
                      <form action="{{ route('choose_postula_path', ['postula' => $post]) }}" method='GET'>
                      {{ csrf_field() }}
                        <button type="submit" class="btn btn-info" autofocus="">Elegir</button>
                      </form>
                <?php
                    } ?>
                    <br>
                <?php
                  } ?>
              @endforeach
            <!-- SI NO ES MI GAUCHADA -->
            @else
              <?php $es_mia = False; ?>
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

            <form action="{{route('create_comentario_path', ['gauchada' => $gauchada])}}" method='GET'>
              <small class="pull-right">
                <button type="submit" class="btn btn-warning" autofocus="">Añadir Comentario</button>
              </small>
            </form>

            @if ($hay)
              <p>Postulante elegido: 
                <a href="{{ route('ver_perfil_path', ['user' => $postu_eleg]) }}"> {{ $postu_eleg -> nick }}</a>
              </p>
            @endif

            <p>Posteado {{ $gauchada->created_at->diffForHumans() }}</p>



             <hr style="border-color:black;"><p><h3>Comentarios: </h3>
            @foreach(Comentario::all() as $comentario)
            <?php 
              if($comentario->gauchada_id == $gauchada->id){
                  $coment = Comentario::where('id', '=', $comentario->id)->first();
            ?>
                <hr style="border-color:black;"><p>{{$coment->contenido}}</p>
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
