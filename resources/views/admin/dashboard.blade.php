@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div>
    <h1 class="text-2xl font-bold text-gray-900 mb-6">System Overview</h1>
    
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Students -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm text-gray-500">Total Students</p>
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-graduate text-blue-600"></i>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $totalStudents }}</p>
            <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> 12% from last month</p>
        </div>
        
        <!-- Total Lecturers -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm text-gray-500">Total Lecturers</p>
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-chalkboard-teacher text-green-600"></i>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $totalLecturers }}</p>
            <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> 3% from last month</p>
        </div>
        
        <!-- Active Courses -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm text-gray-500">Active Courses</p>
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-book text-purple-600"></i>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $activeCourses }}</p>
            <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> 5% from last semester</p>
        </div>
        
        <!-- System Admins -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm text-gray-500">System Admins</p>
                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-shield text-orange-600"></i>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $systemAdmins }}</p>
            <p class="text-xs text-gray-500 mt-2">No change</p>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Recent Users -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Users</h2>
            <div class="space-y-4">
                @foreach($recentUsers as $user)
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-{{ $user->role === 'student' ? 'blue' : ($user->role === 'teacher' ? 'green' : 'purple') }}-500 rounded-full flex items-center justify-center text-white font-semibold">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                    </div>
                    <span class="px-3 py-1 text-xs font-medium rounded-full 
                        {{ $user->role === 'student' ? 'bg-blue-100 text-blue-800' : 
                           ($user->role === 'teacher' ? 'bg-green-100 text-green-800' : 
                           'bg-purple-100 text-purple-800') }}">
                        {{ $user->role }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Popular Courses -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Popular Courses</h2>
            <div class="space-y-4">
                @foreach($popularCourses as $course)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ $course->name }}</p>
                        <p class="text-xs text-gray-500">{{ $course->code }} • {{ $course->teacher->name ?? 'No Teacher' }}</p>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-users mr-2"></i>
                        <span>{{ $course->enrollments_count }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- System Activity -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">System Activity</h2>
        <div class="space-y-4">
            @foreach($systemActivity as $activity)
            <div class="flex items-start space-x-4">
                <div class="w-10 h-10 rounded-full flex items-center justify-center
                    {{ $activity['type'] === 'user' ? 'bg-blue-100' : 
                       ($activity['type'] === 'course' ? 'bg-green-100' : 'bg-purple-100') }}">
                    <i class="fas fa-{{ $activity['type'] === 'user' ? 'user-plus' : 
                                         ($activity['type'] === 'course' ? 'book' : 'calendar') }}
                       text-{{ $activity['type'] === 'user' ? 'blue' : 
                               ($activity['type'] === 'course' ? 'green' : 'purple') }}-600"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">{{ $activity['message'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $activity['time'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
