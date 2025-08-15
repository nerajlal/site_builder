<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique Store</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Lato', sans-serif;
      background-color: #f0fdf4;
      color: #1f2937;
    }
  </style>
</head>

<body class="bg-green-50">
  <!-- Top Navigation -->
  <header class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="#">
            <span class="sr-only">BoutiqueStyle</span>
            <i class="fas fa-leaf text-green-600 h-8 w-auto sm:h-10"></i>
          </a>
        </div>
        <div class="-mr-2 -my-2 md:hidden">
          <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <i class="fas fa-bars h-6 w-6"></i>
          </button>
        </div>
        <nav class="hidden md:flex space-x-10">
            @if($is_default)
              <a href="/index3" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
              <a href="/product3" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
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
                <a href="/index3/{{ $headerFooterId }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
                <a href="/product3/{{ $headerFooterId }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
                <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Features</a>
                <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Categories</a>
                <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Collection</a>
                <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Contact</a>
              @else
                <a href="/index3" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
                <a href="/product3" class="text-base font-medium text-gray-500 hover:text-gray-900">Products</a>
                <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Features</a>
                <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Categories</a>
                <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Collection</a>
                <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} text-base font-medium text-gray-500 hover:text-gray-900">Contact</a>
              @endif
            @endif
        </nav>
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
          <a href="#" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
            Sign in
          </a>
          <a href="#" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700">
            Sign up
          </a>
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