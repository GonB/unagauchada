@extends('layouts.app')


@section('content')
	<div class="row">
		<div class='col-md-12'>
			<h2>{{$gauchada -> titulo}}</h2>
			<p>{{$gauchada -> descripcion}}</p>
			<p>Fecha Limite :{{$gauchada -> fecha_limite}}</p>
		</div>
	</div>
@endsection
	