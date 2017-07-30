@extends ('layouts.app')
<?php 
    use App\Comentario;
?>

@section('content')
	<div class="container">
        <div class="panel panel-default">
			<div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Eliminar Comentario</div>
			<div class="panel-body">

            <strong>Desea Eliminar el comentario?</strong>
            <form action="{{route('delete_comentario_path', ['comentario' => $comentario])}}" method='GET'>

            
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