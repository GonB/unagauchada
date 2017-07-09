@extends('layouts.app')
<?php 
  use App\User; 
  use App\Postula;
  use App\Comentario;
  use App\Gauchada;
  use App\Respuesta;
?>
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $gauchada->titulo }}</h2>
            <p>{{ $gauchada->descripcion }}</p>
            <p>Fecha Limite: {{$gauchada->fecha_limite}}</p>
            <?php   $user= User::find($gauchada->user_id); ?>
            <p>Creado por: <a href="{{ route('ver_perfil_path', ['user' => $user]) }}">{{ $user -> nick }}</a></p>

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
                    <!-- EL FORM ESTA ACA Y NO EN EL BOTON MISMO POR CUESTION DE ESTETICA -->
                    <form action="{{ route('choose_postula_path', ['postula' => $post]) }}" method='GET'>
                    {{ csrf_field() }}
                    - <a href="{{ route('ver_perfil_path', ['user' => $user_p]) }}">{{ $user_p -> nick }}</a>
                    
                    <?php
                    if (! $hay) { ?>
                      @if ($gauchada->activo)
                        <button type="submit" class="btn btn-info" autofocus="" onclick="alert('Postulante Elegido!')">Elegir</button>
                      @endif
                <?php
                    } ?>
                    </form>
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
            
            @if ($hay)
              <p>
                Postulante elegido: 
                <a href="{{ route('ver_perfil_path', ['user' => $postu_eleg]) }}"> {{ $postu_eleg -> nick }}</a>
                @if (($es_mia) and ($gauchada->activo))
                  <form action="{{ route('pointSum_perfil_path', ['user_pointSum' => $postu_eleg, 'gauchada' => $gauchada]) }}" method='GET'>
                    <button type="submit" class="btn btn-success btn-sm" id="Sum" autofocus="" onclick="alert('Puntuaste +1 al usuario')">+</button>
                  </form>
                  <form action="{{ route('pointNull_perfil_path', ['user_pointNull' => $postu_eleg, 'gauchada' => $gauchada]) }}" method='GET'>
                    <button type="submit" class="btn btn-warning btn-sm" id="Null" autofocus="" onclick="alert('Puntuacion Nula')">0</button>
                  </form>
                  <form action="{{ route('pointRes_perfil_path', ['user_pointRes' => $postu_eleg, 'gauchada' => $gauchada]) }}" method='GET'>
                    <button type="submit" class="btn btn-danger btn-sm" id="Res" autofocus="" onclick="alert('Puntuaste -1 al usuario')">-</button>
                  </form>
                  
                @endif
              </p>
            @endif

            <p>Posteado {{ $gauchada->created_at->diffForHumans() }}</p>

            @if(Auth::check())
              @if ($gauchada->activo)
                <form style="text-align: right;" action="{{route('create_comentario_path', ['gauchada' => $gauchada])}}" method='GET'>
                    <button type="submit" class="btn btn-primary" autofocus="">Añadir Comentario</button>
                </form>
              @endif
            @endif

            <div style="margin:35px 0px;background-color: coral;color: white;">
              <hr style="border-color:black;margin: 0px;">
              <h3 style="margin:0px;padding:15px 0px;text-align: center;">- Comentarios -</h3>
              <hr style="border-color:black;margin: 0px;">
            </div>

            @foreach(Comentario::all() as $comentario)
                <?php 
                  if($comentario->gauchada_id == $gauchada->id){
                     $coment = Comentario::where('id', '=', $comentario->id)->first();
                  ?>
                <?php 
                    $hay = False;
                   foreach(Respuesta::all() as $resp) {
                        if (($coment->id == $resp->comentario_id)) {
                            $hay = True;
                        }
                   }
               ?>
               {{$coment->contenido}}<br>
               Autor: {{User::find($coment->user_id)->nick}}<br>
               {{$coment->created_at}}
               
              <!--BOTON RESPUESTA //// SI ES MI GAUCHADA -->

              @if(($gauchada->user_id == Auth::id())and(!$hay))
                @if ($gauchada->activo)
                  <form style="text-align: right;" action="{{route('create_respuesta_path', ['comentario' => $coment])}}" method='GET'>
                      <button type="submit" class="btn btn-danger" autofocus="">Responder Comentario</button>
                  </form> 
                @endif
              @endif

              
              
               <!--Aca es para buscar la respuesta del comentario, pero falta hacerlo bien.-->
                <?php
                  $respuesta= Respuesta::where('comentario_id', '=', $coment->id)->first();
                 ?>
                  <div style="padding-left: 50px;">
                    <br>
                    {{$respuesta['contenido']}}<br>
                    Autor: {{User::find($respuesta['user_id'])['nick']}}<br>
                    {{$respuesta['created_at']}}
                  </div>

                  <hr style="margin:10px 0px;border-color: coral;">

                 <?php
                   }
                  ?>

            @endforeach
        </div>
    </div>
    <hr>
@endsection