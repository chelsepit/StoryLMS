@extends('layouts.app')

@section('title', 'VocabVenture')

@section('content')
<div class="auth-wrapper">
    <div class="login-card" style="max-width: 800px;">
        <div class="text-center">
            <h1 class="title-font text-5xl font-extrabold mb-4" style="color: var(--orange-accent);">
                📚 VocabVenture
            </h1>
            <p class="text-lg text-gray-700 mb-8">
                Welcome to VocabVenture — a playful way to grow your words.
            </p>
            <a href="{{ route('login.show') }}" class="inline-block submit-btn title-font">
                Get Started 🚀
            </a>
        </div>

        <div class="mt-10 border-t pt-6">
            <h2 class="title-font text-2xl font-bold mb-3">Thesis Team</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li>Member 1</li>
                <li>Member 2</li>
                <li>Member 3</li>
            </ul>
            <p class="mt-6 text-gray-700">
                Partnered with <span class="font-bold">Fourloop</span>.
            </p>
        </div>
    </div>
</div>
@endsection
