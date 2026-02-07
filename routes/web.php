<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| VocabVenture Routes
|--------------------------------------------------------------------------
*/

// Landing Page (public homepage)
Route::get('/', function () {
    return view('landing');
})->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
// Protected Routes (require authentication)
Route::middleware(['auth'])->group(function () {
    // Welcome Page - shown after login with personalized greeting
    Route::get('/welcome', [landingpagecontroller::class, 'welcome'])->name('welcome');

    // Story Shelf
    Route::get('/stories', [landingpagecontroller::class, 'stories'])->name('stories.index');

    // Settings
    Route::get('/settings', [landingpagecontroller::class, 'settings'])->name('settings');
    Route::post('/settings/audio', [landingpagecontroller::class, 'updateAudioPreference'])->name('settings.audio');
    Route::post('/settings/save', [landingpagecontroller::class, 'saveSettings'])->name('settings.save');
});

// API Routes for AJAX requests
Route::prefix('api')->middleware(['auth'])->group(function () {
    Route::post('/audio-preference', [landingpagecontroller::class, 'updateAudioPreference']);
    Route::post('/save-settings', [landingpagecontroller::class, 'saveSettings']);
});

// Redirect /dashboard to /welcome for backward compatibility
Route::get('/dashboard', function () {
    return redirect()->route('welcome');
})->middleware(['auth']);
