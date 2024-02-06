<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Clients;

class ClientController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $cliente = Clients::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        $token = $cliente->createToken('token_user')->plainTextToken;

        return response()->json([
            'cliente' => $cliente,
            'token' => $token,
        ], 201);
    }
}
