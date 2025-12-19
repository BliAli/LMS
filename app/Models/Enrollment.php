<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'enrolled_at',
        'status',
        'progress',
    ];

    protected $casts = [
        'enrolled_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function grades()
    {
        return $this->hasMany(Grade::class, 'user_id', 'user_id');
    }
    
    // Helper methods
    public function isActive()
    {
        return $this->status === 'active';
    }
    
    public function isCompleted()
    {
        return $this->status === 'completed';
    }
}
