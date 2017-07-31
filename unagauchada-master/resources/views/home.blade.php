@extends('layouts.app')

@section('content')
<?php
    use App\CategoriaUsuario;

    $score = Auth::user()->score;
    $categoria = 'Sin Definir';
    foreach (CategoriaUsuario::all() as $cate) {
        if (($score >= $cate->rango_inicial) and ($score <= $cate->rango_final)) {
            $categoria = $cate->nombre;
        }
    }
?>

<div class="container">
    <div class="panel panel-default">
        <div class="cab_form">Una Gauchada</div>
        <div class="panel-body links2">
            @if (Auth::check())
                <a href="{{ url('/gauchada/create') }}">Crear Gauchada (1 credito necesario)</a><br> 
                <a href="{{route('gauchadas_path')}}">Mis Gauchadas</a><br>
                <a href="{{url('/pago/create')}}">Comprar Creditos</a><br>
                <a href="{{route('mis_postulaciones_path')}}"> Ver Mis Postulaciones</a><br>
                <a href="{{route('mis_gauchadas_path')}}">Ver Mis Gauchadas Realizadas</a>
            @endif
        </div>    
    </div>
</div>
@endsection
