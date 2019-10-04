@extends('layouts.master')

@section('titulo','La-Comita/Inicio')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">¡Bienvenido! {{ auth()->user()->fullname }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
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
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center bg-success" style="width: 15rem;" >
                <img src="{{ asset('/img/sidebar/facturas.svg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <div class="row justify-content-center">
                  <h5 class="card-title">Card title</h5>
                  </div>
                  <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center bg-success" style="width: 15rem;" >
                <img src="{{ asset('/img/sidebar/facturas.svg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <div class="row justify-content-center">
                  <h5 class="card-title">Card title</h5>
                  </div>
                  <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center bg-success" style="width: 15rem;" >
                <img src="{{ asset('/img/sidebar/facturas.svg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <div class="row justify-content-center">
                  <h5 class="card-title">Card title</h5>
                  </div>
                  <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center bg-success" style="width: 15rem;" >
                <img src="{{ asset('/img/sidebar/facturas.svg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <div class="row justify-content-center">
                  <h5 class="card-title">Card title</h5>
                  </div>
                  <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center bg-success" style="width: 15rem;" >
                <img src="{{ asset('/img/sidebar/facturas.svg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <div class="row justify-content-center">
                  <h5 class="card-title">Card title</h5>
                  </div>
                  <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center bg-success" style="width: 15rem;" >
                <img src="{{ asset('/img/sidebar/facturas.svg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <div class="row justify-content-center">
                  <h5 class="card-title">Card title</h5>
                  </div>
                  <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
