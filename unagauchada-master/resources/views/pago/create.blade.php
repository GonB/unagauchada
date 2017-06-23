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

<form action="{{route('store_pago_path', ['pago' => $pago->id])}}" method='GET'>
		{{ csrf_field()}}
	 <div class="col-md-8 col-md-offset-2">
		<div class="form-group">
			<label for="numero_tarjeta">Numero Tarjeta:</label>
			<input type="string" name='numero_tarjeta' class="form-control" value="{{old('numero_tarjeta')}}" style="width: 626px" />

			

		</div>

		<div class="form-group">
			<label for="cod_seguridad">Codigo Seguridad:</label>
			<input type="string" name="cod_seguridad" class="form-control" style=" width: 626px" value="{{$pago->cod_seguridad}}" />Se encuentra al dorso de su tarjeta</input>
			

		</div>
		<div class="form-group">
			
			<label for="vencimiento">Vencimiento</label>
			<input type="date" name="vencimiento" class="form-control" style="width: 626px" value="{{ $pago->vencimiento}}"/>
		</div>

			<div class="form-group">
			
			<label for="creditos">Creditos</label>
			<input type="number" name="creditos" class="form-control" style="width: 626px" value="{{ $pago->creditos}}"/>
		</div>


		<div class="form-group">
			<button type="submit" class="btn btn-primary" autofocus="">Añadir Pago</button>
			<button class ="btn btn-warning" onclick="goBack()"> Cancelar</button>
			<script>
				function goBack(){
					window.history.back();
				}
			</script>			
 			

		</div>
	</div>
		
	</form>

@endsection
