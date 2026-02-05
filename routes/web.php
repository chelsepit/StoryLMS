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
