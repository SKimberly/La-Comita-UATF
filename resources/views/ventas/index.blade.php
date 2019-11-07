@extends('layouts.master')

@section('titulo','Ventas')

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
            <li class="breadcrumb-item active">Ventas</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="card card-info">
          <div class="card-header">
             <h5 class="card-title ">LISTA DE VENTAS</h5>
             <p class="text-right">Tienes {{ $pedidos->count() }} ventas.</p>
          </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                  <table class="table table-striped">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Código</th>
                          <th scope="col">Entrega</th>
                          <th scope="col">Anticipo</th>
                          <th scope="col">Total Bs.</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($pedidos as $key => $pedido)
                      <tr>
                          <td class="text-center">{{ ++$key }}</td>
                          @if($pedido->carrito_id != 0)
                              <td>{{ $pedido->carrito->user->fullname }}</td>
                              <td class="text-center">{!! DNS1D::getBarcodeHTML($pedido->carrito->codigo, "C128",0.5,50,"black", true) !!}</td>
                          @else
                              <td>{{ $pedido->cotizacion->user->fullname }}</td>
                              <td class="text-center">{!! DNS1D::getBarcodeHTML($pedido->cotizacion->codigo, "C128",0.5,50,"black", true) !!}</td>
                          @endif
                          <td class="text-center colorcard">{{ $pedido->fecha_entrega }}</td>
                          <td class="text-center colorcard ">{{ $pedido->anticipo }}</td>
                          <td class="text-center colorprin ">{{ $pedido->anticipo }}</td>
                          <td class="text-center">{{ ($pedido->carrito_id != 0) ? $pedido->carrito->estado : $pedido->cotizacion->estado }}</td>

                          <td>
                            @if($pedido->carrito_id != 0)
                                <a href="{{ route('carrito.show',$pedido->carrito_id) }}" class="btn btn-sm colorcard btn-block" target="_blanck"><i class="fas fa-hand-holding-usd"></i> Completar Pago</a>
                            @else
                                <a href="{{ route('cotizaciones.show',$pedido->cotizacion_id) }}" class="btn btn-sm colorcard btn-block" target="_blanck"><i class="fas fa-hand-holding-usd"></i> Completar Pago</a>
                            @endif
                          </td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
      </div>
    </div>
</section>
@endsection
