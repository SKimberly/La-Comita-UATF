@extends('layouts.master')

@section('titulo','Listar Tallas')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Lista de Tallas</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('tallas.index') }}">Tallas</a></li>
					<li class="breadcrumb-item active">Listar</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
@include('admin.tallas.create')
<section class="content">
	<div class="container-fluid">
		<div class="card card-info">
			<div class="card-header" >
				<button type="button" class="btn" style="background-color: rgb(18, 216, 250);" data-toggle="modal" data-target="#modalTalla">
				   <i class="fas fa-sort-numeric-up"></i> Nueva Talla
				</button>
			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="tabla-tallas">
							<thead>
								<tr class="text-center">
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Descripción</th>
									<th scope="col">Creación</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tallas as $key => $talla)
								<tr>
									<th class="text-center">{{ ++$key }}</th>
									<td class="text-center">{{ $talla->nombre }}</td>
									<td>{{ $talla->descripcion }}</td>
									<td class="text-center">{{ $talla->created_at->format('M d') }}</td>
									<td class="text-center">
										<form method="post" action="{{ route('tallas.destroy', $talla->id) }}">
											@method('DELETE') @csrf
											<a href="{{ route('tallas.edit',$talla->id) }}" class="btn btn-sm btn-info">
												Editar
											</a>
											<button class="btn btn-sm  btn-danger" type="submit">
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
@unless(request()->is('admin/tallas/*'))
<script>
    if(window.location.hash === '#talla')
    {
       	$('#modalTalla').modal('show');
    }
    $('#modalTalla').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#modalTalla').on('shown.bs.modal', function(){
       $('#nombre').focus();
       window.location.hash = '#talla';
    });

    $(function () {
	    $('#tabla-tallas').DataTable({
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
