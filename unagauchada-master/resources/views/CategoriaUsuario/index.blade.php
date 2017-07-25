@extends('layouts.app')
  <?php 
    use App\CategoriaUsuario;
  ?>

@section('content')
  
  <div class="container">
    <div class="panel panel-default">
      <div class="cab_form">Categorias de Usuarios</div>
      <div class="panel-body">
        @foreach(CategoriaUsuario::all() as $cat)
          <strong>
            <h3>{{$cat->nombre}}</h3>
            Rango inicial: {{$cat->rango_inicial}}<br>
            Rango final: {{$cat->rango_final}}<br>
          </strong>
          <hr style="border-color:grey;margin: 0px;">
        @endforeach
      </div>
    </div>
  </div>
@endsection
