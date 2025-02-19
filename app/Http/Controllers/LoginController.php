<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request): JsonResponse {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid username or password']);
        }

        $token = auth()->user()?->createToken();

        return response()->json([
            'token_type' => 'Bearer',
            'access_token' => $token->accessToken,
        ]);
    }
}
