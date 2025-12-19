@extends('layouts.app')

@section('title', 'Dashboard - LMS')

@section('header')
    Happy {{ $dayName }}, {{ auth()->user()->name }}!
@endsection

@section('content')
<div class="flex gap-6">
    <!-- Main Content Area -->
    <div class="flex-1">
        <!-- Recently Accessed Courses -->
        <section>
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Your Recently Accessed Course</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @forelse($recentCourses as $course)
                <div class="course-card bg-white rounded-2xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ $course->name }}</h3>
                    
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-calendar-day w-5"></i>
                            <span class="ml-2">{{ $course->day }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-clock w-5"></i>
                            <span class="ml-2">{{ \Carbon\Carbon::parse($course->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($course->end_time)->format('H:i') }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-user w-5"></i>
                            <span class="ml-2">{{ $course->teacher->name ?? 'Unknown' }}</span>
                        </div>
                    </div>
                    
                    <!-- Students Section -->
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Students</p>
                        <div class="flex items-center">
                            <div class="flex -space-x-2">
                                @foreach($course->students->take(3) as $student)
                                <img src="{{ $student->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($student->name) }}" 
                                     alt="{{ $student->name }}" 
                                     class="w-8 h-8 rounded-full border-2 border-white"
                                     title="{{ $student->name }}">
                                @endforeach
                            </div>
                            @if($course->students->count() > 3)
                            <span class="ml-3 text-sm text-gray-600">+ {{ $course->students->count() - 3 }} people joined the class</span>
                            @endif
                        </div>
                    </div>
                    
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-xl transition duration-300">
                        Enter
                    </button>
                </div>
                @empty
                <div class="col-span-2 text-center py-12">
                    <i class="fas fa-book-open text-gray-300 text-6xl mb-4"></i>
                    <p class="text-gray-500">Belum ada kelas yang diikuti</p>
                </div>
                @endforelse
            </div>
        </section>
    </div>
    
    <!-- Right Sidebar -->
    <aside class="w-80">
        <!-- To Do List -->
        <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
            <h3 class="font-semibold text-gray-800 mb-4">To do List</h3>
            <p class="text-xs text-gray-500 mb-4">{{ $currentDate->format('l, d F Y') }}</p>
            
            <div class="space-y-3">
                @forelse($todos as $todo)
                <div class="flex items-start">
                    <input type="checkbox" class="mt-1 mr-3 w-4 h-4 text-blue-600 rounded">
                    <div class="flex-1">
                        <p class="text-sm text-gray-800 font-medium">{{ $todo->title }}</p>
                        <p class="text-xs text-gray-500">{{ $todo->due_date->format('l, d F Y') }}</p>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-500 text-center py-4">Tidak ada tugas</p>
                @endforelse
            </div>
        </div>
        
        <!-- Task Progress -->
        <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
            <h3 class="font-semibold text-gray-800 mb-4">Task Progress</h3>
            
            <div class="space-y-4">
                @forelse($taskProgress as $task)
                <div>
                    <div class="flex justify-between mb-1">
                        <p class="text-sm text-gray-800">{{ $task->title }}</p>
                        <p class="text-sm text-gray-600">{{ $task->current }}/{{ $task->total }}</p>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="progress-bar bg-green-500 h-2 rounded-full" 
                             style="width: {{ $task->progress_percentage }}%"></div>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-500 text-center py-4">Tidak ada progress</p>
                @endforelse
            </div>
        </div>
        
        <!-- Campus Calendar -->
        <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold text-gray-800">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Campus Calendar
                </h3>
            </div>
            
            <div class="text-center mb-4">
                <div class="flex justify-between items-center mb-2">
                    <button class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h4 class="font-semibold">{{ $currentDate->format('F Y') }}</h4>
                    <button class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            
            <!-- Calendar Grid -->
            <div class="grid grid-cols-7 gap-1 text-center text-xs">
                <div class="text-gray-500 font-medium py-2">SUN</div>
                <div class="text-gray-500 font-medium py-2">MON</div>
                <div class="text-gray-500 font-medium py-2">TUE</div>
                <div class="text-gray-500 font-medium py-2">WED</div>
                <div class="text-gray-500 font-medium py-2">THU</div>
                <div class="text-gray-500 font-medium py-2">FRI</div>
                <div class="text-gray-500 font-medium py-2">SAT</div>
                
                @php
                    $startOfMonth = $currentDate->copy()->startOfMonth();
                    $endOfMonth = $currentDate->copy()->endOfMonth();
                    $startDay = $startOfMonth->dayOfWeek;
                    $daysInMonth = $endOfMonth->day;
                    
                    // Previous month padding
                    for ($i = 0; $i < $startDay; $i++) {
                        echo '<div class="py-2 text-gray-300">' . ($startOfMonth->copy()->subDays($startDay - $i)->day) . '</div>';
                    }
                    
                    // Current month days
                    for ($day = 1; $day <= $daysInMonth; $day++) {
                        $isToday = $day == $currentDate->day;
                        $class = $isToday ? 'bg-blue-600 text-white rounded-full' : 'text-gray-800 hover:bg-gray-100 rounded-full';
                        echo '<div class="py-2 ' . $class . '">' . $day . '</div>';
                    }
                    
                    // Next month padding
                    $remaining = 42 - ($startDay + $daysInMonth);
                    for ($i = 1; $i <= $remaining; $i++) {
                        echo '<div class="py-2 text-gray-300">' . $i . '</div>';
                    }
                @endphp
            </div>
        </div>
    </aside>
</div>
@endsection
