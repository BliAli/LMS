@extends('layouts.lecturer')

@section('title', 'My Classes')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">My Classes</h1>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg flex items-center font-medium">
            <i class="fas fa-plus mr-2"></i>
            Create New Class
        </button>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        @foreach($courses as $course)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $course->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $course->code }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-gray-400 hover:text-blue-600">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-gray-400 hover:text-red-600">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                
                <div class="space-y-2 mb-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-users w-5"></i>
                        <span class="ml-2">{{ $course->students_count }} students enrolled</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-calendar-day w-5"></i>
                        <span class="ml-2">{{ $course->day }}, {{ \Carbon\Carbon::parse($course->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($course->end_time)->format('H:i') }}</span>
                    </div>
                </div>
                
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition">
                    Manage Class
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
