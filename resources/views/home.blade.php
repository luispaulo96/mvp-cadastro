@extends('layout')

@section('title', 'Home')

@section('content')
  <x-menu />
  <div class="container-fluid px-4">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <h1 class="text-center">Carros cadastrados</h1>
        <div class="table-responsive-sm">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Cor</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($cars as $car)
                <tr class="position-relative">
                  <td>
                    <a href="{{ route('cars.edit', ['id' => $car->pk_cars]) }}"
                      class="stretched-link text-reset text-decoration-none">{{ $car->ds_model }}</a>
                  </td>
                  <td>{{ $car->nu_year }}</td>
                  <td>{{ $car->ds_color }}</td>
                </tr>
              @empty
                <tr class="text-center">
                  <td colspan="3">Nenhum carro cadastrado</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="text-center">
          <a class="btn btn-success" href="{{ route('cars.create') }}">Cadastrar novo carro</a>
        </div>
      </div>
    </div>
  </div>
@endsection
