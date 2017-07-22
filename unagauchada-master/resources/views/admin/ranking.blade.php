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
               
            </div>
        </div>
    </div>
@endsection