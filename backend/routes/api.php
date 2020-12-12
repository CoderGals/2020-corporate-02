<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\BoardController;

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

// authentication routes
Route::group([
    'middleware' => 'api',
], function ($router) {

	Route::group([
		'prefix' => 'auth'
	], function($router_){
		Route::post('login', [AuthController::class, 'login']);
	    Route::post('logout', [AuthController::class, 'logout']);
	    Route::post('refresh', [AuthController::class, 'refresh']);
	    Route::post('me', [AuthController::class, 'me']);
		Route::post('register', [AuthController::class, 'register']);
	});

	Route::post('tasks', [TaskController::class, 'store']);
	Route::delete('tasks/{id}', [TaskController::class, 'remove']);
	Route::get('tasks/', [TaskController::class, 'index']);
	Route::put('tasks/{id}', [TaskController::class, 'update']);

	Route::post('boards', [BoardController::class, 'store']);
	Route::post('boards/{id}/authorize', [BoardController::class, 'authorizeUser']);
});