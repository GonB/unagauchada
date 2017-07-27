@extends ('layouts.app')
<?php use App\CategoriaUsuario; ?>
@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div class="cab_form">Cambio De Categoria</div>
            <div class="panel-body">
                

				<form action="{{route('cambioCat_usuario_path', ['user' => $user])}}" method='GET' enctype="multipart/form-data">
	                <p>Cambiar a <b>{{$user -> nick}}</b> a la categoria </p>
	                <label for="Categoria"></label>
					<select type="string" name='categoria' class="form-control" value="{{old('categoria')}}" style="width: 400px">
						<?php foreach (CategoriaUsuario::all() as $categoria) {
							echo '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
						}?>
					</select><br>

                    <button type="submit" class="btn btn-primary" autofocus="">Cambiar de Categoria</button>

                    <button class="btn btn-warning" onclick="goBack()">Atras</button>
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