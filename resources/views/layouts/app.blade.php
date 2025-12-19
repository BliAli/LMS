<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LMS - Learning Management System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
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
            border-radius: 12px;
        }
        
        .course-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .progress-bar {
            transition: width 1s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg fixed h-full">
            <div class="p-6">
                <!-- User Profile -->
                <div class="text-center mb-8">
                    <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}" 
                         alt="Profile" 
                         class="w-24 h-24 rounded-full mx-auto mb-3 border-4 border-blue-500">
                    <h3 class="font-semibold text-gray-800">{{ auth()->user()->name }}</h3>
                    <p class="text-sm text-gray-500">{{ auth()->user()->program ?? 'Student' }}</p>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-th-large w-6"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    <a href="{{ route('classes') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('classes') ? 'active' : '' }}">
                        <i class="fas fa-book w-6"></i>
                        <span class="ml-3">Classes</span>
                    </a>
                    <a href="{{ route('schedule') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('schedule') ? 'active' : '' }}">
                        <i class="fas fa-calendar-alt w-6"></i>
                        <span class="ml-3">Schedule</span>
                    </a>
                    <a href="{{ route('grades') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('grades') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar w-6"></i>
                        <span class="ml-3">Grades</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg">
                        <i class="fas fa-download w-6"></i>
                        <span class="ml-3">Downloads</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg">
                        <i class="fas fa-cog w-6"></i>
                        <span class="ml-3">Settings</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg">
                        <i class="fas fa-trash w-6"></i>
                        <span class="ml-3">Trash</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg w-full text-left">
                            <i class="fas fa-sign-out-alt w-6"></i>
                            <span class="ml-3">Log Out</span>
                        </button>
                    </form>
                </nav>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 ml-64">
            <!-- Header -->
            <header class="bg-white shadow-sm p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">@yield('header', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" 
                                   placeholder="Find Your Class Here!" 
                                   class="bg-gray-100 rounded-full px-6 py-2 w-80 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-search absolute right-4 top-3 text-gray-400"></i>
                        </div>
                        <button class="relative">
                            <i class="fas fa-envelope text-gray-600 text-xl"></i>
                        </button>
                        <button class="relative">
                            <i class="fas fa-bell text-gray-600 text-xl"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                        </button>
                        <button>
                            <i class="fas fa-question-circle text-gray-600 text-xl"></i>
                        </button>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
