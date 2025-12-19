@extends('layouts.admin')

@section('title', 'Role Assignment')

@section('content')
<div>
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Role Assignment</h1>
    
    <!-- Assign Role Form -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 mb-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Assign Role to User</h2>
        
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Select User</label>
                <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Select a user...</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Assign Role</label>
                <div class="flex space-x-3">
                    <select class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Select role...</option>
                        <option value="student">Student</option>
                        <option value="teacher">Lecturer</option>
                        <option value="admin">Admin</option>
                    </select>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2.5 rounded-lg font-medium">
                        Assign Role
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Role Permissions -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Role Permissions</h2>
        
        <div class="space-y-6">
            <!-- Student Role -->
            <div>
                <h3 class="font-semibold text-gray-900 mb-3">Student</h3>
                <ul class="space-y-2 text-sm text-gray-600 ml-5">
                    <li><i class="fas fa-check text-green-600 mr-2"></i>View enrolled courses</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Submit assignments</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>View grades</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Access course materials</li>
                </ul>
            </div>
            
            <!-- Lecturer Role -->
            <div>
                <h3 class="font-semibold text-gray-900 mb-3">Lecturer</h3>
                <ul class="space-y-2 text-sm text-gray-600 ml-5">
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Manage classes</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Upload course materials</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Create and grade assignments</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Post announcements</li>
                </ul>
            </div>
            
            <!-- Admin Role -->
            <div>
                <h3 class="font-semibold text-gray-900 mb-3">Admin</h3>
                <ul class="space-y-2 text-sm text-gray-600 ml-5">
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Manage all users</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Create and manage courses</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Manage schedules</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Assign roles and permissions</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
