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
				<form action="{{route('update_perfil_path', ['user_id' => Auth::user()->id])}}" method='GET'>
					
					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="string" name='name' class="form-control" value="{{Auth::user()->name}}" style="width: 400px" />
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="string" name='email' class="form-control" value="{{Auth::user()->email}}" style="width: 400px" />			

					</div>

					<div class="form-group">
						<label for="password">Contraseña</label>
						<input type="password" name='password' class="form-control" value="{{Auth::user()->password}}" style="width: 400px" />			

					</div>
					<div class="form-group">
			              <label for="password-confirm">Confirmar Contraseña</label>
			              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" style="width: 400px" required>
			        </div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" autofocus="">Guardar cambios</button>
						<button class ="btn btn-warning" onclick="goBack()">Atrás</button>
						<script>
							function goBack(){
								window.history.back();
							}
						</script>			
					</div>	
				</form>
			</div>
		</div>
	</div>
@endsection