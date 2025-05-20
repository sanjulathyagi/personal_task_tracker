<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/goals', [GoalController::class, 'index']);
    Route::post('/goals', [GoalController::class, 'store']);

   Route::get('/goals/{goal}/tasks', [TaskController::class, 'index']);
    Route::post('/goals/{goal}/tasks', [TaskController::class, 'store']);
     Route::put('/tasks/{task}', [TaskController::class, 'update']);
     Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

    Route::get('/dashboard-stats', [DashboardController::class, 'stats']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
