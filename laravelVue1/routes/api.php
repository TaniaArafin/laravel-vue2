<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students',[\App\Http\Controllers\StudentController::class, 'index'])->middleware('auth:sanctum');
Route::post('/save',[\App\Http\Controllers\StudentController::class, 'store'])->middleware('auth:sanctum');
Route::put('/update/{id}',[\App\Http\Controllers\StudentController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/delete/{id}',[\App\Http\Controllers\StudentController::class, 'destroy'])->middleware('auth:sanctum');




Route::controller(UserAuthController::class)->group(function(){
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});
