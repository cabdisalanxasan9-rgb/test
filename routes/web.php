<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\AuthController;

// Public Routes
Route::get('/', [GymController::class, 'index'])->name('gym.home');
Route::get('/promo', [GymController::class, 'promo'])->name('gym.promo');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [GymController::class, 'register'])->name('register'); // Existing view handled by GymController or move to AuthController
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Gym Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [GymController::class, 'dashboard'])->name('gym.dashboard');
    Route::get('/schedule', [GymController::class, 'schedule'])->name('gym.schedule');
    Route::get('/workouts', [GymController::class, 'workouts'])->name('gym.workouts');
    Route::get('/workouts/{id}', [GymController::class, 'video'])->name('gym.video');
    Route::get('/add-workout', [GymController::class, 'addWorkout'])->name('gym.add-workout');
    Route::post('/add-workout', [GymController::class, 'addWorkoutSubmit'])->name('gym.add-workout.submit');
    
    // Booking
    Route::get('/book/confirm/{id}', [GymController::class, 'bookingConfirm'])->name('gym.book.confirm');
    Route::post('/book/store', [GymController::class, 'bookingStore'])->name('gym.book.store');
});
