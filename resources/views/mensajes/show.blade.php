@extends('layouts.master')

@section('titulo','Mensaje')

@section('cabecera')
@include('cotizacion.modalrescli')
<div class="content-header">
    <div class="container-fluid">
      	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark">Mensaje</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
				<li class="breadcrumb-item"> <a href="{{ route('mensajes.index') }}">Mensajes</a></li>
				<li class="breadcrumb-item active">Leer</li>
			</ol>
		</div>
		</div>
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card card-info">
					<div class="card-header text-center">
						MENSAJES NO LEIDOS
					</div>
					<div class="card-body">
						<p>{{ $mensaje->contenido }}</p>
					</div>
					<div class="card-footer" style="background-color: #49d2e8;">
						<div class="d-flex flex-row justify-content-center">
							<strong>Código de cotizacion: </strong> {{ $coticodigo }}
							<span class="ml-auto">
								<a href="{{ route('mensajes.index') }}" class="btn btn-sm colorcard" > Volver</a>
								<button type="button" class="btn btn-block colorcard" data-toggle="modal" data-target="#modalRescli">
								   <i class="fas fa-comment"></i> RESPONDER
								</button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
@endsection
