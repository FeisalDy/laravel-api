<?php

use App\Http\Controllers\NovelController;
use App\Models\Novel;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/novels', [NovelController::class, 'index']);
Route::post('/novels', [NovelController::class, 'store']);
Route::get('/novels/{id}', [NovelController::class, 'show']);
Route::put('/novels/{id}', [NovelController::class, 'update']);
Route::delete('/novels/{id}', [NovelController::class, 'destroy']);
