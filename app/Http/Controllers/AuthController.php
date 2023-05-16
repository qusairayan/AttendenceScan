<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                // 'token' => $token,
                'message' => 'Login successful',
            ]);
        }

        return response()->json([
            'message' => 'Invalid email or password',
        ], 401);
    }
}

