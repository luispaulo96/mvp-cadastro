@extends('layout')

@section('title', 'Registrar')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
          <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Registrar nova conta</h3>
          </div>
          <div class="card-body">
            <form method="POST" id="register-form">
              @csrf
              <div class="row mb-3">
                <div class="col-md-12">
                  <div class="mb-3 mb-md-0">
                    <label for="tf-name">Nome completo</label>
                    <input class="form-control" name="tf-name" id="tf-name" type="text" placeholder="Digite seu nome"
                      required />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <div class="mb-3 mb-md-0">
                    <label for="tf-email">Email</label>
                    <input class="form-control" name="tf-email" id="tf-email" type="email"
                      placeholder="email@example.com" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3 mb-md-0">
                    <label for="tf-password">Senha</label>
                    <div class="input-group mb-3">
                      <input class="form-control" name="tf-password" id="tf-password" type="password"
                        placeholder="Crie sua senha" required />
                      <button class="btn btn-outline-secondary" id="toggle-password" type="button">
                        <i class="bi bi-eye-slash"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="d-grid gap-2 mb-0">
                  <button class="btn btn-primary" type="submit">
                    <span class="spinner-border spinner-border-sm" hidden></span>
                    Registrar
                  </button>
                </div>
              </div>
              <div class="alert alert-success text-center" role="alert" id="register-success" hidden>Sucesso</div>
              <div class="alert alert-danger text-center" role="alert" id="register-error" hidden>Falha</div>
            </form>
          </div>
          <div class="card-footer text-center py-3">
            <div class="small"><a href="{{ route('login') }}">Voltar para o login</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
