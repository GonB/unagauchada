@extends('layouts.app')
  <?php 
    use App\CategoriaUsuario;
  ?>

@section('content')
  @if($error1 != '')
    <div class="alert alert-danger">
      <ul>
        <li>
          {{$error1}}
        </li>
      </ul>
    </div>
  @endif
  
  <div class="container">
        <div class="panel panel-default">
      <div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Categorias de Usuarios</div>
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
