@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="cab_form">ADMINISTRACION</div>
        <div class="panel-body links2">
            @if (Auth::check())
                <a href="{{ route('create_categoriausuario_path') }}">Crear Categoria De Usuarios</a><br> 
                <a href="{{ route('index_categoriausuario_path') }}">Categorias De Usuarios</a><br>
                <a href="{{ route('create_categoriagauchada_path') }}">Crear Categoria De Gauchadas</a><br>
                <a href="{{ route('index_categoriagauchada_path') }}">Categorias De Gauchadas</a><br>
                <a href="{{route('ranking_usuarios_path')}}">Ranking de Usuarios</a><br>
                <a href="{{route('ganancias_form_path')}}">Ganancias Entre Dos Fechas</a>
            @endif
        </div>    
    </div>
</div>
@endsection