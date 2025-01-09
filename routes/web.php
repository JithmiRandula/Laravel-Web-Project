<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

// This route will handle the home page view
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Resource route for courses 
Route::resource('courses', CoursesController::class);

// Contact Route
Route::post('/contact', [ContactController::class, 'store']);
Route::get('courses/{id}', [CoursesController::class, 'show'])->name('courses.show');

Route::get('/', [App\Http\Controllers\PusherController::class, 'index']);
Route::post('/broadcast', [App\Http\Controllers\PusherController::class, 'broadcast']);

Route::post('/receive', [App\Http\Controllers\PusherController::class, 'receive']);
