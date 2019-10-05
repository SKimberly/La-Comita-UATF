@extends('layouts.app')

@section('titulo','Ingresar')

@section('contentpri')
<div class="caratula-ind col-md-6">
    <form class="bg-white shadow rounded py-3 px-4"
        method="POST" action="{{ route('login') }}">
         @csrf
         <h6>INGRESAR</h6><hr>
         <div class="form-group row">
            <label for="cedula" class="col-sm-5 col-form-label">Cédula de Identidad:</label>
            <div class="col-sm-7">
                <input class="form-control bg-light shadow-sm {{ $errors->has('cedula') ? ' is-invalid' : 'border-0' }}"
                id="cedula"
                name="cedula"
                placeholder="Ingrese su cédula de identidad" value="{{ old('cedula') }}" type="number">
                @if ($errors->has('cedula'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cedula') }}</strong>
                    </span>
                @endif
            </div>
         </div>
        <div class="form-group row">
            <label for="password" class="col-sm-5 col-form-label">Contraseña:</label>
            <div class="col-sm-7">
                <input class="form-control bg-light shadow-sm {{ $errors->has('password') ? ' is-invalid' : 'border-0' }}" id="password"
                type="password"
                name="password"
                placeholder="Ingrese su contraseña" value="{{ old('password') }}" >
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <button class="btn btn-sm btn-lg btn-block" style="background-color: #B43CCA;" type="submit"><font color="white">ENVIAR</font></button>
        @if (Route::has('password.request'))
            <a class="btn bg-white " href="{{ route('password.request') }}">
                {{ __('¿Olvidaste tu contraseña?') }}
            </a>
        @endif
    </form>
</div>
@endsection


