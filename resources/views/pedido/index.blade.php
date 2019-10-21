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
             <p class="text-right">Tienes {{ $carritos->count() }} pedidos.</p>
          </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                  <table class="table table-striped">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Orden</th>
                          <th scope="col">Anticipo</th>
                          <th scope="col">Entrega</th>
                          <th scope="col">Observaciones</th>
                          <th scope="col">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($carritos as $key => $carrito)
                      <tr>
                          <td class="text-center">{{ ++$key }}</td>
                          <td class="text-center">
                            {{ $carrito->user->fullname }}
                          </td>
                          <td>{{ $carrito->fecha_orden }}</td>
                          <td>{{ $carrito->anticipo }}</td>
                          @if($carrito->anticipo == 0)
                              <td style="background-color: rgba(249, 6, 87, 0.459);" class="text-center">Sin Fecha</td>
                          @else
                              <td>{{ $carrito->fecha_entrega }}</td>
                          @endif
                          <td>{{ $carrito->observaciones }}</td>
                          <td>
                              <a href="{{ route('ver.pedido.pendiente', $carrito->id) }}" class="btn colorcard btn-block"> Ver y Concretar</a>

                              <a href="{{ route('ver.pedido.baja', $carrito->id) }}" class="btn btn-block" style="background-color: #49d2e8;"> Dar de baja</a>
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
