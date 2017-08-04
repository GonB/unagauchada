@extends('layouts.app')
  <?php 
    use App\User;
    use App\Postula;
    use App\Gauchada;
  ?>
@section('content')

<div class="container" style="width: 800px">
    @foreach($gauchada as $gau)
        <div class="row" style="border-bottom: 1px solid coral;padding:20px 0px;">
            <div class="pull-right">
                @if ($gau->activo)

                    @if(!$gau->seleccionado)
                        <div><a href="{{ route('edit_gauchada_path', ['gau' => $gau->id]) }}" class="btn btn-info">Editar</a></div>
                    @else
                        <div style="color: red;font-weight: 700;">No se puede editar</div>
                    @endif

                    <?php
                        $hay_postu=False;
                    ?>
                    @foreach(Postula::all() as $post)
                        @if (($post->gauchada_id == $gau->id) AND ($post->seleccionado == 1))
                            <?php 
                                $hay_postu=True;
                            ?>
                        @endif
                    @endforeach
                    @if($hay_postu)
                        <div style="color: red;font-weight: 700;">No se puede despublicar</div>
                    @else
                        <a href="{{ route('despublicar_gauchada_path', ['gau' => $gau->id]) }}" class="btn btn-info">Despublicar</a>
                    @endif
                        
                @endif
            </div>

            <div class= "pull-left">
              <img src="/imagenes/gauchadas/{{ $gau->imagen }}" style="margin-right:10px" width="60" height="60">
            </div>
            <a href="{{ route('gauchada_path', ['gau' => $gau]) }}" style="font-size:17px;">{{ $gau->titulo }}</a>
            <?php
                $hay_pos=False;
            ?>
                    @foreach(Postula::all() as $post)
                        @if (($post->gauchada_id == $gau->id) AND ($post->seleccionado == 0))
                            <?php 
                                $hay_pos=True;
                            ?>
                        @endif
                    @endforeach
            @if ( (!$gau->seleccionado) AND ($hay_pos) AND ($gau->activo) )
                <span style="margin-left: 5px; color: lime;font-size: small;background-color: green;padding:1px 6px;border-radius: 5px;">-> Se han postulado usuarios</span>
            @endif
            @if ( ($gau->seleccionado == 1) AND ($gau->activo) )
                <span style="margin-left: 5px; color: white;font-size: small;background-color: red;padding:1px 6px;border-radius: 5px;">-> Colaborador seleccionado</span>
            @endif
            <p style="font-size:12px;">Posteado {{ $gau->created_at->diffForHumans() }}</p>         
        </div>
    @endforeach
    <div style="text-align: center;color: white">{!! $gauchada -> render() !!}</div>
</div>
@endsection
	