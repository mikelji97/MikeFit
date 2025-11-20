<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Storage;

class ClassController extends Controller
{
    
    public function index(Request $request)
    {
        $query = ClassModel::query();

        if ($request->filled('q')) {
            $search = $request->q;

            $query->where('name', 'LIKE', "%{$search}%");
        }

        $classes = $query->get();

        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.classCreate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:classes,name',
            'description' => 'required|max:250',
            'duration' => 'required|integer|min:1',
            'max_capacity' => 'required|integer|min:1'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('classes', 'public');
        }

        ClassModel::create($validated);

        return redirect()->route('classes.index')->with('success', 'Clase creada');
    }

    public function show(string $class) 
    {
        //
    }

    
    public function edit(string $id)  
    {
        $class = ClassModel::findOrFail($id);
        return view('classes.classEdit', compact('class'));
    }

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
        
    public function destroy(string $id) 
    {
        $class = ClassModel::findOrFail($id);

        if ($class->image) {
            Storage::disk('public')->delete($class->image);
        }
        
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Clase eliminada');
    }
}