@extends('layouts.app') 
  <?php 
    use App\User;
    use App\Postula;
    use App\Gauchada;
    use App\CategoriaGauchada;
  ?>

@section('content')
  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="row">
    <small class="col-md-8">

      <form action="{{route('buscar_gauchada_path')}}" method="GET" class="navbar-form pull-right">
        <div class="form-group">
          <label for="titulo"></label>
          <input type="text" name="titulo" class="form-control" placeholder="Buscar Gauchada" aria-describedby="search"></input>
        </div>
        <button type="submit" class="btn btn-info" autofocus="">Buscar</button>
      </form>
    
      <form action="{{route('categorizar_gauchada_path')}}" method="GET" class="navbar-form pull-right">
        <div class="form-group">
          <label for="categoria"></label>
          <select type="string" name='categoria' class="form-control" value="{{old('categoria')}}" style="width: 200px">
            <?php
              echo '<option value="100">'.'Todos'.'</option>';
              foreach (CategoriaGauchada::all() as $categoria) {
                echo '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
              }
            ?>
          </select>
        </div>
        <button type="submit" class="btn btn-info" autofocus="">Categoria</button>
      </form>

    </small>
  </div>

    @foreach($gauchada as $gau)
        @if ($gau->activo)
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <small>
                <div class="pull-left">
                  <img src="/imagenes/gauchadas/{{ $gau->imagen }}" width="150" height="150" style="margin-right:10px">
                  </div>
                  @if(Auth::check())
                    <a href="{{ route('gauchada_path', ['gau' => $gau]) }}"><h2>{{ $gau->titulo }}</h2></a>
                  @else
                    <h2>{{ $gau->titulo }}</h2>
                  @endif
                    <strong><p style="margin: 0px;">{{ $gau->descripcion }}</p></strong><br>
                    <p style="margin: 0px;">Fecha Limite: {{$gau->fecha_limite}}</p>
                    <?php   $user = User::find($gau->user_id);
                      echo "Creado por $user->nick";
                    ?>
                    <p>Posteado: {{ $gau->created_at->diffForHumans() }}</p>
                </small>  

                @if(Auth::check())
                  <?php
                  // esto es para ver si ya existe la postulacion
                  $existe = False;
                  $hay_elegido = False;
                  $postulaciones = Postula::all();
                  foreach ($postulaciones  as $p) {
                    if (($p->seleccionado == 1) and ($p->gauchada_id == $gau->id)) {
                      $hay_elegido = true;
                    }
                    if (($p->gauchada_id == $gau->id) and ($p->user_id == Auth::id())) 
                    {
                      $existe = True;
                    }
                  }
                if (! $hay_elegido) {
                  if ((Auth::user()->id != $gau->user_id) and (! $existe)) {
                  ?>
                    @if ($gau->activo)
                      <form style="text-align: right;" action="{{route('store_postula_path', ['gau' => $gau])}}" method='GET'>
                        <button type="submit" class="btn btn-danger" autofocus="" onclick="alert('Te Postulaste!')">Postularse</button>
                      </form>
                    @endif

                  <?php
                  } else {
                    if ((Auth::user()->id != $gau->user_id) and ($existe)) { ?>
                      @if ($gau->activo)
                        <form action="{{route('destroy_postula_path', ['gau' => $gau])}}" method='GET'>
                          <small class="pull-right">
                            <button type="submit" class="btn btn-warning" autofocus="" onclick="alert('Te Despostulaste!')">Despostularse</button>
                          </small>
                        </form>
                      @endif
                <?php
                    }
                  }
                }
                ?>
                @if (Auth::user()->admin)
                  <form action="{{route('delete_gauchada_path', ['gau' => $gau])}}" method='GET'>
                    <small class="pull-right">
                      <button type="submit" class="btn btn-warning" autofocus="" onclick="alert('Gauchada Eliminada')">Eliminar</button>
                    </small>
                  </form>
                @endif
            @endif

            </div>
          </div>
          <hr>
          <hr style="margin:10px 0px;border-color: coral;">
        @endif
         
    @endforeach
    <div style="text-align: center;">{!! $gauchada -> render() !!}</div>
@endsection