@extends ('layouts.app')

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
			<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">EDITAR PERFIL</div>
			<div class="panel-body">

				<div style="text-align: center;">
					<img src="/imagenes/usuarios/{{ (Auth::user()->imagen) }}" style="width: 150px;">
				</div>
				<form action="{{ route('update_image_path') }}" method='POST' enctype="multipart/form-data">
					{{ csrf_field() }} 
					<div class="form-group">
	                    <p style="margin-top: 10px;"><strong>
	                    Seleccione una imágen: </strong><input style="display: inline-block;" id="imagen" type="file" name="imagen"></p>
                    </div>
                   	<div class="form-group">
						<button type="submit" class="pull-center btn btn-primary">Guardar imágen</button>
					</div>
				</form>
				<form action="{{route('update_perfil_path', ['user_id' => Auth::user()->id])}}" method='GET' enctype="multipart/form-data">
					{{ csrf_field() }} 
					<div class="form-group">
						<label for="name" style="margin: 0px;">Nombre</label>
						<input type="string" name='name' class="form-control" value="{{Auth::user()->name}}" style="width: 400px" />
					</div>

					<div class="form-group">
						<label for="email" style="margin: 0px;">Email</label>
						<input type="string" name='email' class="form-control" value="{{Auth::user()->email}}" style="width: 400px" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" autofocus="">Guardar cambios</button>
						<a href="{{ route('perfil_index_path') }}" class ="btn btn-warning">Atrás</a>
					</div>	
				</form>
			</div>
		</div>
	</div>
@endsection