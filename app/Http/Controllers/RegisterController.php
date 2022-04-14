<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'tf-name' => 'required',
            'tf-email' => 'required|email',
            'tf-password' => 'required',
        ]);

        if (empty(User::register($request))) {
            return response()->json([
                'message' => 'Não foi possível registrar, por favor tente mais tarde.',
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'message' => 'Sucesso, redirecionando para página de login…',
        ], Response::HTTP_OK);
    }
}
