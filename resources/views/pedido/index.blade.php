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
                  <table class="table table-striped" id="tabla-pedido">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Código</th>
                          <th scope="col">Tiempo</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Anticipo</th>
                          <th scope="col">Entrega</th>
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
                              <td class="text-center">{{ $pedido->carrito->fecha_orden->format('M d') }} - {{ $pedido->carrito->fecha_orden->diffForHumans() }}</td>
                              <td>{{ $pedido->carrito->estado }}</td>
                          @else
                              <td>{{ $pedido->cotizacion->user->fullname }}</td>
                              <td class="text-center">{!! DNS1D::getBarcodeHTML($pedido->cotizacion->codigo, "C128",0.5,50,"black", true) !!}</td>
                              <td class="text-center">{{ $pedido->cotizacion->fecha_orden->format('M d') }} - {{ $pedido->cotizacion->fecha_orden->diffForHumans() }}</td>
                              <td>{{ $pedido->cotizacion->estado }}</td>
                          @endif
                          <td class="text-center colorprin ">{{ $pedido->anticipo }}</td>
                          <td class="text-center colorprin">Sin Fecha</td>

                          <td class="text-center">

                            @if($pedido->carrito_id != 0)
                                @can('create', $pedido)
                                  <a href="{{ route('carrito.show',$pedido->carrito_id) }}" class="btn btn-sm colorcard btn-block" target="_blanck"><i class="fas fa-hand-holding-usd"></i> Concretar</a>
                                @elsecan('update', $pedido)
                                  <p class="bg-black"> Sin Acceso</p>
                                @endcan
                                @can('view', $pedido)
                                  <a href="{{ route('pedidos.edit',$pedido->carrito_id) }}" class="btn btn-sm btn-danger btn-block"><i class="fas fa-backspace"></i> Dar/Baja</a>
                                @endcan
                            @else
                                @can('create', $pedido)
                                  <a href="{{ route('pedidos.show',$pedido->cotizacion_id) }}" class="btn btn-sm colorcard btn-block" target="_blanck"><i class="fas fa-hand-holding-usd"></i> Concretar</a>
                                @endcan
                                @can('view', $pedido)
                                  <a href="{{ route('pedido.baja',$pedido->cotizacion_id) }}" class="btn btn-sm btn-danger btn-block"><i class="fas fa-backspace"></i> Dar/Baja</a>
                                @endcan
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

@push('styles')
<link href="{{ asset('datatable/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('datatable/jquery.dataTables.js') }}" ></script>
<script src="{{ asset('datatable/dataTables.bootstrap4.js') }}" ></script>

<script>
    $(function () {
      $('#tabla-pedido').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          }
      });
    });
</script>
@endpush

