@extends('layouts.app')

@section('title', 'Welcome - VocabVenture')

@section('content')

<!-- Settings Menu -->
<div class="components">
    <x-settings-menu />
</div>
<!-- Background Scene -->
<div class="welcome-background">

</div>

<div class="welcome-content">
    <div class="text-center mt-10 fade-in">
        <!-- Main Greeting -->
        <h1 class="header-font text-4xl md:text-6xl font-extrabold mb-2" style="color: #000000;">
            Hello, <span id="userName">{{ session('user_first_name', 'Student') }}</span>!
        </h1>

        <!-- Subtitle (straight text, no curve) -->
        <p class="body-font text-3xl md:text-4xl text-black mt-2">
            Your Word Journey Starts Here
        </p>
    </div>

    <div class="flex-grow"></div>

    <!-- Start Reading Button -->
    <div class="mb-12 fade-in" style="animation-delay: 0.3s;">
        <button
            class="start-button header-font font-extrabold"
            data-route="{{ route('stories.index') }}"
            onclick="startReading()">
            Start Reading
        </button>
    </div>
</div>
