<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassSession extends Model
{
    protected $table = 'class_sessions';

    protected $fillable = [
        'classes_id',
        'schedules_id',
        'classroom',
        'current_capacity'
    ];

    public function class(): BelongsTo
    {
        return $this->belongsTo(ClassModel::class, 'classes_id', 'id');
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedules_id', 'id');
    }
}
