<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateTaskController;
use App\Http\Controllers\UpdateTaskStatusController;
use App\Http\Controllers\GetTaskDetailController;

Route::post('/tasks', CreateTaskController::class);
Route::patch('/tasks/{id}/status', UpdateTaskStatusController::class);
Route::get('/tasks/{id}', GetTaskDetailController::class);
