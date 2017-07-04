@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-default">
            <p>Nombre: {{ $user -> name }}</p>
            <p>Nick: {{ $user -> nick }}</p>
            <p>Fecha nacimiento: {{ $user -> birthdate }}</p>
            <p>Email: {{ $user -> email }}</p>
            <button class ="btn btn-warning" onclick="goBack()"> Atrás</button>
            <script>
                function goBack(){
                    window.history.back();
                }
            </script>
        </div>
    </div>
    <hr>
@endsection