<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassModel::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.classCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'duration' => 'required|integer|min:1',
            'max_capacity' => 'required|integer|min:1'
        ]);

        // valido imagen aqui porque es opcional y asi no hago migracion
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('classes', 'public');
        }

        ClassModel::create($validated);

        return redirect()->route('classes.index')->with('success', 'Clase creada');
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

    $class = ClassModel::findOrFail($id);
    
    return view('classes.classEdit', compact('class'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $class = ClassModel::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'duration' => 'required|integer|min:1',
        'max_capacity' => 'required|integer|min:1'
    ]);

    $class->update($validated);

    return redirect()->route('classes.index')->with('success', 'Clase actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
