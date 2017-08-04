@extends ('layouts.app')
<?php 
    use App\Gauchada
?>

@section('content')
	<div class="container">
        <div class="panel panel-default">
			<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:3px 8px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Eliminar gauchada</div>
			<div class="panel-body">
	            <strong>¿Desea eliminar la gauchada?</strong>
	            <form action="{{route('delete_gauchada_path', ['gauchada' => $gauchada])}}" method='GET'>
		            <button type="submit" class="btn btn-primary" autofocus="">Confirmar</button>
		            <button class="btn btn-warning" onclick="goBack()">Atras</button>
						<script>
							function goBack(){
								window.history.back();
							}
						</script>	
				</form>
           </div>
        </div>
    </div>
@endsection