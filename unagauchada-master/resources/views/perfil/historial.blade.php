@extends ('layouts.app')
<?php 
use App\Gauchada;
use App\Postula;?>

@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div class="cab_form">Historial de {{$user->nick}}</div>
            <div class="panel-body">

             <strong>Gauchadas Publicadas: </strong><br>
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


            <strong>Postulaciones:</strong><br>
            @if($postulaciones->total() == 0)
                No se ha Postulado en Gauchadas<br>
            @endif
            @foreach($postulaciones as $postulaciones)
            <?php 
                $post = Postula::find($postulaciones->id);
                $gauchada = Gauchada::find($postulaciones->gauchada_id);
                 ?>
                Gauchada: <a href="{{route('gauchada_path', ['gauchada' => $gauchada])}}">{{$gauchada->titulo}}</a>
                 @if($postulaciones->seleccionado == "0")
                                (No seleccionado)<br>
                                @else 
                                    (Seleccionado como colaborador)<br>
                @endif
            @endforeach

            <strong>Gauchadas Realizadas:</strong><br>
              @if($realizadas == "[]")
                No ha realizado Gauchadas <br>
                @endif
            @foreach($realizadas as $realizadas)
            <?php 
                $gauch = Gauchada::find($realizadas->id) ?>
                Gauchada: <a href="{{route('gauchada_path', ['gauchada' => $gauch])}}">{{$gauch->titulo}}</a><br>
                Fecha: {{$gau->created_at->format('Y-m-d')}}<br>
            @endforeach


               
               
            </div>
        </div>
    </div>
@endsection