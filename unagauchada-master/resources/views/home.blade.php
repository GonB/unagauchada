@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="cab_form">¿ACA IRÍA LA IMAGEN DE PERFIL?</div>
        <div class="panel-body links2">
            @if (Auth::check())
                <a href="{{ url('/gauchada/create') }}">Crear Gauchada (1 credito necesario)</a><br> 
                <a href="{{route('gauchadas_path')}}">Mis Gauchadas</a><br>
                <a href="{{url('/pago/create')}}">Comprar Creditos</a><br>
                <a href="{{route('mis_postulaciones_path')}}"> Ver Mis Postulaciones</a>
            @endif
        </div>    
    </div>
</div>
@endsection
