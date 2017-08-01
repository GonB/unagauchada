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

	<form action="{{route('store_respuesta_path', ['comentario' => $comentario])}}" method='GET'>
		<div class="col-md-8 col-md-offset-2">
		
		<div class="form-group">
			<label for="contenido" style="margin-bottom: 0px;">Respuesta</label>
			<input type="text" name='contenido' class="form-control" value="{{old('contenido')}}" style="width: 400px" />
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary" autofocus="">Enviar</button>
			<button class ="btn btn-warning" onclick="goBack()">Cancelar</button>
			<script>
				function goBack(){
					window.history.back();
				}
			</script>								
		</div>
		</div>
	</form>

@endsection
