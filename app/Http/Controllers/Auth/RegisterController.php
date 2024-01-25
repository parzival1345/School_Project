<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Register(RegisterRequest $request) {
        User::create([
            'user_name' => $request->user_name,
            'email' =>$request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'password_confirmation' => $request->password_confirmation,

        ]);
        return response()->json([
            'status' => true,
            'message' => 'Your information has been successfully registered'
        ],200);
    }
}
