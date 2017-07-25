@extends ('layouts.app')

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
                <a href="{{route('historial_usuario_path', ['user' => $user])}}">Ver Historial de Usuario</a><br>
                </strong>
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