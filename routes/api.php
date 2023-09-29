<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\EquiposController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/token", [AuthController::class, "token"]);
Route::post("/register", [AuthController::class, "register"]);
Route::middleware('auth:sanctum')->get("/user", [AuthController::class, 'profile']);
Route::middleware('auth:sanctum')->get("/refresh", [AuthController::class, 'refresh']);


// Public routes
Route::get('/equipos', [EquiposController::class, 'index']);
Route::get('/equipos/{id}', [EquiposController::class, 'show']);
// Route::get('/equipos/search/{name}', [EquiposController::class, 'search']);


// Protected routes
Route::post('/equipos', [EquiposController::class, 'store']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::put('/equipos/{id}', [EquiposController::class, 'update']);
    Route::delete('/equipos/{id}', [EquiposController::class, 'destroy']);
});
