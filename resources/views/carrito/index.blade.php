@extends('layouts.master')

@section('titulo','Carrito Compras')

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
            <li class="breadcrumb-item active">Carrito de Compras</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
@include('pedido.cancelarModal')
<section class="content">
    <div class="container-fluid">
      <div class="card card-info">
          <div class="card-header">
             <h5 class="card-title ">CARRITO DE PEDIDO</h5>
             <p class="text-right">Tu carrito de compras presenta {{ $detalles->count() }} productos.</p>
          </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                  <table class="table table-striped" id="tabla-carrito">
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
                          <th scope="col">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $res=0;
                        @endphp
                      @foreach($detalles as $key => $detalle)
                      <tr>
                         <td class="text-center">{{ ++$key }}</td>
                         <td class="text-center">
                            <img src="{{ asset($detalle->producto->favoritoimagenurl) }}" class="img-responsive img-thumbnail mr-0" style="height: 5em" alt="Producto Foto">
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
                         @php
                           $res = $res+($detalle->producto->precio*$detalle->cantidad);
                         @endphp
                         <td>
                           <form method="POST" action="{{ route('carrito.eliminar', $detalle->id) }}">
                             @csrf @method('DELETE')
                            <a href="{{ route('productos.detalles',$detalle->producto->id) }}" target="_blank" class="btn btn-info btn-block btn-sm"><i class="fas fa-eye"></i> Ver</a>
                             <button type="submit" class="btn btn-danger btn-block btn-sm">  Eliminar
                             </button>
                           </form>
                         </td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                  <div class="col-12 col-sm-10 col-lg-4 mx-auto">
                    <p class="text-center colorcard"><strong> Monto total: {{ $res }} Bs. </strong></p>
                  </div>
                  <div class="text-center">
                    <form method="POST" action="{{ route('realizar.orden') }}">
                      @csrf
                      @if($detalles->count() !== 0)
                          @if($detalle->carrito->estado == 'Activo')
                            <button class="btn colorcard" type="submit">
                              <i class="fas fa-money-check-alt"></i> Realizar pedido
                            </button>
                          @else
                            <a class="btn colorprin text-white" data-toggle="modal" data-target="#modalCancelar">
                            <i class="fas fa-comment-dollar"></i>
                                Concretar el pago/anticipo
                            </a>
                          @endif
                      @endif
                    </form>
                  </div>
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

@unless(request()->is('admin/carrito/'.$carrito->id.'/show'))
<script>
    if(window.location.hash === '#enviar')
    {
        $('#modalCancelar').modal('show');
    }
    $('#modalCancelar').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#modalCancelar').on('shown.bs.modal', function(){
       $('#anticipo').focus();
       window.location.hash = '#enviar';
    });

    $(function () {
      $('#tabla-carrito').DataTable({
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

