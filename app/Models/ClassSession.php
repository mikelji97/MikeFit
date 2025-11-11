<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSession extends Model
{
    protected $table = 'class_sessions';

    protected $fillable = [
        'classes_id',
        'schedules_id',
        'classroom',
        'current_capacity'
    ];
}
