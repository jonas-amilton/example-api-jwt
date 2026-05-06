<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $form = $request->validated();

        if (!$token = auth('api')->attempt($form)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ], 200);
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'message' => 'Logout realizado com sucesso',
        ], 200);
    }

    public function refresh()
    {
        return response()->json([
            'refresh_token' => auth('api')->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ], 200);
    }

    public function me()
    {
        return response()->json(auth('api')->user()->toResource(), 200);
    }
}
