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
	<div class="container">
	<div class="panel panel-default">
		<div class="cab_form">CONFIRMACIÓN</div>

		<div class="panel-body">
			<form action="{{route('update_creditos_path', ['pago' => $pago])}}" method='POST'>
				{{ csrf_field()}}
				{{ method_field('PUT') }}
				<div class="form-group">
					<strong>
					<p>Numero Tarjeta: {{$pago->numero_tarjeta}}</p>
					<p>Codigo Seguridad: {{$pago->cod_seguridad}}</p>
					<p>Vencimiento: {{$pago->vencimiento}}</p>
					<p>Creditos: {{$pago->creditos}}</p>
					</strong>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary" autofocus="">Confirmar Compra</button>
					<button class ="btn btn-warning" onclick="goBack()"> Atrás</button>
					<script>
						function goBack(){
							window.history.back();
						}
					</script>			
				</div>
			</form>
		</div>
	</div>
	</div>

@endsection