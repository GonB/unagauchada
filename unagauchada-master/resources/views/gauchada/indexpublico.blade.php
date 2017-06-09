@extends('layouts.app')

@section('content')
    @foreach($gauchada as $gauchada)
        <div class="row">
             <div class="col-md-8 col-md-offset-2">

                    <small class="pull-left">

                      <h2>{{ $gauchada->titulo }}</h2>
                      <p>{{ $gauchada->descripcion }}</p>
                       <p>{{$gauchada->fecha_limite}}</p>
                         <p>Posteado {{ $gauchada->created_at->diffForHumans() }}</p>
                         <p> {{User::find($gauchada->user_id)}}</p>
                    </small>  
            </div>
        </div>
        <hr>
    @endforeach
@endsection