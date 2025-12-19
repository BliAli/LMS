<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'current',
        'total',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getProgressPercentageAttribute()
    {
        if ($this->total == 0) return 0;
        return round(($this->current / $this->total) * 100);
    }
}
