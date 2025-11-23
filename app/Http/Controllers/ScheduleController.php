<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Schedule;


class ScheduleController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'finish_time'   => 'required|date_format:H:i',
            'day_of_week' => 'required|integer|between:1,7'
        ]);
        Schedule::create($validated);
        return redirect()->route('classes.index')->with('success', 'horario creado');

    
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
