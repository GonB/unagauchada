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
<div>
            @if (Session::has('message'))
                <div class="alert" style="padding: 0px;margin: 0px auto 10px;background-color: #87a4b7;color: white;text-align: center;font-size: medium;width: 526px;border-radius: 20px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right: 10px;">&times;</button>
                    {{ Session::get('message') }}
                </div>
            @endif
        </div>
    <div class="panel panel-default">
        <div class="cab_form">Una Gauchada</div>
        <div class="panel-body links2">

            @if (Auth::check())
                @if (Auth::user()->credits < 200)
                    <a href="{{ url('/gauchada/create') }}">Crear Gauchada (1 credito necesario)</a><br> 
                @else
                    <a href="{{ url('/gauchada/create') }}">Crear Gauchada</a><br> 
                @endif
                <a href="{{route('gauchadas_path')}}">Mis Gauchadas</a><br>
                @if (Auth::user()->credits < 200)
                    <a href="{{route('create_premium_pago_path')}}">Convertirse en usuario Premium</a><br>
                @endif
                <a href="{{url('/pago/create')}}">Comprar Creditos</a><br>
                <a href="{{route('mis_postulaciones_path')}}"> Ver Mis Postulaciones</a><br>
                <a href="{{route('mis_gauchadas_path')}}">Ver Mis Gauchadas Realizadas</a>
            @endif
        </div>    
    </div>
</div>
@endsection
