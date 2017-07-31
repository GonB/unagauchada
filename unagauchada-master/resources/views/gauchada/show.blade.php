@extends('layouts.app')
<?php 
  use App\User; 
  use App\Postula;
  use App\Comentario;
  use App\Gauchada;
  use App\CategoriaGauchada;
  use App\Respuesta;
?>
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $gauchada->titulo }}</h2>
            <div class= "pull-left">
              <img src="/imagenes/gauchadas/{{ $gauchada->imagen }}" style="margin-right:10px" width="200" height="200" >
            </div><br>
            <p><strong>{{ $gauchada->descripcion }}</p></strong>
            <p>Fecha Limite: {{$gauchada->fecha_limite}}</p>
            <?php $cate = CategoriaGauchada::where('id', '=', $gauchada->categoria)->first(); ?>
            <p>Categoria: {{ $cate -> nombre }}</p>
            <?php   $user= User::find($gauchada->user_id); ?>
            <p>Creado por: <a href="{{ route('ver_perfil_path', ['user' => $user]) }}">{{ $user -> nick }}</a></p>
            <p>Posteado {{ $gauchada->created_at->diffForHumans() }}</p>
            
            <!-- SOLO PODRÁ VER ESTO EL AUTOR DE LA GAUCHADA -->
            @if($gauchada->user_id == Auth::id())
              
               <h4 class="pull-left" style="margin:0px;padding:15px 0px;text-align: center;">- Postulantes -</h4><br><br>

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
                      <form action="{{ route('choose_postula_path', ['postula' => $post, 'gauchada' => $gauchada->id]) }}" method='GET'>
                      {{ csrf_field() }}
                      <p style="margin: 0px;">- <a href="{{ route('ver_perfil_path', ['user' => $user_p]) }}">{{ $user_p -> nick }}</a>
                      
                      <?php
                      if (! $hay) { ?>
                        @if ($gauchada->activo)
                            <button type="submit" class="btn btn-info" autofocus="" onclick="alert('Postulante Elegido!')">Elegir</button>
                        @endif
                      <?php
                      } ?>
                      </p>
                      </form>
                    <?php
                    } ?>
                @endforeach
              <!-- SI NO ES MI GAUCHADA -->
              @else
                <?php $es_mia = False; ?>
              @endif
              
              @if ($hay)
                <p>
                  Postulante elegido: 
                  <a href="{{ route('ver_perfil_path', ['user' => $postu_eleg]) }}"> {{ $postu_eleg -> nick }}</a>
                  @if (($es_mia) and ($gauchada->activo))
                    <p style="margin: 0px; display: inline-block;">Puntuación:
                      <div style="padding-left: 15px; display: inline-block;">
                        <div style="display: inline-block;">
                          <form action="{{ route('pointSum_perfil_path', ['user_pointSum' => $postu_eleg, 'gauchada' => $gauchada]) }}" method='GET'>
                            <button type="submit" class="btn btn-danger" id="Sum" autofocus="" style="font-size: 15px;" onclick="alert('Puntuaste +1 al usuario')">+</button>
                          </form>
                        </div>
                        <div style="display: inline-block;">
                        <form action="{{ route('pointNull_perfil_path', ['user_pointNull' => $postu_eleg, 'gauchada' => $gauchada]) }}" method='GET'>
                          <button type="submit" class="btn btn-primary" id="Null" autofocus="" onclick="alert('Puntuacion Nula')">0</button>
                        </form>
                        </div>
                        <div style="display: inline-block;">
                        <form action="{{ route('pointRes_perfil_path', ['user_pointRes' => $postu_eleg, 'gauchada' => $gauchada]) }}" method='GET'>
                          <button type="submit" class="btn btn-warning" id="Res" autofocus="" onclick="alert('Puntuaste -1 al usuario')">-</button>
                        </form>
                        </div>
                      </div>
                    </p>
                  @endif
                </p>
              @endif
            @endif

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
               <div class= "pull-left">
              <img src="/imagenes/usuarios/{{ User::find($coment->user_id)->imagen }}" style="margin-right:10px" width="65" height="65" >
              </div>
                <h3><strong>{{User::find($coment->user_id)->nick}}</strong></h3>
               {{$coment->contenido}}<br>
              
               <div class="pull-center">{{$coment->created_at->diffForHumans()}}</div><br>



               
              <!--BOTON RESPUESTA //// SI ES MI GAUCHADA -->

              @if(($gauchada->user_id == Auth::id())and(!$hay)and($coment->user_id != Auth::id()))
                @if ($gauchada->activo)
                  <form style="text-align: right;" action="{{route('create_respuesta_path', ['comentario' => $coment])}}" method='GET'>
                      <button type="submit" class="btn btn-danger" autofocus="">Responder Comentario</button>
                  </form> 
                @endif
              @endif

                <!--BOTON EDITAR COMENTARIO // SI ES MI COMENTARIO-->
               <?php

               $date=date("Y-m-d G:i:s", time());
               $f = (strtotime($date) - (strtotime($coment->created_at)))/60;
               $f = abs($f);
               $f = floor($f);
              
               
               ?>
             

                @if((!$hay))
                  @if(($coment->user_id == Auth::id())and($f<10))
                  <form style="text-align: right;" action="{{route('edit_comentario_path', ['comentario' => $coment])}}" method='GET'>
                      <button type="submit" class="btn btn-danger" autofocus="">Editar Comentario</button>
                  </form>

                  <form style="text-align: right;" action="{{route('confirm_delete_path', ['comentario' => $coment])}}" method='GET'>
                      <button type="submit" class="btn btn-warning" autofocus="">Eliminar Comentario</button>
                  </form>  
                  @endif
                @endif

              

              
              
               <!--Aca es para buscar la respuesta del comentario, pero falta hacerlo bien.-->
               @if($hay)
                <?php
                
                  $respuesta= Respuesta::where('comentario_id', '=', $coment->id)->first();
                
                  $date_resp=date("Y-m-d G:i:s", time());
                   $r = (strtotime($date_resp) - (strtotime($respuesta->created_at)))/60;
                   $r = abs($r);
                   $r = floor($r);
                 ?>
                  <div style="padding-left: 50px;">
                    <div class= "pull-left">
              <img src="/imagenes/usuarios/{{ User::find($respuesta->user_id)->imagen }}" style="margin-right:10px" width="65" height="65" >
            </div><br>
                    <p style="margin:0px;"><strong>{{User::find($respuesta['user_id'])['nick']}}</strong></p>
                    <p style="margin:0px;">{{$respuesta['contenido']}}</p>
                    
                    <p style="margin:0px;">{{$respuesta['created_at']->diffForHumans()}}</p>
                  </div>

                    @if($respuesta->user_id == Auth::id()and($r<10)) 
                    <form style="text-align: right;" action="{{route('edit_respuesta_path', ['respuesta' => $respuesta])}}" method='GET'>
                      <button type="submit" class="btn btn-danger" autofocus="">Editar Respuesta</button>
                     </form>
                      <form style="text-align: right;" action="{{route('confirmdel_respuesta_path', ['respuesta' => $respuesta])}}" method='GET'>
                      <button type="submit" class="btn btn-warning" autofocus="">Eliminar Respuesta</button>
                     </form>  
                   @endif
                  @endif




                  <hr style="margin:10px 0px;border-color: coral;">

                 <?php
                   }
                  ?>

            @endforeach
        </div>
    </div>
    <hr>
@endsection