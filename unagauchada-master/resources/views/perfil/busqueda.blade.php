@extends ('layouts.app')


@section('content')
	<div class="container">
        <div class="panel panel-default" style="width: 400px;">
            <div class="cab_form">Búsqueda de usuarios</div>
            <div class="panel-body">
                @if($users->total() == 0)
                    <strong>El usuario no existe</strong>
                @endif
                @foreach($users as $users)    
                    <div style="padding: 10px 0px;border-bottom: 1px solid grey;text-align: center;">
                        <strong><a href="{{ route('ver_perfil_path', ['user' => $users]) }}">{{ $users->nick }}</a></strong>
                        <img src="/imagenes/usuarios/{{ $users->imagen }}" style="margin-left: 5px;width: 50px;border-radius: 40px;"> <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection