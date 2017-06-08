@extends('layouts.app')

@section('content')
    @foreach($gauchada as $gauchada)
        <div class="row">
            <div class="col-md=12">
                <h2>
                    <a href="{{ route('gauchadas_path', ['gauchada' => $gauchada->id]) }}">{{ $gauchada->titulo }}</a>

                    <small class="pull-right">

                        <a href="{{ route('edit_gauchada_path', ['gauchada' => $gauchada->id]) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('delete_gauchada_path', ['gauchada' => $gauchada->id]) }}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class='btn btn-danger'>Delete</button>
                        </form>
                    </small>
                </h2>
             
            </div>
        </div>
        <hr>
    @endforeach
@endsection
	