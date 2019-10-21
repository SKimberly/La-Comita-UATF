@extends('layouts.secundaria')

@section('titulo','Detalle Producto')

@section('linknavbar')
<li class="nav-item active">
    <a href="#fotos" class="">FOTOS</a>
</li>
@endsection

@section('titproducto')
<div class="container">
    <div class="container-fluid">
        <div class="col-12 col-sm-10 col-lg-4 mx-auto">
            <img src="{{ asset('/img/welcome/detalles.svg') }}" alt="" class="img-secunpro">
        </div>
    </div>
</div>
@endsection

@section('contenproducto')
@include('parciales.modalCarrito')
<section class="portafolio" id="fotos">
    <div class="contenedor" style="padding: 30px 0;">
        <h2 class="titulo" style="margin-bottom: 30px;">{{ $producto->nombre }}</h2>
        <div class="col-12 col-sm-10 col-lg-4 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div style="text-align: center;">
                    <img src="{{ $producto->favoritoimagenurl }}" class="card-img-top"> </div>
                    <h3 class="text-center">{{ $producto->nombre }}</h3>
                    <p class="text-justify">
                        {{ $producto->descripcion }}
                    </p> <hr>
                    <div class="d-flex flex-row justify-content-center">
                      <b>Precio:</b> <span class="ml-auto">Unid.:
                        <a href="" class="btn colorprin btn-sm "> Bs. {{ $producto->precio }}</a></span>
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-center">
                       <b>Tallas:</b>
                       @foreach($producto->tallas as $talla)
                            <a class="btn colorprin btn-sm ml-auto">{{ $talla->nombre }}</a>
                        @endforeach
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-center">
                        <button type="button" class="btn colorprin ml-auto btn-block"  data-toggle="modal" data-target="#modalCarrito">
                         <i class="fas fa-shopping-basket"></i> Ordenar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="galeria-port">
        @foreach($imagenes as $imagen)
            <div class="imagen-port">
                <img src="{{ $imagen->url }}" alt="Categoria Foto">
            </div>
        @endforeach
        </div>
        <div class="text-justify text-center text-white" style="background-color: #B43CCA;">
            <h4>{{ $producto->detallelargo }}</h4>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script type="text/javascript">
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: "classic",
      placeholder: "Seleccione las tallas"
    })
  })

    if(window.location.hash === '#create')
    {
        $('#modalCarrito').modal('show');
    }
    $('#modalCarrito').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#modalCarrito').on('show.bs.modal', function(){
       window.location.hash = '#create';
    });
</script>
@endpush
