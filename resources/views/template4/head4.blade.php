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
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Work+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
        font-family: 'Work Sans', sans-serif;
        background-color: #FFFDD0;
        color: #4a4a4a;
    }
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Playfair Display', serif;
    }
  </style>
</head>

<body>
  <header class="relative bg-white sticky top-0 z-50">
    <div class="bg-purple-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-2">
                <div class="flex items-center space-x-4">
                    <a href="#" class="hover:text-gray-200"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-gray-200"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-gray-200"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="text-sm">
                    Free shipping on orders over $50
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="#">
            <span class="sr-only">BoutiqueStyle</span>
            <h1 class="text-3xl font-bold text-purple-800">
              @if($is_default)
                BoutiqueStyle
              @else
                {{ $headerFooter->site_name }}
              @endif
            </h1>
          </a>
        </div>
        <nav class="hidden md:flex space-x-10">
            @if($is_default)
                <a href="/index4" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
                <a href="/product4" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
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
                <a href="/index4/{{ $headerFooterId }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
                <a href="/product4/{{ $headerFooterId }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
                <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Features</a>
                <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Categories</a>
                <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Collection</a>
                <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Contact</a>
                @else
                <a href="/index4" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
                <a href="/product4" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
                <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Features</a>
                <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Categories</a>
                <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Collection</a>
                <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Contact</a>
                @endif
            @endif
        </nav>
        <div class="md:hidden">
            <button id="menu-toggle" class="text-gray-500 hover:text-purple-600">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="flex items-center justify-end md:flex-1 lg:w-0">
          <a href="#" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <i class="fas fa-search"></i>
          </a>
          <a href="#" class="ml-8 text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <i class="fas fa-shopping-bag"></i>
            <span id="cart-count" class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
          </a>
          <button id="authButton" onclick="openLoginModal()" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-purple-600 hover:bg-purple-700 hidden md:inline-flex">
            <span id="authButtonText">Sign In</span>
          </button>
        </div>
      </div>
    </div>
  </header>
  <div id="mobile-menu" class="hidden md:hidden">
    <nav class="flex flex-col space-y-4 px-6 py-4">
      @if($is_default)
        <a href="/index4" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
        <a href="/product4" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
      @else
        @if($headerFooterId)
          <a href="/index4/{{ $headerFooterId }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
          <a href="/product4/{{ $headerFooterId }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Features</a>
          <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Categories</a>
          <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Contact</a>
        @else
          <a href="/index4" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
          <a href="/product4" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Features</a>
          <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Categories</a>
          <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Contact</a>
        @endif
      @endif
      <button id="authButtonMobile" onclick="openLoginModal()" class="w-full whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-purple-600 hover:bg-purple-700">
        <span id="authButtonTextMobile">Sign In</span>
      </button>
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
        const authButtonMobile = document.getElementById('authButtonMobile');
        const authButtonTextMobile = document.getElementById('authButtonTextMobile');
        
        if (data.signed_in) {
          authButtonText.textContent = 'Account';
          authButton.classList.remove('bg-purple-600', 'hover:bg-purple-700');
          authButton.classList.add('bg-green-600', 'hover:bg-green-700');
          authButtonTextMobile.textContent = 'Account';
          authButtonMobile.classList.remove('bg-purple-600', 'hover:bg-purple-700');
          authButtonMobile.classList.add('bg-green-600', 'hover:bg-green-700');
        } else {
          authButtonText.textContent = 'Sign In';
          authButton.classList.remove('bg-green-600', 'hover:bg-green-700');
          authButton.classList.add('bg-purple-600', 'hover:bg-purple-700');
          authButtonTextMobile.textContent = 'Sign In';
          authButtonMobile.classList.remove('bg-green-600', 'hover:bg-green-700');
          authButtonMobile.classList.add('bg-purple-600', 'hover:bg-purple-700');
        }
      } catch (error) {
        console.error('Error checking auth status:', error);
      }
    }

    // Update auth button after sign in/out
    function updateAuthButton(signedIn) {
      const authButton = document.getElementById('authButton');
      const authButtonText = document.getElementById('authButtonText');
      const authButtonMobile = document.getElementById('authButtonMobile');
      const authButtonTextMobile = document.getElementById('authButtonTextMobile');
      
      if (signedIn) {
        authButtonText.textContent = 'Account';
        authButton.classList.remove('bg-purple-600', 'hover:bg-purple-700');
        authButton.classList.add('bg-green-600', 'hover:bg-green-700');
        authButtonTextMobile.textContent = 'Account';
        authButtonMobile.classList.remove('bg-purple-600', 'hover:bg-purple-700');
        authButtonMobile.classList.add('bg-green-600', 'hover:bg-green-700');
      } else {
        authButtonText.textContent = 'Sign In';
        authButton.classList.remove('bg-green-600', 'hover:bg-green-700');
        authButton.classList.add('bg-purple-600', 'hover:bg-purple-700');
        authButtonTextMobile.textContent = 'Sign In';
        authButtonMobile.classList.remove('bg-green-600', 'hover:bg-green-700');
        authButtonMobile.classList.add('bg-purple-600', 'hover:bg-purple-700');
      }
    }

    // Override the modal functions to update button
    const originalOpenLoginModal = window.openLoginModal;
    window.openLoginModal = function() {
      if (originalOpenLoginModal) originalOpenLoginModal();
    };

    // Update cart count
    async function updateCartCount() {
        try {
            const headerFooterId = {{ $headerFooterId ?? 'null' }};
            if (!headerFooterId) {
                // Try to extract from URL for customer-facing pages
                const urlParts = window.location.pathname.split('/');
                const idIndex = urlParts.indexOf('index4') + 1 || urlParts.indexOf('product4') + 1 || urlParts.indexOf('single-product4') + 1;
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

    // Check auth on page load
    document.addEventListener('DOMContentLoaded', () => {
        checkAuthOnLoad();
        updateCartCount();
    });

    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>