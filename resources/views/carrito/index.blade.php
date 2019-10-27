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
<section class="content">
    <div class="container-fluid">
      <div class="card card-info">
          <div class="card-header">
             <h5 class="card-title ">CARRITO DE PEDIDO</h5>
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
                          <th scope="col">Opciones</th>
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
                  <div class="text-center">
                    <form method="POST" action="{{ route('realizar.orden') }}">
                      @csrf
                      @if($detalles->count() !== 0)
                          <button class="btn colorcard">
                            <i class="fas fa-money-check-alt"></i> Realizar pedido
                          </button>
                      @endif
                    </form>
                  </div>
                </div>
            </div>
      </div>
    </div>
</section>
@endsection
