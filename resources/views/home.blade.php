@extends('layouts.master')

@section('titulo','La-Comita/Inicio')

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
            <li class="breadcrumb-item active">Tablero de control</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="container">
    <img src="{{ asset('/img/dashboard.svg') }}" alt="" class="img-fluid w-100">
</div>
@endsection
