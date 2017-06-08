@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="flex-center position-ref full-height">
                <div class="top-right links">
                      <div class="flex-center position-ref full-height">
           
                    @if (Auth::check())
                        <h1><a href="{{ url('/gauchada/create') }}">Crear Gauchada</a></h1>
                   
                    @endif
                     </div>
                </div>
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
