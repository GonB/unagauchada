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
			<form action="{{route('store_premium_pago_path', ['pago' => $pago->id])}}" method='GET'>
			  {{ csrf_field()}}
			  <div class="col-md-8 col-md-offset-2" style="margin-left: 0px;">
			    
			    <h1>Hacete Premium!</h1>
			    <p>Convertite en Premium y hace todas las publicaciones de gauchadas que quieras sin necesidad de creditos!!</p>
			    <h3>Comprá Premium por:</h3>
			    <p class="pull-right">$ <font SIZE=60>100</font></p><br><br><br>

			    <div class="form-group">
				  <label for="numero_tarjeta" style="margin-bottom: 0px;">Numero de tarjeta</label>
				  <input type="string" name='numero_tarjeta' class="form-control" value="{{old('numero_tarjeta')}}" style="width: 300px" />
				</div>
				<div class="form-group">
				  <label for="cod_seguridad" style="margin-bottom: 0px;">Codigo de seguridad</label>
				  <input type="string" name="cod_seguridad" class="form-control" style=" width: 300px" value="{{$pago->cod_seguridad}}"/>Se encuentra al dorso de su tarjeta
				</div>
				<div class="form-group">	
				  <label for="vencimiento" style="margin-bottom: 0px;">Vencimiento</label>
				  <input type="date" name="vencimiento" class="form-control" style="width: 300px" value="{{ $pago->vencimiento}}"/>
				</div><br>
				<div class="form-group">
				  <button type="submit" class="btn btn-primary" autofocus="">Comprar</button>
				  <a href="{{ route('home') }}" class ="btn btn-warning">Cancelar</a>			
				</div>
			  </div>
			</form>
		</div>
	  </div>
	</div>
@endsection
