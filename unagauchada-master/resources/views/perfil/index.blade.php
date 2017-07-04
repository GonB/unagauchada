@extends ('layouts.app')

@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div class="cab_form">MI PERFIL</div>
            <div class="panel-body">
                <strong>
                <p>Nombre: {{Auth::user()->name}}</p>
                <p>Nick: {{Auth::user()->nick}}</p>
                <p>Fecha Nacimiento: {{Auth::user()->birthdate}}</p>
                <p>Email: {{Auth::user()->email}}</p>
                </strong>
                <a href="{{ route('edit_perfil_path') }}" class="btn btn-primary">Editar Perfil</a>
                <button class ="btn btn-warning" onclick="goBack()"> Atrás</button>
                <script>
                    function goBack(){
                        window.history.back();
                    }
                </script>
            </div>
        </div>
    </div>
@endsection