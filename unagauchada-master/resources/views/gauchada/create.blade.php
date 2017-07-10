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

	<form action="{{route('store_gauchada_path')}}" method='POST'>
		<div class="col-md-8 col-md-offset-2">
		
		{{ csrf_field()}}	
		<div class="form-group">
			<label for="Titulo">Titulo:</label>
			<input type="string" name='titulo' class="form-control" value="{{old('titulo')}}" style="width: 400px" />

		</div>
		<div class="form-group">
			<label for="Descripcion">Descripcion:</label>
			<textarea rows="5" name="descripcion" id="descripcion" class="form-control" style=" width: 400px" />{{ old('descripcion') }}</textarea>
		</div>
		<div class="form-group">
			<label for="Categoria">Categoria:</label>
			<select type="string" name='categoria' class="form-control" value="{{old('categoria')}}" style="width: 400px">
				<?php foreach (CategoriaGauchada::all() as $categoria) {
					echo '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
				}?>
			</select>
		</div>
		<div class="form-group">
			<label for="fecha_limite"> Fecha Limite</label>
			<input type="date" name="fecha_limite" class="form-control" style="width: 400px"/>
			
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary" autofocus="">Crear Gauchada</button>
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
