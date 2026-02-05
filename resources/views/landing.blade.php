<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VocabVenture</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary-yellow:#FFD93D; --orange-accent:#FF6B35; }
        body { font-family:'Nunito',sans-serif; background:linear-gradient(135deg,#FFE5B4 0%,#FFD93D 50%,#FFA500 100%); min-height:100vh; display:flex; align-items:center; justify-content:center; padding:20px; }
        .title-font { font-family:'Baloo 2', cursive; }
        .card { background:white; border-radius:30px; padding:40px; max-width:800px; width:100%; box-shadow:0 20px 60px rgba(0,0,0,0.25); }
        .cta-btn { background:var(--primary-yellow); border:3px solid var(--orange-accent); color:#333; padding:16px 28px; border-radius:16px; font-weight:800; font-size:1.25rem; transition:transform .2s ease, box-shadow .2s ease; }
        .cta-btn:hover { transform:scale(1.05); box-shadow:0 10px 25px rgba(255,107,53,.4); }
    </style>
</head>
<body>
    <div class="card">
        <div class="text-center">
            <h1 class="title-font text-5xl font-extrabold mb-4" style="color:#FF6B35;">VocabVenture</h1>
            <p class="text-lg text-gray-700 mb-8">Welcome to VocabVenture — a playful way to grow your words.</p>
            <a href="{{ route('login.show') }}" class="inline-block cta-btn">Get Started</a>
        </div>

        <div class="mt-10 border-t pt-6">
            <h2 class="title-font text-2xl font-bold mb-3">Thesis Team</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li>Member 1</li>
                <li>Member 2</li>
                <li>Member 3</li>
            </ul>
            <p class="mt-6 text-gray-700">Partnered with <span class="font-bold">Fourloop</span>.</p>
        </div>
    </div>
</body>
</html>