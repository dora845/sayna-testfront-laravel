<?php

use App\Http\Controllers\API\CarteBancaireController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SongController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('CarteBancaire', CarteBancaireController::class);
    Route::resource('user', UserController::class);
    Route::get('songs', [SongController::class, 'index']);
    Route::get('songs/{id}', [SongController::class, 'show']);

    });

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
