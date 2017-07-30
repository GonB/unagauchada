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
      <div>
          @if (Session::has('message'))
              <div class="alert" style="padding: 0px;margin: 0px auto 10px;background-color: #87a4b7;color: white;text-align: center;font-size: medium;width: 526px;border-radius: 20px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right: 10px;">&times;</button>
                  {{ Session::get('message') }}
              </div>
          @endif
      </div>
      <div class="panel panel-default">
          <div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Categorias de Usuarios</div>
          <div style="width: 300px;margin: 5px auto 0px; padding: 5px 0px;">
              <a href="{{ route('create_categoriausuario_path') }}" class="btn btn-primary" style="width: 49%;">Añadir categoría</a>
              <a href="{{ route('index_admin_path') }}" class="btn btn-warning" style="width: 49%;">Volver</a>
          </div>
          <div style="width: 300px; background-color: #87a4b7; color: white; text-align: center;margin: 0px auto">
              <p style="margin: 0px">Lista de categorias</p>
          </div>
          <div class="panel-body links2" style="padding: 2px;">
              @foreach(CategoriaUsuario::all() as $cat)
                  <div style="height: 70px; width: 300px; margin: 2px auto 0px; border-bottom: 1px solid grey;">
                      <div style="float: left;height: inherit; width: 70%;">
                        <strong>
                          <p style="font-size: 17px; margin:0px 0px 0px 20px">{{$cat->nombre}}</p>
                          <p style="font-size: 11px; margin:0px 0px 0px 20px">Rango inicial: {{$cat->rango_inicial}}</p>
                          <p style="font-size: 11px; margin:0px 0px 0px 20px">Rango final: {{$cat->rango_final}}</p>
                        </strong>
                      </div>
                      <div style="float: left;width: 30%;height: inherit;padding-top: 5px;">
                          <a href="{{ route('edit_categoriausuario_path', ['categoriaUsuario' => $cat->id]) }}" class="btn btn-info">Editar</a>
                          
                          <form action="{{ route('delete_categoriausuario_path', ['categoriaUsuario' => $cat->id]) }}" method="GET">
                              <button type="submit" class='btn btn-info'>Eliminar</button>
                          </form>              
                      </div> 
                  </div>  
              @endforeach
          </div>
      </div>
  </div>
@endsection