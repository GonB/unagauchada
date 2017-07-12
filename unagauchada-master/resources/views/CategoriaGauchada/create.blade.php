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

	<form action="{{route('store_categoriagauchada_path')}}" method='POST'>
		<div class="col-md-8 col-md-offset-2">
		
		{{ csrf_field()}}	
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

@endsection