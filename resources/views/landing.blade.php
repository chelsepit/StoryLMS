@extends('layouts.app')

@section('title', 'VocabVenture')

@section('content')
<div class="auth-wrapper">
    <div class="login-card" style="max-width: 500px;">
        <div class="text-center">
            <h1 class="title-font text-5xl font-extrabold mb-4" style="color: var(--orange-accent);">
                VocabVenture
            </h1>
            <p class="text-lg text-gray-700 mb-8">
                Welcome to <span class="header-font">VocabVenture</span> — a playful way to grow your words.
            </p>
            <a href="{{ route('login.show') }}" class="inline-block submit-btn header-font font-semibold">
                Get Started
            </a>
        </div>

        <div class="mt-10 border-t pt-6">
            <p class="mt-6 text-gray-700 flex items-center justify-center gap-1">
                Partnered with <span class="font-bold">FourLoop</span>
            </p>
        </div>
    </div>
</div>
@endsection
