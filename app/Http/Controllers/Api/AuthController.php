<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $dados = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create($dados);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('api-token', ['*'], now()->addDay())->plainTextToken,
        ]);
    }

    public function login()
    {

    }

    public function logout()
    {

    }
}
