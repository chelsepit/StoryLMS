<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
});

Route::get('login', fn () => view ('login'));
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('auth')->get('/dashboard', fn () => 'Logged in as ' . auth()->user()->name);

Route::get('/test-story', function () {
    $story = new \App\Models\Story();
    
    // Exact match – case-sensitive
    $story->video_path = 'videos/Fables/the-butterfly-and-the-caterpillar/TBTC3.mp4';
    
    $story->audio_path = null;

    return view('test-story', compact('story'));
});