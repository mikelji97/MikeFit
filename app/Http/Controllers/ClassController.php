<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ClassModel;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassModel::all();
        return view('index', compact('classes'));
    }

    public function create()
    {
        // 1. OBTENER DATOS DE APOYO: 
        // Traemos todos los horarios pre-existentes para que el usuario pueda 
        // seleccionar a cuál se vinculará esta nueva clase.
        $schedules = Schedule::all(); 

        // 2. DEVOLVER LA VISTA CORRECTA:
        // El nombre de la vista debe coincidir con el nombre de tu archivo.
        // Si tu archivo es /resources/views/classCreate.blade.php
        return view('classes.classCreate', compact('schedules')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
