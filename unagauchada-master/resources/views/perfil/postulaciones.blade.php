@extends ('layouts.app')
<?php 
    use App\Gauchada;
?>

@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div class="cab_form">Mis Postulaciones</div>
            <div class="panel-body">
                @if ($mispostu->total() == 0)
                    <strong>No se ha postulado en Gauchadas</strong>
                @endif
                @foreach($mispostu as $mispostu)   
                    <strong>
                        <?php  
                          $gau = Gauchada::find($mispostu->gauchada_id);
                        ?>
                        <a href="{{ route('gauchada_path', ['gauchada' => $gau]) }}">{{ $gau->titulo }}</a> <br>
                        Fecha : {{$mispostu->created_at->format('Y-m-d')}}</br>
                        <hr style="border-color:grey;margin: 0px;">
                    </strong>
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