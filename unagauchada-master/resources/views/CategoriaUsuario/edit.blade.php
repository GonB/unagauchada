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

	<form action="{{route('update_categoriausuario_path', ['categoriaUsuario' => $categoriaUsuario])}}" method='GET'>
		<div class="col-md-8 col-md-offset-2">
			<div class="form-group">
				<label for="Nombre">Nombre:</label>
				<input type="string" name='nombre' class="form-control" value="{{$categoriaUsuario->nombre}}" style="width: 626px" />
			</div>

			<div class="form-group">
				<label for="rango_inicial">Rango Inicial</label>
				<input type="integer" name='rango_inicial' class="form-control" value="{{$categoriaUsuario->rango_inicial}}" style="width: 400px" />			
			</div>

			<div class="form-group">
				<label for="rango_final">Rango Final</label>
				<input type="integer" name='rango_final' class="form-control" value="{{$categoriaUsuario->rango_final}}" style="width: 400px" />			
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary" autofocus="">Editar Categoria de Usuario</button> 
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