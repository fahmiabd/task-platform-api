<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateTaskController;

Route::get('/', function () {
    return view('welcome');
});
