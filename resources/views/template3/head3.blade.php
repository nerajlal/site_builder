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
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background-color: #f7fafc;
      color: #2d3748;
    }
  </style>
</head>

<body class="bg-gray-100">
  <!-- Top Navigation -->
  <header class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center py-3 border-b border-gray-200">
        <div class="flex items-center">
            <a href="#" class="text-2xl font-bold text-gray-800">
              @if($is_default)
                BoutiqueStyle
              @else
                {{ $headerFooter->site_name }}
              @endif
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#" class="text-gray-500 hover:text-blue-500"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-500 hover:text-blue-500"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-500 hover:text-blue-500"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="flex justify-between items-center py-4">
        <nav class="hidden md:flex space-x-8">
            @if($is_default)
              <a href="/index3" class="text-gray-500 hover:text-blue-600">Home</a>
              <a href="/product3" class="text-gray-500 hover:text-blue-600">Products</a>
            @else
              @php
                $currentUrl = request()->url();
                $headerFooterId = null;
                if (preg_match('/\/index3\/(\d+)/', $currentUrl, $matches)) {
                  $headerFooterId = $matches[1];
                } elseif (preg_match('/\/product3\/(\d+)/', $currentUrl, $matches)) {
                  $headerFooterId = $matches[1];
                }
              @endphp

              @if($headerFooterId)
                <a href="/index3/{{ $headerFooterId }}" class="text-gray-500 hover:text-blue-600">Home</a>
                <a href="/product3/{{ $headerFooterId }}" class="text-gray-500 hover:text-blue-600">Products</a>
                <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Features</a>
                <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Categories</a>
                <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Collection</a>
                <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Contact</a>
              @else
                <a href="/index3" class="text-gray-500 hover:text-blue-600">Home</a>
                <a href="/product3" class="text-gray-500 hover:text-blue-600">Products</a>
                <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Features</a>
                <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Categories</a>
                <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Collection</a>
                <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Contact</a>
              @endif
            @endif
        </nav>
        <div class="md:hidden">
            <button id="menu-toggle" class="text-gray-500 hover:text-blue-600">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="flex items-center space-x-4">
            <button class="text-gray-500 hover:text-blue-600"><i class="fas fa-search"></i></button>
            <button onclick="openLoginModal()" class="text-gray-500 hover:text-blue-600"><i class="fas fa-user"></i></button>
            <a href="{{ route('wishlist.view', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-500 hover:text-blue-600 relative">
                <i class="fas fa-heart"></i>
                <span id="wishlist-count" class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">{{ $wishlistCount ?? 0 }}</span>
            </a>
            <a href="{{ route('cart.view', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-500 hover:text-blue-600 relative">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count" class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">{{ $cartCount ?? 0 }}</span>
            </a>
        </div>
      </div>
    </div>
  </header>
  <div id="mobile-menu" class="hidden md:hidden">
    <nav class="flex flex-col space-y-4 px-6 py-4">
      @if($is_default)
        <a href="/index3" class="text-gray-500 hover:text-blue-600">Home</a>
        <a href="/product3" class="text-gray-500 hover:text-blue-600">Products</a>
      @else
        @if($headerFooterId)
          <a href="/index3/{{ $headerFooterId }}" class="text-gray-500 hover:text-blue-600">Home</a>
          <a href="/product3/{{ $headerFooterId }}" class="text-gray-500 hover:text-blue-600">Products</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Features</a>
          <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Categories</a>
          <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Contact</a>
        @else
          <a href="/index3" class="text-gray-500 hover:text-blue-600">Home</a>
          <a href="/product3" class="text-gray-500 hover:text-blue-600">Products</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Features</a>
          <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Categories</a>
          <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Contact</a>
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

    // Update cart count
    async function updateCartCount() {
        try {
            const headerFooterId = {{ $headerFooterId ?? 'null' }};
            if (!headerFooterId) {
                // Try to extract from URL for customer-facing pages
                const urlParts = window.location.pathname.split('/');
                const idIndex = urlParts.indexOf('index3') + 1 || urlParts.indexOf('product3') + 1 || urlParts.indexOf('single-product3') + 1;
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
                const idIndex = urlParts.indexOf('index3') + 1 || urlParts.indexOf('product3') + 1 || urlParts.indexOf('single-product3') + 1;
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