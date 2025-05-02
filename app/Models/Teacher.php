<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'role' => 'array',
    ];

    use HasFactory;


    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
