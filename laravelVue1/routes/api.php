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

Route::get('/students',[\App\Http\Controllers\StudentController::class, 'index']);
Route::post('/save',[\App\Http\Controllers\StudentController::class, 'store']);
Route::put('/update/{id}',[\App\Http\Controllers\StudentController::class, 'update']);
Route::delete('/delete/{id}',[\App\Http\Controllers\StudentController::class, 'destroy']);

Route::controller(UserAuthController::class)->group(function(){
    Route::post('login', 'login');
    Route::post('register', 'register');


});
