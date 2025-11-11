<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassSession;
use App\Models\ClassModel;
use App\Models\Schedule;

class ClassSessionSeeder extends Seeder
{
    public function run(): void
    {
        // Indexar schedules por combinaciones únicas (día|hora_inicio)
        $scheduleIndex = Schedule::get()->keyBy(function ($s) {
            return $s->day_of_week . '|' . $s->start_time;
        });

        // Especificaciones de sesiones sin IDs "hardcoded"
        $specs = [
            // Yoga - Lunes 10:00 y Miércoles 10:00
            ['class' => 'Yoga',    'day' => 1, 'start' => '10:00:00', 'classroom' => 'Sala A', 'current' => 8],
            ['class' => 'Yoga',    'day' => 3, 'start' => '10:00:00', 'classroom' => 'Sala A', 'current' => 12],

            // Pilates - Martes 10:00 y Jueves 10:00
            ['class' => 'Pilates', 'day' => 2, 'start' => '10:00:00', 'classroom' => 'Sala B', 'current' => 5],
            ['class' => 'Pilates', 'day' => 4, 'start' => '10:00:00', 'classroom' => 'Sala B', 'current' => 7],

            // Spinning - Lunes 18:00, Miércoles 18:00, Viernes 18:00
            ['class' => 'Spinning','day' => 1, 'start' => '18:00:00', 'classroom' => 'Sala C', 'current' => 15],
            ['class' => 'Spinning','day' => 3, 'start' => '18:00:00', 'classroom' => 'Sala C', 'current' => 20],
            ['class' => 'Spinning','day' => 5, 'start' => '18:00:00', 'classroom' => 'Sala C', 'current' => 10],

            // Zumba - Martes 19:30, Jueves 19:30
            ['class' => 'Zumba',   'day' => 2, 'start' => '19:30:00', 'classroom' => 'Sala D', 'current' => 18],
            ['class' => 'Zumba',   'day' => 4, 'start' => '19:30:00', 'classroom' => 'Sala D', 'current' => 22],

            // Extras del original
            ['class' => 'Yoga',    'day' => 6, 'start' => '09:00:00', 'classroom' => 'Sala A', 'current' => 5],
            ['class' => 'Spinning','day' => 1, 'start' => '08:00:00', 'classroom' => 'Sala C', 'current' => 12],
            ['class' => 'Pilates', 'day' => 6, 'start' => '10:30:00', 'classroom' => 'Sala B', 'current' => 3],
        ];

        foreach ($specs as $s) {
            $class = ClassModel::where('name', $s['class'])->firstOrFail();

            $key = $s['day'] . '|' . $s['start'];
            $schedule = $scheduleIndex->get($key);
            if (!$schedule) {
                throw new \RuntimeException("No existe Schedule para day={$s['day']} start={$s['start']}");
            }

            ClassSession::create([
                'classes_id' => $class->id,
                'schedules_id' => $schedule->id,
                'classroom' => $s['classroom'],
                'current_capacity' => $s['current'],
            ]);
        }
    }
}

