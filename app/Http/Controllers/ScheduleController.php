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
        $schedules = Schedule::all();

        $dias = [
            1 => 'Lunes',
            2 => 'Martes',
            3 => 'Miercoles',
            4 => 'Jueves',
            5 => 'Viernes',
            6 => 'Sabado',
            7 => 'Domingo',
        ];
        return view('schedules.index', compact('schedules', 'dias'));
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

        $schedule = Schedule::findOrFail($id);

        return view('schedules.edit', compact('schedule'));
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'finish_time'   => 'required|date_format:H:i',
            'day_of_week' => 'required|integer|between:1,7'
        ]);
        Schedule::update($validated);
        return redirect()->route('schedules.index')->with('success', 'horario atualizado');
    }

    public function destroy(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return back()->with('success', 'Horario eliminado correctamente');
    }
}
