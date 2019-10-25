<div class="modal fade" id="modalRes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header colorcard">
        <h5 class="modal-title" id="exampleModalLabel">Enviar respuesta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('mensajes.store','#enviar') }}" class="bg-white shadow rounded py-3 px-4 was-validated" enctype="multipart/form-data" >
			@csrf
				<div class="form-group">
					<input type="hidden" name="cotiza_id" value="{{ $cotizacion->id }}">
					<input type="hidden" name="recibido_id" value="{{ $cotizacion->user->id }}">
					<label for="mensaje">Escribe aqui tu respuesta completa:</label>
			        <textarea class="form-control" rows="3" name="mensaje" id="mensaje"  placeholder="Ingrese su respuesta completa" >{{ old('mensaje') }}</textarea>
	                @if ($errors->has('mensaje'))
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $errors->first('mensaje') }}</strong>
		                </span>
		            @endif
		        </div>
		        <button class="btn btn-block colorcard" type="submit" >
		          ENVIAR
		        </button>
			</form>
      	</div>
    </div>
  </div>
</div>