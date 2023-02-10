<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;


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

// Route::get('data', [DataController::class, 'index']);
// Route::post('new', [DataController::class, 'store']);
// Route::get('show/{data}', [DataController::class, 'show']);
// Route::put('update/{data}', [DataController::class, 'update']);
// Route::Delete('delete/{data}', [DataController::class, 'destroy']);

Route::apiResource('data', DataController::class);
