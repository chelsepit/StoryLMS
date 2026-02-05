<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VocabVenture</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-yellow: #FFD93D;
            --orange-accent: #FF6B35;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #FFE5B4 0%, #FFD93D 50%, #FFA500 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .title-font {
            font-family: 'Baloo 2', cursive;
        }
        
        .login-card {
            background: white;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 100%;
        }
        
        .input-field {
            width: 100%;
            padding: 15px 20px;
            border: 3px solid #FFD93D;
            border-radius: 15px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            outline: none;
            border-color: #FF6B35;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }
        
        .submit-btn {
            width: 100%;
            background: var(--primary-yellow);
            color: #333;
            padding: 18px;
            border-radius: 15px;
            border: 3px solid var(--orange-accent);
            font-size: 1.3rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.4);
        }
        
        .submit-btn:active {
            transform: scale(0.98);
        }
        
        .toggle-mode {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }
        
        .toggle-link {
            color: #FF6B35;
            font-weight: bold;
            cursor: pointer;
            text-decoration: underline;
            transition: all 0.3s ease;
        }
        
        .toggle-link:hover {
            color: #FFD93D;
        }
        
        .hidden {
            display: none;
        }
        
        .error-message {
            background: #fee;
            border: 2px solid #fcc;
            color: #c33;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .success-message {
            background: #efe;
            border: 2px solid #cfc;
            color: #3c3;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <!-- Logo/Title -->
        <div class="text-center mb-8">
            <h1 class="title-font text-4xl font-extrabold mb-2" style="color: #FF6B35;">
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
                <span class="toggle-link" id="toggleLink" onclick="toggleMode()">
                    Register Now
                </span>
            </p>
        </div>
    </div>
    
    <script>
        let isLoginMode = true;
        
        function toggleMode() {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const toggleText = document.getElementById('toggleText');
            const pageSubtitle = document.getElementById('pageSubtitle');
            
            isLoginMode = !isLoginMode;
            
            if (isLoginMode) {
                // Show login form
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                toggleText.innerHTML = 'New here? <span class="toggle-link" onclick="toggleMode()">Register Now</span>';
                pageSubtitle.textContent = 'Welcome back! Let\'s continue learning!';
            } else {
                // Show register form
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                toggleText.innerHTML = 'Already have an account? <span class="toggle-link" onclick="toggleMode()">Login Here</span>';
                pageSubtitle.textContent = 'Create your account to start learning!';
            }
        }
        
        // Auto-toggle to register if there's an old first_name (from registration attempt)
        @if(old('register_mode'))
        toggleMode();
        @endif
    </script>
</body>
</html>