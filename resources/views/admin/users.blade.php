@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">User Management</h1>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg flex items-center font-medium">
            <i class="fas fa-plus mr-2"></i>
            Add User
        </button>
    </div>
    
    <!-- Filter Tabs -->
    <div class="mb-6">
        <div class="flex space-x-2 bg-white rounded-lg p-1 inline-flex shadow-sm border border-gray-200">
            <a href="{{ route('admin.users', ['role' => 'all']) }}" 
               class="px-4 py-2 text-sm rounded-lg {{ $role === 'all' ? 'bg-blue-600 text-white' : 'text-gray-600' }}">
                All Users
            </a>
            <a href="{{ route('admin.users', ['role' => 'student']) }}" 
               class="px-4 py-2 text-sm rounded-lg {{ $role === 'student' ? 'bg-blue-600 text-white' : 'text-gray-600' }}">
                Student
            </a>
            <a href="{{ route('admin.users', ['role' => 'teacher']) }}" 
               class="px-4 py-2 text-sm rounded-lg {{ $role === 'teacher' ? 'bg-blue-600 text-white' : 'text-gray-600' }}">
                Lecturer
            </a>
            <a href="{{ route('admin.users', ['role' => 'admin']) }}" 
               class="px-4 py-2 text-sm rounded-lg {{ $role === 'admin' ? 'bg-blue-600 text-white' : 'text-gray-600' }}">
                Admin
            </a>
        </div>
    </div>
    
    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-{{ $user->role === 'student' ? 'blue' : ($user->role === 'teacher' ? 'green' : 'purple') }}-500 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 text-xs font-medium rounded-full
                            {{ $user->role === 'student' ? 'bg-blue-100 text-blue-800' : 
                               ($user->role === 'teacher' ? 'bg-green-100 text-green-800' : 
                               'bg-purple-100 text-purple-800') }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                            active
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <button class="text-blue-600 hover:text-blue-800 mr-3">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
