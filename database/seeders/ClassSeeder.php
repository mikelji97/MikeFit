<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassModel; // Asumiendo que tu modelo se llama ClassModel

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        $classes = [
            [
                'name' => 'Yoga',
                'description' => 'Clase de yoga para todos los niveles.',
                'duration' => 60, // En minutos
                'max_capacity' => 20,
            ],
            [
                'name' => 'Pilates',
                'description' => 'Fortalece tu core y mejora tu postura.',
                'duration' => 45,
                'max_capacity' => 15,
            ],
            [
                'name' => 'Spinning',
                'description' => 'Entrenamiento cardiovascular intenso.',
                'duration' => 50,
                'max_capacity' => 25,
            ],
            [
                'name' => 'Zumba',
                'description' => 'Baila y quema calorías con ritmos latinos.',
                'duration' => 55,
                'max_capacity' => 30,
            ],
            [
                'name' => 'CrossFit',
                'description' => 'Entrenamiento funcional de alta intensidad.',
                'duration' => 60,
                'max_capacity' => 18,
            ],
            [
                'name' => 'Box',
                'description' => 'Aprende técnicas de boxeo.',
                'duration' => 50,
                'max_capacity' => 16,
            ],
        ];

        foreach ($classes as $class) {
            ClassModel::create($class);
        }
    }
}