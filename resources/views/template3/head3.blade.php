<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horologe | Luxury Timepieces</title>
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
      background-color: #333;
      transition: width 0.3s ease;
    }
    .nav-link:hover:after {
      width: 100%;
    }
    .watch-card {
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      background-color: #fff;
    }
    .watch-card:hover {
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

<body class="bg-[#f9f9f7]">
  <!-- Top Navigation -->
  <header class="py-6 px-6 bg-white/80 backdrop-blur-sm sticky top-0 z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-medium">
        @if($is_default)
            LuxuryTime
          @else
            {{ $headerFooter->site_name }}
          @endif</h1>
      <nav class="hidden md:flex space-x-8">
        @if($is_default)
          <a href="#" class="text-gray-700 nav-link transition">Home</a>
        @else
          <a href="/index3" class="text-gray-700 nav-link">Home</a>
          <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }}  nav-link">Features</a>
          <a href="#brands" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }}  nav-link">Brands</a>
          <a href="#collection" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }}  nav-link">Collection</a>
          <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }}  nav-link">Contact</a>
        @endif
      </nav>
      <div class="flex items-center space-x-6">
        <button class="text-gray-500 hover:text-gray-900">
          <i class="fas fa-search"></i>
        </button>
        <button class="text-gray-500 hover:text-gray-900">
          <i class="fas fa-user"></i>
        </button>
        <button class="text-gray-500 hover:text-gray-900 relative">
          <i class="fas fa-shopping-bag"></i>
          <span class="absolute -top-2 -right-2 bg-gray-900 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">0</span>
        </button>
      </div>
    </div>
  </header>