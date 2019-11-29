@extends('layouts.master')

@section('titulo','Recibos')

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
            <li class="breadcrumb-item active">Recibos</li>
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
             <h5 class="card-title ">LISTA DE RECIBOS</h5>
          </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                  <table class="table table-striped">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Código</th>
                          <th scope="col">Verificar</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($pedidos as $key => $pedido)
                      <tr>
                          <td class="text-center">{{ ++$key }}</td>
                          @if($pedido->carrito_id != 0)
                              <td>{{ $pedido->carrito->user->fullname }}</td>
                              <td class="text-center">{!! DNS1D::getBarcodeHTML($pedido->carrito->codigo, "C128",0.5,50,"black", true) !!}</td>

                              @if($pedido->carrito->estado == 'Finalizado')
                                  <td class="text-center">
                                     <a href="{{ route('ventas.edit', $pedido->id) }}" class="btn colorcard btn-sm" target="__blanck"><i class="fas fa-file-pdf"></i> Imprimir Factura</a>
                                  </td>
                             @else
                                <td class="text-center">
                                    <span class="colorprin">Finalize la venta</span>
                                </td>
                             @endif
                          @else
                              <td>{{ $pedido->cotizacion->user->fullname }}</td>
                              <td class="text-center">{!! DNS1D::getBarcodeHTML($pedido->cotizacion->codigo, "C128",0.5,50,"black", true) !!}</td>
                                @if($pedido->cotizacion->estado == 'Finalizado')
                                  <td class="text-center">
                                     <a href="{{ route('ventas.edit', $pedido->id) }}" class="btn colorcard btn-sm" target="__blanck"><i class="fas fa-file-pdf"></i> Imprimir Factura</a>
                                  </td>
                                 @else
                                    <td class="text-center">
                                        <span class="colorprin">Finalize la venta</span>
                                    </td>
                                 @endif
                          @endif


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

@push('scripts')
<script>

</script>
@endpush


