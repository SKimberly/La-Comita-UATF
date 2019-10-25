@extends('layouts.master')

@section('titulo','Listar Cotizaciones')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Lista de Cotizaciones</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('cotizaciones.index') }}">Cotizaciones</a></li>
					<li class="breadcrumb-item active">Listar</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
@include('cotizacion.create')
<section class="content">
	<div class="container-fluid">
		<div class="card card-info">
			<div class="card-header" >
				{{-- <a href="{{ route('cotizaciones.create') }}" class="btn" style="background-color: rgb(18, 216, 250);">
					<i class="fas fa-calculator"></i> Nueva Cotización
				</a> --}}
				<button type="button" class="btn pull-right" style="background-color: rgb(18, 216, 250);" data-toggle="modal" data-target="#modalCotizacion">
				   <i class="fas fa-calculator"></i> Nueva Cotización
				</button>
			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr class="text-center">
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Productos</th>
									<th scope="col">Tallas</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($cotizaciones as $key => $cotizacion)
								<tr>
									<th scope="row">{{ ++$key }}</th>
									<td>{{ $cotizacion->user->fullname }}</td>
									<td>
									@foreach($cotizacion->productos as $producto)
										{{ $producto->nombre }} /
									@endforeach
									</td>
									<td>
										@foreach($cotizacion->tallas as $talla)
											{{ $talla->nombre }} /
										@endforeach
									</td>
									<td class="text-center">{{ $cotizacion->cantidad }}</td>
									<td>
										<form method="post" action="{{ route('admin.cotizaciones.eliminar', $cotizacion->id) }}" style="display:inline">
											@method('DELETE') @csrf
											<a href="{{ route('cotizaciones.edit',$cotizacion->id) }}" class="btn btn-sm btn-block colorcard">
												@if($cotizacion->tallas->count())
													Editar
												@else
													COMPLETAR
												@endif
											</a>
											<button class="btn btn-sm btn-block btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar esta cotización?')">
												Eliminar
											</button>
												<a href="{{ route('cotizaciones.show',$cotizacion->id) }}" class="btn btn-sm btn-block colorcard">
													Ver cotización
											</a>
										</form>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						{{ $cotizaciones->links() }}
					</div>
			</div>
		</div>
	</div>
</section>
@endsection


@push('scripts')
@unless(request()->is('admin/cotizaciones/*'))
<script>
	$(function () {
	    //Initialize Select2 Elements
	    $('.select2').select2({
	      theme: "classic",
	    })
	  });

    /*if(window.location.hash === '#create')
    {
       	$('#modalCotizacion').modal('show');
    }
    $('#modalCotizacion').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#modalCotizacion').on('shown.bs.modal', function(){

       window.location.hash = '#create';
    });*/
</script>
@endunless
@endpush


