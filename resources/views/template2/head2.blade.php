<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique Store</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#DB2777', // Equivalent to pink-600
            secondary: '#16A34A', // Equivalent to green-600
          }
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #0a0a0a;
      color: #e5e5e5;
    }
    .nav-link {
      position: relative;
    }
    .nav-link:after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -2px;
      left: 0;
      background-color: #ec4899;
      transition: width 0.3s ease;
    }
    .nav-link:hover:after {
      width: 100%;
    }
    .boutique-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .boutique-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    }
    .brand-logo {
      filter: grayscale(100%);
      opacity: 0.7;
      transition: all 0.3s ease;
    }
    .brand-logo:hover {
      filter: grayscale(0%);
      opacity: 1;
    }
  </style>
</head>

<body>
  <!-- Top Navigation -->
  <header class="bg-black py-6 px-6 border-b border-gray-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <div class="flex items-center">
        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-600 to-pink-800 flex items-center justify-center mr-3">
          <i class="fas fa-store text-white"></i>
        </div>
        <span>
          <h1 class="text-2xl font-light tracking-wider">
          @if($is_default)
            BoutiqueStyle
          @else
            {{ $headerFooter->site_name }}
          @endif </h1>
        </span>
      </div>
      <nav class="hidden md:flex space-x-8">
        @if($is_default)
          <a href="/index2" class="text-gray-300 hover:text-pink-500 transition">Home</a>
          <a href="/product2" class="text-gray-300 hover:text-pink-500 transition">Products</a>
        @else
          @php
            $currentUrl = request()->url();
            $headerFooterId = null;
            if (preg_match('/\/index2\/(\d+)/', $currentUrl, $matches)) {
              $headerFooterId = $matches[1];
            } elseif (preg_match('/\/product2\/(\d+)/', $currentUrl, $matches)) {
              $headerFooterId = $matches[1];
            }
          @endphp

          @if($headerFooterId)
            <a href="/index2/{{ $headerFooterId }}" class="text-gray-300 hover:text-pink-500 transition">Home</a>
            <a href="/product2/{{ $headerFooterId }}" class="text-gray-300 hover:text-pink-500 transition">Products</a>
            <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-pink-500">Features</a>
            <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-pink-500">Categories</a>
            <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-pink-500">Collection</a>
            <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-pink-500">Contact</a>
          @else
            <a href="/index2" class="text-gray-300 hover:text-pink-500 transition">Home</a>
            <a href="/product2" class="text-gray-300 hover:text-pink-500 transition">Products</a>
            <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-pink-500">Features</a>
            <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-pink-500">Categories</a>
            <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-pink-500">Collection</a>
            <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-pink-500">Contact</a>
          @endif
        @endif
      </nav>
      <div class="md:hidden">
        <button id="menu-toggle" class="text-gray-400 hover:text-white transition">
            <i class="fas fa-bars"></i>
        </button>
      </div>
      <div class="flex items-center space-x-4">
        <button class="text-gray-400 hover:text-white">
          <i class="fas fa-search"></i>
        </button>
        <button onclick="openLoginModal()" class="text-gray-400 hover:text-white">
          <i class="fas fa-user"></i>
        </button>
        <a href="{{ route('wishlist.view', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-400 hover:text-white relative">
            <i class="fas fa-heart"></i>
            <span id="wishlist-count" class="absolute -top-2 -right-2 bg-pink-600 text-black text-xs w-5 h-5 flex items-center justify-center rounded-full">{{ $wishlistCount ?? 0 }}</span>
        </a>
        <a href="{{ route('cart.view', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-400 hover:text-white relative">
          <i class="fas fa-shopping-bag"></i>
          <span id="cart-count" class="absolute -top-2 -right-2 bg-pink-600 text-black text-xs w-5 h-5 flex items-center justify-center rounded-full">{{ $cartCount ?? 0 }}</span>
        </a>
      </div>
    </div>
  </header>
  <div id="mobile-menu" class="hidden md:hidden">
    <nav class="flex flex-col space-y-4 px-6 py-4">
      @if($is_default)
        <a href="/index2" class="text-gray-300 hover:text-pink-500 transition">Home</a>
        <a href="/product2" class="text-gray-300 hover:text-pink-500 transition">Products</a>
      @else
        @if($headerFooterId)
          <a href="/index2/{{ $headerFooterId }}" class="text-gray-300 hover:text-pink-500 transition">Home</a>
          <a href="/product2/{{ $headerFooterId }}" class="text-gray-300 hover:text-pink-500 transition">Products</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-pink-500">Features</a>
          <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-pink-500">Categories</a>
          <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-pink-500">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-pink-500">Contact</a>
        @else
          <a href="/index2" class="text-gray-300 hover:text-pink-500 transition">Home</a>
          <a href="/product2" class="text-gray-300 hover:text-pink-500 transition">Products</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-pink-500">Features</a>
          <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-pink-500">Categories</a>
          <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-pink-500">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-pink-500">Contact</a>
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
        
        const userButton = document.querySelector('button[onclick="openLoginModal()"]');
        const userIcon = userButton.querySelector('i');
        
        if (data.signed_in) {
          userIcon.className = 'fas fa-user-check text-green-400';
          userButton.title = 'Account';
        } else {
          userIcon.className = 'fas fa-user text-gray-400';
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
        userIcon.className = 'fas fa-user-check text-green-400';
        userButton.title = 'Account';
      } else {
        userIcon.className = 'fas fa-user text-gray-400';
        userButton.title = 'Sign In';
      }
    }

    // Update cart count
    async function updateCartCount() {
        try {
            const headerFooterId = {{ $headerFooterId ?? 'null' }};
            if (!headerFooterId) {
                // Try to extract from URL for customer-facing pages
                const urlParts = window.location.pathname.split('/');
                const idIndex = urlParts.indexOf('index2') + 1 || urlParts.indexOf('product2') + 1 || urlParts.indexOf('single-product2') + 1;
                if (idIndex > 0 && urlParts[idIndex]) {
                    const id = parseInt(urlParts[idIndex]);
                    if (!isNaN(id)) {
                        const response = await fetch(`/cart/count/${id}`);
                        const data = await response.json();
                        document.getElementById('cart-count').textContent = data.cart_count || 0;
                    }
                }
                return;
            }
            const response = await fetch(`/cart/count/${headerFooterId}`);
            const data = await response.json();
            document.getElementById('cart-count').textContent = data.cart_count || 0;
        } catch (error) {
            console.error('Error fetching cart count:', error);
        }
    }

    // Update wishlist count
    async function updateWishlistCount() {
        try {
            const headerFooterId = {{ $headerFooterId ?? 'null' }};
            if (!headerFooterId) {
                const urlParts = window.location.pathname.split('/');
                const idIndex = urlParts.indexOf('index2') + 1 || urlParts.indexOf('product2') + 1 || urlParts.indexOf('single-product2') + 1;
                if (idIndex > 0 && urlParts[idIndex]) {
                    const id = parseInt(urlParts[idIndex]);
                    if (!isNaN(id)) {
                        const response = await fetch(`/wishlist/count/${id}`);
                        const data = await response.json();
                        document.getElementById('wishlist-count').textContent = data.wishlist_count || 0;
                    }
                }
                return;
            }
            const response = await fetch(`/wishlist/count/${headerFooterId}`);
            const data = await response.json();
            document.getElementById('wishlist-count').textContent = data.wishlist_count || 0;
        } catch (error) {
            console.error('Error fetching wishlist count:', error);
        }
    }

    // Check auth on page load
    document.addEventListener('DOMContentLoaded', () => {
        checkAuthOnLoad();
        updateCartCount();
        updateWishlistCount();
    });

    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>