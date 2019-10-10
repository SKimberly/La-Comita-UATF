@extends('layouts.principal')

@section('titulo','Registro')

@section('contentpri')
<div class="caratula-ind col-md-6">
    <form class="bg-white shadow rounded py-3 px-4"
        method="POST" action="{{ route('register') }}">
        @csrf
        <h6>REGISTRARME</h6><hr>
        <div class="form-group row">
            <div class="col-sm-6">
                <input id="fullname" type="text" class="form-control bg-light shadow-sm {{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" value="{{ old('fullname') }}" required autofocus placeholder="Nombre completo">

                @if ($errors->has('fullname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fullname') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <input id="cedula" type="number" class="form-control bg-light shadow-sm {{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ old('cedula') }}" required placeholder="Cédula de identidad">

                @if ($errors->has('cedula'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cedula') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <input id="telefono" type="number" class="form-control bg-light shadow-sm {{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required placeholder="Celular/Teléfono">

                @if ($errors->has('telefono'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('telefono') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <input id="email" type="email" class="form-control bg-light shadow-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo electrónico">

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <input id="password" type="password" class="form-control bg-light shadow-sm {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña/Clave">

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <input id="password-confirm" type="password" class="form-control bg-light shadow-sm" name="password_confirmation" required placeholder="Repita la contraseña">
            </div>
        </div>
        <button class="btn btn-sm btn-lg btn-block" style="background-color: #B43CCA;" type="submit"><font color="white">REGISTRAR</font></button>
    </form>
</div>
@endsection
