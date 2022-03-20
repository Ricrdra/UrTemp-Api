<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'area',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_classroom_access'
            , 'classroom_id'
            , 'user_id');
    }


}
