<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique Store</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      scroll-behavior: smooth;
    }
    .boutique-shadow {
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .brand-logo {
      transition: all 0.3s ease;
    }
    .brand-logo:hover {
      transform: scale(1.05);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .product-card {
      transition: all 0.3s ease;
    }
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-800">
  <!-- Top Navigation -->
  <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center sticky top-0 z-50">
    <h1 class="text-2xl font-bold text-pink-600 flex items-center">
      <i class="fas fa-store mr-2"></i>
      @if($is_default)
        BoutiqueStyle
      @else
        {{ $headerFooter->site_name }}
      @endif
    </h1>
    <nav class="space-x-6 hidden md:flex">
      @if($is_default)
        <a href="/index1" class="text-gray-700 hover:text-pink-600 transition">Home</a>
        <a href="/product1" class="text-gray-700 hover:text-pink-600 transition">Products</a>
      @else
        @php
          $currentUrl = request()->url();
          $headerFooterId = null;
          if (preg_match('/\/index1\/(\d+)/', $currentUrl, $matches)) {
            $headerFooterId = $matches[1];
          } elseif (preg_match('/\/product1\/(\d+)/', $currentUrl, $matches)) {
            $headerFooterId = $matches[1];
          }
        @endphp
        
        @if($headerFooterId)
          <a href="/index1/{{ $headerFooterId }}" class="text-gray-700 hover:text-pink-600 transition">Home</a>
          <a href="/product1/{{ $headerFooterId }}" class="text-gray-700 hover:text-pink-600 transition">Products</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-pink-600">Features</a>
          <a href="#categories" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-pink-600">Categories</a>
          <a href="#products" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-pink-600">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-pink-600">Contact</a>
        @else
          <a href="/index1" class="text-gray-700 hover:text-pink-600 transition">Home</a>
          <a href="/product1" class="text-gray-700 hover:text-pink-600 transition">Products</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-pink-600">Features</a>
          <a href="#categories" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-pink-600">Categories</a>
          <a href="#products" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-pink-600">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-pink-600">Contact</a>
        @endif
      @endif
    </nav>
    <div class="md:hidden">
        <button id="menu-toggle" class="text-gray-700 hover:text-pink-600 transition">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="flex items-center space-x-4">
      <button class="text-gray-700 hover:text-pink-600 transition">
        <i class="fas fa-search"></i>
      </button>
      <button class="text-gray-700 hover:text-pink-600 transition">
        <i class="fas fa-shopping-cart"></i>
      </button>
      <button id="authButton" onclick="openLoginModal()" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded transition">
        <span id="authButtonText">Sign In</span>
      </button>
    </div>
  </header>
  <div id="mobile-menu" class="hidden md:hidden">
    <nav class="flex flex-col space-y-4 px-6 py-4">
      @if($is_default)
        <a href="/index1" class="text-gray-700 hover:text-pink-600 transition">Home</a>
        <a href="/product1" class="text-gray-700 hover:text-pink-600 transition">Products</a>
      @else
        @if($headerFooterId)
          <a href="/index1/{{ $headerFooterId }}" class="text-gray-700 hover:text-pink-600 transition">Home</a>
          <a href="/product1/{{ $headerFooterId }}" class="text-gray-700 hover:text-pink-600 transition">Products</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-pink-600">Features</a>
          <a href="#categories" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-pink-600">Categories</a>
          <a href="#products" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-pink-600">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-pink-600">Contact</a>
        @else
          <a href="/index1" class="text-gray-700 hover:text-pink-600 transition">Home</a>
          <a href="/product1" class="text-gray-700 hover:text-pink-600 transition">Products</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-pink-600">Features</a>
          <a href="#categories" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-pink-600">Categories</a>
          <a href="#products" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-pink-600">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-pink-600">Contact</a>
        @endif
      @endif
    </nav>
  </div>

  @include('includes.customer_auth_modal')

  <script>
    // Check authentication status on page load
    async function checkAuthOnLoad() {
      try {
        const response = await fetch('/customer/check-auth');
        const data = await response.json();
        
        const authButton = document.getElementById('authButton');
        const authButtonText = document.getElementById('authButtonText');
        
        if (data.signed_in) {
          authButtonText.textContent = 'Account';
          authButton.classList.remove('bg-pink-600', 'hover:bg-pink-700');
          authButton.classList.add('bg-green-600', 'hover:bg-green-700');
        } else {
          authButtonText.textContent = 'Sign In';
          authButton.classList.remove('bg-green-600', 'hover:bg-green-700');
          authButton.classList.add('bg-pink-600', 'hover:bg-pink-700');
        }
      } catch (error) {
        console.error('Error checking auth status:', error);
      }
    }

    // Update auth button after sign in/out
    function updateAuthButton(signedIn) {
      const authButton = document.getElementById('authButton');
      const authButtonText = document.getElementById('authButtonText');
      
      if (signedIn) {
        authButtonText.textContent = 'Account';
        authButton.classList.remove('bg-pink-600', 'hover:bg-pink-700');
        authButton.classList.add('bg-green-600', 'hover:bg-green-700');
      } else {
        authButtonText.textContent = 'Sign In';
        authButton.classList.remove('bg-green-600', 'hover:bg-green-700');
        authButton.classList.add('bg-pink-600', 'hover:bg-pink-700');
      }
    }

    // Override the modal functions to update button
    const originalOpenLoginModal = window.openLoginModal;
    window.openLoginModal = function() {
      if (originalOpenLoginModal) originalOpenLoginModal();
    };

    // Check auth on page load
    document.addEventListener('DOMContentLoaded', checkAuthOnLoad);

    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
