<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassSession;
use App\Models\ClassModel;
use App\Models\Schedule;

class ClassSessionController extends Controller
{
    public function index(Request $request)
    {
        $classId = $request->get('class_id');
        $class = ClassModel::findOrFail($classId);
        $sessions = ClassSession::where('classes_id', $classId)->with('schedule')->get();
        $schedules = Schedule::all();

        return view('sessions.index', compact('class', 'sessions', 'schedules',));
    }

    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'classes_id' => 'required',
            'schedules_id' => 'required',
            'classroom' => 'required',
        ]);

        ClassSession::create([
            'classes_id' => $request->classes_id,
            'schedules_id' => $request->schedules_id,
            'classroom' => $request->classroom,
            'current_capacity' => 0,
        ]);

        return back()->with('success', 'Sesión creada');
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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $session = ClassSession::findOrFail($id);
        $session->delete();
        return back()->with('success', 'Sesión eliminada');
    }
}
