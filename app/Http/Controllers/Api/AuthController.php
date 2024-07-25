<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $registerdData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create($registerdData);

        $accessToken = $user
            ->createToken('authToken')
            ->accessToken;

        return response(
            [
                'user' => $user,
                'access_token' => $accessToken
            ],
            201
        );
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!auth()->attempt($loginData)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = User::where('email', $loginData['email'])->first();

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
            'user' => $user,
            'access_token' => $accessToken,
        ]);
    }

    public function logout(Request $request)
    {
        if (!$user = $request->user()) {
            return response()->json([
                'status' => false,
                'message' => 'Authentication failed',
                'data' => [],
            ], 401);
        }

        $request = auth()->user()->tokens()->delete();

        return response()->json(
            [
                'status' => true,
                'message' => 'User logged out successfully',
                'data' => [],
            ],
            200
        );
    }
}
