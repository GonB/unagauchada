@extends ('layouts.app')

@section('content')
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <medium class="pull-left">
                <p>Nombre: <?php echo $user -> name; ?></p>
                <p>Nick: <?php echo $user -> nick; ?></p>
                <p>Fecha Nacimiento: <?php echo $user -> birthdate; ?></p>
                <p>Email: <?php echo $user -> email; ?></p>
            </medium>  
        </div>
    </div>
    <hr>	 
@endsection