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
	<div class="container">
        <div class="panel panel-default">
		<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">EDITAR GAUCHADA</div>
		<div class="panel-body">
			<form action="{{route('update_gauchada_path', ['gauchada' => $gauchada->id])}}" method='GET'>
				<div class="col-md-8 col-md-offset-2" style="margin-left: 0px;">
					<div class="form-group">
						<label for="Titulo">Titulo:</label>
						<input type="string" name='titulo' class="form-control" value="{{$gauchada->titulo}}" style="width: 400px" />
					</div>
					<div class="form-group">
						<label for="Descripcion">Descripcion:</label>
						<textarea rows="5" name="descripcion" class="form-control" style=" width: 400px" />{{$gauchada->descripcion}}</textarea>
					</div>
					<div class="form-group">
						<label for="fecha_limite">Fecha Limite</label>
						<input type="date" name="fecha_limite" class="form-control" style="width: 400px" value="{{ $gauchada->fecha_limite or old('fecha_limite') }}"/>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" autofocus="">Aceptar</button> 
						<a href="{{ route('gauchadas_path') }}" class ="btn btn-warning">Cancelar</a>
					</div>
				</div>		
			</form>
		</div>
	</div>
@endsection
