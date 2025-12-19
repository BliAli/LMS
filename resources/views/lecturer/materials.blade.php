@extends('layouts.lecturer')

@section('title', 'Course Materials')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-semibold mb-2">All Course Materials</h2>
            <p class="text-gray-600">Manage materials across all your courses</p>
        </div>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg flex items-center">
            <i class="fas fa-upload mr-2"></i>
            Upload New Material
        </button>
    </div>
    
    @foreach($courses as $course)
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h3 class="text-lg font-semibold">{{ $course->name }}</h3>
                <p class="text-sm text-gray-500">{{ $course->code }}</p>
            </div>
            <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</a>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="space-y-4">
                @forelse($course->materials as $material)
                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-alt text-blue-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">{{ $material->title }}</p>
                            <p class="text-sm text-gray-500">Uploaded on {{ $material->uploaded_date->format('F d, Y') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="p-2 text-gray-400 hover:text-blue-600">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-blue-600">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-600">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                @empty
                <!-- Default materials for demo -->
                @for($i = 1; $i <= 3; $i++)
                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-alt text-blue-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">Week {{ $i }} - 
                                @if($i === 1) Introduction
                                @elseif($i === 2) Fundamentals
                                @else Advanced Topics
                                @endif
                            </p>
                            <p class="text-sm text-gray-500">Uploaded on June {{ $i }}, 2024</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="p-2 text-gray-400 hover:text-blue-600">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-blue-600">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-600">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                @endfor
                @endforelse
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
