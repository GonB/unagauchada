@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="cab_form">Ganancias</div>
                <div class="panel-body">
                Ganancias Obtenidas: ${{$sum}}
                </div>
                </div>
             </div>
          </div>
       </div>
@endsection    
