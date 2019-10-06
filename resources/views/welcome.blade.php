@extends('layouts.app')

@section('titulo','Sport La Comita')

@section('contentpri')
<div class="caratula-ind col-md-6">
    <h1 style="color: #fff;"> <b> "Sport La Comita" </b></h1>
    <h2 class="lead text-justify" style="color: #ffd700;"><strong> Bienvenidos a nuestra página web, registrate para poder realizar pedidos y cotizaciones en linea y te contactaremos para coordinar la entrega, puedes realizar tus pedidos cuando estés seguro.</strong>
    </h2>

    @if (Route::has('login'))
            {{-- "auth" verifica si se authentico el usuario--}}
            @auth
                <a href="{{ url('/admin') }}"  class="btn btn-lg  btn-outline-light" >INICIO</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-lg  btn-light">INGRESAR</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-lg  btn-outline-light">REGISTRARSE</a>
                @endif
            @endauth
    @endif
</div>
@endsection