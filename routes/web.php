<?php

use App\Http\Controllers\LowonganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('lowongan', [LowonganController::class, 'index']);
Route::get('lowongan/{id}', [LowonganController::class, 'show']);
Route::post('lowongan', [LowonganController::class, 'store']);
Route::put('lowongan/{id}', [LowonganController::class, 'update']);
Route::delete('lowongan/{id}', [LowonganController::class, 'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
