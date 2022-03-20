<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'area',
    ];

    public function logs(): HasMany
    {
        return $this->hasMany(LogTemp::class);
    }

    public function tutors(): BelongsToMany
    {
        return $this->belongsToMany(Tutor::class, 'tutors_classrooms');
    }


}
