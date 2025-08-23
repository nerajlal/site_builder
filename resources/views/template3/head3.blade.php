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
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background-color: #f7fafc;
      color: #2d3748;
    }
    @keyframes pulse-animation {
      0% { transform: scale(1); }
      50% { transform: scale(1.03); }
      100% { transform: scale(1); }
    }
    .combo-offer-pulse {
      animation: pulse-animation 1.5s ease-in-out 2;
      animation-delay: 1s;
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
              <a href="{{ route('index.customer', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-500 hover:text-blue-600">Home</a>
              <a href="{{ route('products.show', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-500 hover:text-blue-600">Products</a>
              <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Features</a>
              <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Categories</a>
              <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Collection</a>
              <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Contact</a>
            @endif
        </nav>
        <div class="md:hidden">
            <button id="menu-toggle" class="text-gray-500 hover:text-blue-600">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="flex items-center space-x-4">
            <button class="text-gray-500 hover:text-blue-600"><i class="fas fa-search"></i></button>
            @if($headerFooter)
            <div class="relative">
              <button id="authButton" class="text-gray-500 hover:text-blue-600"><i class="fas fa-user"></i></button>
              <div id="account-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 text-black">
                <a href="{{ route('orders.index', ['headerFooterId' => $headerFooter->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Orders</a>
                <button onclick="openProfileModal()" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update Profile</button>
                <button id="signOutBtn" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign Out</button>
              </div>
            </div>
            <a href="{{ route('wishlist.view', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-500 hover:text-blue-600 relative">
                <i class="fas fa-heart"></i>
                <span id="wishlist-count" class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">{{ $wishlistCount ?? 0 }}</span>
            </a>
            <a href="{{ route('cart.view', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-500 hover:text-blue-600 relative">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count" class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">{{ $cartCount ?? 0 }}</span>
            </a>
            @endif
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
        <a href="{{ route('index.customer', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-500 hover:text-blue-600">Home</a>
        <a href="{{ route('products.show', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-500 hover:text-blue-600">Products</a>
        <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Features</a>
        <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Categories</a>
        <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Collection</a>
        <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-gray-500 hover:text-blue-600">Contact</a>
      @endif
    </nav>
  </div>

  @include('includes.customer_auth_modal')
  @include('includes.customer_profile_modal3')

  <script>
    // Check authentication status on page load
    async function checkAuthOnLoad() {
      try {
        const response = await fetch('/customer/check-auth');
        const data = await response.json();
        updateAuthUI(data.signed_in);
      } catch (error) {
        console.error('Error checking auth status:', error);
      }
    }

    function updateAuthUI(signedIn) {
        const authButton = document.getElementById('authButton');
        const userIcon = authButton.querySelector('i');
        const accountDropdown = document.getElementById('account-dropdown');

        if (signedIn) {
            userIcon.className = 'fas fa-user-check text-green-500';
            authButton.title = 'Account';
            authButton.onclick = () => {
                accountDropdown.classList.toggle('hidden');
            };
        } else {
            userIcon.className = 'fas fa-user text-gray-500';
            authButton.title = 'Sign In';
            accountDropdown.classList.add('hidden');
            authButton.onclick = () => openLoginModal();
        }
    }

    // Update auth button after sign in/out
    function updateAuthButton(signedIn) {
        updateAuthUI(signedIn);
    }

    document.addEventListener('DOMContentLoaded', () => {
        const signOutBtn = document.getElementById('signOutBtn');
        signOutBtn.addEventListener('click', async () => {
            try {
                await fetch('/customer/sign-out', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                updateAuthUI(false);
                window.location.reload();
            } catch (error) {
                console.error('Error signing out:', error);
            }
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            const authButton = document.getElementById('authButton');
            const accountDropdown = document.getElementById('account-dropdown');
            if (!authButton.contains(e.target) && !accountDropdown.contains(e.target)) {
                accountDropdown.classList.add('hidden');
            }
        });
    });

    // Update cart count
    async function updateCartCount() {
        try {
            const headerFooterId = {{ $headerFooterId ?? 'null' }};
            if (!headerFooterId) {
                // Try to extract from URL for customer-facing pages
                const urlParts = window.location.pathname.split('/');
                const idIndex = urlParts.indexOf('index') + 1 || urlParts.indexOf('products') + 1 || urlParts.indexOf('single-product') + 1;
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
                const idIndex = urlParts.indexOf('index') + 1 || urlParts.indexOf('products') + 1 || urlParts.indexOf('single-product') + 1;
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