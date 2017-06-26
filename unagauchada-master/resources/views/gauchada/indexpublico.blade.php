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
        <button type="submit" class="btn btn-warning" autofocus="">Buscar</button>
    </form>
    </small>
  </div>
      @foreach($gauchada as $gauchada)

        <div class="row">
           
              <div class="col-md-8 col-md-offset-2">
             
               


                <small class="pull-left">

                  <a href="{{ route('gauchada_path', ['gauchada' => $gauchada]) }}"><h2>{{ $gauchada->titulo }}</h2></a>
                  <!-- <h2>{{ $gauchada->titulo }}</h2> -->
                  <p>{{ $gauchada->descripcion }}</p>
                  <p>Fecha Limite: {{$gauchada->fecha_limite}}</p>
                    <?php   $user= User::find($gauchada->user_id);
                    echo "Creado por $user->nick"
                  ?>
                  <p>Posteado: {{ $gauchada->created_at->diffForHumans() }}</p>
              </small>
              

           
          @if(Auth::check())
                                 <?php
              if (Auth::user()->id != $gauchada->user_id) {?>
              <form action="{{route('store_postula_path', ['gauchada' => $gauchada])}}" method='GET'>
                <small class="pull-right">
                  <button type="submit" onclick="alert('Te has postulado!')" class="btn btn-warning" autofocus="">Postularse</button>
                </small>
              </form>
            <?php
              }
            ?>
          @endif
          </div>
       </div>
        <hr>
    @endforeach
@endsection