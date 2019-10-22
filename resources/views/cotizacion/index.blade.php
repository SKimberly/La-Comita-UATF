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
<section class="content">
	<div class="container-fluid">
		<div class="card card-info">
			<div class="card-header" >
				<a href="{{ route('cotizaciones.create') }}" class="btn" style="background-color: rgb(18, 216, 250);">
					<i class="fas fa-calculator"></i> Nueva Cotización
				</a>
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
								{{--  @foreach($categorias as $categoria)
								<tr>
									<th scope="row">{{ $categoria->id }}</th>
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
								@endforeach--}}
							</tbody>
						</table>
						{{ $cotizaciones->links() }}
					</div>
			</div>
		</div>
	</div>
</section>
@endsection



