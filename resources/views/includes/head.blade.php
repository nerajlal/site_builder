<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Build Your Store AI</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#0f172a', // deep navy
            accent: '#FFD700', // gold
            bgLight: '#f8fafc',
            textLight: '#f1f5f9'
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif']
          }
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body class="font-sans bg-bgLight text-gray-900">
  <!-- Navbar -->
  <nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <!-- Logo -->
      <a href="/" class="text-2xl font-bold text-primary tracking-tight">Build<span class="text-accent">YourBoutique</span></a>

      <!-- Desktop Links -->
      <div class="hidden md:flex space-x-8 items-center">
        <a href="#how-it-works" class="text-gray-600 hover:text-primary font-medium transition duration-300">How it Works</a>
        <a href="#features" class="text-gray-600 hover:text-primary font-medium transition duration-300">Features</a>
        <a href="#templates" class="text-gray-600 hover:text-primary font-medium transition duration-300">Templates</a>
        <a href="#faq" class="text-gray-600 hover:text-primary font-medium transition duration-300">FAQ</a>

        @if(session('userid'))
          <button onclick="window.location.href='/dashboard'" class="bg-primary text-white px-5 py-2 rounded-lg shadow hover:bg-gray-900 transition">Dashboard</button>

          <form method="POST" action="/logout" class="ml-2">
            @csrf
            <button class="text-gray-600 hover:text-red-500 transition text-xl" title="Logout">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1" />
              </svg>
            </button>
          </form>
        @else
          <button onclick="window.location.href='/login'" class="bg-accent text-primary px-5 py-2 rounded-lg shadow hover:brightness-90 transition font-semibold">Get Started</button>
        @endif
      </div>

      <!-- Mobile Toggle -->
      <div class="md:hidden">
        <button id="mobileMenuBtn" class="text-primary focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden px-6 pb-4">
      <a href="#how-it-works" class="block py-2 text-gray-700 hover:text-primary">How it Works</a>
      <a href="#features" class="block py-2 text-gray-700 hover:text-primary">Features</a>
      <a href="#templates" class="block py-2 text-gray-700 hover:text-primary">Templates</a>
      <a href="#faq" class="block py-2 text-gray-700 hover:text-primary">FAQ</a>
      @if(session('userid'))
        <a href="/dashboard" class="block py-2 text-gray-700 hover:text-primary">Dashboard</a>
        <form method="POST" action="/logout" class="pt-2">
          @csrf
          <button class="text-red-600 hover:text-red-800">Logout</button>
        </form>
      @else
        <a href="/login" class="block py-2 text-primary font-semibold hover:underline">Get Started</a>
      @endif
    </div>
  </nav>

  <script>
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>
</body>
</html>
