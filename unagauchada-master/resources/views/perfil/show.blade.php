@extends ('layouts.app')
<?php
    use App\CategoriaUsuario;

    $score = $user->score;
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
            <div class="panel-body">
                <div style="text-align: center;" class="pull-right">
                    <img src="/imagenes/usuarios/{{ ($user->imagen) }}" style="width: 150px;">
                </div>
                <strong>
                    <p>Nombre: {{ $user -> name }}</p>
                    <p>Nick: {{ $user -> nick }}</p>
                    <p>Fecha nacimiento: {{ $user -> birthdate }}</p>
                    <p>Email: {{ $user -> email }}</p>
                    <p>Categoria: {{$categoria}}</p>
                    <a href="{{route('historial_usuario_path', ['user' => $user])}}">Ver Historial de Usuario</a><br>
                </strong>
                @if (Auth::user()->admin)
                    <form action="{{route('cambiarCat_usuario_path', ['user' => $user])}}" method='GET' enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary" autofocus="">Cambiar de Categoria</button>
                    </form>
                @endif
                <button class ="btn btn-warning" onclick="goBack()"> Atrás</button>
                <script>
                    function goBack(){
                        window.history.back();
                    }
                </script>
            </div>
        </div>
    </div>
    <hr>
@endsection