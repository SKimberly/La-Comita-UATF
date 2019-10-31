@extends('layouts.master')

@section('titulo','Pedido de Productos')

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
            <li class="breadcrumb-item active">Pedido de productos</li>
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
             <h5 class="card-title ">LISTA DE PEDIDOS</h5>
             <p class="text-right">Tienes {{ $pedidos->count() }} pedidos.</p>
          </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                  <table class="table table-striped">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Tiempo</th>
                          <th scope="col">Anticipo</th>
                          <th scope="col">Entrega</th>
                          <th scope="col">Observaciones</th>
                          <th scope="col">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($pedidos as $key => $pedido)
                      <tr>
                          <td class="text-center">{{ ++$key }}</td>
                          @if($pedido->carrito_id != 0)
                              <td>{{ $pedido->carrito->user->fullname }}</td>
                              <td class="text-center">{{ $pedido->carrito->fecha_orden->format('M d') }} - {{ $pedido->carrito->fecha_orden->diffForHumans() }}</td>
                          @else
                              <td>{{ $pedido->cotizacion->user->fullname }}</td>
                              <td class="text-center">{{ $pedido->cotizacion->fecha_orden->format('M d') }} - {{ $pedido->cotizacion->fecha_orden->diffForHumans() }}</td>
                          @endif
                          <td class="text-center {{ ($pedido->anticipo == 0) ? 'colorprin' : 'colorcard' }}">{{ $pedido->anticipo }}</td>
                          @if($pedido->anticipo == 0)
                              <td class="text-center colorprin">Sin Fecha</td>
                          @else
                              <td class="text-center colorcard">{{ $pedido->fecha_entrega }}</td>
                          @endif
                          <td>{{ $pedido->observaciones }}</td>
                          <td>
                            @if($pedido->carrito_id != 0)
                                <a href="{{ route('carrito.show',$pedido->carrito_id) }}" class="btn btn-sm colorcard btn-block" target="_blanck"><i class="fas fa-hand-holding-usd"></i> Concretar</a>
                                <a href="" class="btn btn-sm btn-danger btn-block"><i class="fas fa-backspace"></i> Dar/Baja</a>
                            @else
                                <a href="{{ route('cotizaciones.show',$pedido->cotizacion_id) }}" class="btn btn-sm colorcard btn-block" target="_blanck"><i class="fas fa-hand-holding-usd"></i> Concretar</a>
                                <a href="" class="btn btn-sm btn-danger btn-block"><i class="fas fa-backspace"></i> Dar/Baja</a>
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
