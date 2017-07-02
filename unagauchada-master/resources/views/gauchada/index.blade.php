@extends('layouts.app')

@section('content')
    @foreach($gauchada as $gauchada)
        @if($gauchada -> user_id == Auth::id())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <a href="{{ route('gauchada_path', ['gauchada' => $gauchada]) }}">{{ $gauchada->titulo }}</a>

                    <small class="pull-right">
                        @if ($gauchada->activo)
                            <div><a href="{{ route('edit_gauchada_path', ['gauchada' => $gauchada->id]) }}" class="btn btn-primary">Editar</a></div>
                            <a href="{{ route('despostular_gauchada_path', ['gauchada' => $gauchada->id]) }}" class="btn btn-danger">Despublicar</a>
                            <form action="{{ route('delete_gauchada_path', ['gauchada' => $gauchada->id]) }}" method="GET">
                                <button type="submit" class='btn btn-warning'>Eliminar (error si hay postulados)</button>
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
	