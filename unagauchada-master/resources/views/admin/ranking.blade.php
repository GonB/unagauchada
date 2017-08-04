@extends ('layouts.app')

@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div class="cab_form">Ranking de Usuarios</div>
            <div class="panel-body">
             
               
                @foreach($users as $users)
                    
                <strong>
                   
                    Usuario: <a href="{{route('ver_perfil_path', ['user' => $users->id]) }}">{{$users->nick}}</a> <br>
                    Email: {{$users->email}}<br>
                    Puntaje: {{$users->score}}
                    <br><br>

                    <hr style="border-color:grey;margin: 0px;">
                </strong>
               @endforeach
               <div style="text-align: center;margin-top: 10px;"><a href="{{ route('index_admin_path') }}" class ="btn btn-warning" style="width: 100px;">Atrás</a></div>
            </div>
        </div>
    </div>
@endsection