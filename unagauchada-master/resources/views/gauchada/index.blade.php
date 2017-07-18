@extends('layouts.app')
  <?php 
    use App\User;
    use App\Postula;
    use App\Gauchada;
  ?>
@section('content')
    @foreach(Gauchada::all() as $gauchada)
        @if($gauchada -> user_id == Auth::id())

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <a href="{{ route('gauchada_path', ['gauchada' => $gauchada]) }}">{{ $gauchada->titulo }}</a>

                    <small class="pull-right">
                        @if ($gauchada->activo)

                            @if(!$gauchada->seleccionado)
                            <div><a href="{{ route('edit_gauchada_path', ['gauchada' => $gauchada->id]) }}" class="btn btn-info">Editar</a></div>
                            @else
                                <div><a class= "btn btn-info"> No se puede editar (postulante seleccionado)</a></div>
                            @endif



                            <?php
                                $hay_postu=False;
                            ?>
                            @foreach(Postula::all() as $post)
                                @if (($post->gauchada_id == $gauchada->id) AND ($post->seleccionado == 1))
                                    <?php 
                                        $hay_postu=True;
                                    ?>
                                @endif
                            @endforeach
                            @if($hay_postu)
                                <a class="btn btn-info">No se puede Despublicar (postulante seleccionado)</a>
                            @else
                                <a href="{{ route('despublicar_gauchada_path', ['gauchada' => $gauchada->id]) }}" class="btn btn-info">Despublicar</a>
                            @endif
                                

                            <form action="{{ route('delete_gauchada_path', ['gauchada' => $gauchada->id]) }}" method="GET">
                                <button type="submit" class='btn btn-info'>Eliminar (error si existe postulados)</button>
                            </form>
                        @endif
                    </small>  
                    <p>Posteado {{ $gauchada->created_at->diffForHumans() }}</p>         
                </div>
            </div>
            <hr>
        @endif
    @endforeach
@endsection
	