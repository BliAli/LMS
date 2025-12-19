@extends('layouts.lecturer')

@section('title', 'Lecturer Dashboard')

@section('content')
<div>
    <!-- Page Title -->
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Lecturer Portal</h1>
    
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Welcome back, {{ auth()->user()->name }}!</h2>
    </div>
    
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Classes -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500 mb-2">Total Classes</p>
            <p class="text-3xl font-bold text-gray-900">{{ $totalClasses }}</p>
        </div>
        
        <!-- Total Students -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500 mb-2">Total Students</p>
            <p class="text-3xl font-bold text-gray-900">{{ $totalStudents }}</p>
        </div>
        
        <!-- Pending Reviews -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500 mb-2">Pending Reviews</p>
            <p class="text-3xl font-bold text-orange-500">{{ $pendingReviews }}</p>
        </div>
        
        <!-- Upcoming Classes -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500 mb-2">Upcoming Classes</p>
            <p class="text-3xl font-bold text-gray-900">{{ $upcomingClasses }}</p>
        </div>
    </div>
    
    <!-- My Classes -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-4 text-gray-900">My Classes</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($courses as $course)
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $course->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $course->code }}</p>
                    </div>
                </div>
                
                <div class="space-y-2 mb-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-users w-5"></i>
                        <span class="ml-2">{{ $course->enrollments->count() }} students enrolled</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-calendar-day w-5"></i>
                        <span class="ml-2">{{ $course->day }}, {{ \Carbon\Carbon::parse($course->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($course->end_time)->format('H:i') }}</span>
                    </div>
                </div>
                
                <a href="{{ route('lecturer.classes') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center font-medium py-2.5 rounded-lg transition">
                    Manage Class
                </a>
            </div>
            @endforeach
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div>
        <h2 class="text-xl font-semibold mb-4 text-gray-900">Recent Activity</h2>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="space-y-4">
                @foreach($recentActivity as $activity)
                <div class="flex items-start space-x-4 pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center 
                        @if($activity['type'] === 'assignment') bg-blue-100 
                        @elseif($activity['type'] === 'upload') bg-green-100 
                        @else bg-purple-100 
                        @endif">
                        <i class="fas fa-
                            @if($activity['type'] === 'assignment') file-alt text-blue-600
                            @elseif($activity['type'] === 'upload') upload text-green-600
                            @else bell text-purple-600
                            @endif"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">{{ $activity['title'] }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $activity['course'] }} • {{ $activity['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
