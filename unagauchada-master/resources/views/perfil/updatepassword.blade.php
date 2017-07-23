@extends ('layouts.app')

@section('content')
	<div class="container">
        <div class="panel panel-default">
            <div style="color:#FFF;background-color:#FF7F50;border-color:#d3e0e9;text-align:center;font-size:20px;padding:10px 15px;border-bottom:1px solid transparent;border-top-right-radius:3px;border-top-left-radius:3px;">MODIFICAR CONTRASEÑA</div>
            <div class="panel-body">
            <form action="{{ route('update_password_path') }}" method='POST' enctype="multipart/form-data">
                {{ csrf_field() }}    
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name='password' class="form-control" value="" style="width: 400px" />
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" style="width: 400px" required>
                </div>                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" autofocus="">Aceptar</button>
                    <button class ="btn btn-warning" onclick="goBack()">Cancelar</button>
                    <script>
                        function goBack(){
                            window.history.back();
                        }
                    </script>           
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection