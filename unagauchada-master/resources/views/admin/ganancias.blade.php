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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="cab_form">Ganancias Entre Dos Fechas</div>
                <div class="panel-body">
                <form action="{{route('ganancias_show_path')}}" method='GET'>
		
					
				<div class="form-group">
					<label for="Desde">Desde:</label>
					<input type="date" name='Desde' class="form-control" value="" style="width: 400px" />
				</div>

				<div class="form-group">
					<label for="Hasta">Hasta:</label>
					<input type="date" name="Hasta" class="form-control" value="" style="width: 400px">
				</div>

				<div class="form-group">
			<button type="submit" class="btn btn-primary" autofocus="">Consultar Ganancias</button>
			<button class="btn btn-warning" onclick="goBack()"> Atras</button>
			<script>
				function goBack(){
					window.history.back();
				}
			</script>		
@endsection