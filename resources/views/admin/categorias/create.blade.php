@extends('layouts.master')

@section('titulo','Crear Categoria')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Crear Categoria</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('admin.categorias') }}">Categorias</a></li>
					<li class="breadcrumb-item active">Crear</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
		<div class="card card-info">
			<div class="card-header" >
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('admin.categorias.store') }}" class="bg-white shadow rounded py-3 px-4 was-validated" enctype="multipart/form-data" >
					@csrf
		                <div class="form-group">
			                <label for="nombre">Nombre:</label>
			                <input class="form-control bg-light shadow-sm {{ $errors->has('nombre') ? ' is-invalid' : 'border-0' }}"
			                        id="nombre" name="nombre"
			                        placeholder="Ingrese el nombre de categoria" value="{{ old('nombre') }}" required>
			                @if ($errors->has('nombre'))
			                        <span class="invalid-feedback" role="alert">
			                        	<strong>{{ $errors->first('nombre') }}</strong>
			                        </span>
			                @endif
		                </div>
		                <div class="form-group">
		                    <label for="descripcion">Descripción:</label>
		                    <input class="form-control bg-light shadow-sm {{ $errors->has('descripcion') ? ' is-invalid' : 'border-0' }}" id="descripcion"
		                        type="text"
		                        name="descripcion"
		                        placeholder="Ingrese una descipción" value="{{ old('descripcion') }}" required>
		                    @if ($errors->has('descripcion'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('descripcion') }}</strong>
		                        </span>
		                    @endif
		                </div>
						<div class="form-group">
							<div class="custom-file">
								<input type="file" name="imagen" class="custom-file-input" id="imagen" required>
							    <label class="custom-file-label" for="imagen"> Seleccione una imgen  </label>
							    <div class="invalid-feedback">Selecciona una imgen no mayor a 2mb.</div>
							</div>
						</div>
		                <button class="btn btn-block colorcard" type="submit" >
	                      CREAR
	                    </button>
				</form>
			</div>
		</div>
		</div>
	</div>
</section>
@endsection

