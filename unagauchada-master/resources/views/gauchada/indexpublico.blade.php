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

  <div class="row" style="width: 600px; margin: 0px auto;">
      <form action="{{route('buscar_gauchada_path')}}" method="GET" class="navbar-form pull-right">
        <div class="form-group">
          <input type="text" name="titulo" class="form-control" placeholder="Buscar Gauchada" aria-describedby="search"></input>
        </div>
        <button type="submit" class="btn btn-info" autofocus="">Buscar</button>
      </form>
    
      <form action="{{route('categorizar_gauchada_path')}}" method="GET" class="navbar-form pull-right">
        <div class="form-group">
          <select type="string" name='categoria' class="form-control" value="{{old('categoria')}}" style="width: 200px">
            <?php
              echo '<option value="100">'.'Todas'.'</option>';
              foreach (CategoriaGauchada::all() as $categoria) {
                echo '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
              }
            ?>
          </select>
        </div>
        <button type="submit" class="btn btn-info" autofocus="">Mostrar</button>
      </form>
  </div>

    @foreach($gauchada as $gau)
        @if ($gau->activo)
          <div class="row" style="width: 800px; margin: 0px auto; border-bottom: 1px solid coral;">
            <div style="float: left;width: 75%;">
              @if(Auth::check())
                <a href="{{ route('gauchada_path', ['gau' => $gau]) }}"><p style="font-size: xx-large;margin: 0px;">{{ $gau->titulo }}</p></a>
              @else
                <p style="font-size: xx-large;margin: 0px;">{{ $gau->titulo }}</p>
              @endif
                <div class="pull-left">
                  <img src="/imagenes/gauchadas/{{ $gau->imagen }}" width="150" height="150" style="margin-right:10px">
                </div>
                <div style="height: 150px;">
                  <strong><p style="margin: 0px;font-size: medium;">{{ $gau->descripcion }}</p></strong>
                </div>
                <p style="margin: 0 0 0 20px;">
                  <strong>Fecha Limite: {{$gau->fecha_limite}} | <?php $user = User::find($gau->user_id); echo "Creado por $user->nick";?> | Posteado: {{ $gau->created_at->diffForHumans() }}</strong>
                </p>
            </div> 
              <div style="float: left;width: 25%; margin-top: 150px;">
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
                        <form action="{{route('store_postula_path', ['gau' => $gau])}}" method='GET'>
                          <button type="submit" class="btn btn-danger" autofocus="" onclick="alert('Te Postulaste!')">Postularse</button>
                        </form>
                      @endif

                    <?php
                    } else {
                      if ((Auth::user()->id != $gau->user_id) and ($existe)) { ?>
                        @if ($gau->activo)
                          <form action="{{route('destroy_postula_path', ['gau' => $gau])}}" method='GET'>
                            <div>
                              <button type="submit" class="btn btn-warning" autofocus="" onclick="alert('Te Despostulaste!')">Despostularse</button>
                            </div>
                          </form>
                        @endif
                  <?php
                      }
                    }
                  }
                  ?>
                  @if (Auth::user()->admin)
                    <form action="{{route('delete_gauchada_path', ['gau' => $gau])}}" method='GET'>
                      <div>
                        <button type="submit" class="btn btn-warning" autofocus="" onclick="confirm('Deseas eliminar la gauchada?')">Eliminar</button>
                      </div>
                    </form>
                  @endif
                @endif
            </div>

          </div>
        @endif
         
    @endforeach
    <div style="text-align: center;color: white">{!! $gauchada -> render() !!}</div>
@endsection