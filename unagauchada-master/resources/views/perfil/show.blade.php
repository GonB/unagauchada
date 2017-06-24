@extends ('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <medium class="pull-left">
                <p>Nombre: {{ $user -> name }}</p>
                <p>Nick: {{ $user -> nick }}</p>
                <p>Fecha Nacimiento: {{ $user -> birthdate }}</p>
                <p>Email: {{ $user -> email }}</p>
                <p>Creditos: {{ $user -> credits }}</p>
            </medium>
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