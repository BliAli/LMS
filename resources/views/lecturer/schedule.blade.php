@extends('layouts.lecturer')

@section('title', 'My Teaching Schedule')

@section('content')
<div>
    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2">My Teaching Schedule</h2>
        <p class="text-gray-600">Weekly class schedule overview</p>
    </div>
    
    <!-- Weekly Schedule -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <div class="grid grid-cols-7 gap-4">
            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
            <div>
                <h3 class="text-center font-semibold text-gray-700 mb-4">{{ $day }}</h3>
                <div class="space-y-2">
                    @if(isset($schedule[$day]) && count($schedule[$day]) > 0)
                        @foreach($schedule[$day] as $class)
                        <div class="bg-blue-500 text-white p-3 rounded-lg text-sm">
                            <p class="font-medium">{{ $class->code }}</p>
                            <p class="text-xs">{{ \Carbon\Carbon::parse($class->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($class->end_time)->format('H:i') }}</p>
                            <p class="text-xs mt-1">{{ $class->enrollments->count() }} students</p>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl p-6 shadow-sm flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-calendar-week text-blue-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Classes This Week</p>
                <p class="text-2xl font-bold text-gray-800">{{ $classesThisWeek }}</p>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-6 shadow-sm flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-clock text-green-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Teaching Hours</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($totalHours, 1) }} hrs</p>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-6 shadow-sm flex items-center">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-calendar-day text-purple-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Next Class</p>
                <p class="text-lg font-bold text-gray-800">
                    @if($nextClass)
                        Tomorrow, 2 PM
                    @else
                        No upcoming class
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
