@extends('layouts.master')

@section('titulo','Ver Cotizacion')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Ver Cotización</h1>
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
@include('cotizacion.modalres')
<section class="content">
	<div class="container-fluid ">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card card-widget card-info">
	                <div class="card-header">
		                <div class="user-block">
	                        <img class="img-circle" src="{{ asset('img/sidebar/userdefault.svg') }}" alt="User Image">
				            <span class="username"><a href="#">{{ $cotizacion->user->fullname }}</a></span>
				            <span class="description" style="color: #fff;">Fecha: {{ $cotizacion->updated_at->format('M d') }}</span>
				        </div>
				        <div class="card-tools">
			                <strong>Celular:</strong>{{ $cotizacion->user->telefono }}
				        </div>
				    </div>
				    <div class="card-body">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
							    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
							    @foreach($cotizacion->fotos as $key => $foto)
							    	@if($key != 0)
									<div class="carousel-item">
									   <img src="{{ url($foto->imagen) }}" alt="" class="d-block w-100" style="max-height: 250px !important;" >
							    	</div>
									@else
										<div class="carousel-item active">
									   		<img src="{{ url($foto->imagen) }}" alt="" class="d-block w-100" style="max-height: 250px !important;">
										</div>
									@endif
								@endforeach
							</div>
            				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								    <span class="carousel-control-next-icon" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
							</a>
						</div>
					</div>
		            <div class="card-footer card-comments">
			            <div class="card-comment">
							<img src="{{ asset('img/cotizaciones/producto.svg') }}" class="img-sm" alt="img-producto">
			                <div class="comment-text">
			                    <span class="username">
			                      Productos:
			                      <span class="text-muted float-right"><strong>Cantidad: {{ $cotizacion->cantidad }}</strong></span>
			                    </span>
				                @foreach($cotizacion->productos as $producto)
				                  	{{ $producto->nombre }} <strong>/</strong>
				                @endforeach
			                </div>
			            </div>
			            <div class="card-comment">
							<img src="{{ asset('img/cotizaciones/talla.svg') }}" class="img-sm" alt="img-producto">
				            <div class="comment-text">
				                <span class="username"> Tallas: </span>
					            @foreach($cotizacion->tallas as $talla)
					              	{{ $talla->nombre }} <strong>/</strong>
					            @endforeach
				            </div>
			            </div>
			            <div class="card-comment">
							<img src="{{ asset('img/cotizaciones/material.svg') }}" class="img-sm" alt="img-material">
			              	<div class="comment-text">
			                   	<span class="username"> Materiales: </span>
				                @foreach($cotizacion->materiales as $material)
				                   	{{ $material->nombre }} <strong>/</strong>
				                @endforeach
		                  	</div>
		                </div>
			            <div class="card-comment">
							<img src="{{ asset('img/cotizaciones/descripcion.svg') }}" class="img-sm" alt="img-producto">
				            <div class="comment-text">
				                    <span class="username"> Descripción: </span>
					                {{ $cotizacion->descripcion }}
				            </div>
			            </div>
			        </div>
		            <div class="card-footer">
			            <button type="button" class="btn btn-block colorcard btn-sm" data-toggle="modal" data-target="#modalRes">
						   <i class="fas fa-comment"></i> RESPONDER
						</button>
		            </div>
		        </div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('scripts')
@unless(request()->is('admin/cotizaciones/*'))
<script>
    if(window.location.hash === '#enviar')
    {
       	$('#modalRes').modal('show');
    }
    $('#modalRes').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#modalRes').on('shown.bs.modal', function(){

       window.location.hash = '#enviar';
    });
</script>
@endunless
@endpush



