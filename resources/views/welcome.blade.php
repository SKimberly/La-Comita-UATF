@extends('layouts.app')

@section('titulo','App La-Comita')

@section('contentpri')
<section class="textos-header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h1 class="display-4" style="color: white;">"Sport La Comita"</h2>
                <h2 class="lead text-justify">Tienda en linea de la fabrica de ropa deportiva.
                </h2>

                @if (Route::has('login'))
                        {{-- "auth" verifica si se authentico el usuario--}}
                        @auth
                            <a href="{{ url('/admin') }}"  class="btn btn-lg  btn-outline-light">ESCRITORIO</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-lg   btn-light">INGRESAR</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-lg  btn-outline-light">REGISTRARSE</a>
                            @endif
                        @endauth
                @endif

            </div>
            <div class="col-12 col-lg-6">
                <img class="img-fluid mb-4" src="/img/portada.svg" alt="Desarrollo Web">
            </div>
        </div>
    </div>
</section>
@endsection