<div class="modal fade" id="pagarPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header colorcard">
        <h5 class="modal-title" id="exampleModalLabel">Completar el pago </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="bg-white shadow rounded py-3 px-4 was-validated"
          method="POST" action="{{ route('ventas.store','#pago') }}">
          @csrf
          <div class="modal-body">
              <div class="form-group row">
                  <label for="anticipo" class="col-sm-6 col-form-label">Completar Pago Bs.:</label>
                  <div class="col-sm-6">
                      <input class="form-control bg-light shadow-sm {{ $errors->has('pago') ? ' is-invalid' : 'border-0' }}"
                      id="pago"
                      name="pago"
                      placeholder="Complete el pago" type="number" value="{{ old('pago') }}" required>
                      @if ($errors->has('pago'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('pago') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="recipient-name" name="pedido_id">
              <button class="btn colorcard" type="submit"><i class="fas fa-comments-dollar"></i> Completar el pago</button>
              <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#49d2e8;">Cancelar</button>
          </div>
      </form>
    </div>
  </div>
</div>