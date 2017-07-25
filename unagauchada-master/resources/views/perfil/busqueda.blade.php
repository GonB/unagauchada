@extends ('layouts.app')


@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div class="cab_form">Busqueda De Usuarios</div>
            <div class="panel-body">
                @if($users->total() == 0)
                    <strong>El usuario no existe</strong>
                @endif
                @foreach($users as $users)
                    
                <strong>
                    Usuario: <a href="{{ route('ver_perfil_path', ['user' => $users]) }}">{{ $users->nick }}</a> <br>
                    <hr style="border-color:grey;margin: 0px;">
                </strong>
               @endforeach
               
            </div>
        </div>
    </div>
@endsection