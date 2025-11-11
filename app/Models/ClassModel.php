<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassModel extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'name',
        'description',
        'duration',
        'max_capacity'
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(ClassSession::class, 'classes_id', 'id');
    }
}
