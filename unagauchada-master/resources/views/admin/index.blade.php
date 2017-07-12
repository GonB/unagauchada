@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="cab_form">ADMINISTRACION</div>
        <div class="panel-body links2">
            @if (Auth::check())
                <a href="{{ route('index_admin_path') }}">Crear Categoria De Usuarios</a><br> 
                <a href="{{ route('index_admin_path') }}">Categorias De Usuarios</a><br>
                <a href="{{ route('create_categoriagauchada_path') }}">Crear Categoria De Gauchadas</a><br>
                <a href="{{ route('index_admin_path') }}">Categorias De Gauchadas</a>
            @endif
        </div>    
    </div>
</div>
@endsection