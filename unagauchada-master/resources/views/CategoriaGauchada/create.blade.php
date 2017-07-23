@extends('layouts.app')
<?php
	use App\CategoriaGauchada;
?>
@section('content')

	@if(count($errors) > 0)
	<div class="alert alert-danger">
		
		<ul>
			@foreach ($errors->all() as $error)

			<li>
				{{$error}}
			</li>
			@endforeach
		</ul>
	</div>

	@endif
	<div class="container">
        <div class="panel panel-default">
		<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">CREAR CATEGORIA GAUCHADA</div>
		<div class="panel-body">

		<form action="{{route('store_categoriagauchada_path')}}" method='get'>
			<div class="col-md-8 col-md-offset-2">
			
			<div class="form-group">
				<label for="Titulo">Nombre:</label>
				<input type="string" name='nombre' class="form-control" value="{{old('nombre')}}" style="width: 400px" />

			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary" autofocus="">Crear Categoria De Gauchada</button>
				<button class="btn btn-warning" onclick="goBack()"> Cancelar</button>
				<script>
					function goBack(){
						window.history.back();
					}
				</script>			
 			
			</div>
		</div>

		
		</form>
		</div>

@endsection