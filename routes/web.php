<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LecturerController;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes (require authentication)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Classes
    Route::get('/classes', [DashboardController::class, 'classes'])->name('classes');
    
    // Schedule
    Route::get('/schedule', [DashboardController::class, 'schedule'])->name('schedule');
    
    // Grades
    Route::get('/grades', [DashboardController::class, 'grades'])->name('grades');
    
    // Lecturer Routes
    Route::prefix('lecturer')->name('lecturer.')->group(function () {
        Route::get('/dashboard', [LecturerController::class, 'dashboard'])->name('dashboard');
        Route::get('/classes', [LecturerController::class, 'classes'])->name('classes');
        Route::get('/students', [LecturerController::class, 'students'])->name('students');
        Route::get('/schedule', [LecturerController::class, 'schedule'])->name('schedule');
        Route::get('/materials', [LecturerController::class, 'materials'])->name('materials');
        Route::get('/announcements', [LecturerController::class, 'announcements'])->name('announcements');
    });
    
    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
        Route::get('/courses', [App\Http\Controllers\AdminController::class, 'courses'])->name('courses');
        Route::get('/schedules', [App\Http\Controllers\AdminController::class, 'schedules'])->name('schedules');
        Route::get('/roles', [App\Http\Controllers\AdminController::class, 'roles'])->name('roles');
    });
});

