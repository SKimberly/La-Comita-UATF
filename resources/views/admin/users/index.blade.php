@extends('layouts.master')

@section('titulo','Listar Usuarios')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Lista de Usuarios</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item active">Usuarios</li>
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
				<button type="button" class="btn btn-default" style="background-color: rgb(18, 216, 250);" data-toggle="modal" data-target="#myModal">
				 <i class="fas fa-user-check"></i> Nuevo Usuario
				</button>
			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr class="text-center">
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Cédula</th>
									<th scope="col">Celular/Teléfono</th>
									<th scope="col">Correo Electrónico</th>
									<th scope="col">Tipo</th>
									<th scope="col">Activo</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
								<tr>
									<th scope="row">{{ $user->id }}</th>
									<td>{{ $user->fullname }}</td>
									<td>{{ $user->cedula }}</td>
									<td>{{ $user->telefono }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->tipo }}</td>
									<td>{{ $user->activo }}</td>
									<td>
										<a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-sm btn-block btn-info">
											Editar
										</a>
										<form method="post" action="{{ route('admin.users.delete', $user->id) }}">
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
						{{ $users->links() }}
					</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
@include('admin.users.create')
@endsection

