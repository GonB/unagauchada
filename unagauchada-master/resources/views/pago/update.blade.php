@extends('layouts.app')

@section('content')
@if(count($errors) > 0)
	<div class="alert alert-danger">
		
		<ul>
			@foreach ($errors->all() as $error)

			<li>
				{{$error}}
			</li>
			@endforeach
		</ul>
	</div>
	
	@endif
	<div class="col-md-8 col-md-offset-2">

	<div> <p>CONFIRMACIÓN</p></div>

	<form action="{{route('update_creditos_path', ['pago' => $pago])}}" method='POST'>
		
		{{ csrf_field()}}
		{{ method_field('PUT') }}
		<div class="form-group">
			<p>Numero Tarjeta: {{$pago->numero_tarjeta}}</p>
			<p>Codigo Seguridad: {{$pago->cod_seguridad}}</p>
			<p>Vencimiento: {{$pago->vencimiento}}</p>
			<p>Creditos: {{$pago->creditos}}</p>

		<div class="form-group">
			<button type="submit" class="btn btn-primary" autofocus="">Confirmar Compra</button>	

		</div>
		
	</form>
	</div>

@endsection