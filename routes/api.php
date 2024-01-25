<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Image\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/register', [RegisterController::class, 'Register']);
Route::get('/login', [LoginController::class, 'Login']);
Route::post('/logout/{id}', [LogoutController::class, 'Logout']);
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/create_image', [ImageController::class, 'create_image']);
    Route::patch('/update_image/{image}/{id}', [ImageController::class, 'update_image']);
    Route::delete('/delete_image/{id}', [ImageController::class, 'destroy']);

});
