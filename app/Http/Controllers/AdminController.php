<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Statistics
        $totalStudents = User::where('role', 'student')->count();
        $totalLecturers = User::where('role', 'teacher')->count();
        $activeCourses = Course::count();
        $systemAdmins = User::where('role', 'admin')->count();
        
        // Recent Users
        $recentUsers = User::latest()->take(5)->get();
        
        // Popular Courses
        $popularCourses = Course::withCount('enrollments')
            ->orderBy('enrollments_count', 'desc')
            ->take(4)
            ->get();
        
        // System Activity
        $systemActivity = [
            [
                'type' => 'user',
                'message' => 'New student registered: John Doe',
                'time' => '2 hours ago'
            ],
            [
                'type' => 'course',
                'message' => 'New course created: Web Development IF-D',
                'time' => '5 hours ago'
            ],
            [
                'type' => 'schedule',
                'message' => 'Schedule updated for Data Science IF-A',
                'time' => '1 day ago'
            ]
        ];
        
        return view('admin.dashboard', compact(
            'totalStudents',
            'totalLecturers',
            'activeCourses',
            'systemAdmins',
            'recentUsers',
            'popularCourses',
            'systemActivity'
        ));
    }
    
    public function users(Request $request)
    {
        $role = $request->get('role', 'all');
        
        $query = User::query();
        
        if ($role !== 'all') {
            $query->where('role', $role);
        }
        
        $users = $query->latest()->get();
        
        return view('admin.users', compact('users', 'role'));
    }
    
    public function courses()
    {
        $courses = Course::with('teacher')
            ->withCount('enrollments')
            ->get();
        
        return view('admin.courses', compact('courses'));
    }
    
    public function schedules()
    {
        $courses = Course::with('teacher')->get();
        
        // Group by day
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
        
        return view('admin.schedules', compact('schedule'));
    }
    
    public function roles()
    {
        $users = User::all();
        
        return view('admin.roles', compact('users'));
    }
}
