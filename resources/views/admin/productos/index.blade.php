@extends('layouts.master')

@section('titulo','Listar Productos')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Lista de Productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Productos</li>
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
          <div class="card-header text-center">
              NUESTROS PRODUCTOS
          </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Detalle</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Categoria</th>
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
                                <td>{{ $producto->categoria->nombre }}</td>
                                {{--  <td><img src="{{ $producto->fotos->first()->imagen   }}" alt="" ></td> --}}
                                <td>{{ $producto->created_at }}</td>
                                <td>

                                  <form method="post" action="{{ route('admin.productos.delete', $producto->id) }}">
                                      @method('DELETE') @csrf

                                      <a href="{{ route('admin.productos.edit',$producto->id) }}" class="btn btn-sm btn-block colorcard">
                                        Editar
                                      </a>
                                      <a href="{{ url('admin/productos/'.$producto->id.'/foto') }}" class="btn btn-sm btn-block btn-warning">Fotos</a>
                                      <button class="btn btn-sm btn-block btn-danger" type="submit">
                                        Eliminar
                                      </button>

                                  </form>

                                </td>
                            </tr>
                         @endforeach
                      </tbody>
                    </table>
                    {{ $productos->links() }}
                </div>
            </div>
      </div>
    </div>
</section>
@endsection
