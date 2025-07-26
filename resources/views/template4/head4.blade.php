<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Luxuria | Golden Era Timepieces</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #faf9f7;
      color: #333;
    }
    h1, h2, h3, h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
    }
    .gold-underline {
      position: relative;
      display: inline-block;
    }
    .gold-underline:after {
      content: '';
      position: absolute;
      width: 60%;
      height: 1px;
      bottom: -5px;
      left: 0;
      background-color: #d4af37;
    }
    .watch-card {
      transition: all 0.3s ease;
      background-color: white;
    }
    .watch-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.05);
    }
    .gold-hover:hover {
      color: #d4af37;
    }
    .btn-gold {
      background-color: #d4af37;
      color: white;
      transition: all 0.3s ease;
    }
    .btn-gold:hover {
      background-color: #c19b2e;
      transform: translateY(-2px);
    }
    .btn-outline {
      border: 1px solid #333;
      transition: all 0.3s ease;
    }
    .btn-outline:hover {
      border-color: #d4af37;
      color: #d4af37;
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
      background-color: #d4af37;
      transition: width 0.3s ease;
    }
    .nav-link:hover:after {
      width: 100%;
    }
  </style>
</head>

<body class="bg-[#faf9f7]">
  <!-- Top Navigation -->
  <header class="py-6 px-6 bg-white/90 backdrop-blur-sm sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-semibold">
          @if($is_default)
            LuxuryTime
          @else
            {{ $headerFooter->site_name }}
          @endif</h1>
      <nav class="hidden md:flex space-x-8">
        @if($is_default)
          <a href="#" class="text-gray-700 nav-link transition">Home</a>
        @else
          <a href="#" class="text-gray-700 nav-link">Home</a>
          <a href="#" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }}  nav-link">Features</a>
          <a href="#" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }}  nav-link">Brands</a>
          <a href="#" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }}  nav-link">Collection</a>
          <a href="#" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }}  nav-link">Contact</a>
        @endif
      </nav>
      <div class="flex items-center space-x-6">
        <button class="text-gray-500 hover:text-[#d4af37]">
          <i class="fas fa-search"></i>
        </button>
        <button class="text-gray-500 hover:text-[#d4af37]">
          <i class="fas fa-user"></i>
        </button>
        <button class="text-gray-500 hover:text-[#d4af37] relative">
          <i class="fas fa-shopping-bag"></i>
          <span class="absolute -top-2 -right-2 bg-[#d4af37] text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">0</span>
        </button>
      </div>
    </div>
  </header>