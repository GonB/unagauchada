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
		<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">CONVERTIRSE EN PREMIUM</div>

		<div class="panel-body">
			<form action="{{route('update_premium_path', ['pago' => $pago])}}" method='POST'>
				{{ csrf_field()}}
				{{ method_field('PUT') }}
				<div class="form-group">
					<strong>
					<p>Numero Tarjeta: {{$pago->numero_tarjeta}}</p>
					<p>Codigo Seguridad: {{$pago->cod_seguridad}}</p>
					<p>Vencimiento: {{$pago->vencimiento}}</p>	
					<p>A Pagar: $100</p>
					</strong>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" autofocus="">Confirmar</button>
					<button class ="btn btn-warning" onclick="goBack()">Atrás</button>
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