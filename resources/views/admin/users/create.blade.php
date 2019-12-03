<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header colorprin">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         	<form class="bg-white shadow rounded py-3 px-4"
                 method="POST" action="{{ route('admin.users.store','#create') }}">
                 @csrf
                <div class="form-group">
	                <label for="fullname">Nombre completo:</label>
	                <input class="form-control bg-light shadow-sm {{ $errors->has('fullname') ? ' is-invalid' : 'border-0' }}"
	                        id="fullname" name="fullname"
	                        placeholder="Ingrese su nombre completo" value="{{ old('fullname') }}" autofocus >
	                @if ($errors->has('fullname'))
	                        <span class="invalid-feedback" role="alert">
	                        	<strong>{{ $errors->first('fullname') }}</strong>
	                        </span>
	                @endif
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input class="form-control bg-light shadow-sm {{ $errors->has('email') ? ' is-invalid' : 'border-0' }}" id="email"
                        type="email"
                        name="email"
                        placeholder="Ingrese su correo eléctronico" value="{{ old('email') }}" >
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
	                <div class="col-md-6">
		                <label for="cedula">Cédula:</label>
		                <input class="form-control bg-light shadow-sm {{ $errors->has('cedula') ? ' is-invalid' : 'border-0' }}"
		                        id="cedula" name="cedula" type="number"
		                        placeholder="Cédula de identidad" value="{{ old('cedula') }}" >
		                @if ($errors->has('cedula'))
		                        <span class="invalid-feedback" role="alert">
		                        	<strong>{{ $errors->first('cedula') }}</strong>
		                        </span>
		                @endif
	                </div>
	                <div class="col-md-6">
		                <label for="telefono">Teléfono:</label>
		                <input class="form-control bg-light shadow-sm {{ $errors->has('telefono') ? ' is-invalid' : 'border-0' }}"
		                        id="telefono" name="telefono" type="number"
		                        placeholder="Teléfono o celular" value="{{ old('telefono') }}" >
		                @if ($errors->has('telefono'))
		                        <span class="invalid-feedback" role="alert">
		                        	<strong>{{ $errors->first('telefono') }}</strong>
		                        </span>
		                @endif
	                </div>
                </div>
                <div class="form-group row">
	                <div class="col-md-6">
		                <label for="password">Contraseña:</label>
		                <input class="form-control bg-light shadow-sm {{ $errors->has('password') ? ' is-invalid' : 'border-0' }}"
		                        id="password" name="password" type="password"
		                        placeholder="Clave o contraseña" value="{{ old('password') }}"  >
		                @if ($errors->has('password'))
		                        <span class="invalid-feedback" role="alert">
		                        	<strong>{{ $errors->first('password') }}</strong>
		                        </span>
		                @endif
	                </div>
	                <div class="col-md-6">
		                <label for="tipo">Tipo:</label>
		                <select class="form-control {{ $errors->has('tipo') ? ' is-invalid' : 'border-1' }}" name="roles[]">
		                    <option value="">Seleccione una opción</option>
		                    @foreach($roles as $rol)
		                    	<option value="{{ $rol->name }}" {{ old('roles') }}>{{ $rol->name }}</option>
		                    @endforeach
	                    </select>
		                @if ($errors->has('tipo'))
		                        <span class="invalid-feedback" role="alert">
		                        	<strong>{{ $errors->first('tipo') }}</strong>
		                        </span>
		                @endif
	                </div>
                </div>
                <button class="btn btn-default btn-lg btn-block" style="background-color: #B43CCA;">Guardar</button>
                <button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal" style="background-color: #f1a5ff;">Cancelar</button>
            </form>
      </div>
    </div>
  </div>
</div>


