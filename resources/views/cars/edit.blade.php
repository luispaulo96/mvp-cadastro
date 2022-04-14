@extends('layout')

@section('title', 'Editar carro')

@section('content')
  <x-menu />
  <div class="container-fluid px-4">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <h1 class="text-center">Editar carro existente</h1>
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <x-form button-text="Editar">
              @slot('car', $car)
            </x-form>
            <div class="text-center py-3">
              <div class="small"><a href="{{ route('home') }}">Voltar para a página inicial</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
