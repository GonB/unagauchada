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
    <div style="width: 850px;margin: 0px auto;">
        @if (Session::has('message'))
            <div class="alert" style="padding: 0px;margin: 0px auto 10px;background-color: #87a4b7;color: white;text-align: center;font-size: medium;width: 526px;border-radius: 20px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right: 10px;">&times;</button>
                {{ Session::get('message') }}
            </div>
        @endif
        <div>
            <div class="pull-center" style="font-size: 32px;color: dodgerblue;background-color: lavender;border-radius: 30px; text-align: center;">
              {{ $gauchada->titulo }}
            </div>
            <div class= "pull-left">
              <img src="/imagenes/gauchadas/{{ $gauchada->imagen }}" style="margin-right:10px" width="200" height="200">
            </div>
            <div style="height: 170px;margin-top: 30px;font-size: larger;font-weight: 700;">
              {{ $gauchada->descripcion }}
            </div>
            <p style="margin: 0 0 0 50px;">- Fecha Limite: {{$gauchada->fecha_limite}} | <?php $cate = CategoriaGauchada::where('id', '=', $gauchada->categoria)->first(); ?> Categoria: {{ $cate -> nombre }} | <?php   $user= User::find($gauchada->user_id); ?> Creado por: <a href="{{ route('ver_perfil_path', ['user' => $user]) }}">{{ $user -> nick }}</a> | Posteado {{ $gauchada->created_at->diffForHumans() }} -</p>
            
            <!-- SOLO PODRÁ VER ESTO EL AUTOR DE LA GAUCHADA -->
            @if($gauchada->user_id == Auth::id())
              
              <div style="margin:0px;text-align: left;font-weight: 700;"> Postulantes:</div>

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
                        <p style="margin:0px;text-align: left;margin: 0 0 0 20px;color: coral;">- <a href="{{ route('ver_perfil_path', ['user' => $user_p]) }}">{{ $user_p -> nick }}</a>
                          <?php
                          if (! $hay) { ?>
                            @if ($gauchada->activo)
                                <button type="submit" class="btn btn-info" onclick="alert('Postulante Elegido!')" style="margin-left: 15px;">Elegir</button>
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
                <p style="font-weight: 700;margin: 0px;">
                  Postulante elegido:
                  <a href="{{ route('ver_perfil_path', ['user' => $postu_eleg]) }}"> {{ $postu_eleg -> nick }}</a>
                  @if (($es_mia) and ($gauchada->activo))
                    <p style="margin: 0 0 0 25px; display: inline-block;font-weight: 700;">Puntuar usuario:
                      <div style="padding-left: 10px; display: inline-block;">
                        <div style="display: inline-block;">
                          <form action="{{ route('pointSum_perfil_path', ['user_pointSum' => $postu_eleg, 'gauchada' => $gauchada]) }}" method='GET'>
                            <button type="submit" class="btn btn-danger" id="Sum" style="font-size: 15px;width: 30px;" onclick="alert('Puntuaste +1 al usuario')"> + </button>
                          </form>
                        </div>
                        <div style="display: inline-block;">
                        <form action="{{ route('pointNull_perfil_path', ['user_pointNull' => $postu_eleg, 'gauchada' => $gauchada]) }}" method='GET'>
                          <button type="submit" class="btn btn-primary" id="Null" style="font-size: 15px;width: 30px;" onclick="alert('Puntuacion Nula')">0</button>
                        </form>
                        </div>
                        <div style="display: inline-block;">
                        <form action="{{ route('pointRes_perfil_path', ['user_pointRes' => $postu_eleg, 'gauchada' => $gauchada]) }}" method='GET'>
                          <button type="submit" class="btn btn-warning" id="Res" style="font-size: 15px;width: 30px;" onclick="alert('Puntuaste -1 al usuario')"> - </button>
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
                    <button type="submit" class="btn btn-primary">Añadir Comentario</button>
                </form>
              @endif
            @endif
          </div>
            <div style="margin:20px 0px;background-color: coral;color: white;border-bottom: 1px solid black; border-top: 1px solid black;text-align: center;font-size: 20px;">- Comentarios -</div>

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
              <!-- CONTENEDOR DE COMENTARIO Y RESPUESTA--> 
              <div class="row" style="border-bottom: 1px solid coral;padding: 10px 0px;width: 850px;margin: 0px;">
                <!-- CONTENEDOR DE COMENTARIO -->
                <div>
                  <!-- CONTENIDO DEL COMENTARIO -->
                  <div style="float: left;width: 75%;">
                    <div class= "pull-left">
                      <img src="/imagenes/usuarios/{{ User::find($coment->user_id)->imagen }}" style="margin-right:10px;border-radius: 40px;" width="60" height="60">
                    </div>
                    <p style="font-size: 15px;font-weight: 700; margin: 0px">{{$coment->contenido}}</p>
                    <div style="font-size: small;">Por: {{User::find($coment->user_id)->nick}} - {{$coment->created_at->diffForHumans()}}</div>
                     
                    <!--BOTON RESPUESTA //// SI ES MI GAUCHADA -->

                    @if(($gauchada->user_id == Auth::id())and(!$hay)and($coment->user_id != Auth::id()))
                      @if ($gauchada->activo)
                        <form style="text-align: right;" action="{{route('create_respuesta_path', ['comentario' => $coment])}}" method='GET'>
                            <button type="submit" class="btn btn-danger">Responder comentario</button>
                        </form> 
                      @endif
                    @endif
                  </div>
                  
                  <!--BOTONES DE COMENTARIO // SI ES MI COMENTARIO-->
                  <div style="float:left;width: 25%;">
                     <?php
                       $date=date("Y-m-d G:i:s", time());
                       $f = (strtotime($date) - (strtotime($coment->created_at)))/60;
                       $f = abs($f);
                       $f = floor($f);   
                     ?>

                      @if((!$hay))
                        @if(($coment->user_id == Auth::id())and($f<10))
                        <form style="text-align: right;" action="{{route('edit_comentario_path', ['comentario' => $coment])}}" method='GET'>
                            <button type="submit" class="btn btn-danger">Editar comentario</button>
                        </form>

                        <form style="text-align: right;" action="{{route('confirm_delete_path', ['comentario' => $coment])}}" method='GET'>
                            <button type="submit" class="btn btn-warning">Eliminar comentario</button>
                        </form>  
                        @endif
                      @endif
                  </div>
                </div>

                <!-- CONTENEDOR RESPUESTA -->
                <div>
                <!--Aca es para buscar la respuesta del comentario, pero falta hacerlo bien.-->
                 @if($hay)
                  <?php
                  
                    $respuesta= Respuesta::where('comentario_id', '=', $coment->id)->first();
                  
                    $date_resp=date("Y-m-d G:i:s", time());
                     $r = (strtotime($date_resp) - (strtotime($respuesta->created_at)))/60;
                     $r = abs($r);
                     $r = floor($r);
                   ?>
                    <div style="float: left;width: 75%;padding-left: 60px;">
                      <div class= "pull-left">
                        <img src="/imagenes/usuarios/{{ User::find($respuesta->user_id)->imagen }}" style="margin-right:10px; border-radius: 40px;" width="60" height="60">
                      </div>
                      <p style="font-size: 15px;font-weight: 700; margin: 0px">{{$respuesta['contenido']}}</p>
                      <div style="font-size: small;">Por: {{User::find($respuesta['user_id'])['nick']}} - {{$respuesta['created_at']->diffForHumans()}}</div>
                    </div>

                    <div style="float: left; width: 25%;">
                      @if($respuesta->user_id == Auth::id()and($r<10)) 
                      <form style="text-align: right;" action="{{route('edit_respuesta_path', ['respuesta' => $respuesta])}}" method='GET'>
                        <button type="submit" class="btn btn-danger" autofocus="">Editar Respuesta</button>
                       </form>
                        <form style="text-align: right;" action="{{route('confirmdel_respuesta_path', ['respuesta' => $respuesta])}}" method='GET'>
                        <button type="submit" class="btn btn-warning" autofocus="">Eliminar Respuesta</button>
                       </form>  
                     @endif
                    </div>
                  @endif
                </div>
            </div>

                 <?php
                   }
                  ?>

            @endforeach
            <div style="text-align: center;"><button class ="btn btn-warning" onclick="goBack()" style="margin:20px auto;width: 100px;">Atrás</button>
                <script>
                    function goBack(){
                        window.history.back();
                    }
                </script>
            </div>
        </div>
@endsection