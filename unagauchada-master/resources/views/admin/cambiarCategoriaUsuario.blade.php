@extends ('layouts.app')
<?php use App\CategoriaUsuario; ?>
@section('content')
	<div class="container">
        <div class="panel panel-default" style="width: 400px;">
            <div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:6px 10px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Cambio De Categoria</div>
            <div class="panel-body">

				<form action="{{route('cambioCat_usuario_path', ['user' => $user])}}" method='GET' enctype="multipart/form-data">
	                <p style="margin-bottom: 5px;">Cambiar a <b>{{$user -> nick}}</b> a la categoria</p>
					<div style="margin-bottom: 10px;">
						<select type="string" name='categoria' class="form-control" value="{{old('categoria')}}" style="width: 200px">
							<?php foreach (CategoriaUsuario::all() as $categoria) {
								echo '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
							}?>
						</select>
					</div>
                    <button type="submit" class="btn btn-primary" autofocus="">Aceptar</button>
                    <button class="btn btn-warning" onclick="goBack()">Cancelar</button>
					<script>
						function goBack(){
							window.history.back();
						}
					</script>	
                </form>
               
            </div>
        </div>
    </div>
@endsection