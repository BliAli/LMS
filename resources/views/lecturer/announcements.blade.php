@extends('layouts.lecturer')

@section('title', 'Announcements')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Announcements</h2>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i>
            New Announcement
        </button>
    </div>
    
    <div class="space-y-4">
        @forelse($announcements as $announcement)
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold">{{ $announcement->title }}</h3>
                    <p class="text-sm text-gray-500">Posted on {{ $announcement->posted_date->format('F d, Y') }} • {{ $announcement->course->name }}</p>
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
            <p class="text-gray-700">{{ $announcement->content }}</p>
        </div>
        @empty
        <!-- Default announcements for demo -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold">Midterm Exam Schedule</h3>
                    <p class="text-sm text-gray-500">Posted on June 10, 2024 • Data Science</p>
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
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold">Office Hours Update</h3>
                    <p class="text-sm text-gray-500">Posted on June 15, 2024 • Machine Learning IF-</p>
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
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold">Project Submission Guidelines</h3>
                    <p class="text-sm text-gray-500">Posted on June 20, 2024 • Database Systems</p>
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
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
