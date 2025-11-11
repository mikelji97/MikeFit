<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ejecutar seeders en el orden correcto
        $this->call([
            ClassSeeder::class,     // 1. Clases
            ScheduleSeeder::class,  // 2. Horarios
            ClassSessionSeeder::class, // 3. Sesiones (que dependen de los anteriores)
        ]);
    }
}
