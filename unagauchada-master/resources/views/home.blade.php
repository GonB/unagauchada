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
                <div class="panel-heading" >PONEMOS LA IMGEN DE LAS 2 MANITOS DEL BLOG REAL</div>

                <div class="panel-body">
                      @if (Auth::check())
                        <a href="{{ url('/gauchada/create') }}">Crear Gauchada (1 credito necesario)</a><br>
                        <a href="{{route('gauchadas_path')}}">Mis Gauchadas</a><br>
                        <a href="{{url('/pago/create')}}">Comprar Creditos</a>
                    @endif
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
