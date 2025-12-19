<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Material;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LecturerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        
        // Get all courses taught by this lecturer
        $courses = Course::where('teacher_id', $user->id)->get();
        
        // Calculate statistics
        $totalClasses = $courses->count();
        $totalStudents = Enrollment::whereIn('course_id', $courses->pluck('id'))->count();
        $pendingReviews = 12; // TODO: Calculate from assignments
        
        // Get upcoming classes (next 7 days)
        $today = Carbon::now()->dayOfWeek;
        $upcomingClasses = $courses->filter(function($course) use ($today) {
            $courseDayIndex = Carbon::parse($course->day)->dayOfWeek;
            return $courseDayIndex >= $today;
        })->count();
        
        // Recent activity (mock data for now)
        $recentActivity = [
            [
                'type' => 'assignment',
                'icon' => 'document',
                'title' => 'New assignment submission from John Doe',
                'course' => 'Data Science IF-A',
                'time' => '7 hours ago'
            ],
            [
                'type' => 'upload',
                'icon' => 'upload',
                'title' => 'Material uploaded successfully',
                'course' => 'Machine Learning IF-B',
                'time' => '2 days ago'
            ],
            [
                'type' => 'announcement',
                'icon' => 'bell',
                'title' => 'Announcement posted',
                'course' => 'Database Systems IF-C',
                'time' => '1 day ago'
            ]
        ];
        
        return view('lecturer.dashboard', compact(
            'courses',
            'totalClasses',
            'totalStudents',
            'pendingReviews',
            'upcomingClasses',
            'recentActivity'
        ));
    }
    
    public function classes()
    {
        $user = Auth::user();
        $courses = Course::where('teacher_id', $user->id)
            ->withCount('enrollments as students_count')
            ->get();
        
        return view('lecturer.classes', compact('courses'));
    }
    
    public function students()
    {
        $user = Auth::user();
        
        // Get all courses taught by this lecturer
        $courses = Course::where('teacher_id', $user->id)
            ->with(['enrollments.student', 'enrollments.grades'])
            ->get();
        
        return view('lecturer.students', compact('courses'));
    }
    
    public function schedule()
    {
        $user = Auth::user();
        
        // Get all courses with their schedule
        $courses = Course::where('teacher_id', $user->id)->get();
        
        // Group courses by day
        $schedule = [
            'Monday' => [],
            'Tuesday' => [],
            'Wednesday' => [],
            'Thursday' => [],
            'Friday' => [],
            'Saturday' => []
        ];
        
        foreach ($courses as $course) {
            if (isset($schedule[$course->day])) {
                $schedule[$course->day][] = $course;
            }
        }
        
        // Calculate statistics
        $classesThisWeek = $courses->count();
        $totalHours = 0;
        foreach ($courses as $course) {
            $start = Carbon::parse($course->start_time);
            $end = Carbon::parse($course->end_time);
            $totalHours += $end->diffInHours($start) + ($end->diffInMinutes($start) % 60) / 60;
        }
        
        // Find next class
        $nextClass = null;
        $today = Carbon::now();
        $currentDayName = $today->format('l');
        $currentTime = $today->format('H:i:s');
        
        foreach ($courses as $course) {
            if ($course->day === $currentDayName && $course->start_time > $currentTime) {
                $nextClass = $course;
                break;
            }
        }
        
        if (!$nextClass) {
            // Find next day's class
            $nextClass = $courses->first();
        }
        
        return view('lecturer.schedule', compact('schedule', 'courses', 'classesThisWeek', 'totalHours', 'nextClass'));
    }
    
    public function materials()
    {
        $user = Auth::user();
        
        // Get all courses with their materials
        $courses = Course::where('teacher_id', $user->id)
            ->with('materials')
            ->get();
        
        return view('lecturer.materials', compact('courses'));
    }
    
    public function announcements()
    {
        $user = Auth::user();
        
        // Get all announcements from lecturer's courses
        $announcements = Announcement::whereHas('course', function($query) use ($user) {
            $query->where('teacher_id', $user->id);
        })->with('course')->latest()->get();
        
        return view('lecturer.announcements', compact('announcements'));
    }
}
