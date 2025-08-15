<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique Store</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      color: #333;
      background-color: #f9f9f7;
    }
    h1, h2, h3, h4 {
      font-family: 'Playfair Display', serif;
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
    .boutique-card {
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      background-color: #fff;
    }
    .boutique-card:hover {
      box-shadow: 0 10px 20px rgba(0,0,0,0.05);
      transform: translateY(-3px);
    }
    .brand-logo {
      opacity: 0.7;
      transition: all 0.3s ease;
    }
    .brand-logo:hover {
      opacity: 1;
    }
    .testimonial-card {
      background-color: #fff;
      box-shadow: 0 5px 15px rgba(0,0,0,0.03);
    }
  </style>
</head>

<body>
  <header class="relative bg-white">
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
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
          <a href="#" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <i class="fas fa-search"></i>
          </a>
          <a href="#" class="ml-8 text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <i class="fas fa-shopping-bag"></i>
            <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
          </a>
          <button id="authButton" onclick="openLoginModal()" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-purple-600 hover:bg-purple-700">
            <span id="authButtonText">Sign In</span>
          </button>
        </div>
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