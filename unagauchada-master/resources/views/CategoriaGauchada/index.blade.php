@extends('layouts.app')
  <?php 
    use App\CategoriaGauchada;
  ?>
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="cab_form">Categorias de Gauchadas</div>
            <div class="panel-body">
                @foreach(CategoriaGauchada::all() as $cat)
                    <small>
                        {{$cat->nombre}}<br>
                    </small>
                @endforeach
            </div>
        </div>
    </div>
@endsection