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
            <div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Categorias de Gauchadas</div>
            <div class="panel-body links2">
                @foreach(CategoriaGauchada::all() as $categoriaGauchada)
                    <div style="height: 62px; width: 300px; margin: auto; border-bottom: 1px solid grey;margin-top: 10px;"> <!-- div casilla -->
                        <div style="float: left; height: inherit; width: 70%;">
                            <h4 style="margin-left: 20px; margin-top: 15px;"><strong>{{$categoriaGauchada->nombre}}</strong></h4>
                        </div>
                        <div style="float: left;width: 30%;">
                            <a href="{{ route('edit_categoriagauchada_path', ['categoriaGauchada' => $categoriaGauchada->id]) }}" class="btn btn-info">Editar</a>                                
                            <form action="{{ route('delete_categoriagauchada_path', ['categoriaGauchada' => $categoriaGauchada->id]) }}" method="GET">
                                <button type="submit" class='btn btn-info'>Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection