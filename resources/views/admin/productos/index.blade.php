@extends('layouts.master')

@section('content')
<div class="container">
  <h2 class="text-center">LISTA DE PRODUCTOS</h2>
    <div class="row justify-content-center">
        <div class="table-responsive">
          <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Detalle</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
                 @foreach($productos as $producto)
                    <tr>
                        <th scope="row">{{ $producto->id }}</th>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->detallelargo }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->created_at }}</td>
                        <td>
                          <button class="btn btn-sm btn-block btn-info">
                            Editar
                          </button>
                          <button class="btn btn-sm btn-block btn-danger">
                            Eliminar
                          </button>
                        </td>
                    </tr>
                 @endforeach
              </tbody>
            </table>
            {{ $productos->links() }}
        </div>
    </div>
</div>
@endsection
