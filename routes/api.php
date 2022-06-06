<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/api/v1/posts', [\App\Http\Controllers\Api\PostController::class, 'store']);
Route::post('/api/v1/websites/{websiteId}/subscribe', [\App\Http\Controllers\SubscriptionController::class, 'subscribe']);
