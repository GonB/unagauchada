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
            <div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:3px 8px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">
                Información de perfil
            </div>
            <div class="panel-body">
                <div style="text-align: center;" class="pull-right">
                    <img src="/imagenes/usuarios/{{ ($user->imagen) }}" style="width: 150px;">
                </div>
                
                <p>Nombre: <strong>{{ $user -> name }}</strong></p>
                <p>Nick: <strong>{{ $user -> nick }}</strong></p>
                <p>Fecha nacimiento: <strong>{{ $user -> birthdate }}</strong></p>
                <p>Email: <strong>{{ $user -> email }}</strong></p>
                <p>Categoria: <strong>{{$categoria}}</strong></p>
                <strong><a href="{{route('historial_usuario_path', ['user' => $user])}}">Ver Historial de Usuario</a></strong><br>
                @if (Auth::user()->admin)
                    <form action="{{route('cambiarCat_usuario_path', ['user' => $user])}}" method='GET' enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;" autofocus="">Cambiar de Categoria</button>
                    </form>
                @endif
                <button class ="btn btn-warning" onclick="goBack()" style="margin-top: 5px;"> Atrás</button>
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