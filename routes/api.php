<?php

use App\Http\Controllers\LowonganController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('lowongan', [LowonganController::class, 'index']);
Route::get('lowongan/{id}', [LowonganController::class, 'show']);
Route::post('lowongan', [LowonganController::class, 'store']);
Route::put('lowongan/{id}', [LowonganController::class, 'update']);
Route::delete('lowongan/{id}', [LowonganController::class, 'destroy']);