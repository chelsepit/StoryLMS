@extends('auth.login')

@section('title', 'Register - VocabVenture')

@section('content')
<div class="auth-wrapper">
    <div class="login-card">
        <div class="text-center mb-8">
            <h1 class="title-font text-4xl font-extrabold mb-2" style="color: var(--orange-accent);">
                Join VocabVenture!
            </h1>
            <p class="text-gray-600 text-lg">Create your account to start learning!</p>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2 text-lg">What's your full name?</label>
                <input type="text" name="name" class="input-field" placeholder="Enter your name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 font-bold mb-2 text-lg">When is your birthday?</label>
                <input type="date" name="birthdate" class="input-field" value="{{ old('birthdate') }}" required>
            </div>

            <button type="submit" class="submit-btn header-font">Create Account</button>
        </form>

        <div class="toggle-mode">
            <p class="text-gray-600">
                Already have an account?
                <a href="{{ route('login.show') }}" class="toggle-link">Login Here</a>
            </p>
        </div>
    </div>
</div>
@endsection
