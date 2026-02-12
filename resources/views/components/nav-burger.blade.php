<div class="burger-dropdown">
    <button class="burger-button" id="burgerBtn" aria-label="Open menu">
        <img
            src="{{ asset('assets/images/icons/burger-menu.svg') }}"
            alt="Menu"
            class="w-8 h-8 pointer-events-none"
        >
    </button>

    <div class="burger-menu" id="burgerMenu">
        <div class="mb-1">
            <a href="{{ route('login.show') }}" class="inline-block header-font font-semibold text-[1.2rem]"" style="color: #6e4324;">
                Badge
            </a>
        </div>

        <div class="mb-1">
            <a href="{{ route('login.show') }}" class="inline-block header-font font-semibold text-[1.2rem]" style="color: #6e4324;">
                Personal
            </a>
        </div>

        <div>
            <a href="{{ route('login.show') }}" class="inline-block header-font font-semibold text-[1.2rem]" style="color: #6e4324;">
                Library
            </a>
        </div>
    </div>
</div>
