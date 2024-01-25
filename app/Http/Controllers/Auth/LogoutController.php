<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /*
     * api code
     */
    public function logout($id) {
        $user = User::find($id);
        $user->tokens->each(function ($token) {
            $token->delete();
        });
        return response()->json([
            'status' => true,
            'message' => 'you are logout from the site'
        ]);
    }
    /*
     * api to front code
     */
//    public function logout2(Request $request)
//    {
//        try {
//            $user = $request->user();
//            $user->tokens->each(function ($token, $key) {
//                $token->delete();
//                Auth::logout();
//            });
//            return response()->json([
//                'status' => true,
//                'message' => 'you are logout from the site',
//            ]);
////            return redirect('/login');
//        }catch (\Throwable $th) {
//            return response()->json([
//                'status' => false,
//                'message' => 'logout process does not working'
//            ]);
//        }
//
//
//    }
}
