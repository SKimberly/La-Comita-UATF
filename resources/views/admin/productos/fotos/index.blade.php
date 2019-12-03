@extends('layouts.master')

@section('titulo','Listar Fotos')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Lista de fotos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.productos.index') }}">Productos</a></li>
            <li class="breadcrumb-item active">Productos/Fotos</li>
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
          <div class="card-header d-flex justify-content-between align-items-center">
            Producto: {{ $producto->nombre }}
            @can('create', $producto)
              <form class="form-inline" method="POST" action="" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">

                      <div class="form-group">
                        <input type="file" name="foto" class="form-control-file mb-2 mr-sm-2" id="imagenes" required>
                      </div>
                      <div class="form-group">

                      <button type="submit" class="btn btn-default mb-2" style="background-color: #12d8fa;"> Subir nueva imagen</button>
                      </div>
                      <a href="{{ route('admin.productos.index') }}" class="btn btn-default  mb-2" style="background-color: #1AB2CB;" >Cancelar</a>
                  </div>
              </form>
            @endcan
          </div>
          <div class="card-body">
              <div class="row">
              @foreach($imagenes as $foto)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $foto->url }}" class="card-img-top" alt="Producto Foto">
                        <div class="card-body text-center colorcard">
                          <form method="POST" action="">
                            @method('DELETE') @csrf
                            <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                            @can('create', $producto)
                            <button class="btn btn-sm btn-danger" type="submit">ELIMINAR</button>
                            @endcan
                            @if ($foto->favorito)
                                <button type="button" class="btn btn-success btn-fab btn-fab-mini btn-round" rel="tooltip" title="Esta imagen es favorita" ><i class="fas fa-heart"></i></button>
                            @else
                              @can('create', $producto)
                                 <a href="{{ url('/admin/productos/'.$producto->id.'/foto/select/'.$foto->id) }}" class="btn btn-success btn-sm">
                                    ¿Favorito?
                                 </a>
                              @endcan
                            @endif
                          </form>
                        </div>
                    </div>
                </div>
              @endforeach
              </div>
          </div>
        </div>
    </div>
</section>
@endsection



