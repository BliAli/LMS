@extends('layouts.admin')

@section('title', 'Schedule Management')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Schedule Management</h1>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg flex items-center font-medium">
            <i class="fas fa-plus mr-2"></i>
            Add Schedule
        </button>
    </div>
    
    <!-- Weekly Schedule -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="grid grid-cols-6 gap-4">
            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
            <div>
                <h3 class="text-center font-semibold text-gray-900 mb-4">{{ $day }}</h3>
                <div class="space-y-3">
                    @if(isset($schedule[$day]) && count($schedule[$day]) > 0)
                        @foreach($schedule[$day] as $class)
                        <div class="bg-blue-500 text-white p-3 rounded-lg text-sm">
                            <p class="font-medium">{{ $class->code }}</p>
                            <p class="text-xs">{{ \Carbon\Carbon::parse($class->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($class->end_time)->format('H:i') }}</p>
                            <p class="text-xs mt-1">{{ $class->teacher->name ?? 'No Teacher' }}</p>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
