<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify.auth');
    }

    public function index()
    {
        $userId = Session::get('id');

        $cars = Car::getAllRelated($userId);

        return view('home', [
            'cars' => $cars,
        ]);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $userId = Session::get('id');

        $this->validate($request, [
            'tf-model' => 'required',
            'tf-year' => 'required|integer',
            'tf-color' => 'required',
        ]);

        if (empty(Car::storeItem($request, $userId))) {
            return response()->json([
                'message' => 'Não foi possível cadastrar o carro, por favor tente mais tarde.',
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'message' => 'Sucesso, redirecionando para página inicial…',
        ], Response::HTTP_OK);
    }

    public function edit($carId)
    {
        $userId = Session::get('id');

        $car = Car::getById($userId, $carId);

        if (empty($car)) {
            return redirect('/');
        }

        return view('cars.edit', [
            'car' => $car,
        ]);
    }

    public function update(Request $request, $carId)
    {
        $userId = Session::get('id');

        $this->validate($request, [
            'tf-model' => 'required',
            'tf-year' => 'required|integer|min:1800|max:9999',
            'tf-color' => 'required',
        ]);

        if (empty(Car::updateItem($request, $userId, $carId))) {
            return response()->json([
                'message' => 'Não foi possível editar o carro, por favor tente mais tarde.',
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'message' => 'Sucesso, redirecionando para página inicial…',
        ], Response::HTTP_OK);
    }

    public function destroy($carId)
    {
        $userId = Session::get('id');

        if (empty(Car::deleteItem($userId, $carId))) {
            return response()->json([
                'message' => 'Não foi possível excluir o carro, por favor tente mais tarde.',
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'message' => 'Sucesso, redirecionando para página inicial…',
        ], Response::HTTP_OK);
    }
}
