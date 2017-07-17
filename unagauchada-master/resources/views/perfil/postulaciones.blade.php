@extends ('layouts.app')
<?php 

use App\Gauchada;
 ?>


@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div class="cab_form">Ver Mis Postulaciones</div>
            <div class="panel-body">
                <strong>
                @foreach($mispostu as $mispostu)
                    <?php  
                    $gau= Gauchada::find($mispostu->gauchada_id);
                    ?>
                    Gauchada: {{$gau->titulo}} <br>
                    Fecha : {{$mispostu->created_at->format('Y-m-d')}}</br>
                    -----------------------------------------------------
                </strong>
               @endforeach
               
            </div>
        </div>
    </div>
@endsection