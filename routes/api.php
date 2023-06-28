<?php

use App\Http\Controllers\NovelController;
use App\Models\Novel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::group([
    'prefix' => 'v1',
    'middleware' => 'auth:sanctum'
], function () {
    //Novels
    Route::apiResource('/novels', NovelController::class);

    //User
    Route::get('/user', UserController::class);
});
