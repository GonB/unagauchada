@extends('layouts.app')
  <?php 
    use App\CategoriaUsuario;
  ?>
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="cab_form">CATEGORIAS DE USUARIOS</div>
        <div class="panel-body links2">
   			 @foreach(CategoriaUsuario::all() as $cat)
                <small>
                <li><h3>{{$cat->nombre}}</h3></li>
                <p>Rango inicial: {{$cat->rango_inicial}}</p>
               	<p>Rango final: {{$cat->rango_final}}</p>
               	</small>
             
        @endforeach
         </div>
             </div>
            </div>
       @endsection
