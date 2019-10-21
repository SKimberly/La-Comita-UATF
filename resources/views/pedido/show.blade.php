@extends('layouts.master')

@section('titulo','Pedido de un Usuario')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <img src="{{ asset('/img/logo1.png') }}" alt="logo la comita" class="img-fluid float-right w-50 h-75">
        </div><!-- /.col -->
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Pedidos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
@include('pedido.createModal')
<section class="content">
    <div class="container-fluid">
      <div class="col-12 col-sm-10 col-lg-3 mx-auto">
          <button class="btn colorprin btn-block" data-toggle="modal" data-target="#modalCancelar">
              <i class="fas fa-comment-dollar"></i>
              @if($carrito->anticipo !== 0)
                  Editar Pago
              @else
                  Concretar el pago

              @endif
          </button>
      </div>
      <div class="card card-info">
          <div class="card-header">
             <h5 class="card-title ">PEDIDO DE: <strong>{{ $user->fullname }}</strong></h5>
             <p class="text-right">Tu carrito de compras presenta {{ $detalles->count() }} productos.</p>
          </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                  <table class="table table-striped">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Imagen</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Tallas</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Sub Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($detalles as $key => $detalle)
                      <tr>
                         <td class="text-center">{{ ++$key }}</td>
                         <td class="text-center">
                            <img src="{{ asset($detalle->producto->favoritoimagenurl) }}" class="img-responsive img-thumbnail h-50 mr-0" alt="Producto Foto">
                          </td>
                         <td>
                            <a href="{{ route('productos.detalles',$detalle->producto->id) }}" target="_blank">{{ $detalle->producto->nombre }}</a>
                        </td>
                         <td>
                          @foreach($detalle->tallas as $talla)
                            {{ $talla->nombre }} /
                          @endforeach
                         </td>
                         <td>{{ $detalle->descripcion }}</td>
                         <td class="text-center">{{ $detalle->producto->precio }}</td>
                         <td class="text-center">{{ $detalle->cantidad }}</td>
                         <td class="text-center"><b>Bs.</b> {{ $detalle->producto->precio*$detalle->cantidad }}</td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                  <div class="text-center">
                      <a href="javascript:history.back(-1);" class="btn colorcard">
                        <i class="fas fa-arrow-circle-left"></i> VOLVER
                      </a>
                  </div>
                </div>
            </div>
      </div>
    </div>
</section>
@endsection
