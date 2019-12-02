@extends('layouts.master')

@section('titulo','Sin Acceso')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <img src="{{ asset('/img/logo1.png') }}" alt="logo la comita" class="img-fluid float-right w-50 h-75">
        </div><!-- /.col -->
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Página no autorizada </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-8 colorcard">
          <img src="{{ asset('img/error/403.svg') }}" alt="403" class="card-img-top">
          <div class="card-body text-center">
              <h2><i>PÁGINA NO AUTORIZADA</i></h2>
          </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
<script>

</script>
@endpush


