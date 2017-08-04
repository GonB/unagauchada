@extends ('layouts.app')

@section('content')
	<div class="container">
        <div class="panel panel-default" style="width: 400px;">
            <div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:3px 8px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Ranking de Usuarios</div>
            <div class="panel-body">
                @foreach($users as $users)
                    <div style="border-bottom: 1px solid coral;color: black;font-weight: 500;padding: 5px;">
                        Usuario: <strong><a href="{{route('ver_perfil_path', ['user' => $users->id]) }}">{{$users->nick}}</strong></a> <br>
                        Email: <strong>{{$users->email}}</strong><br>
                        Puntaje: <strong>{{$users->score}}</strong>
                    </div>
               @endforeach
               <div style="text-align: center;margin-top: 10px;"><a href="{{ route('index_admin_path') }}" class ="btn btn-warning" style="width: 100px;">Atrás</a></div>
            </div>
        </div>
    </div>
@endsection