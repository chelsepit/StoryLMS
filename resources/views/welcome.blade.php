<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - VocabVenture</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-yellow: #FFD93D;
            --orange-accent: #FF6B35;
            --pastel-green: #A8E6CF;
            --light-green: #90EE90;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        .title-font {
            font-family: 'Baloo 2', cursive;
        }
        
        /* Background placeholder - will show kids reading in field */
        .background-scene {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, #87CEEB 0%, #87CEEB 50%, #90EE90 50%, #90EE90 100%);
            z-index: -1;
        }
        
        /* Placeholder for background image */
        /* Uncomment and add your image path */
        /*
        .background-scene::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/images/kids-reading-field.jpg');
            background-size: cover;
            background-position: center;
        }
        */
        
        .background-scene::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background-image: 
                radial-gradient(ellipse at 20% 50%, rgba(34, 139, 34, 0.3) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 50%, rgba(34, 139, 34, 0.3) 0%, transparent 50%);
        }
        
        /* Settings Dropdown */
        .settings-dropdown {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 100;
        }
        
        .settings-button {
            background: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .settings-button:hover {
            transform: rotate(90deg) scale(1.1);
        }
        
        .settings-menu {
            position: absolute;
            top: 70px;
            left: 0;
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            min-width: 250px;
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .settings-menu.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Toggle Switch */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 28px;
        }
        
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        
        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .toggle-slider {
            background-color: var(--primary-yellow);
        }
        
        input:checked + .toggle-slider:before {
            transform: translateX(22px);
        }
        
        /* Volume Slider */
        .volume-slider {
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: #ddd;
            outline: none;
            -webkit-appearance: none;
        }
        
        .volume-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--orange-accent);
            cursor: pointer;
        }
        
        .volume-slider::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--orange-accent);
            cursor: pointer;
            border: none;
        }
        
        /* Voice Selection Buttons */
        .voice-btn {
            padding: 10px 20px;
            border-radius: 20px;
            border: 2px solid var(--primary-yellow);
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: bold;
            flex: 1;
        }
        
        .voice-btn.active {
            background: var(--primary-yellow);
            color: #333;
        }
        
        .voice-btn:hover {
            transform: scale(1.05);
        }
        
        /* Start Reading Button */
        .start-button {
            background: var(--primary-yellow);
            color: #333;
            font-size: 1.5rem;
            padding: 20px 60px;
            border-radius: 50px;
            border: 4px solid var(--orange-accent);
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.4);
            position: relative;
            overflow: hidden;
        }
        
        .start-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 107, 53, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .start-button:hover::before {
            width: 400px;
            height: 400px;
        }
        
        .start-button:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 30px rgba(255, 107, 53, 0.6);
        }
        
        .start-button:active {
            transform: scale(1.05);
        }
        
        /* Welcome Text Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        /* Content Container */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            z-index: 10;
        }
        
        /* Grass decoration */
        .grass-blade {
            position: absolute;
            bottom: 0;
            width: 30px;
            height: 60px;
            background: linear-gradient(to top, #4CAF50, #8BC34A);
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }
    </style>
</head>
<body>
    <!-- Background Scene (Placeholder for kids reading in field) -->
    <div class="background-scene">
        <!-- Placeholder grass decoration -->
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
    <div class="content-wrapper">
        <!-- Welcome Message -->
        <div class="text-center mb-12 fade-in">
            <h1 class="title-font text-4xl md:text-6xl font-extrabold mb-4" 
                style="color: #333; text-shadow: 3px 3px 0 #FFD93D;">
                Hello, <span id="userName">{{ session('user_first_name', 'Student') }}</span>!
            </h1>
            <p class="title-font text-2xl md:text-3xl font-bold text-gray-800">
                Your Word Journey Starts Here
            </p>
        </div>
        
        <!-- Start Reading Button -->
        <button class="start-button title-font font-extrabold fade-in" 
                style="animation-delay: 0.3s;"
                onclick="startReading()">
            Start Reading 📖
        </button>
    </div>
    
    <script>
        // Get user first name from session
        const userFirstName = "{{ session('user_first_name', 'Student') }}";
        document.getElementById('userName').textContent = userFirstName;
        
        // Settings Dropdown Toggle
        const settingsBtn = document.getElementById('settingsBtn');
        const settingsMenu = document.getElementById('settingsMenu');
        
        settingsBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            settingsMenu.classList.toggle('active');
        });
        
        // Close settings when clicking outside
        document.addEventListener('click', function(e) {
            if (!settingsMenu.contains(e.target) && e.target !== settingsBtn) {
                settingsMenu.classList.remove('active');
            }
        });
        
        // Sound Toggle
        const soundToggle = document.getElementById('soundToggle');
        soundToggle.addEventListener('change', function() {
            const isEnabled = this.checked;
            localStorage.setItem('sound_enabled', isEnabled);
            console.log('Sound:', isEnabled ? 'ON' : 'OFF');
        });
        
        // Volume Slider
        const volumeSlider = document.getElementById('volumeSlider');
        const volumeValue = document.getElementById('volumeValue');
        
        volumeSlider.addEventListener('input', function() {
            volumeValue.textContent = this.value;
            localStorage.setItem('volume', this.value);
            console.log('Volume:', this.value);
        });
        
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
            console.log('Voice selected:', voice);
        }
        
        boyVoice.addEventListener('click', () => selectVoice('boy'));
        girlVoice.addEventListener('click', () => selectVoice('girl'));
        
        // Start Reading Button
        function startReading() {
            // Visual feedback
            const button = event.target;
            button.style.transform = 'scale(0.95)';
            
            setTimeout(() => {
                button.style.transform = '';
                // Navigate to stories page
                window.location.href = '{{ route("stories.index") }}';
            }, 150);
        }
        
        // Load saved preferences
        window.addEventListener('load', function() {
            // Load sound preference
            const savedSound = localStorage.getItem('sound_enabled');
            if (savedSound !== null) {
                soundToggle.checked = savedSound === 'true';
            }
            
            // Load volume
            const savedVolume = localStorage.getItem('volume');
            if (savedVolume) {
                volumeSlider.value = savedVolume;
                volumeValue.textContent = savedVolume;
            }
            
            // Load voice selection
            const savedVoice = localStorage.getItem('selected_voice');
            if (savedVoice) {
                selectVoice(savedVoice);
            }
        });
        
        // Close settings menu on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                settingsMenu.classList.remove('active');
            }
        });
    </script>
</body>
</html>