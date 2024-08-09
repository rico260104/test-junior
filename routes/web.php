<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [TaskController::class, 'index']);
Route::post('/', [TaskController::class, 'store']);
// api
Route::get('api/categories',[CategoryController::class, 'apiIndex']);
Route::get('api/tasks',[TaskController::class, 'apiIndex']);
Route::delete('/api/tasks/{id}', [TaskController::class, 'apiSoftDelete']);
Route::get('api/users',[UserController::class, 'apiIndex']);
