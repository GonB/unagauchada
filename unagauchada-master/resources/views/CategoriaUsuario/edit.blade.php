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
	@if($error1 != '')
		<div class="alert alert-danger">
			<ul>
				<li>
					{{$error1}}
				</li>
			</ul>
		</div>
	@endif

	<div class="container">
        <div class="panel panel-default">
			<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">EDITAR CATEGORIA DE GAUCHADA</div>
			<div class="panel-body">
				<form action="{{route('update_categoriausuario_path', ['categoriaUsuario' => $categoriaUsuario])}}" method='GET'>
					<div class="col-md-8 col-md-offset-2">
						<div class="form-group">
							<label for="Nombre">Nombre:</label>
							<input type="string" name='nombre' class="form-control" value="{{$categoriaUsuario->nombre}}" style="width: 300px" />
						</div>
						<div class="form-group">
							<label for="rango_inicial">Rango Inicial</label>
							<input type="integer" name='rango_inicial' class="form-control" value="{{$categoriaUsuario->rango_inicial}}" style="width: 300px" />			
						</div>
						<div class="form-group">
							<label for="rango_final">Rango Final</label>
							<input type="integer" name='rango_final' class="form-control" value="{{$categoriaUsuario->rango_final}}" style="width: 300px" />			
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" autofocus="">Aceptar</button> 
							<a href="{{ route('index_categoriausuario_path') }}" class ="btn btn-warning">Cancelar</a>
						</div>
					</div>
				</form>
			</div>
		</div>
@endsection