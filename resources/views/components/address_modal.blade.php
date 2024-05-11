@props([
  'modal' => null,
  'address' => null
])

<div class="modal fade modal-dialog modal-lg" id="{{ $modal['id']}}Modal" tabindex="-1" role="dialog" aria-labelledby="{{ $modal['id']}}ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="addressModalLabel">{{ $modal['title']}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form id="addressForm">
          @csrf

          <div id="alertModal" class="alert alertModal" style="display: none;">
            <i class=""></i> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <!-- Search input-->
          <div class="form-group row">
            <label class="col-md-2 control-label" for="CEP">CEP <h11><span class="text-danger">*</span></h11></label>
            <div class="col-md-4">
              <input id="postal_code" name="postal_code" placeholder="Apenas números" class="form-control" required="" value="" type="search" maxlength="9" pattern="[0-9]{5}-[0-9]{3}" onkeyup="formatPostalCode(this)">
            </div>
            <div class="col-md-4">
              <p class="messagePostalCode"></p>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 col-form-label" for="prependedtext">Rua<h11><span class="text-danger">*</span></h11></label>
            <div class="col-md-6">
              <input id="street" name="street" class="form-control" placeholder="Rua Av fulanno de tal" required="" type="text">
            </div>

            <label class="col-md-1 col-form-label" for="prependedtext">N°</label>
            <div class="col-md-2">
              <input id="number" name="number" class="form-control" placeholder="" type="number">
            </div>

          </div>

          <div class="form-group row">
            <label class="col-md-2 col-form-label" for="prependedtext">Bairro<h11><span class="text-danger">*</span></h11></label>
            <div class="col-md-2">
              <input id="neighborhood" name="neighborhood" class="form-control" placeholder="Centro" required="" type="text">
            </div>

            <label class="col-md-1 col-form-label" for="prependedtext">Cidade<h11><span class="text-danger">*</span></h11></label>
            <div class="col-md-3">
              <input id="city" name="city" class="form-control" placeholder="Sua cidade" required="" type="text"  readonly="readonly">
            </div>

            <label class="col-md-1 col-form-label" for="prependedtext">Estado<h11><span class="text-danger">*</span></h11></label>
            <div class="col-md-2">
              <input id="state" name="state" class="form-control" placeholder="EX" required="" type="text"  readonly="readonly">
            </div>
      
          </div>          
          
          <div class="modal-footer ">
            <button type="button" class="btn btn-primary btn-register" id="btn-submit" onclick="submitAddress()">
              <i class="fas fa-save"></i> Cadastrar
            </button>
          </div>

        </form>        

      </div>
    </div>
  </div>
</div>

