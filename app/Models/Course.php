<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'teacher_id',
        'day',
        'start_time',
        'end_time',
        'description',
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    // Relationships
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments')
                    ->withTimestamps()
                    ->withPivot('enrolled_at', 'status', 'progress');
    }

    public function enrolledStudentsCount()
    {
        return $this->students()->count();
    }
    
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
    
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
    
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
    
    // Get color based on day for UI
    public function getColorAttribute()
    {
        $colors = [
            'Monday' => 'blue',
            'Tuesday' => 'purple',
            'Wednesday' => 'orange',
            'Thursday' => 'green',
            'Friday' => 'pink',
            'Saturday' => 'indigo',
            'Sunday' => 'red',
        ];
        return $colors[$this->day] ?? 'gray';
    }
}
