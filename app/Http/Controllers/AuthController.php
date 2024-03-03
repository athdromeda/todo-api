<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);
        $token = auth()->attempt($credentials);
        if (!$token) {
            return response()->json(['err' => 'Unauthorized request'], 401);
        }

        return response()->json([
            'acces_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response([
            'message' => 'Registration success!',
            'user' => $user
        ], 200);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function refresh()
    {
        return response()->json([
            'acces_token' => auth()->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function data()
    {
        return response()->json(auth()->user());
    }
}
