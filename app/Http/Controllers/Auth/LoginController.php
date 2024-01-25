<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => false,
                'message' => 'Your login failed'
            ]);
        } else {
            $user = auth()->user();
            $token = $user->createToken("API TOKEN")->plainTextToken;
            return response()->json([
                'token' => $token,
                'status' => true,
                'message' => 'you are login '
            ]);
        }
    }
}
