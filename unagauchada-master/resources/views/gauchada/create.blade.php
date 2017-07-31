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
      	<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:3px 10px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">CREAR GAUCHADA</div>
		<div class="panel-body">
			<form action="{{route('store_gauchada_path')}}" method='POST' enctype="multipart/form-data">
				<div class="col-md-8 col-md-offset-2" style="margin-left: 0px;">
					{{ csrf_field()}}	
					<div class="form-group">
						<label for="Titulo" style="margin-bottom: 0px;">Título</label>
						<input type="string" name='titulo' class="form-control" value="{{old('titulo')}}" style="width: 400px" />
					</div>
					<div class="form-group">
						<label for="Descripcion" style="margin-bottom: 0px;">Descripción</label>
						<textarea rows="2" name="descripcion" id="descripcion" class="form-control" style=" width: 400px" />{{ old('descripcion') }}</textarea>
					</div>
					<div class="form-group">
						<label for="Categoria" style="margin-bottom: 0px;">Categoría</label>
						<select type="string" name='categoria' class="form-control" value="{{old('categoria')}}" style="width: 400px">
							<?php foreach (CategoriaGauchada::all() as $categoria) {
								echo '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
							}?>
						</select>
					</div>
					<div class="form-group">
						<label for="fecha_limite" style="margin-bottom: 0px;">Fecha Límite</label>
						<input type="date" name="fecha_limite" class="form-control" style="width: 400px"/>
					</div>
					<div class="form-group">
						<p style="margin: 6px 0px;"><strong>Seleccione una imágen</strong><input id="imagen" type="file" name="imagen"></p>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" autofocus="">Aceptar</button>
						<a href="{{ route('home') }}" class ="btn btn-warning">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	</div>
@endsection
