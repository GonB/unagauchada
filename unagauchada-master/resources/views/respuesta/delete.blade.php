@extends ('layouts.app')
<?php 
    use App\Respuesta;
?>

@section('content')
	<div class="panel panel-default">
		<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:3px 8px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">
			Eliminar respuesta
	    </div>
	    <div class="panel-body">
			<strong>¿Desea eliminar la respuesta?</strong>
            <form action="{{route('delete_respuesta_path', ['respuesta' => $respuesta])}}" method='GET'>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" autofocus="">Aceptar</button>
					<button class ="btn btn-warning" onclick="goBack()">Cancelar</button>
					<script>
						function goBack(){
							window.history.back();
						}
					</script>								
				</div>
			</form>
		</div>
	</div>
@endsection