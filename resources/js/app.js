import './bootstrap';

// Auth Toggle Function
window.toggleAuthMode = function () {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const toggleText = document.getElementById('toggleText');
    const pageSubtitle = document.getElementById('pageSubtitle');

    const isLogin = !loginForm.classList.contains('hidden');

    loginForm.classList.toggle('hidden');
    registerForm.classList.toggle('hidden');

    toggleText.innerHTML = isLogin
        ? 'Already have an account? <span class="toggle-link" onclick="toggleAuthMode()">Login Here</span>'
        : 'New here? <span class="toggle-link" onclick="toggleAuthMode()">Register Now</span>';

    pageSubtitle.textContent = isLogin
        ? 'Create your account to start learning!'
        : 'Welcome back! Let\'s continue learning!';
};

// Welcome Page Settings (only run if elements exist)
document.addEventListener('DOMContentLoaded', function() {
    const settingsBtn = document.getElementById('settingsBtn');
    const settingsMenu = document.getElementById('settingsMenu');

    if (settingsBtn && settingsMenu) {
        // Settings Dropdown Toggle
        settingsBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            settingsMenu.classList.toggle('active');
        });

        // Close settings when clicking outside
        document.addEventListener('click', function(e) {
            if (!settingsMenu.contains(e.target) && !settingsBtn.contains(e.target)) {
                settingsMenu.classList.remove('active');
            }
        });

        // Close settings menu on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                settingsMenu.classList.remove('active');
            }
        });

        // Sound Toggle
        const soundToggle = document.getElementById('soundToggle');
        if (soundToggle) {
            soundToggle.addEventListener('change', function() {
                const isEnabled = this.checked;
                localStorage.setItem('sound_enabled', isEnabled);
            });
        }

        // Volume Slider
        const volumeSlider = document.getElementById('volumeSlider');
        const volumeValue = document.getElementById('volumeValue');

        if (volumeSlider && volumeValue) {
            volumeSlider.addEventListener('input', function() {
                volumeValue.textContent = this.value;
                localStorage.setItem('volume', this.value);
            });
        }

        // Voice Selection
        const boyVoice = document.getElementById('boyVoice');
        const girlVoice = document.getElementById('girlVoice');

        function selectVoice(voice) {
            if (voice === 'boy') {
                boyVoice.classList.add('active');
                girlVoice.classList.remove('active');
            } else {
                girlVoice.classList.add('active');
                boyVoice.classList.remove('active');
            }
            localStorage.setItem('selected_voice', voice);
        }

        if (boyVoice && girlVoice) {
            boyVoice.addEventListener('click', () => selectVoice('boy'));
            girlVoice.addEventListener('click', () => selectVoice('girl'));
        }

        // Load saved preferences
        const savedSound = localStorage.getItem('sound_enabled');
        if (savedSound !== null && soundToggle) {
            soundToggle.checked = savedSound === 'true';
        }

        const savedVolume = localStorage.getItem('volume');
        if (savedVolume && volumeSlider && volumeValue) {
            volumeSlider.value = savedVolume;
            volumeValue.textContent = savedVolume;
        }

        const savedVoice = localStorage.getItem('selected_voice');
        if (savedVoice && boyVoice && girlVoice) {
            selectVoice(savedVoice);
        }
    }
});

// Start Reading Button
window.startReading = function() {
    const button = event.target;
    button.style.transform = 'scale(0.95)';

    setTimeout(() => {
        button.style.transform = '';
        window.location.href = button.getAttribute('data-route');
    }, 150);
};
