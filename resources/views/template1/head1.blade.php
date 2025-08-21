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
        <a href="{{ route('index.customer', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-700 hover:text-pink-600 transition">Home</a>
        <a href="{{ route('products.show', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-700 hover:text-pink-600 transition">Products</a>
        <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-pink-600">Features</a>
        <a href="#categories" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-pink-600">Categories</a>
        <a href="#products" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-pink-600">Collection</a>
        <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-pink-600">Contact</a>
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
      <a href="{{ route('wishlist.view', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-700 hover:text-pink-600 transition relative">
        <i class="fas fa-heart"></i>
        <span id="wishlist-count" class="absolute -top-2 -right-2 bg-pink-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $wishlistCount ?? 0 }}</span>
      </a>
      <a href="{{ route('cart.view', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-700 hover:text-pink-600 transition relative">
        <i class="fas fa-shopping-cart"></i>
        <span id="cart-count" class="absolute -top-2 -right-2 bg-pink-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $cartCount ?? 0 }}</span>
      </a>
      <div class="relative hidden md:block">
        <button id="authButton" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded transition">
          <span id="authButtonText">Sign In</span>
        </button>
        <div id="account-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
          <a href="{{ route('orders.index', ['headerFooterId' => $headerFooter->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Orders</a>
          <button onclick="openProfileModal()" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update Profile</button>
          <button id="signOutBtn" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign Out</button>
        </div>
      </div>
    </div>
  </header>
  <div id="mobile-menu" class="hidden md:hidden">
    <nav class="flex flex-col space-y-4 px-6 py-4">
      @if($is_default)
        <a href="/index1" class="text-gray-700 hover:text-pink-600 transition">Home</a>
        <a href="/product1" class="text-gray-700 hover:text-pink-600 transition">Products</a>
      @else
        <a href="{{ route('index.customer', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-700 hover:text-pink-600 transition">Home</a>
        <a href="{{ route('products.show', ['headerFooterId' => $headerFooter->id]) }}" class="text-gray-700 hover:text-pink-600 transition">Products</a>
        <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-pink-600">Features</a>
        <a href="#categories" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-pink-600">Categories</a>
        <a href="#products" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-pink-600">Collection</a>
        <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-pink-600">Contact</a>
      @endif
      <button id="authButtonMobile" onclick="openLoginModal()" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded transition">
        <span id="authButtonTextMobile">Sign In</span>
      </button>
    </nav>
  </div>

  @include('includes.customer_auth_modal')
  @include('includes.customer_profile_modal')

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
        const authButtonText = document.getElementById('authButtonText');
        const accountDropdown = document.getElementById('account-dropdown');

        const authButtonMobile = document.getElementById('authButtonMobile');
        const authButtonTextMobile = document.getElementById('authButtonTextMobile');

        if (signedIn) {
            authButtonText.textContent = 'Account';
            authButton.classList.remove('bg-pink-600', 'hover:bg-pink-700');
            authButton.classList.add('bg-green-600', 'hover:bg-green-700');
            authButton.onclick = () => {
                accountDropdown.classList.toggle('hidden');
            };

            authButtonTextMobile.textContent = 'Account';
            // Mobile can have a similar dropdown or just go to orders page
            authButtonMobile.onclick = () => {
                window.location.href = '{{ route("orders.index", ["headerFooterId" => $headerFooter->id]) }}';
            };

        } else {
            authButtonText.textContent = 'Sign In';
            authButton.classList.remove('bg-green-600', 'hover:bg-green-700');
            authButton.classList.add('bg-pink-600', 'hover:bg-pink-700');
            accountDropdown.classList.add('hidden');
            authButton.onclick = () => openLoginModal();

            authButtonTextMobile.textContent = 'Sign In';
            authButtonMobile.onclick = () => openLoginModal();
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
                const idIndex = urlParts.indexOf('index') + 1 || urlParts.indexOf('product1') + 1 || urlParts.indexOf('single-product') + 1;
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
                const idIndex = urlParts.indexOf('index') + 1 || urlParts.indexOf('product1') + 1 || urlParts.indexOf('single-product') + 1;
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
