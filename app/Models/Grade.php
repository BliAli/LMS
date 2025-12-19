<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'course_code',
        'course_name',
        'lecturer',
        'semester',
        'status',
        'grade',
        'grade_point',
        'credits',
    ];

    protected $casts = [
        'grade_point' => 'decimal:2',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    // Helper methods
    public function isCompleted()
    {
        return $this->status === 'completed';
    }
    
    public function isInProgress()
    {
        return $this->status === 'in_progress';
    }
}
