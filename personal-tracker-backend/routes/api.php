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
// auth routes

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:20,1');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// for goal
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/goals', [GoalController::class, 'index']);
    Route::post('/goals', [GoalController::class, 'store']);
    Route::delete('/goals/{goal}', [GoalController::class, 'destroy']);
    Route::put('/goals/{id}', [GoalController::class, 'update']);
});

// for task
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/goals/{goal}/tasks', [TaskController::class, 'index']);
    Route::post('/goals/{goal}/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
    
});

// for dashboard
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard-stats', [DashboardController::class, 'stats']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
