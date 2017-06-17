@extends('layouts.app')
<?php use App\User; ?>
@section('content')
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>No tienes creditos suficientes</h2>
            <a href="{{url('/pago')}}">Comprar Creditos</a><br>
            <a href="{{url('/home')}}">Volver</a>
        </div>
    </div>
    <hr>
@endsection