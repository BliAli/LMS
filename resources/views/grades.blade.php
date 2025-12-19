@extends('layouts.app')

@section('title', 'Grades - LMS')

@section('header', 'My Grades')

@section('content')

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- GPA Card -->
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-md">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-sm font-medium text-blue-600">Current GPA</h3>
            <i class="fas fa-star text-blue-500 text-xl"></i>
        </div>
        <p class="text-4xl font-bold text-blue-700">{{ number_format($gpa, 2) }}</p>
        <p class="text-xs text-blue-600 mt-1">Out of 4.00</p>
    </div>
    
    <!-- Credits Card -->
    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 shadow-md">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-sm font-medium text-green-600">Credits Completed</h3>
            <i class="fas fa-check-circle text-green-500 text-xl"></i>
        </div>
        <p class="text-4xl font-bold text-green-700">{{ $completedCredits }}</p>
        <p class="text-xs text-green-600 mt-1">Total credits earned</p>
    </div>
    
    <!-- Active Courses Card -->
    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 shadow-md">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-sm font-medium text-purple-600">Active Courses</h3>
            <i class="fas fa-book-open text-purple-500 text-xl"></i>
        </div>
        <p class="text-4xl font-bold text-purple-700">{{ $activeCoursesCount }}</p>
        <p class="text-xs text-purple-600 mt-1">Currently enrolled</p>
    </div>
</div>

<!-- Course Grades Table -->
<div class="bg-white rounded-2xl shadow-md overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Course Grades</h3>
        <p class="text-sm text-gray-500">View your academic performance</p>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course Code</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lecturer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($grades as $grade)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="font-semibold text-gray-900">{{ $grade->course_code }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $grade->course_name }}</div>
                        <div class="text-xs text-gray-500">{{ $grade->semester }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $grade->lecturer }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($grade->status === 'completed')
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Completed
                        </span>
                        @else
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            In Progress
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($grade->grade)
                        <span class="text-lg font-bold 
                            @if(in_array($grade->grade, ['A', 'A-'])) text-green-600
                            @elseif(in_array($grade->grade, ['B+', 'B', 'B-'])) text-blue-600
                            @elseif(in_array($grade->grade, ['C+', 'C'])) text-yellow-600
                            @else text-red-600
                            @endif
                        ">
                            {{ $grade->grade }}
                        </span>
                        @else
                        <span class="text-gray-400">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <i class="fas fa-chart-line text-gray-300 text-6xl mb-4"></i>
                        <p class="text-gray-500 text-lg">Belum ada data nilai</p>
                        <p class="text-gray-400 text-sm mt-2">Nilai akan muncul setelah dosen menginput</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Grade Scale Info -->
<div class="mt-6 bg-gray-50 rounded-xl p-6">
    <h4 class="font-semibold text-gray-800 mb-3">Grade Scale</h4>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="text-center">
            <span class="text-2xl font-bold text-green-600">A</span>
            <p class="text-xs text-gray-600">4.00</p>
        </div>
        <div class="text-center">
            <span class="text-2xl font-bold text-green-600">A-</span>
            <p class="text-xs text-gray-600">3.67</p>
        </div>
        <div class="text-center">
            <span class="text-2xl font-bold text-blue-600">B+</span>
            <p class="text-xs text-gray-600">3.33</p>
        </div>
        <div class="text-center">
            <span class="text-2xl font-bold text-blue-600">B</span>
            <p class="text-xs text-gray-600">3.00</p>
        </div>
        <div class="text-center">
            <span class="text-2xl font-bold text-blue-600">B-</span>
            <p class="text-xs text-gray-600">2.67</p>
        </div>
        <div class="text-center">
            <span class="text-2xl font-bold text-yellow-600">C+</span>
            <p class="text-xs text-gray-600">2.33</p>
        </div>
        <div class="text-center">
            <span class="text-2xl font-bold text-yellow-600">C</span>
            <p class="text-xs text-gray-600">2.00</p>
        </div>
        <div class="text-center">
            <span class="text-2xl font-bold text-red-600">D</span>
            <p class="text-xs text-gray-600">1.00</p>
        </div>
    </div>
</div>

@endsection
