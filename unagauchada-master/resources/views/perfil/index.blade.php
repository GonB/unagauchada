@extends ('layouts.app')

@section('content')
	 <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <medium class="pull-left">
                <p>Nombre: {{Auth::user()->name}}</p>
                <p>Nick: {{Auth::user()->nick}}</p>
                <p>Fecha Nacimiento: {{Auth::user()->birthdate}}</p>
                <p>Email: {{Auth::user()->email}}</p>

                <a href="{{ route('edit_perfil_path') }}" class="btn btn-info">Editar Perfil</a>

            </medium>  
        </div>
    </div>
    <hr>
@endsection