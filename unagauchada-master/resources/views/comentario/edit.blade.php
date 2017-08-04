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
<div class="panel panel-default">
	<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:3px 8px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">
		Editar comentario
    </div>
    <div class="panel-body">
		<form action="{{route('update_comentario_path', ['comentario' => $comentario])}}" method='GET'>
			<div class="form-group">
				<label for="contenido" style="margin-bottom: 0px;">Comentario</label>
				<input type="text" name='contenido' class="form-control" value="{{$comentario->contenido}}" style="width: 500px" />
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" autofocus="">Aceptar</button>
				<button class ="btn btn-warning" onclick="goBack()">Cancelar</button>
				<script>
					function goBack(){
						window.history.back();
					}
				</script>								
			</div>
		</form>
	</div>
</div>
@endsection