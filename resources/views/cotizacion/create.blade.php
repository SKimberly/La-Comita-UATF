<div class="modal fade" id="modalCotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header colorcard">
        <h5 class="modal-title" id="exampleModalLabel">Nueva cotización</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('cotizaciones.store') }}" class="bg-white shadow rounded py-3 px-4 was-validated" enctype="multipart/form-data" >
			@csrf

				<div class="form-group">
		            <label for="producto">Seleccione los productos:</label>
					 <select class="form-control select2 {{ $errors->has('productos') ? ' is-invalid' : 'border-1' }}" name="productos[]" multiple="multiple" style="width: 100%;"   data-placeholder="Seleccione los productos"  >
							@foreach($productos as $producto)
								<option {{ collect(old('productos'))->contains($producto->id) ? 'selected' : '' }} value="{{ $producto->id }}">{{ $producto->nombre }}</option>
							@endforeach
	                  </select>
	                @if ($errors->has('productos'))
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $errors->first('productos') }}</strong>
		                </span>
		            @endif
		        </div>

		        <button class="btn btn-block colorcard" type="submit" >
		          CREAR
		        </button>
			</form>
      	</div>
    </div>
  </div>
</div>







