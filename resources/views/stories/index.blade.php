@extends('layouts.app')

@section('title', 'Library - VocabVenture')

@section('content')

<div class="components">
    <x-settings-menu />
    <x-nav-burger />
</div>

<div class="library-container">
    {{-- Header Section: Title, Search, and Genres --}}
    <div class="library-header">
        <div class="library-title-wrapper">
            <h1 class="header-font text-4xl md:text-5xl text-white drop-shadow-lg">
                What do you want to <span class="italic title-font">read</span> today?
            </h1>
        </div>

        <div class="genre-search-bar-container">
            <img src="{{ asset('assets/images/icons/search-icon.svg') }}" class="search-icon">
            <input type="text" class="genre-search-bar" placeholder="Search">
            <img src="{{ asset('assets/images/icons/x-icon.svg') }}" alt="x icon" class="x-icon">
        </div>

        <div class="genre-nav">
            <button type="button" class="genre-tag">
                <img src="{{ asset('assets/images/icons/folktales-icon.svg') }}" alt="" class="genre-icons">
                <span>Folktales</span>
            </button>
            <button type="button" class="genre-tag">
                <img src="{{ asset('assets/images/icons/myths-icon.svg') }}" alt="" class="genre-icons">
                <span>Myths</span>
            </button>
            <button type="button" class="genre-tag">
                <img src="{{ asset('assets/images/icons/fables-icon.svg') }}" alt="" class="genre-icons">
                <span>Fables</span>
            </button>
            <button type="button" class="genre-tag active">
                <img src="{{ asset('assets/images/icons/short-stories-icon.svg') }}" alt="" class="genre-icons">
                <span>Short Stories</span>
            </button>
            <button type="button" class="genre-tag">
                <img src="{{ asset('assets/images/icons/legends-icon.svg') }}" alt="" class="genre-icons">
                <span>Legends</span>
            </button>
        </div>
    </div>

    {{-- Main Content Wrapper --}}
    <div class="library-content-wrapper">

        <section class="bookshelf-section">
            <div class="section-header">
                <h2 class="section-title">Recent</h2>
                <a href="#" class="view-all-link">view all...</a>
            </div>

            <div class="book-grid">
                <div class="book-item">
                    <img src="{{ asset('assets/images/books/folktales/folktale-book-1.png') }}" alt="Book 1">
                    <div class="progress-container">
                        <div class="progress-fill" style="width: 60%;"></div>
                    </div>
                </div>
                <div class="book-item">
                    <img src="{{ asset('assets/images/books/folktales/folktale-book-2.png') }}" alt="Book 2">
                    <div class="progress-container">
                        <div class="progress-fill" style="width: 45%;"></div>
                    </div>
                </div>
                <div class="book-item">
                    <img src="{{ asset('assets/images/books/folktales/folktale-book-3.png') }}" alt="Book 3">
                    <div class="progress-container">
                        <div class="progress-fill" style="width: 90%;"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bookshelf-section">
            <div class="section-header">
                <h2 class="section-title">Short Story</h2>
                <a href="#" class="view-all-link">view all...</a>
            </div>

            <div class="book-grid">
                {{-- Book 1 --}}
                <div class="book-item">
                    <img src="{{ asset('assets/images/books/folktales/folktale-book-4.png') }}" alt="Story 1">
                    <div class="progress-container">
                        <div class="progress-fill" style="width: 20%;"></div>
                    </div>
                </div>

                {{-- Book 2 --}}
                <div class="book-item">
                    <img src="{{ asset('assets/images/books/folktales/folktale-book-5.png') }}" alt="Story 2">
                    <div class="progress-container">
                        <div class="progress-fill" style="width: 100%;"></div>
                    </div>
                </div>

                {{-- Book 3 --}}
                <div class="book-item">
                    <img src="{{ asset('assets/images/books/folktales/folktale-book-1.png') }}" alt="Story 3">
                    <div class="progress-container">
                        <div class="progress-fill" style="width: 0%;"></div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

@endsection
