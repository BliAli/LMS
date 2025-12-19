<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Todo;
use App\Models\TaskProgress;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Get recently accessed courses (enrolled courses)
        $recentCourses = $user->courses()
            ->with(['teacher', 'students'])
            ->take(4)
            ->get();
        
        // Get todos (not completed, ordered by due date)
        $todos = $user->todos()
            ->where('is_completed', false)
            ->orderBy('due_date', 'asc')
            ->take(3)
            ->get();
        
        // Get task progress
        $taskProgress = $user->taskProgress()
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        
        // Get current date info
        $dayName = Carbon::now()->format('l');
        $currentDate = Carbon::now();
        
        return view('dashboard', compact('user', 'recentCourses', 'todos', 'taskProgress', 'dayName', 'currentDate'));
    }
    
    public function classes()
    {
        $user = auth()->user();
        
        // Get all courses with enrollment status and progress
        $activeCourses = $user->courses()
            ->wherePivot('status', 'active')
            ->with('teacher')
            ->get()
            ->map(function($course) {
                $course->enrollment_progress = $course->pivot->progress;
                $course->enrollment_status = $course->pivot->status;
                return $course;
            });
            
        $completedCourses = $user->courses()
            ->wherePivot('status', 'completed')
            ->with('teacher')
            ->get()
            ->map(function($course) {
                $course->enrollment_progress = $course->pivot->progress;
                $course->enrollment_status = $course->pivot->status;
                return $course;
            });
        
        return view('classes', compact('activeCourses', 'completedCourses'));
    }
    
    public function schedule()
    {
        $user = auth()->user();
        $courses = $user->courses()->with('teacher')->orderBy('day')->get();
        
        return view('schedule', compact('courses'));
    }
    
    public function grades()
    {
        $user = auth()->user();
        
        // Get all grades
        $grades = $user->grades()->orderBy('semester')->orderBy('created_at')->get();
        
        // Calculate GPA
        $gpa = $user->gpa;
        
        // Calculate total credits
        $completedCredits = $user->completed_credits;
        
        // Count active courses
        $activeCoursesCount = $user->active_courses_count;
        
        return view('grades', compact('grades', 'gpa', 'completedCredits', 'activeCoursesCount'));
    }
}
