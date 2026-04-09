<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Actions\Auth\RegisterUser;
use App\Actions\Auth\AuthenticateUser;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, RegisterUser $registerUser): JsonResponse
    {
        $token = $registerUser->execute($request->validated());

        return response()->json([
            'message' => 'Usuário registrado com sucesso!',
            'token'   => $token
        ], 201);
    }

    public function login(LoginRequest $request, AuthenticateUser $authenticateUser): JsonResponse
    {
        $token = $authenticateUser->execute(
            $request->email, 
            $request->password
        );

        return response()->json([
            'message' => 'Login realizado com sucesso!',
            'token'   => $token
        ]);
    }
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Token deletado com sucesso. Sessão encerrada.'
        ]);
    }
}