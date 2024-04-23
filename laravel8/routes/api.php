<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
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





Route::get('api/articles/{id}', [ArticleController::class, 'show']);
Route::get('api/articles', [ArticleController::class, 'index']);
Route::post('api/articles', [ArticleController::class, 'store']);
Route::put('api/articles/{id}', [ArticleController::class, 'update']);
Route::delete('api/articles/{id}', [ArticleController::class, 'delete']);



Route::post('api/login', [AuthController::class, 'login']);
Route::post('api/register', [AuthController::class, 'register']);
