@extends('layouts.app')

@section('title', 'Classes - LMS')

@section('header')
<div class="flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">My Classes</h1>
        <p class="text-sm text-gray-500">Manage all your enrolled courses</p>
    </div>
    <div class="flex items-center space-x-3">
        <input type="text" 
               placeholder="Search courses..." 
               class="bg-gray-100 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button class="p-2 bg-white rounded-lg border border-gray-200 hover:bg-gray-50">
            <i class="fas fa-filter text-gray-600"></i>
        </button>
    </div>
</div>
@endsection

@section('content')

<!-- Active Courses -->
<section class="mb-8">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Active Courses</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($activeCourses as $course)
        <div class="course-card bg-white rounded-2xl shadow-md p-6 relative overflow-hidden">
            <!-- Status Badge -->
            <div class="absolute top-4 right-4">
                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-medium">
                    Active
                </span>
            </div>
            
            <!-- Course Icon -->
            <div class="mb-4">
                @php
                    $colors = [
                        'blue' => 'bg-blue-500',
                        'purple' => 'bg-purple-500',
                        'orange' => 'bg-orange-500',
                        'green' => 'bg-green-500',
                        'pink' => 'bg-pink-500'
                    ];
                    $colorClass = $colors[$course->color] ?? 'bg-blue-500';
                @endphp
                <div class="w-16 h-16 {{ $colorClass }} rounded-2xl flex items-center justify-center">
                    <i class="fas fa-book text-white text-2xl"></i>
                </div>
            </div>
            
            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $course->name }}</h3>
            <p class="text-sm text-gray-500 mb-4">{{ $course->code }}</p>
            
            <div class="space-y-2 mb-4">
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-user w-5"></i>
                    <span class="ml-2">{{ $course->teacher->name ?? 'Unknown' }}</span>
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-calendar-day w-5"></i>
                    <span class="ml-2">{{ $course->day }}, {{ \Carbon\Carbon::parse($course->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($course->end_time)->format('H:i') }}</span>
                </div>
            </div>
            
            <!-- Progress Bar -->
            <div class="mb-4">
                <div class="flex justify-between mb-1">
                    <p class="text-sm text-gray-600">Progress</p>
                    <p class="text-sm font-semibold text-gray-800">{{ $course->enrollment_progress }}%</p>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    @php
                        $progressColor = $course->enrollment_progress >= 80 ? 'bg-green-500' : 
                                        ($course->enrollment_progress >= 50 ? 'bg-blue-500' : 'bg-orange-500');
                    @endphp
                    <div class="progress-bar {{ $progressColor }} h-2 rounded-full" 
                         style="width: {{ $course->enrollment_progress }}%"></div>
                </div>
            </div>
            
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-xl transition duration-300">
                Enter Class
            </button>
        </div>
        @empty
        <div class="col-span-2 text-center py-12">
            <i class="fas fa-book-open text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada kelas aktif</p>
        </div>
        @endforelse
    </div>
</section>

<!-- Past Semesters / Completed Courses -->
@if($completedCourses->isNotEmpty())
<section>
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Past Semesters</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($completedCourses as $course)
        <div class="course-card bg-white rounded-2xl shadow-md p-6 relative overflow-hidden opacity-90">
            <!-- Status Badge -->
            <div class="absolute top-4 right-4">
                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">
                    Completed
                </span>
            </div>
            
            <!-- Course Icon -->
            <div class="mb-4">
                <div class="w-16 h-16 bg-gray-400 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-book text-white text-2xl"></i>
                </div>
            </div>
            
            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $course->name }}</h3>
            <p class="text-sm text-gray-500 mb-4">{{ $course->code }}</p>
            
            <div class="space-y-2 mb-4">
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-user w-5"></i>
                    <span class="ml-2">{{ $course->teacher->name ?? 'Unknown' }}</span>
                </div>
            </div>
            
            <!-- Progress Bar (Always 100%) -->
            <div class="mb-4">
                <div class="flex justify-between mb-1">
                    <p class="text-sm text-gray-600">Progress</p>
                    <p class="text-sm font-semibold text-gray-800">100%</p>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="progress-bar bg-gray-500 h-2 rounded-full" style="width: 100%"></div>
                </div>
            </div>
            
            <button class="w-full bg-gray-400 text-white font-medium py-2.5 rounded-xl cursor-not-allowed" disabled>
                View Archive
            </button>
        </div>
        @endforeach
    </div>
</section>
@endif

@endsection
