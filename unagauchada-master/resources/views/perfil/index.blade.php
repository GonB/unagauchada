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
                <div class="pull-left" style="text-align: center;margin:15px">
                    <img src="/imagenes/usuarios/{{ (Auth::user()->imagen) }}" style="width: 150px;">
                </div>
                <p style="margin: 0px">Nombre: <strong>{{Auth::user()->name}}</strong></p>
                <p style="margin: 0px">Nick: <strong>{{Auth::user()->nick}}</strong></p>
                <p style="margin: 0px">Fecha Nacimiento: <strong>{{Auth::user()->birthdate}}</strong></p>
                <p style="margin: 0px">Email: <strong>{{Auth::user()->email}}</strong></p>
                <p style="margin: 0px">Categoria: <strong>{{$categoria}}</strong></p>
                <p style="margin: 0px">Puntos: <strong>{{Auth::user()->score}}</strong></p>
                <div style="margin-bottom: 5px;"><strong><a href="{{ route('edit_password_path') }}">Modificar contraseña</a></strong></div>
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