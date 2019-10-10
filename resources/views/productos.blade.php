@extends('layouts.secundaria')

@section('titulo','Lista de Productos')

@section('styles')
<style>
.row .col-md-4 {
        margin-bottom: 1em;
    }
    .row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display:         flex;
        flex-wrap: wrap;
    }
    .row > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }
    .price {
            margin: 0;
        }
</style>
</style>
@endsection

@section('linknavbar')
<li class="nav-item active">
    <a href="#productos" class="">PRODUCTOS</a>
</li>
@endsection

@section('titproducto')
<div class="container">
    <div class="container-fluid">
        <div class="col-12 col-sm-10 col-lg-4 mx-auto">
            <img src="{{ asset('/img/welcome/welpros.svg') }}" alt="" class="img-secunpro">
        </div>
    </div>
</div>
@endsection

@section('contenproducto')
<section class="about-services" id="productos">
    <div class="contenedor" style="padding: 30px 0;">
        <h2 class="titulo" style="margin-bottom: 30px;">Productos</h2>
        <div class="servicio-cont">
            <div class="card-deck row">
            @foreach($productos as $producto)
                <div class="servicio-ind col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <img src="{{ $producto->favoritoimagenurl }}" class="card-img-top">
                            <h5 class="text-center"><b> {{ $producto->nombre }}</b></h5>
                            <p class="text-justify">
                              {{ $producto->descripcion }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('productos.detalles',$producto->id) }}" class="btn colorprin btn-block">VER</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection