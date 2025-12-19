<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lecturer Portal - Academic Management System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .sidebar-item {
            transition: all 0.3s ease;
        }
        
        .sidebar-item:hover {
            background-color: #EBF5FF;
            color: #2563EB;
        }
        
        .sidebar-item.active {
            background-color: #2563EB;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 bg-white shadow-sm fixed h-full overflow-y-auto">
            <div class="p-6">
                <!-- User Profile -->
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-blue-500 rounded-full mx-auto mb-3 flex items-center justify-center text-white text-2xl font-semibold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    </div>
                    <h3 class="font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                    <p class="text-sm text-gray-500">Lecturer</p>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="space-y-1">
                    <a href="{{ route('lecturer.dashboard') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('lecturer.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-th-large w-5"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    <a href="{{ route('lecturer.classes') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('lecturer.classes') ? 'active' : '' }}">
                        <i class="fas fa-book w-5"></i>
                        <span class="ml-3">My Classes</span>
                    </a>
                    <a href="{{ route('lecturer.students') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('lecturer.students') ? 'active' : '' }}">
                        <i class="fas fa-user-graduate w-5"></i>
                        <span class="ml-3">Students</span>
                    </a>
                    <a href="{{ route('lecturer.schedule') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('lecturer.schedule') ? 'active' : '' }}">
                        <i class="fas fa-calendar-alt w-5"></i>
                        <span class="ml-3">Schedule</span>
                    </a>
                    <a href="{{ route('lecturer.materials') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('lecturer.materials') ? 'active' : '' }}">
                        <i class="fas fa-folder w-5"></i>
                        <span class="ml-3">Materials</span>
                    </a>
                    <a href="{{ route('lecturer.announcements') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('lecturer.announcements') ? 'active' : '' }}">
                        <i class="fas fa-bell w-5"></i>
                        <span class="ml-3">Announcements</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg">
                        <i class="fas fa-cog w-5"></i>
                        <span class="ml-3">Settings</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg w-full text-left">
                            <i class="fas fa-sign-out-alt w-5"></i>
                            <span class="ml-3">Log Out</span>
                        </button>
                    </form>
                </nav>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 ml-72">
            <!-- Top Header -->
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="flex items-center justify-between px-8 py-4">
                    <div class="flex items-center space-x-4 flex-1">
                        <div class="relative flex-1 max-w-2xl">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" 
                                   placeholder="Search classes, students..." 
                                   class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative">
                            <i class="fas fa-envelope text-gray-600 text-xl"></i>
                        </button>
                        <button class="relative">
                            <i class="fas fa-bell text-gray-600 text-xl"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                        </button>
                        <button class="relative">
                            <i class="fas fa-question-circle text-gray-600 text-xl"></i>
                        </button>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
