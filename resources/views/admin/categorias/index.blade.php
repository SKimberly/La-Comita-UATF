@extends('layouts.master')

@section('titulo','Listar Categorias')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Lista de Categorias</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('admin.categorias') }}">Categorias</a></li>
					<li class="breadcrumb-item active">Listar</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
@include('admin.categorias.create')
<section class="content">
	<div class="container-fluid">
		<div class="card card-info">
			<div class="card-header" >
				<button type="button" class="btn" style="background-color: rgb(18, 216, 250);" data-toggle="modal" data-target="#modalCategoria">
				   <i class="fas fa-sitemap"></i> Crear Categoria
				</button>
			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="tabla-categoria">
							<thead>
								<tr class="text-center">
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Descripción</th>
									<th scope="col">Imágen</th>
									<th scope="col">Creación</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categorias as $key => $categoria)
								<tr>
									<th scope="row">{{ ++$key }}</th>
									<td>{{ $categoria->nombre }}</td>
									<td>{{ $categoria->descripcion }}</td>
									<td class="text-center">
										<img src="{{ asset($categoria->urlcate) }}" class="img-fluid" style="width: 30%;" alt="Categoria Foto">
									</td>
									<td>{{ $categoria->created_at }}</td>
									<td>
										<a href="{{ route('admin.categorias.edit',$categoria->id) }}" class="btn btn-sm btn-block btn-info">
											Editar
										</a>
										<form method="post" action="{{ route('admin.categorias.delete', $categoria->id) }}">
											@method('DELETE') @csrf
											<button class="btn btn-sm btn-block btn-danger" type="submit">
												Eliminar
											</button>
										</form>
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

@unless(request()->is('admin/categorias/*'))
<script>
    if(window.location.hash === '#create')
    {
       	$('#modalCategoria').modal('show');
    }
    $('#modalCategoria').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#modalCategoria').on('shown.bs.modal', function(){
       $('#fullname').focus();
       window.location.hash = '#create';
    });
    $(function () {
	    $('#tabla-categoria').DataTable({
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
