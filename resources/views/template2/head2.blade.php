<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique Store</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Source Sans Pro', sans-serif;
      background-color: #f3f4f6;
      color: #1f2937;
    }
    .header {
        transition: background-color 0.3s ease;
    }
  </style>
</head>

<body>
  <!-- Top Navigation -->
  <header id="header" class="fixed top-0 left-0 right-0 z-50 text-white header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <div class="flex items-center">
                <a href="#" class="font-bold text-2xl">
                  @if($is_default)
                    BoutiqueStyle
                  @else
                    {{ $headerFooter->site_name }}
                  @endif
                </a>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    @if($is_default)
                      <a href="/index2" class="hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                      <a href="/product2" class="hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Products</a>
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
                        <a href="/index2/{{ $headerFooterId }}" class="hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/product2/{{ $headerFooterId }}" class="hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Products</a>
                        <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Features</a>
                        <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Categories</a>
                        <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Collection</a>
                        <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                      @else
                        <a href="/index2" class="hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/product2" class="hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Products</a>
                        <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Features</a>
                        <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Categories</a>
                        <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Collection</a>
                        <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-teal-400 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                      @endif
                    @endif
                </div>
            </div>
            <div class="flex items-center">
                <button class="p-1 rounded-full hover:text-teal-400 focus:outline-none">
                    <span class="sr-only">Search</span>
                    <i class="fas fa-search"></i>
                </button>
                <button onclick="openLoginModal()" class="ml-3 p-1 rounded-full hover:text-teal-400 focus:outline-none">
                    <span class="sr-only">Sign In</span>
                    <i class="fas fa-user"></i>
                </button>
                <button class="ml-3 p-1 rounded-full hover:text-teal-400 focus:outline-none">
                    <span class="sr-only">View cart</span>
                    <i class="fas fa-shopping-cart"></i>
                    <span class="absolute top-4 right-4 transform -translate-y-1/2 translate-x-1/2 bg-teal-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </button>
            </div>
        </div>
    </div>
  </header>
  <script>
      const header = document.getElementById('header');
      window.addEventListener('scroll', () => {
          if (window.scrollY > 50) {
              header.classList.add('bg-white', 'text-gray-800', 'shadow-lg');
          } else {
              header.classList.remove('bg-white', 'text-gray-800', 'shadow-lg');
          }
      });
  </script>
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

    // Check auth on page load
    document.addEventListener('DOMContentLoaded', checkAuthOnLoad);
  </script>