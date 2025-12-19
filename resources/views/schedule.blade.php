@extends('layouts.app')

@section('title', 'Schedule - LMS')

@section('header', 'Weekly Schedule')

@section('content')
<div class="bg-white rounded-2xl shadow-md p-8">
    <!-- Days Navigation -->
    <div class="grid grid-cols-7 gap-4 mb-6">
        @php
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            $dayColors = [
                'Monday' => ['bg' => 'bg-blue-500', 'text' => 'text-blue-600', 'light' => 'bg-blue-50'],
                'Tuesday' => ['bg' => 'bg-purple-500', 'text' => 'text-purple-600', 'light' => 'bg-purple-50'],
                'Wednesday' => ['bg' => 'bg-orange-500', 'text' => 'text-orange-600', 'light' => 'bg-orange-50'],
                'Thursday' => ['bg' => 'bg-green-500', 'text' => 'text-green-600', 'light' => 'bg-green-50'],
                'Friday' => ['bg' => 'bg-pink-500', 'text' => 'text-pink-600', 'light' => 'bg-pink-50'],
                'Saturday' => ['bg' => 'bg-indigo-500', 'text' => 'text-indigo-600', 'light' => 'bg-indigo-50'],
                'Sunday' => ['bg' => 'bg-red-500', 'text' => 'text-red-600', 'light' => 'bg-red-50'],
            ];
            $groupedCourses = $courses->groupBy('day');
        @endphp
        
        @foreach($days as $day)
        <div class="text-center">
            <h3 class="font-semibold text-gray-800 mb-2">{{ $day }}</h3>
            
            @if(isset($groupedCourses[$day]) && $groupedCourses[$day]->isNotEmpty())
                @foreach($groupedCourses[$day] as $course)
                <div class="mb-3">
                    @php
                        $colors = $dayColors[$day] ?? ['bg' => 'bg-gray-500', 'text' => 'text-gray-600', 'light' => 'bg-gray-50'];
                    @endphp
                    <div class="{{ $colors['bg'] }} rounded-2xl p-4 text-white text-left shadow-md hover:shadow-lg transition-shadow cursor-pointer">
                        <p class="font-semibold text-sm mb-1">{{ $course->code }}</p>
                        <p class="text-xs opacity-90">{{ \Carbon\Carbon::parse($course->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($course->end_time)->format('H:i') }}</p>
                    </div>
                </div>
                @endforeach
            @else
                <div class="h-20 flex items-center justify-center">
                    <p class="text-gray-400 text-sm">No class</p>
                </div>
            @endif
        </div>
        @endforeach
    </div>
    
    <hr class="my-8">
    
    <!-- Detailed Schedule List -->
    <div class="space-y-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Schedule Details</h3>
        
        @forelse($courses as $course)
        @php
            $colors = $dayColors[$course->day] ?? ['bg' => 'bg-gray-500', 'text' => 'text-gray-600', 'light' => 'bg-gray-50'];
        @endphp
        <div class="flex items-center p-4 {{ $colors['light'] }} rounded-xl hover:shadow-md transition-shadow">
            <div class="w-16 h-16 {{ $colors['bg'] }} rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                <i class="fas fa-book text-white text-xl"></i>
            </div>
            
            <div class="flex-1">
                <div class="flex items-center mb-1">
                    <h4 class="font-semibold text-gray-800 mr-2">{{ $course->name }}</h4>
                    <span class="bg-white px-2 py-1 rounded text-xs font-medium {{ $colors['text'] }}">{{ $course->code }}</span>
                </div>
                <div class="flex items-center space-x-4 text-sm text-gray-600">
                    <span><i class="fas fa-user mr-1"></i>{{ $course->teacher->name ?? 'Unknown' }}</span>
                    <span><i class="fas fa-calendar mr-1"></i>{{ $course->day }}</span>
                    <span><i class="fas fa-clock mr-1"></i>{{ \Carbon\Carbon::parse($course->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($course->end_time)->format('H:i') }}</span>
                </div>
            </div>
            
            <button class="{{ $colors['bg'] }} hover:opacity-90 text-white px-6 py-2 rounded-lg font-medium transition duration-300">
                Enter
            </button>
        </div>
        @empty
        <div class="text-center py-12">
            <i class="fas fa-calendar-times text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada jadwal kelas</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
