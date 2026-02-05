@extends('layouts.app')

@section('title', 'Login - VocabVenture')

@section('content')
<div class="auth-wrapper">
    <div class="login-card">
        <!-- Logo/Title -->
        <div class="text-center mb-8">
            <h1 class="title-font text-4xl font-extrabold mb-2" style="color: var(--orange-accent);">
                📚 VocabVenture
            </h1>
            <p class="text-gray-600 text-lg" id="pageSubtitle">Welcome back! Let's continue learning!</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
        <div class="error-message">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif

        <!-- LOGIN FORM -->
        <form action="{{ route('login') }}" method="POST" id="loginForm">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2 text-lg">
                    What's your name? 👋
                </label>
                <input
                    type="text"
                    name="name"
                    id="loginName"
                    class="input-field"
                    placeholder="Enter your first and last name"
                    value="{{ old('name') }}"
                    required
                    autofocus>
                <p class="text-sm text-gray-500 mt-1">Example: Jan Louise or CHELSIE FAITH</p>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 font-bold mb-2 text-lg">
                    When is your birthday? 🎂
                </label>
                <input
                    type="date"
                    name="birthdate"
                    id="loginBirthdate"
                    class="input-field"
                    value="{{ old('birthdate') }}"
                    required>
            </div>

            <button type="submit" class="submit-btn title-font">
                Let's Start! 🚀
            </button>
        </form>

        <!-- REGISTRATION FORM (Hidden by default) -->
        <form action="{{ route('register') }}" method="POST" id="registerForm" class="hidden">
            @csrf

            <input type="hidden" name="register_mode" value="1" />

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2 text-lg">
                    What's your full name? 👋
                </label>
                <input
                    type="text"
                    name="name"
                    id="registerName"
                    class="input-field"
                    placeholder="Enter your first and last name"
                    value="{{ old('name') }}">
                <p class="text-sm text-gray-500 mt-1">Example: Jan Louise or CHELSIE FAITH</p>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 font-bold mb-2 text-lg">
                    When is your birthday? 🎂
                </label>
                <input
                    type="date"
                    name="birthdate"
                    id="registerBirthdate"
                    class="input-field"
                    value="{{ old('birthdate') }}">
            </div>

            <button type="submit" class="submit-btn title-font">
                Create Account 🌟
            </button>
        </form>

        <!-- Toggle between Login and Register -->
        <div class="toggle-mode">
            <p id="toggleText" class="text-gray-600">
                New here?
                <span class="toggle-link" onclick="toggleAuthMode()">
                    Register Now
                </span>
            </p>
        </div>
    </div>
</div>

@if(old('register_mode'))
<script>
    // Auto-toggle to register if there was a registration attempt
    document.addEventListener('DOMContentLoaded', function() {
        toggleAuthMode();
    });
</script>
@endif
@endsection
