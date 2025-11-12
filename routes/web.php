<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('classViews');
});

use App\Http\Controllers\ClassController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ClassSessionController;

Route::resource('classes', ClassController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('sessions', ClassSessionController::class);
