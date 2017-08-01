@extends ('layouts.app')
<?php 
use App\Gauchada;
use App\Postula;?>

@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Historial de Usuario</div>
            <div class="panel-body">

                <div style="background-color: #87a4b7; color: white; text-align: center;margin: 0px auto;">Gauchadas publicadas</div>
                  @if($gauchadas == "[]")
                    No ha publicado Gauchadas <br>
                  @endif
                  @foreach($gauchadas as $gauchada)
                    <?php  
                        $gau = Gauchada::find($gauchada->id);
                    ?>
                    <a href="{{ route('gauchada_path', ['gauchada' => $gau]) }}">{{$gau->titulo }}</a><br>
                    Fecha: {{$gau->created_at->format('Y-m-d')}}<br>
                  @endforeach
                
                <div style="background-color: #87a4b7; color: white; text-align: center;margin: 0px auto;">Postulaciones</div>
                @if($postulaciones->total() == 0)
                    No se ha Postulado en Gauchadas<br>
                @endif
                @foreach($postulaciones as $postulaciones)
                  <?php 
                    $post = Postula::find($postulaciones->id);
                    $gauchada = Gauchada::find($postulaciones->gauchada_id);
                  ?>
                    <a href="{{route('gauchada_path', ['gauchada' => $gauchada])}}">{{$gauchada->titulo}}</a>
                    @if($postulaciones->seleccionado == "0")
                        - (No seleccionado)<br>
                    @else 
                        - (Seleccionado como colaborador)<br>
                    @endif
                @endforeach

                <div style="background-color: #87a4b7; color: white; text-align: center;margin: 0px auto;">Gauchadas realizadas</div>
                  @if($realizadas == "[]")
                    No ha realizado Gauchadas<br>
                  @endif
                  @foreach($realizadas as $realizadas)
                    <?php 
                      $gauch = Gauchada::find($realizadas->id);
                    ?>
                    <a href="{{route('gauchada_path', ['gauchada' => $gauch])}}">{{$gauch->titulo}}</a><br>
                    Fecha: {{$gauch->created_at->format('Y-m-d')}}<br>
                @endforeach
                <div class="form-group">
                   <button class ="btn btn-warning" onclick="goBack()" style="margin-top: 5px;">Volver</button>
                       <script>
                           function goBack(){
                               window.history.back();
                           }
                       </script>
                </div>
            </div>
        </div>
    </div>
@endsection