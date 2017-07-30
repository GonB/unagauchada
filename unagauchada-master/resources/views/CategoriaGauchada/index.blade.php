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
        <div>
            @if (Session::has('message'))
                <div class="alert" style="padding: 0px;margin: 0px auto 10px;background-color: #87a4b7;color: white;text-align: center;font-size: medium;width: 526px;border-radius: 20px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right: 10px;">&times;</button>
                    {{ Session::get('message') }}
                </div>
            @endif
        </div>
        <div class="panel panel-default">
            <div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Categorias de Gauchadas</div>
            <div style="width: 300px;margin: 5px auto 0px; padding: 5px 0px;">
               <a href="{{ route('create_categoriagauchada_path') }}" class="btn btn-primary" style="width: 49%;">Añadir categoría</a>
               <a href="{{ route('index_admin_path') }}" class="btn btn-warning" style="width: 49%;">Volver</a>
            </div>
            <div style="width: 300px; background-color: #87a4b7; color: white; text-align: center;margin: 0px auto">
                <p style="margin: 0px">Lista de categorias</p>
            </div>
            <div class="panel-body links2" style="padding: 2px;">
                @foreach(CategoriaGauchada::all() as $categoriaGauchada)
                    <div style="height: 62px; width: 300px; margin: 2px auto 0px; border-bottom: 1px solid grey;"> <!-- div casilla -->
                        <div style="float: left; height: inherit; width: 70%;">
                            <p style="margin-left: 20px; margin-top: 15px; font-size: 16px;"><strong>{{$categoriaGauchada->nombre}}</strong></p>
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