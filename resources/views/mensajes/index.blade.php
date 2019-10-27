@extends('layouts.master')

@section('titulo','Listar Mensajes')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark">Lista de Mensajes</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
				<li class="breadcrumb-item active">Mensajes</li>
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
			<div class="col-md-5">
				<div class="card card-info">
					<div class="card-header text-center">
						MENSAJES NO LEIDOS
					</div>
					<div class="card-body">
						<ul class="list-group">
						@foreach($msjnoleidos as $msjnoleido)
							<li class="list-group-item list-group-item-danger d-flex justify-content-between align-items-center">
								<a href="{{ $msjnoleido->data['link'] }}">
									{{ $msjnoleido->data['text'] }}
								</a>
								<form method="POST" action="{{ route('mensajes.leer', $msjnoleido->id) }}" class="pull-right">
									@csrf @method('PATCH')
									<button class="btn colorcard btn-xs" data-toggle="tooltip" data-placement="right" title="Marcar como leido"><i class="fas fa-envelope-open-text"></i></button>
								</form>
							</li>
						@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="card card-info">
					<div class="card-header text-center">
						MENSAJES LEIDOS
					</div>
					<div class="card-body">
						<ul class="list-group">
						@foreach($msjleidos as $msjleido)
							<li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
								<a href="{{ $msjleido->data['link'] }}">
									{{ $msjleido->data['text'] }}
								</a>
								<form method="POST" action="{{ route('mensajes.destroy', $msjleido->id) }}" class="pull-right">
									@csrf @method('DELETE')
									<button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="right" title="Eliminar mensaje"><i class="fas fa-trash-alt"></i></button>
								</form>
							</li>
						@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
@endsection
