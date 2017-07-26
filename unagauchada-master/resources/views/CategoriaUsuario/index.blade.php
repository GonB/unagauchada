@extends('layouts.app')
  <?php 
    use App\CategoriaUsuario;
  ?>

@section('content')
  
  <div class="container">
    <div class="panel panel-default">
      <div class="cab_form"><h2>Categorias de Usuarios</h2></div>
      <div class="panel-body">
        @foreach(CategoriaUsuario::all() as $cat)

          <small class="pull-right">

            <div><a href="{{ route('edit_categoriausuario_path', ['categoriaUsuario' => $cat->id]) }}" class="btn btn-info">Editar</a></div>

            <form action="{{ route('delete_categoriausuario_path', ['categoriaUsuario' => $cat->id]) }}" method="GET">
              <button type="submit" class='btn btn-info'>Eliminar</button>
            </form>
                        
          </small> 
          <small class="pull-lefth">
            <strong>
              <h3>{{$cat->nombre}}</h3>
              Rango inicial: {{$cat->rango_inicial}}<br>
              Rango final: {{$cat->rango_final}}<br>
            </strong>
          </small>
          <hr style="border-color:grey;margin: 0px;">
        @endforeach
      </div>
    </div>
  </div>
@endsection
