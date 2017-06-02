@extends('layouts.app')

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

	<form action="{{route('store_gauchada_path')}}" method='POST'>
		
		{{ csrf_field()}}	
		<div class="form-group">
			<label for="titulo">Titulo:</label>
			<input type="text" name="titulo" class="form-control" value="" style="width: 626px" />

			

		</div>

		<div class="form-group">
			<label for="Descripcion">Descripcion:</label>
			<textarea rows="5" name="descripcion" class="form-control" style=" width: 626px" /></textarea>
			

		</div>
		<div class="form-group">
			
			<label for="fecha_limite"> Fecha Limite</label>
			<input type="date" name="fecha_limite" class="form-control" style="width: 626px"/>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary" autofocus="">Crear Gauchada</button> 			

		</div>
		
	</form>

@endsection