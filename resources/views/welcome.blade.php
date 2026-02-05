@extends('layouts.app')

@section('title', 'Welcome - VocabVenture')

@section('content')
<!-- Background Scene -->
<div class="welcome-background">
    <!-- Grass decoration -->
    <div class="grass-blade" style="left: 10%; height: 50px;"></div>
    <div class="grass-blade" style="left: 20%; height: 65px;"></div>
    <div class="grass-blade" style="left: 30%; height: 45px;"></div>
    <div class="grass-blade" style="left: 40%; height: 70px;"></div>
    <div class="grass-blade" style="left: 50%; height: 55px;"></div>
    <div class="grass-blade" style="left: 60%; height: 60px;"></div>
    <div class="grass-blade" style="left: 70%; height: 48px;"></div>
    <div class="grass-blade" style="left: 80%; height: 65px;"></div>
    <div class="grass-blade" style="left: 90%; height: 52px;"></div>
</div>

<!-- Settings Dropdown -->
<div class="settings-dropdown">
    <button class="settings-button" id="settingsBtn" aria-label="Open settings">
        <svg class="w-8 h-8 text-gray-800" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
        </svg>
    </button>

    <div class="settings-menu" id="settingsMenu">
        <!-- Sound Toggle -->
        <div class="mb-6">
            <div class="flex items-center justify-between mb-2">
                <label class="font-bold text-gray-800">Sound</label>
                <label class="toggle-switch">
                    <input type="checkbox" id="soundToggle" checked>
                    <span class="toggle-slider"></span>
                </label>
            </div>
        </div>

        <!-- Volume Slider -->
        <div class="mb-6">
            <label class="font-bold text-gray-800 block mb-3">Volume</label>
            <input type="range" min="0" max="100" value="70" class="volume-slider" id="volumeSlider">
            <div class="flex justify-between text-sm text-gray-600 mt-1">
                <span>0</span>
                <span id="volumeValue">70</span>
                <span>100</span>
            </div>
        </div>

        <!-- Voice Selection -->
        <div>
            <label class="font-bold text-gray-800 block mb-3">Voice Selection</label>
            <div class="flex gap-3">
                <button class="voice-btn active" id="boyVoice" data-voice="boy">
                    👦 Boy
                </button>
                <button class="voice-btn" id="girlVoice" data-voice="girl">
                    👧 Girl
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="welcome-content">
    <!-- Welcome Message -->
    <div class="text-center mb-12 fade-in">
        <h1 class="title-font text-4xl md:text-6xl font-extrabold mb-4"
            style="color: #333; text-shadow: 3px 3px 0 var(--primary-yellow);">
            Hello, <span id="userName">{{ session('user_first_name', 'Student') }}</span>!
        </h1>
        <p class="title-font text-2xl md:text-3xl font-bold text-gray-800">
            Your Word Journey Starts Here
        </p>
    </div>

    <!-- Start Reading Button -->
    <button
        class="start-button title-font font-extrabold fade-in"
        style="animation-delay: 0.3s;"
        data-route="{{ route('stories.index') }}"
        onclick="startReading()">
        Start Reading 📖
    </button>
</div>
@endsection
