@extends('layouts.master')

@section('titulo', 'Editar-Talla')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">

			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('tallas.index') }}">Tallas</a></li>
					<li class="breadcrumb-item active">Editar</li>
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
				<form method="POST" action="{{ route('tallas.update', $talla) }}" class="bg-white shadow rounded py-3 px-4">
					@method('PUT') @csrf
					<div class="form-group">
			            <label for="nombre">Nombre:</label>
			            <input class="form-control bg-light shadow-sm {{ $errors->has('nombre') ? ' is-invalid' : 'border-0' }}"
			                    id="nombre" name="nombre"
			                    placeholder="Ingrese el nombre de la talla" value="{{ old('nombre', $talla->nombre) }}" required>
			            @if ($errors->has('nombre'))
			                    <span class="invalid-feedback" role="alert">
			                    	<strong>{{ $errors->first('nombre') }}</strong>
			                    </span>
			            @endif
			        </div>
			        <div class="form-group">
			            <label for="descripcion">Descripción</label>
	                    <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : 'border-1' }}" rows="2" name="descripcion" id="descripcion"  placeholder="Ingrese una breve descripción de la talla" required>{{ old('descripcion', $talla->descripcion) }}</textarea>
	                    @if ($errors->has('descripcion'))
			                <span class="invalid-feedback" role="alert">
			                    <strong>{{ $errors->first('descripcion') }}</strong>
			                </span>
			            @endif
			        </div>
	                <button class="btn btn-block colorcard" type="submit" >
                      ACTUALIZAR
                    </button>
                    <a href="{{ route('tallas.index') }}" class="btn btn-block " style="background-color:#49d2e8; ">
                      CANCELAR
                    </a>
				</form>
			</div>
		</div>
		</div>
	</div>
</section>
@endsection