<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ClassSessionController;

// Ruta principal: redirige al listado de clases
Route::get('/', function () {
    return view('index');
});

// Rutas de recursos
Route::resource('classes', ClassController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('sessions', ClassSessionController::class);