@extends('layouts.app')

@section('content')
    @foreach($gauchada as $gauchada)
        @if($gauchada -> user_id == Auth::id())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <a href="{{ route('gauchada_path', ['gauchada' => $gauchada]) }}">{{ $gauchada->titulo }}</a>

                    <small class="pull-right">

                        <a href="{{ route('edit_gauchada_path', ['gauchada' => $gauchada->id]) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('delete_gauchada_path', ['gauchada' => $gauchada->id]) }}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class='btn btn-danger'>Delete</button>
                        </form>
                    </small>  
                     <p>Posteado {{ $gauchada->created_at->diffForHumans() }}</p>         
                </div>
            </div>
            <hr>
        @endif
    @endforeach
@endsection
	