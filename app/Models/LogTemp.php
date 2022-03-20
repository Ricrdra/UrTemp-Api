<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogTemp extends Model
{
    use HasFactory;

    protected $table = 'log_temp';
    protected $fillable = [
        "user_id",
        "classroom_id",
        "date_taken",
        "temp"
    ];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo('App\Models\Classroom');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

}
