<?php

use App\Http\Controllers\API\ListController;
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

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);

Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('/requestToken', [App\Http\Controllers\API\AuthController::class, 'requestToken']);

Route::prefix('v1')->group(function () {

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::get('/getAllCafe', [ListController::class, 'getAllCafe']);
        Route::get('/getMenuCafe/{cafe_id}', [ListController::class, 'getMenuCafe']);
        Route::post('/updatePassword', [App\Http\Controllers\API\AuthController::class, 'updatePassword']);
        Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    });
});
