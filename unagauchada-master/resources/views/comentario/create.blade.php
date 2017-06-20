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

	<form action="{{route('store_comentario_path', ['gauchada' => $gauchada])}}" method='get'>
		<div class="col-md-8 col-md-offset-2">
		
		<div class="form-group">
			<label for="contenido">Comentario:</label>
			<input type="text" name='contenido' class="form-control" value="{{old('contenido')}}" style="width: 626px" />

		<div class="form-group">
			<button type="submit" class="btn btn-primary" autofocus="">Comentar</button> 			

		</div>
	</div>
		
	</form>

@endsection
