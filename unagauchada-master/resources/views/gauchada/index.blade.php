@extends('layouts.app')
  <?php 
    use App\User;
    use App\Postula;
    use App\Gauchada;
  ?>
@section('content')

    @foreach($gauchada as $gau)

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class= "pull-left">
                      <img src="/imagenes/gauchadas/{{ $gau->imagen }}" style="margin-right:10px" width="60" height="60" >
                    </div>
                    <a href="{{ route('gauchada_path', ['gau' => $gau]) }}">{{ $gau->titulo }}</a>

                    <small class="pull-right">
                        @if ($gau->activo)

                            @if(!$gau->seleccionado)
                            <div><a href="{{ route('edit_gauchada_path', ['gau' => $gau->id]) }}" class="btn btn-info">Editar</a></div>
                            @else
                                <div><a class= "btn btn-info"> No se puede editar (postulante seleccionado)</a></div>
                            @endif



                            <?php
                                $hay_postu=False;
                            ?>
                            @foreach(Postula::all() as $post)
                                @if (($post->gauchada_id == $gau->id) AND ($post->seleccionado == 1))
                                    <?php 
                                        $hay_postu=True;
                                    ?>
                                @endif
                            @endforeach
                            @if($hay_postu)
                                <a class="btn btn-info">No se puede Despublicar (postulante seleccionado)</a>
                            @else
                                <a href="{{ route('despublicar_gauchada_path', ['gau' => $gau->id]) }}" class="btn btn-info">Despublicar</a>
                            @endif
                                
                        @endif
                    </small>  
                    <p>Posteado {{ $gau->created_at->diffForHumans() }}</p>         
                </div>
            </div>
            <hr>
    @endforeach
    <div style="text-align: center;color: white">{!! $gauchada -> render() !!}</div>
@endsection
	