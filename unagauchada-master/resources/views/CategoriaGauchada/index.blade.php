@extends('layouts.app')
  <?php 
    use App\CategoriaGauchada;
  ?>
@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                <li>
                    {{$errors}}
                </li>
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="panel panel-default">
            <div class="cab_form"><h1>Categorias de Gauchadas</h1></div>
            <div class="panel-body links2">
                @foreach(CategoriaGauchada::all() as $categoriaGauchada)
                    <small class="pull-right">

                            <div><a href="{{ route('edit_categoriagauchada_path', ['categoriaGauchada' => $categoriaGauchada->id]) }}" class="btn btn-info">Editar</a></div>                                

                            <form action="{{ route('delete_categoriagauchada_path', ['categoriaGauchada' => $categoriaGauchada->id]) }}" method="GET">
                                <button type="submit" class='btn btn-info'>Eliminar</button>
                            </form>
                        
                    </small> 
                    
                    <small class="pull-lefth">
                        <h3>{{$categoriaGauchada->nombre}}</h3><br>
                    </small>

                    
                    <hr style="border-color:grey;margin: 0px;">
                @endforeach
            </div>
        </div>
    </div>
@endsection