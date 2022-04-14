@extends('layout')

@section('title', 'Login')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
          <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Login do sistema</h3>
          </div>
          <div class="card-body">
            <form method="POST" id="login-form">
              @csrf
              <div class="mb-3">
                <label for="tf-login-email">Email</label>
                <input class="form-control" name="tf-login-email" id="tf-login-email" type="email"
                  placeholder="Digite seu email" required />
              </div>
              <div class="mb-3">
                <label for="tf-login-password">Senha</label>
                <div class="input-group mb-3">
                  <input class="form-control" name="tf-login-password" id="tf-login-password" type="password"
                    placeholder="Digite sua senha" required />
                  <button class="btn btn-outline-secondary" id="toggle-password" type="button">
                    <i class="bi bi-eye-slash"></i>
                  </button>
                </div>
              </div>
              <div class="d-grid gap-2 mt-4 mb-0">
                <button class="btn btn-primary" type="submit">
                  <span class="spinner-border spinner-border-sm" hidden></span>
                  Entrar
                </button>
              </div>
              <div class="mt-4">
                <div class="alert alert-success text-center" role="alert" id="login-success" hidden>Sucesso</div>
                <div class="alert alert-danger text-center" role="alert" id="login-error" hidden>Falha</div>
              </div>
            </form>
          </div>
          <div class="card-footer text-center py-3">
            <div class="small"><a href="{{ route('register') }}">Registrar nova conta</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
