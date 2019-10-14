<div class="modal fade" id="modalCarrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         	<form class="bg-white shadow rounded py-3 px-4"
                 method="POST" action="{{ route('admin.users.store') }}">
                 @csrf
                 <div class="form-group row">
		            <label for="cantidad" class="col-sm-4 col-form-label">Cantidad:</label>
		            <div class="col-sm-8">
		                <input class="form-control bg-light shadow-sm {{ $errors->has('cantidad') ? ' is-invalid' : 'border-0' }}"
		                id="cantidad"
		                name="cantidad"
		                placeholder="Ingrese la cantidad" value="1" type="number" required>
		                @if ($errors->has('cantidad'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('cantidad') }}</strong>
		                    </span>
		                @endif
		            </div>
		         </div>
		        <div class="form-group row">
		            <label for="tallas" class="col-sm-4 col-form-label">Tallas:</label>
		            <div class="col-sm-8">
		                <select class="form-control select2 {{ $errors->has('tallas') ? ' is-invalid' : 'border-1' }}" name="tallas[]" multiple="multiple" style="width: 100%;"   data-placeholder="Seleccione las tallas" >
							@foreach($producto->tallas as $talla)
								<option {{ collect(old('tallas'))->contains($talla->id) ? 'selected' : '' }} value="{{ $talla->id }}">{{ $talla->nombre }}</option>
							@endforeach
				        </select>
				        @if ($errors->has('tallas'))
					        <span class="invalid-feedback" role="alert">
					            <strong>{{ $errors->first('tallas') }}</strong>
					        </span>
					    @endif
		            </div>
		        </div>
		        <div class="form-group">
                    <label for="descripcion">Descripción del producto</label>
                    <textarea class="form-control" rows="3" name="descripcion" id="descripcion"  placeholder="Ingrese un detalle completo del producto para el pedido">{{ old('descripcion') }}</textarea>
                </div>
                <button class="btn btn-default btn-lg btn-block colorprin" type="submit"><i class="fas fa-cart-plus"></i> Añadir al carrito</button>
                <button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal" style="background-color: #f1a5ff;">Cancelar</button>
            </form>
      </div>
    </div>
  </div>
</div>

{{--
<script>
    if(window.location.hash === '#create')
    {
       	$('#myModal').modal('show');
    }
    $('#myModal').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#myModal').on('show.bs.modal', function(){
       window.location.hash = '#create';
    });
</script>

 --}}