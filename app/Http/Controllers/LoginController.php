<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $this->validate($request, [
            'tf-login-email' => 'required|email',
            'tf-login-password' => 'required',
        ]);

        $user = User::authenticate($request);
        if (empty($user)) {
            return response()->json([
                'message' => 'Usuário ou senha inválidos.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        Session::put('id', $user['pk_users']);
        Session::put('name', $user['ds_name']);
        Session::put('email', $user['cd_email']);

        return response()->json([
            'message' => 'Sucesso, redirecionando para página inicial…',
        ], Response::HTTP_OK);
    }
}
