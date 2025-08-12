<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Luxury Watch Store</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
      background-color: #d4af37;
      transition: width 0.3s ease;
    }
    .nav-link:hover:after {
      width: 100%;
    }
    .watch-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .watch-card:hover {
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
        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-600 to-yellow-800 flex items-center justify-center mr-3">
          <i class="fas fa-crown text-white"></i>
        </div>
        <span>
          <h1 class="text-2xl font-light tracking-wider"> 
          @if($is_default)
            LuxuryTime
          @else
            {{ $headerFooter->site_name }}
          @endif </h1>
        </span>
      </div>
      <nav class="hidden md:flex space-x-8">
        @if($is_default)
          <a href="#" class="text-gray-700 hover:text-yellow-600 transition">Home</a>
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
            <a href="/index2/{{ $headerFooterId }}" class="text-gray-700 hover:text-yellow-600 transition">Home</a>
            <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Features</a>
            <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Brands</a>
            <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Collection</a>
            <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Contact</a>
          @else
            <a href="/index2" class="text-gray-700 hover:text-yellow-600 transition">Home</a>
            <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Features</a>
            <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Brands</a>
            <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Collection</a>
            <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Contact</a>
          @endif
        @endif
      </nav>
      <div class="flex items-center space-x-4">
        <button class="text-gray-400 hover:text-white">
          <i class="fas fa-search"></i>
        </button>
        <button class="text-gray-400 hover:text-white">
          <i class="fas fa-user"></i>
        </button>
        <button class="text-gray-400 hover:text-white relative">
          <i class="fas fa-shopping-bag"></i>
          <span class="absolute -top-2 -right-2 bg-yellow-600 text-black text-xs w-5 h-5 flex items-center justify-center rounded-full">0</span>
        </button>
      </div>
    </div>
  </header>