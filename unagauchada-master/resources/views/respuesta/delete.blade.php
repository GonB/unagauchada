@extends ('layouts.app')
<?php 
    use App\Respuesta;
?>

@section('content')
	<div class="container">
        <div class="panel panel-default">
			<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Eliminar Comentario</div>
			<div class="panel-body">

            <strong>Desea Eliminar la respuesta?</strong>
            <form action="{{route('delete_respuesta_path', ['respuesta' => $respuesta])}}" method='GET'>

            
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