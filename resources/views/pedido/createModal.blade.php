<div class="modal fade" id="modalCancelar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancelar Pedido de: {{ $carrito->user->fullname }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         	<form class="bg-white shadow rounded py-3 px-4"
                 method="POST" action="{{ route('pedido.cancelar') }}">
                 @csrf
                 <input type="hidden" value="{{ $carrito->id }}" name="carrito_id">
                 <div class="form-group row">
    		            <label for="anticipo" class="col-sm-6 col-form-label">Monto de anticipo Bs.:</label>
    		            <div class="col-sm-6">
    		                <input class="form-control bg-light shadow-sm {{ $errors->has('anticipo') ? ' is-invalid' : 'border-0' }}"
    		                id="anticipo"
    		                name="anticipo"
    		                placeholder="Ingrese el monto de anticipo" type="number" required>
    		                @if ($errors->has('anticipo'))
    		                    <span class="invalid-feedback" role="alert">
    		                        <strong>{{ $errors->first('anticipo') }}</strong>
    		                    </span>
    		                @endif
    		            </div>
    		         </div>
                 <div class="form-group row">
                    <label for="fecha_entrega" class="col-sm-6 col-form-label">Fecha de Entrega:</label>
                    <div class="col-sm-6">
                        <input class="form-control bg-light shadow-sm {{ $errors->has('fecha_entrega') ? ' is-invalid' : 'border-0' }}"
                        id="fecha_entrega"
                        name="fecha_entrega"
                        placeholder="Ingrese la fecha de entrega" value="1" type="date" required>
                        @if ($errors->has('fecha_entrega'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fecha_entrega') }}</strong>
                            </span>
                        @endif
                    </div>
                 </div>

                <button class="btn btn-default btn-lg btn-block colorcard" type="submit"><i class="fas fa-comments-dollar"></i> Realizar el pago</button>
                <button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal" style="background-color:#49d2e8;">Cancelar</button>
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