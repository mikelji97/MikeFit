<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule; // Asegúrate de que este modelo se llame 'Schedule'

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $schedules = [
            // Lunes (day_of_week = 1). IDs 1, 2, 3, 4
            ['day_of_week' => 1, 'start_time' => '08:00:00', 'finish_time' => '09:00:00'],
            ['day_of_week' => 1, 'start_time' => '10:00:00', 'finish_time' => '11:00:00'],
            ['day_of_week' => 1, 'start_time' => '18:00:00', 'finish_time' => '19:00:00'],
            ['day_of_week' => 1, 'start_time' => '19:30:00', 'finish_time' => '20:30:00'],
            
            // Martes (day_of_week = 2). IDs 5, 6, 7, 8
            ['day_of_week' => 2, 'start_time' => '08:00:00', 'finish_time' => '09:00:00'],
            ['day_of_week' => 2, 'start_time' => '10:00:00', 'finish_time' => '11:00:00'],
            ['day_of_week' => 2, 'start_time' => '18:00:00', 'finish_time' => '19:00:00'],
            ['day_of_week' => 2, 'start_time' => '19:30:00', 'finish_time' => '20:30:00'],
            
            // Miércoles (day_of_week = 3). IDs 9, 10, 11, 12
            ['day_of_week' => 3, 'start_time' => '08:00:00', 'finish_time' => '09:00:00'],
            ['day_of_week' => 3, 'start_time' => '10:00:00', 'finish_time' => '11:00:00'],
            ['day_of_week' => 3, 'start_time' => '18:00:00', 'finish_time' => '19:00:00'],
            ['day_of_week' => 3, 'start_time' => '19:30:00', 'finish_time' => '20:30:00'],
            
            // Jueves (day_of_week = 4). IDs 13, 14, 15, 16
            ['day_of_week' => 4, 'start_time' => '08:00:00', 'finish_time' => '09:00:00'],
            ['day_of_week' => 4, 'start_time' => '10:00:00', 'finish_time' => '11:00:00'],
            ['day_of_week' => 4, 'start_time' => '18:00:00', 'finish_time' => '19:00:00'],
            ['day_of_week' => 4, 'start_time' => '19:30:00', 'finish_time' => '20:30:00'],
            
            // Viernes (day_of_week = 5). IDs 17, 18, 19
            ['day_of_week' => 5, 'start_time' => '08:00:00', 'finish_time' => '09:00:00'],
            ['day_of_week' => 5, 'start_time' => '10:00:00', 'finish_time' => '11:00:00'],
            ['day_of_week' => 5, 'start_time' => '18:00:00', 'finish_time' => '19:00:00'],
            
            // Sábado (day_of_week = 6). IDs 20, 21, 22
            ['day_of_week' => 6, 'start_time' => '09:00:00', 'finish_time' => '10:00:00'],
            ['day_of_week' => 6, 'start_time' => '10:30:00', 'finish_time' => '11:30:00'],
            ['day_of_week' => 6, 'start_time' => '12:00:00', 'finish_time' => '13:00:00'],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}