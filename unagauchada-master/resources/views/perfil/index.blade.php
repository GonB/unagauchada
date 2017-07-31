@extends ('layouts.app')
<?php
    use App\CategoriaUsuario;

    $score = Auth::user()->score;
    $categoria = 'Sin Definir';
    foreach (CategoriaUsuario::all() as $cate) {
        if (($score >= $cate->rango_inicial) and ($score <= $cate->rango_final)) {
            $categoria = $cate->nombre;
        }
    }
?>
@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div class="cab_form">MI PERFIL</div>
            <div class="panel-body">
                <div style="text-align: center;">
                    <img src="/imagenes/usuarios/{{ (Auth::user()->imagen) }}" style="width: 150px;">
                </div>
                <strong>
                    <p style="margin: 0px">Nombre: {{Auth::user()->name}}</p>
                    <p style="margin: 0px">Nick: {{Auth::user()->nick}}</p>
                    <p style="margin: 0px">Fecha Nacimiento: {{Auth::user()->birthdate}}</p>
                    <p style="margin: 0px">Email: {{Auth::user()->email}}</p>
                    <p style="margin: 0px">Categoria: {{$categoria}}</p>
                    <p style="margin: 0px">Puntos: {{Auth::user()->score}}</p>
                </strong>
                <div style="margin-bottom: 5px;"><a href="{{ route('edit_password_path') }}">Modificar contraseña</a></div>
                <a href="{{ route('edit_perfil_path') }}" class="btn btn-primary">Editar perfil</a>
                <button class ="btn btn-warning" onclick="goBack()">Atrás</button>
                <script>
                    function goBack(){
                        window.history.back();
                    }
                </script>
            </div>
        </div>
    </div>
@endsection