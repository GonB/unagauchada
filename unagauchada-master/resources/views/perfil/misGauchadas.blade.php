@extends ('layouts.app')
<?php 
    use App\Gauchada;
?>

@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div class="cab_form">Mis Gauchadas Realizadas</div>
            <div class="panel-body">
                @if($misgau == "[]")
                    <strong>Aun no ha realizado ninguna Gauchada</strong>
                @endif

                @foreach($misgau as $misgau)
                    <strong>
                        <?php  
                        $gau = Gauchada::find($misgau->id);
                        ?>
                        Gauchada: <a href="{{ route('gauchada_path', ['gauchada' => $gau]) }}">{{ $gau->titulo }}</a> <br>
                        Fecha: {{$misgau->created_at}}
                        <br><br>

                        <hr style="border-color:grey;margin: 0px;">
                    </strong>
               @endforeach
               
            </div>
        </div>
    </div>
@endsection