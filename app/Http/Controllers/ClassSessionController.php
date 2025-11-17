<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassSession;
use App\Models\ClassModel;

class ClassSessionController extends Controller
{
    public function index(Request $request)
    {
        $classId = $request->get('class_id');
        $class = ClassModel::findOrFail($classId);
        $sessions = ClassSession::where('classes_id', $classId)->with('schedule')->get();
        
        return view('sessions.index', compact('class', 'sessions'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
