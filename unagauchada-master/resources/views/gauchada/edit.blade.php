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

	<form action="{{route('store_postula_path', ['gauchada' => $gauchada->id])}}" method='POST'>
		
		{{ csrf_field()}}
		<div class="form-group">
			<label for="Titulo">Titulo:</label>
			<input type="string" name='titulo' class="form-control" value="{{$gauchada->titulo}}" style="width: 626px" />

			

		</div>

		<div class="form-group">
			<label for="Descripcion">Descripcion:</label>
			<textarea rows="5" name="descripcion" class="form-control" style=" width: 626px" />{{$gauchada->descripcion}}</textarea>
			

		</div>
		<div class="form-group">
			
			<label for="fecha_limite"> Fecha Limite</label>
			<input type="date" name="fecha_limite" class="form-control" style="width: 626px" value="{{ $gauchada->fecha_limite or old('fecha_limite') }}"/>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary" autofocus="">Editar Gauchada</button> 			

		</div>
		
	</form>

@endsection
