@extends('layouts.admin')

@section('title', 'Course Management')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Course Management</h1>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg flex items-center font-medium">
            <i class="fas fa-plus mr-2"></i>
            Create Course
        </button>
    </div>
    
    <!-- Courses Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($courses as $course)
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">{{ $course->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $course->code }}</p>
                </div>
                <div class="flex space-x-2">
                    <button class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            
            <div class="space-y-2 mb-4">
                <p class="text-sm text-gray-600">
                    <i class="fas fa-chalkboard-teacher w-5"></i>
                    <span class="ml-2">Lecturer: {{ $course->teacher->name ?? 'Unassigned' }}</span>
                </p>
                <p class="text-sm text-gray-600">
                    <i class="fas fa-users w-5"></i>
                    <span class="ml-2">{{ $course->enrollments_count }} students enrolled</span>
                </p>
            </div>
            
            <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                Fall 2024
            </span>
        </div>
        @endforeach
    </div>
</div>
@endsection
