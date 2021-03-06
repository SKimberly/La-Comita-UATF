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
@include('admin.users.create')
<section class="content">
	<div class="container-fluid">
		<div class="card card-info">
			<div class="card-header" >
				@can('create', $users[0])
					<button type="button" class="btn btn-default" style="background-color: rgb(18, 216, 250);" data-toggle="modal" data-target="#myModal">
				 	<i class="fas fa-user-check"></i> Nuevo Usuario
					</button>
				@endcan
			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="tabla-user">
							<thead>
								<tr class="text-center">
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Cédula</th>
									<th scope="col">Celular/Teléfono</th>
									<th scope="col">Correo Electrónico</th>
									<th scope="col">Rol</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $key => $user)
								<tr>
									<th scope="row">{{ ++$key }}</th>
									<td>{{ $user->fullname }}</td>
									<td>{{ $user->cedula }}</td>
									<td>{{ $user->telefono }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->getRoleNames()->implode(', ') }}</td>
									<td class="text-center">
										@can('create', $user)
										<a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-sm btn-block btn-info">
											Editar
										</a>
										<form method="post" action="{{ route('admin.users.delete', $user->id) }}">
											@method('DELETE') @csrf
											<button class="btn btn-sm btn-block btn-danger" type="submit">
												Eliminar
											</button>
										</form>
										@elsecan('view', $user)
											<p class="bg-black">sin acceso</p>
										@endcan
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
@endsection

@push('styles')
<link href="{{ asset('datatable/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('datatable/jquery.dataTables.js') }}" ></script>
<script src="{{ asset('datatable/dataTables.bootstrap4.js') }}" ></script>

@unless(request()->is('admin/users/*'))
<script>
    if(window.location.hash === '#create')
    {
       	$('#myModal').modal('show');
    }
    $('#myModal').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#myModal').on('shown.bs.modal', function(){
       $('#fullname').focus();
       window.location.hash = '#create';
    });

    $(function () {
	    $('#tabla-user').DataTable({
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