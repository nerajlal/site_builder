<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Luxury Watch Store</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      scroll-behavior: smooth;
    }
    .watch-shadow {
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
    <h1 class="text-2xl font-bold text-yellow-600 flex items-center">
      <i class="fas fa-crown mr-2"></i>
      @if($is_default)
        LuxuryTime
      @else
        {{ $headerFooter->site_name }}
      @endif
    </h1>
    <nav class="space-x-6 hidden md:flex">
      @if($is_default)
        <a href="#" class="text-gray-700 hover:text-yellow-600 transition">Home</a>
      @else
        <a href="/index1" class="text-gray-700 hover:text-yellow-600 transition">Home</a>
        <a href="#features" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Features</a>
        <a href="#categories" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Brands</a>
        <a href="#products" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Collection</a>
        <a href="#contact" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Contact</a>
      @endif
    </nav>

    <div class="flex items-center space-x-4">
      <button class="text-gray-700 hover:text-yellow-600 transition">
        <i class="fas fa-search"></i>
      </button>
      <button class="text-gray-700 hover:text-yellow-600 transition">
        <i class="fas fa-shopping-cart"></i>
      </button>
      <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded transition">Sign In</button>
      <!-- <button onclick="openLoginModal()" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded transition">Sign In</button> -->
    </div>
  </header>



  <!-- Login Modal -->






<script>
  function openLoginModal() {
    document.getElementById('loginModal').classList.remove('hidden');
    document.getElementById('loginModal').classList.add('flex');
  }

  function closeLoginModal() {
    document.getElementById('loginModal').classList.add('hidden');
  }
</script>
