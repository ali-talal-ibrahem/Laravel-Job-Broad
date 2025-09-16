<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthApiController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = Auth::guard('api')->attempt($credentials);

        if (!$token) {
            return response()->json(['message' => 'Unauthorized access!'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'expires_in' => config('jwt.ttl') * 60,
        ]);
    }

public function refresh()
{
    try {
        $newToken = JWTAuth::refresh();
        return response()->json([
            'access_token' => $newToken,
            'expires_in' => config('jwt.ttl') * 60,
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Token could not be refreshed'], 500);
    }
}

    public function me()
    {
        $user = Auth::guard('api')->user();
        return response()->json($user);
    }

    public function logout()
    {
        Auth::guard('api')->logout(true);

        return response()->json(['message' => 'Successfully logged out']);
    }
}
