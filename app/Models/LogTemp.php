<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogTemp extends Model
{
    use HasFactory;

    protected $table = 'log_temps';
    protected $fillable = [
        "student_id",
        "temp"
    ];


    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

}
