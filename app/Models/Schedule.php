<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'day_of_week',
        'start_time',
        'finish_time'
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(ClassSession::class, 'schedules_id', 'id');
    }
}
