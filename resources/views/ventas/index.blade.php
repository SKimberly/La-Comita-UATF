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
@include('ventas.create')
<section class="content">
    <div class="container-fluid">
      <div class="card card-info">
          <div class="card-header">
             <h5 class="card-title ">LISTA DE VENTAS</h5>
             <p class="text-right">Tienes {{ $pedidos->count() }} ventas.</p>
          </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                  <table class="table table-striped" id="tabla-ventas">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Código</th>
                          <th scope="col">Entrega</th>
                          <th scope="col">Anticipo</th>
                          <th scope="col">Deuda</th>
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
                          <td class="text-center colorcard ">{{ $pedido->anticipo + $pedido->pago }}</td>
                          <td class="text-center colorprin ">{{ $pedido->montototal-($pedido->anticipo+$pedido->pago) }}</td>
                          <td class="text-center colorcard ">{{ $pedido->montototal }}</td>
                          <td class="text-center">{{ ($pedido->carrito_id != 0) ? $pedido->carrito->estado : $pedido->cotizacion->estado }}</td>

                          <td class="text-center">
                            @if($pedido->carrito_id != 0)

                                @if((($pedido->anticipo+$pedido->pago) < $pedido->montototal))
                                  @can('delete', $pedido)
                                    <button type="button" class="btn colorprin  btn-sm" data-toggle="modal" data-target="#pagarPedido" data-whatever="{{ $pedido->id  }}"> <i class="fas fa-hand-holding-usd"></i> Completar Pago</button>
                                  @elsecan('restore',$pedido)
                                    <p class="bg-black" >Sin Acceso</p>
                                  @endcan
                                @else
                                  <a href="{{ route('ventas.edit', $pedido->id) }}" class="btn colorcard btn-sm" target="__blanck"><i class="fas fa-file-pdf"></i> Imprimir Recibo</a>
                                @endif
                            @else
                                @if((($pedido->anticipo+$pedido->pago) < $pedido->montototal))
                                  @can('delete', $pedido)
                                    <button type="button" class="btn colorprin  btn-sm" data-toggle="modal" data-target="#pagarPedido" data-whatever="{{ $pedido->id  }}"> <i class="fas fa-hand-holding-usd"></i> Completar Pago</button>
                                  @elsecan('restore',$pedido)
                                    <p class="bg-black" >Sin Acceso</p>
                                  @endcan
                                @else
                                  <a href="{{ route('ventas.edit', $pedido->id) }}" class="btn colorcard btn-sm" target="__blanck"><i class="fas fa-file-pdf"></i> Imprimir Recibo</a>
                                @endif
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

@unless(request()->is('admin/ventas/'))
<script>
    $('#pagarPedido').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-footer input').val(recipient)
    });

    $(function () {
      $('#tabla-ventas').DataTable({
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
@endunless

@endpush
