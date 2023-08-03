<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
// Show all tasks
Route::get('/tasks', [TaskController::class, 'index']);

// Show a specific task
Route::get('/tasks/{task}', [TaskController::class, 'show']);

// Store a new task
Route::post('/tasks', [TaskController::class, 'store']);

// Update a specific task
Route::put('/tasks/{task}', [TaskController::class, 'update']);

// Delete a specific task
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

Route::post('/login', [LoginController::class, 'login']);

//make an create edit task route
Route::get('/tasks/create', [TaskController::class, 'create']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
});