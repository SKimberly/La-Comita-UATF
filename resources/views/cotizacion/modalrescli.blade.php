<div class="modal fade" id="modalRescli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header colorcard">
        <h5 class="modal-title" id="exampleModalLabel">Enviar respuesta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('mensajes.store','#enviarcli') }}" class="bg-white shadow rounded py-3 px-4 was-validated" enctype="multipart/form-data" >
			@csrf
				<input type="hidden" name="cotiza_id" value="{{ $coticodigo[0] }}">
				<div class="form-group">
					<label for="mensaje">Escribe aqui tu respuesta hacia "Sport La Comita"</label>
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