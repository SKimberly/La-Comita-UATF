@extends('layouts.app')

@section('titulo','Resetear')

@section('contentpri')
<div class="caratula-ind col-md-6">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('password.email') }}">
        @csrf
        <h6>RESETEAR CONTRASEÑA</h6><hr>
        <div class="form-group ">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control bg-light shadow-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <button class="btn btn-sm btn-lg btn-block" style="background-color: #B43CCA;" type="submit"><font color="white">Enviarme el link de reseteo de clave</font></button>
    </form>
</div>
@endsection
