@extends('layouts/master')

@section('title')
	Plantilla de usuario
@endsection

@section('content')

<p>Nombre:{{ $usr->name }}</p>
<p>Apellido:{{ $usr->surname }}</p>
<p>Email:{{ $usr->email }}</p>
<p>Nick:{{ $usr->nick }}</p>
<p>Puntaje:{{ $usr->score }}</p>

@endsection

@section('footer-script')
	<script src="#"></script>
@endsection