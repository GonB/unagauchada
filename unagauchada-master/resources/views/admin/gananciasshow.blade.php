@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-default" style="width: 300px;">
        <div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">Ganancias</div>
        <div class="panel-body">
            Ganancias Obtenidas: ${{$sum}}<br>
            <div style="text-align: center;"><a href="{{ route('index_admin_path') }}" class ="btn btn-warning">Atrás</a></div>
        </div>
    </div>
</div>
@endsection    
