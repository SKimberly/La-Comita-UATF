@extends('layouts.master')

@section('titulo','Crear-Producto')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Nuevo Producto</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.productos.index') }}">Productos</a></li>
            <li class="breadcrumb-item active">Crear</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
		<form method="POST" action="{{ route('admin.productos.store') }}">
			@csrf
	        <div class="row">
	            <div class="col-md-8">
	                <div class="card card-info">
			            <div class="card-header">
			            </div>
		                <div class="card-body">
			                <div class="form-group">
			                    <label for="nombre">Nombre del producto</label>
			                    <input type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : 'border-1' }}" id="nombre" name="nombre" placeholder="Ingrese el nombre del nuevo producto" value="{{ old('nombre') }}">
			                    @if ($errors->has('nombre'))
					                <span class="invalid-feedback" role="alert">
					                    <strong>{{ $errors->first('nombre') }}</strong>
					                </span>
					            @endif
			                </div>
			                <div class="form-group">
			                    <label for="descripcion">Descripción del producto</label>
			                    <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : 'border-1' }}" rows="2" name="descripcion" id="descripcion"  placeholder="Ingrese una breve descripción del producto">{{ old('descripcion') }}</textarea>
			                    @if ($errors->has('descripcion'))
					                <span class="invalid-feedback" role="alert">
					                    <strong>{{ $errors->first('descripcion') }}</strong>
					                </span>
					            @endif
			                </div>
			                <div class="form-group">
			                    <label for="detallelargo">Detalle completo del producto</label>
			                    <textarea class="form-control" rows="3" name="detallelargo" id="detallelargo"  placeholder="Ingrese un detalle completo del producto">{{ old('detallelargo') }}</textarea>
			                </div>
		                </div>
	            	</div>
	         	</div>
	         	<div class="col-md-4">
	                <div class="card card-info">
			            <div class="card-header">
			            </div>
		                <div class="card-body">
		                	<div class="form-group">
								<label>Precio:</label>
								<div class="input-group">
				                <div class="input-group-prepend">
				                    <span class="input-group-text">Bs.</span>
				                </div>
				                <input type="number" name="precio" class="form-control {{ $errors->has('precio') ? ' is-invalid' : 'border-1' }}" value="{{ old('precio') }}">
				                <div class="input-group-append">
				                    <span class="input-group-text">.00</span>
				                </div>
				                @if ($errors->has('precio'))
					                <span class="invalid-feedback" role="alert">
					                    <strong>{{ $errors->first('precio') }}</strong>
					                </span>
					            @endif
				            	</div>
			                </div>
			                <div class="form-group">
			                  <label>Categoria:</label>
			                  <select class="form-control {{ $errors->has('categoria') ? ' is-invalid' : 'border-1' }}" name="categoria">
			                    <option value="">Seleccione una opcion</option>
			                    @foreach($categorias as $categoria)
									<option value="{{ $categoria->id }}"
										{{ old('categoria') == $categoria->id ? 'selected' : '' }}
										>{{ $categoria->nombre }}</option>
			                    @endforeach
			                  </select>
			                   @if ($errors->has('categoria'))
					                <span class="invalid-feedback" role="alert">
					                    <strong>{{ $errors->first('categoria') }}</strong>
					                </span>
					            @endif
			                </div>
			            </div>
			            <div class="card-footer">
			            	<button class="btn btn-block colorcard" type="submit" >
			            		GUARDAR
			            	</button>
			            </div>
			        </div>
	         	</div>
	     	</div>
		</form>
   	</div>
</section>
@endsection
