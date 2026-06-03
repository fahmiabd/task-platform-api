<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateTaskController;

Route::post('/tasks', CreateTaskController::class);
