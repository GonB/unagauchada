@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="flex-center position-ref full-height">
                <div class="top-right links">
                      <div class="flex-center position-ref full-height">
                        </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo Auth::user()->name ?></div>

                <div class="panel-body">
                      @if (Auth::check())
                        <a href="{{ url('/gauchada/create') }}">Crear Gauchada</a><br>
                        <a href="{{url('/gauchada')}}">Mis Gauchadas</a>
                   
                    @endif
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
