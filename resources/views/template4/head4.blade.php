<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique Store</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #faf9f7;
      color: #333;
    }
    h1, h2, h3, h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
    }
    .gold-underline {
      position: relative;
      display: inline-block;
    }
    .gold-underline:after {
      content: '';
      position: absolute;
      width: 60%;
      height: 1px;
      bottom: -5px;
      left: 0;
      background-color: #ec4899;
    }
    .boutique-card {
      transition: all 0.3s ease;
      background-color: white;
    }
    .boutique-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.05);
    }
    .pink-hover:hover {
      color: #ec4899;
    }
    .btn-pink {
      background-color: #ec4899;
      color: white;
      transition: all 0.3s ease;
    }
    .btn-pink:hover {
      background-color: #db2777;
      transform: translateY(-2px);
    }
    .btn-outline {
      border: 1px solid #333;
      transition: all 0.3s ease;
    }
    .btn-outline:hover {
      border-color: #ec4899;
      color: #ec4899;
    }
    .nav-link {
      position: relative;
    }
    .nav-link:after {
      content: '';
      position: absolute;
      width: 0;
      height: 1px;
      bottom: -2px;
      left: 0;
      background-color: #ec4899;
      transition: width 0.3s ease;
    }
    .nav-link:hover:after {
      width: 100%;
    }
  </style>
</head>

<body class="bg-[#faf9f7]">
  <!-- Top Navigation -->
  <header class="py-6 px-6 bg-white/90 backdrop-blur-sm sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-semibold">
          @if($is_default)
            BoutiqueStyle
          @else
            {{ $headerFooter->site_name }}
          @endif</h1>
      <nav class="hidden md:flex space-x-8">
        @if($is_default)
          <a href="#" class="text-gray-700 nav-link transition">Home</a>
        @else
          @php
            $currentUrl = request()->url();
            $headerFooterId = null;
            if (preg_match('/\/index4\/(\d+)/', $currentUrl, $matches)) {
              $headerFooterId = $matches[1];
            } elseif (preg_match('/\/product4\/(\d+)/', $currentUrl, $matches)) {
              $headerFooterId = $matches[1];
            }
          @endphp
          
          @if($headerFooterId)
            <a href="/index4/{{ $headerFooterId }}" class="text-gray-700 nav-link">Home</a>
            <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }}  nav-link">Features</a>
            <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }}  nav-link">Categories</a>
            <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }}  nav-link">Collection</a>
            <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }}  nav-link">Contact</a>
          @else
            <a href="/index4" class="text-gray-700 nav-link">Home</a>
            <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }}  nav-link">Features</a>
            <a href="#brands" id="navBrands" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }}  nav-link">Categories</a>
            <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }}  nav-link">Collection</a>
            <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }}  nav-link">Contact</a>
          @endif
        @endif
      </nav>
      <div class="flex items-center space-x-6">
        <button class="text-gray-500 hover:text-[#ec4899]">
          <i class="fas fa-search"></i>
        </button>
        <button onclick="openLoginModal()" class="text-gray-500 hover:text-[#ec4899]">
          <i class="fas fa-user"></i>
        </button>
        <button class="text-gray-500 hover:text-[#ec4899] relative">
          <i class="fas fa-shopping-bag"></i>
          <span class="absolute -top-2 -right-2 bg-[#ec4899] text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">0</span>
        </button>
      </div>
    </div>
  </header>

  @include('includes.customer_auth_modal')

  <script>
    // Check authentication status on page load
    async function checkAuthOnLoad() {
      try {
        const response = await fetch('/customer/check-auth');
        const data = await response.json();
        
        const userButton = document.querySelector('button[onclick="openLoginModal()"]');
        const userIcon = userButton.querySelector('i');
        
        if (data.signed_in) {
          userIcon.className = 'fas fa-user-check text-green-500';
          userButton.title = 'Account';
        } else {
          userIcon.className = 'fas fa-user text-gray-500';
          userButton.title = 'Sign In';
        }
      } catch (error) {
        console.error('Error checking auth status:', error);
      }
    }

    // Update auth button after sign in/out
    function updateAuthButton(signedIn) {
      const userButton = document.querySelector('button[onclick="openLoginModal()"]');
      const userIcon = userButton.querySelector('i');
      
      if (signedIn) {
        userIcon.className = 'fas fa-user-check text-green-500';
        userButton.title = 'Account';
      } else {
        userIcon.className = 'fas fa-user text-gray-500';
        userButton.title = 'Sign In';
      }
    }

    // Check auth on page load
    document.addEventListener('DOMContentLoaded', checkAuthOnLoad);
  </script>