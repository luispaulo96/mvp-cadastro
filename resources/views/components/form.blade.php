<form method="POST" id="car-form">
  @csrf
  <div class="row mb-3">
    <div class="col-md-6">
      <div class="mb-3 mb-md-0">
        <label for="tf-name">Modelo</label>
        <input class="form-control" name="tf-model" id="tf-model" type="text" placeholder="Digite o modelo"
          value="{{ $car->ds_model ?? '' }}" required />
      </div>
    </div>
    <div class="col-md-3">
      <div class="mb-3 mb-md-0">
        <label for="tf-email">Ano</label>
        <input class="form-control" name="tf-year" id="tf-year" type="tel" placeholder="2010"
          value="{{ $car->nu_year ?? '' }}" required />
      </div>
    </div>
    <div class="col-md-3">
      <div class="mb-3 mb-md-0">
        <label for="tf-password">Cor</label>
        <input class="form-control" name="tf-color" id="tf-color" type="text" placeholder="Prata"
          value="{{ $car->ds_color ?? '' }}" required />
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="d-grid gap-2 mb-0">
      <button class="btn btn-primary" type="submit">
        <span class="spinner-border spinner-border-sm" hidden></span>
        {{ $buttonText }}
      </button>
      <a class="btn text-danger" data-bs-toggle="modal" data-bs-target="#modal-delete"
        {{ $car->pk_cars ?? '' ? '' : 'hidden' }}>
        Excluir carro
      </a>
      <input type="hidden" name="hf-id" id="hf-id" value="{{ $car->pk_cars ?? '' }}" />
    </div>
  </div>
  <div class="alert alert-success text-center" role="alert" id="div-success" hidden>Sucesso</div>
  <div class="alert alert-danger text-center" role="alert" id="div-error" hidden>Falha</div>
  <div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmação de exclusão</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja excluir o carro?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn-delete">Excluir</button>
        </div>
      </div>
    </div>
  </div>
</form>
