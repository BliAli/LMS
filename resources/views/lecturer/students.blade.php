@extends('layouts.lecturer')

@section('title', 'All Students')

@section('content')
<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">All Students</h1>
        <p class="text-gray-600">Manage students across all your classes</p>
    </div>
    
    <div class="mb-6">
        <div class="relative">
            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Search students..." class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>
    
    @foreach($courses as $course)
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $course->name }}</h3>
                <p class="text-sm text-gray-500">{{ $course->code }} • {{ $course->enrollments->count() }} students</p>
            </div>
            <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</a>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attendance</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($course->enrollments->take(3) as $enrollment)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            STU1<br>00{{ $enrollment->student->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            Student {{ $enrollment->student->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">
                            student{{ $enrollment->student->id }}@university.edu
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ rand(85, 95) }}%
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if(rand(1,3) === 1) bg-blue-100 text-blue-800
                                @elseif(rand(1,3) === 2) bg-purple-100 text-purple-800
                                @else bg-green-100 text-green-800
                                @endif">
                                {{ ['A', 'A-', 'B+'][rand(0,2)] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>
@endsection
