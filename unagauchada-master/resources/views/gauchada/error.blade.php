@extends('layouts.app')
<?php use App\User; ?>
@section('content')
	<div class="container">
    	<div class="panel panel-default">
      		<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:8px 10px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">NO TIENES CRÉDITOS SUFICIENTES</div>
			<div class="panel-body links2">
		        <div class="col-md-8 col-md-offset-2" style="margin-left: 0px;">
		            <a href="{{route('create_pago_path')}}" class="btn btn-info">Comprar créditos</a><br>
		            <a href="{{route('home')}}" class="btn btn-info">Volver</a>
		        </div>
		    </div>
    	</div>
    </div>
@endsection