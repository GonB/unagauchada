@extends('layouts.app') 
  <?php 
    use App\User;
    use App\Postula;
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
    </small>
  </div>
    @foreach($gauchada as $gauchada)
        @if ($gauchada->activo)
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <small class="pull-left">
                  @if(Auth::check())
                    <a href="{{ route('gauchada_path', ['gauchada' => $gauchada]) }}"><h2>{{ $gauchada->titulo }}</h2></a>
                  @else
                    <h2>{{ $gauchada->titulo }}</h2>
                  @endif
                    <p>{{ $gauchada->descripcion }}</p>
                    <p>Fecha Limite: {{$gauchada->fecha_limite}}</p>
                    <?php   $user= User::find($gauchada->user_id);
                      echo "Creado por $user->nick";
                    ?>
                    <p>Posteado: {{ $gauchada->created_at->diffForHumans() }}</p>
                </small>  
                @if(Auth::check())
                  <?php
                  // esto es para ver si ya existe la postulacion
                  $existe = False;
                  $hay_elegido = False;
                  $postulaciones = Postula::all();
                  foreach ($postulaciones  as $p) {
                    if (($p->seleccionado == 1) and ($p->gauchada_id == $gauchada->id)) {
                      $hay_elegido = true;
                    }
                    if (($p->gauchada_id == $gauchada->id) and ($p->user_id == Auth::id())) 
                    {
                      $existe = True;
                    }
                  }
                if (! $hay_elegido) {
                  if ((Auth::user()->id != $gauchada->user_id) and (! $existe)) {?>
                    @if ($gauchada->activo)
                      <form action="{{route('store_postula_path', ['gauchada' => $gauchada])}}" method='GET'>
                        <small class="pull-right">
                          <button type="submit" class="btn btn-danger" autofocus="" onclick="alert('Te Postulaste!')">Postularse</button>
                        </small>
                      </form>
                    @endif
                  <?php
                  } else {
                    if ((Auth::user()->id != $gauchada->user_id) and ($existe)) { ?>
                      @if ($gauchada->activo)
                        <form action="{{route('destroy_postula_path', ['gauchada' => $gauchada])}}" method='GET'>
                          <small class="pull-right">
                            <button type="submit" class="btn btn-warning" autofocus="" onclick="alert('Te Despostularseespostulaste!')">Despostularse</button>
                          </small>
                        </form>
                      @endif
                  <?php
                    }
                  }
                }
                ?>
            @endif
            </div>
         </div>
          <hr>
        @endif
    @endforeach
@endsection