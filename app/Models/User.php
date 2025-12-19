<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'program',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
                    ->withTimestamps()
                    ->withPivot('enrolled_at');
    }

    public function teachingCourses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function taskProgress()
    {
        return $this->hasMany(TaskProgress::class);
    }
    
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
    
    // Calculate GPA
    public function getGpaAttribute()
    {
        $completedGrades = $this->grades()->where('status', 'completed')->get();
        if ($completedGrades->isEmpty()) {
            return 0;
        }
        
        $totalPoints = $completedGrades->sum(function ($grade) {
            return $grade->grade_point * $grade->credits;
        });
        $totalCredits = $completedGrades->sum('credits');
        
        return $totalCredits > 0 ? round($totalPoints / $totalCredits, 2) : 0;
    }
    
    // Get total completed credits
    public function getCompletedCreditsAttribute()
    {
        return $this->grades()->where('status', 'completed')->sum('credits');
    }
    
    // Get active courses count
    public function getActiveCoursesCountAttribute()
    {
        return $this->courses()->wherePivot('status', 'active')->count();
    }
}
