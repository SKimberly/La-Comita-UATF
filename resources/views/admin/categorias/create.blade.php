<div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header colorcard">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.categorias.store','#create') }}" class="bg-white shadow rounded py-3 px-4 was-validated" enctype="multipart/form-data" >
			@csrf
		        <div class="form-group">
		            <label for="nombre">Nombre:</label>
		            <input class="form-control bg-light shadow-sm {{ $errors->has('nombre') ? ' is-invalid' : 'border-0' }}"
		                    id="nombre" name="nombre"
		                    placeholder="Ingrese el nombre de categoria" value="{{ old('nombre') }}" required>
		            @if ($errors->has('nombre'))
		                    <span class="invalid-feedback" role="alert">
		                    	<strong>{{ $errors->first('nombre') }}</strong>
		                    </span>
		            @endif
		        </div>
		        <div class="form-group">
		            <label for="descripcion">Descripción:</label>
		            <input class="form-control bg-light shadow-sm {{ $errors->has('descripcion') ? ' is-invalid' : 'border-0' }}" id="descripcion"
		                type="text"
		                name="descripcion"
		                placeholder="Ingrese una descipción" value="{{ old('descripcion') }}" required>
		            @if ($errors->has('descripcion'))
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $errors->first('descripcion') }}</strong>
		                </span>
		            @endif
		        </div>
				<div class="form-group">
					<label class="form-control-file" for="imagen" > Seleccione una imagen  </label>
					<input type="file" name="imagen" class="form-control-file" id="imagenes" required>
					<div class="invalid-feedback">La imagen no debe ser mayor a 1mb.</div>
				</div>



		        <button class="btn btn-block colorcard" type="submit" >
		          CREAR
		        </button>
		        <a href="{{ route('admin.categorias') }}" class="btn btn-block " style="background-color:#49d2e8; ">
		          CANCELAR
		        </a>
			</form>
      	</div>
    </div>
  </div>
</div>







