@extends('layouts.master')

@section('titulo','Nueva Cotización')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Nueva Cotización</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('cotizaciones.index') }}">Cotizaciones</a></li>
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
		 <div class="row justify-content-center">
		<div class="col-md-10">
		<div class="card card-info">
			<div class="card-header" >
			</div>
			<div class="card-body">
				@if($cotizacion->fotos->count())
				<div class="form-group">
					<div class="card-deck">
						@foreach($cotizacion->fotos as $foto)
							<form method="POST" action="{{ route('cotizaciones.destroy',$foto->id) }}" class="">
								@csrf @method('DELETE')
								<div class="card" style="width: 18rem;">
								   <button class="btn btn-danger btn-xs" style="position:absolute" type="submit"><i class="fas fa-times-circle"></i></button>
								   <img src="{{ url($foto->imagen) }}" alt="" class="card-img-top cotizfoto">
								</div>
							</form>
						@endforeach
					</div>
				</div>
				@endif
	            <form method="POST" action="{{ route('cotizaciones.update',$cotizacion) }}" class="bg-white shadow rounded py-3 px-4 was-validated" enctype="multipart/form-data" >
				@csrf @method('PUT')
			        <div class="form-group">
			            <label for="producto">Nombre del producto:</label>
						 <select class="form-control select2 {{ $errors->has('productos') ? ' is-invalid' : 'border-1' }}" name="productos[]" multiple="multiple" style="width: 100%;"   data-placeholder="Seleccione los productos" >
								@foreach($productos as $producto)
									<option {{ collect(old('productos', $cotizacion->productos->pluck('id')))->contains($producto->id) ? 'selected' : '' }} value="{{ $producto->id }}">{{ $producto->nombre }}</option>
								@endforeach
		                </select>
		                @if ($errors->has('productos'))
			                <span class="invalid-feedback" role="alert">
			                    <strong>{{ $errors->first('productos') }}</strong>
			                </span>
			            @endif
			        </div>
			        <div class="form-group row">
						  <label for="cantidad" class="col-sm-3 col-form-label">Cantidad Total:</label>
						  <div class="col-sm-3">
				                <input class="form-control bg-light shadow-sm {{ $errors->has('cantidad') ? ' is-invalid' : 'border-0' }}"
				                id="cantidad"
				                name="cantidad"
				                placeholder="Ingrese la cantidad" value="1" type="number" required>
				                @if ($errors->has('cantidad'))
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $errors->first('cantidad') }}</strong>
				                    </span>
				                @endif
	                      </div>

						  <label for="tallas" class="col-sm-2 col-form-label">Tallas:</label>
						  <div class="col-sm-4">
		                  <select class="form-control select2 {{ $errors->has('tallas') ? ' is-invalid' : 'border-1' }}" name="tallas[]" multiple="multiple" style="width: 100%;"   data-placeholder="Seleccione las tallas" >
								@foreach($tallas as $talla)
									<option {{ collect(old('tallas', $cotizacion->tallas->pluck('id')))->contains($talla->id) ? 'selected' : '' }} value="{{ $talla->id }}">{{ $talla->nombre }}</option>
								@endforeach
		                  </select>
			                @if ($errors->has('tallas'))
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $errors->first('tallas') }}</strong>
				                </span>
				            @endif
				          </div>
		            </div>
					<div class="form-group">
						<div class="dropzone" style="background-color:#49d2e8; "></div>
					</div>
					<div class="form-group">
			            <label for="materiales">Material del producto:</label>
						 <select class="form-control select2 {{ $errors->has('materiales') ? ' is-invalid' : 'border-1' }}" name="materiales[]" multiple="multiple" style="width: 100%;"   data-placeholder="Seleccione los materiales" required >
								@foreach($materiales as $material)
									<option {{ collect(old('materiales', $cotizacion->materiales->pluck('id')))->contains($material->id) ? 'selected' : '' }} value="{{ $material->id }}">{{ $material->nombre }}</option>
								@endforeach
		                  </select>
		                @if ($errors->has('materiales'))
			                <span class="invalid-feedback" role="alert">
			                    <strong>{{ $errors->first('materiales') }}</strong>
			                </span>
			            @endif
			        </div>
		            <div class="form-group">
	                    <label for="descripcion">Descripción del producto</label>
	                    <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : 'border-1' }}" rows="2" name="descripcion" id="descripcion"  placeholder="Ingrese una breve descripción del o los productos" required>{{ old('descripcion',$cotizacion->descripcion) }}</textarea>
	                    @if ($errors->has('descripcion'))
			                <span class="invalid-feedback" role="alert">
			                    <strong>{{ $errors->first('descripcion') }}</strong>
			                </span>
			            @endif
	                </div>

			        <button class="btn btn-block colorcard" type="submit" >
			          ENVIAR COTIZACIÓN
			        </button>
			        <a href="{{ route('cotizaciones.index') }}" class="btn btn-block " style="background-color:#49d2e8; ">
			          CANCELAR
			        </a>
				</form>
	      	</div>
		</div>
		</div>
	</div>
	</div>
</section>
@endsection

@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">
@endpush


@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>

<script>
	$(function () {
	    //Initialize Select2 Elements
	    $('.select2').select2({
	      theme: "classic",
	    })
	  });

	var myDropzone = new Dropzone('.dropzone', {
		url: '/admin/cotizaciones/{{ $cotizacion->id }}/fotos',
		paramName: 'foto',
		acceptedFiles: 'image/*',
		maxFilesize: 1,
		maxFiles: 3,
		headers: {
			'x-CSRF-TOKEN': '{{ csrf_token() }}'
		},
		dictDefaultMessage: 'Arrastra las fotos aquí para enviarlas',
		dictMaxFilesExceeded: 'Solo se permiten subir 3 imágenes.'
	});
	myDropzone.on('error', function(file, res){
		var msj = res.errors.foto[0];
		$('.dz-error-message:last > span').text(msj);
	});
	Dropzone.autoDiscover = false;

</script>
@endpush










