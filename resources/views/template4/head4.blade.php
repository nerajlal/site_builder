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
                    Free shipping on orders over ₹1000
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
                <a href="{{ route('index.customer', ['headerFooterId' => $headerFooter->id]) }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
                <a href="{{ route('products.show', ['headerFooterId' => $headerFooter->id]) }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
                <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Features</a>
                <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Categories</a>
                <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Collection</a>
                <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Contact</a>
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
          @if($headerFooter)
          <a href="{{ route('wishlist.view', ['headerFooterId' => $headerFooter->id]) }}" class="ml-8 text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <i class="fas fa-heart"></i>
            <span id="wishlist-count" class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ $wishlistCount ?? 0 }}</span>
          </a>
          <a href="{{ route('cart.view', ['headerFooterId' => $headerFooter->id]) }}" class="ml-8 text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <i class="fas fa-shopping-bag"></i>
            <span id="cart-count" class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ $cartCount ?? 0 }}</span>
          </a>
          <div class="relative hidden md:inline-flex">
            <button id="authButton" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-purple-600 hover:bg-purple-700">
              <span id="authButtonText">Sign In</span>
            </button>
            <div id="account-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
              <a href="{{ route('orders.index', ['headerFooterId' => $headerFooter->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Orders</a>
              <button onclick="openProfileModal()" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update Profile</button>
              <button id="signOutBtn" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign Out</button>
            </div>
          </div>
          @endif
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
        <a href="{{ route('index.customer', ['headerFooterId' => $headerFooter->id]) }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
        <a href="{{ route('products.show', ['headerFooterId' => $headerFooter->id]) }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
        <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Features</a>
        <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Categories</a>
        <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Collection</a>
        <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Contact</a>
      @endif
      <button id="authButtonMobile" onclick="openLoginModal()" class="w-full whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-purple-600 hover:bg-purple-700">
        <span id="authButtonTextMobile">Sign In</span>
      </button>
    </nav>
  </div>

  @include('includes.customer_auth_modal')
  @include('includes.customer_profile_modal4')

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
            authButton.classList.remove('bg-purple-600', 'hover:bg-purple-700');
            authButton.classList.add('bg-green-600', 'hover:bg-green-700');
            authButton.onclick = () => {
                accountDropdown.classList.toggle('hidden');
            };

            authButtonTextMobile.textContent = 'Account';
            @if($headerFooter)
            authButtonMobile.onclick = () => {
                window.location.href = '{{ route("orders.index", ["headerFooterId" => $headerFooter->id]) }}';
            };
            @endif

        } else {
            authButtonText.textContent = 'Sign In';
            authButton.classList.remove('bg-green-600', 'hover:bg-green-700');
            authButton.classList.add('bg-purple-600', 'hover:bg-purple-700');
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