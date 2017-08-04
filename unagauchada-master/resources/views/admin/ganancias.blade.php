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
        <div class="panel panel-default" style="width: 400px;">
			<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Ganancias entre dos fechas</div>
			<div class="panel-body">
                <form action="{{route('ganancias_show_path')}}" method='GET'>
					<div class="form-group">
						<label for="Desde" style="margin-bottom: 0px;">Desde</label>
						<input type="date" name='Desde' class="form-control" value="" style="width: 200px" />
					</div>

					<div class="form-group" style="margin-bottom: 10px;">
						<label for="Hasta" style="margin-bottom: 0px;">Hasta</label>
						<input type="date" name="Hasta" class="form-control" value="" style="width: 200px">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary" autofocus="">Consultar ganancias</button>
						<button class="btn btn-warning" onclick="goBack()">Atras</button>
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