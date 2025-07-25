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
          <i class="fas fa-clock text-white"></i>
        </div>
        <h1 class="text-2xl font-light tracking-wider">CHRONO<span class="font-bold">ELITE</span></h1>
      </div>
      <nav class="hidden md:flex space-x-8">
        <a href="#" class="nav-link text-gray-300 hover:text-white">Home</a>
        <a href="#features" class="nav-link text-gray-300 hover:text-white">Features</a>
        <a href="#brands" class="nav-link text-gray-300 hover:text-white">Brands</a>
        <a href="#collection" class="nav-link text-gray-300 hover:text-white">Collection</a>
        <a href="#contact" class="nav-link text-gray-300 hover:text-white">Contact</a>
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

  <!-- Hero Section -->
  <section class="relative h-screen flex items-center">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 flex items-center">
      <img src="https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
           alt="Luxury Watch" 
           class="w-full h-full object-cover object-center">
    </div>
    <div class="relative max-w-7xl mx-auto px-6 z-10">
      <div class="max-w-xl">
        <h2 class="text-5xl font-light mb-6 leading-tight">Precision Crafted <span class="font-medium">Masterpieces</span></h2>
        <p class="text-gray-300 mb-8">Experience the pinnacle of horological excellence with our curated selection of the world's finest timepieces.</p>
        <div class="flex space-x-4">
          <button class="bg-yellow-600 hover:bg-yellow-700 text-black px-8 py-3 font-medium transition duration-300">
            Explore Collection
          </button>
          <button class="border border-gray-400 hover:border-white text-white px-8 py-3 font-medium transition duration-300">
            Book Appointment
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section id="features" class="py-20 px-6 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">The <span class="font-medium">ChronoElite</span> Difference</h3>
        <p class="text-gray-400 max-w-2xl mx-auto">Why collectors worldwide trust us with their most prized timepieces</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-yellow-600 text-3xl mb-4">
            <i class="fas fa-certificate"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">Authenticity Guaranteed</h4>
          <p class="text-gray-400">Every watch undergoes our rigorous 12-point authentication process by master watchmakers.</p>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-yellow-600 text-3xl mb-4">
            <i class="fas fa-shield-alt"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">Extended Warranty</h4>
          <p class="text-gray-400">5-year comprehensive warranty covering all mechanical components and servicing.</p>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-yellow-600 text-3xl mb-4">
            <i class="fas fa-headset"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">24/7 Concierge</h4>
          <p class="text-gray-400">Dedicated personal consultants available around the clock for your needs.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Brands -->
  <section id="brands" class="py-20 px-6 bg-black">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">Our <span class="font-medium">Prestige</span> Partners</h3>
        <p class="text-gray-400 max-w-2xl mx-auto">Representing the most exclusive names in haute horlogerie</p>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-6 gap-8">
        <div class="flex items-center justify-center p-6">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Rolex_logo.svg/2560px-Rolex_logo.svg.png" 
               alt="Rolex" 
               class="brand-logo h-8">
        </div>
        <div class="flex items-center justify-center p-6">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Omega_Logo.svg/1200px-Omega_Logo.svg.png" 
               alt="Omega" 
               class="brand-logo h-6">
        </div>
        <div class="flex items-center justify-center p-6">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Patek_Philippe_Logo.svg/2560px-Patek_Philippe_Logo.svg.png" 
               alt="Patek Philippe" 
               class="brand-logo h-8">
        </div>
        <div class="flex items-center justify-center p-6">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Cartier_logo.svg/2560px-Cartier_logo.svg.png" 
               alt="Cartier" 
               class="brand-logo h-6">
        </div>
        <div class="flex items-center justify-center p-6">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/IWC_logo.svg/2560px-IWC_logo.svg.png" 
               alt="IWC" 
               class="brand-logo h-6">
        </div>
        <div class="flex items-center justify-center p-6">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Audemars_Piguet_Logo.svg/2560px-Audemars_Piguet_Logo.svg.png" 
               alt="Audemars Piguet" 
               class="brand-logo h-6">
        </div>
      </div>
    </div>
  </section>

  <!-- Collection -->
  <section id="collection" class="py-20 px-6 bg-gray-900">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">Curated <span class="font-medium">Collection</span></h3>
        <p class="text-gray-400 max-w-2xl mx-auto">Exceptional timepieces for the discerning collector</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="watch-card bg-black p-6 border border-gray-800 rounded-lg">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1099&q=80" 
                 alt="Rolex Submariner" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            <span class="absolute top-4 right-4 bg-yellow-600 text-black text-xs font-medium px-2 py-1 rounded">NEW</span>
          </div>
          <h4 class="font-medium text-lg mb-1">Rolex Submariner</h4>
          <p class="text-gray-400 text-sm mb-3">Oystersteel, Ceramic Bezel</p>
          <p class="text-yellow-600 font-medium text-xl mb-4">$8,950.00</p>
          <button class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-lg font-medium transition duration-300">
            Add to Collection
          </button>
        </div>
        <div class="watch-card bg-black p-6 border border-gray-800 rounded-lg">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                 alt="Omega Speedmaster" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
          </div>
          <h4 class="font-medium text-lg mb-1">Omega Speedmaster</h4>
          <p class="text-gray-400 text-sm mb-3">Moonwatch Professional</p>
          <p class="text-yellow-600 font-medium text-xl mb-4">$6,300.00</p>
          <button class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-lg font-medium transition duration-300">
            Add to Collection
          </button>
        </div>
        <div class="watch-card bg-black p-6 border border-gray-800 rounded-lg">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1611591437281-4608be122683?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                 alt="Patek Philippe Calatrava" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            <span class="absolute top-4 right-4 bg-red-600 text-white text-xs font-medium px-2 py-1 rounded">LIMITED</span>
          </div>
          <h4 class="font-medium text-lg mb-1">Patek Philippe Calatrava</h4>
          <p class="text-gray-400 text-sm mb-3">White Gold, Hand-Guilloché</p>
          <p class="text-yellow-600 font-medium text-xl mb-4">$29,900.00</p>
          <button class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-lg font-medium transition duration-300">
            Add to Collection
          </button>
        </div>
        <div class="watch-card bg-black p-6 border border-gray-800 rounded-lg">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1612817159949-195b6eb9e31a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                 alt="Cartier Tank" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
          </div>
          <h4 class="font-medium text-lg mb-1">Cartier Tank Solo</h4>
          <p class="text-gray-400 text-sm mb-3">Stainless Steel, Black Leather</p>
          <p class="text-yellow-600 font-medium text-xl mb-4">$2,850.00</p>
          <button class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-lg font-medium transition duration-300">
            Add to Collection
          </button>
        </div>
      </div>
      <div class="text-center mt-12">
        <button class="border border-gray-600 hover:border-white text-white px-8 py-3 rounded-lg font-medium transition duration-300">
          View Full Collection
        </button>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-20 px-6 bg-black">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">Collector <span class="font-medium">Testimonials</span></h3>
        <p class="text-gray-400 max-w-2xl mx-auto">What our distinguished clients say about their ChronoElite experience</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="flex mb-4">
            <div class="text-yellow-500">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-300 mb-6 italic">"The authentication process gave me complete confidence in my purchase. My Patek arrived in impeccable condition with all original papers."</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">James Wilson</h5>
              <p class="text-gray-500 text-sm">Collector since 2015</p>
            </div>
          </div>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="flex mb-4">
            <div class="text-yellow-500">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-300 mb-6 italic">"Exceptional service from start to finish. My consultant helped me find the perfect Rolex Daytona that I'd been searching for years."</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">Sarah Johnson</h5>
              <p class="text-gray-500 text-sm">Collector since 2018</p>
            </div>
          </div>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="flex mb-4">
            <div class="text-yellow-500">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <p class="text-gray-300 mb-6 italic">"The after-sales service is unparalleled. When my watch needed servicing, ChronoElite handled everything seamlessly."</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">Michael Chen</h5>
              <p class="text-gray-500 text-sm">Collector since 2012</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="py-20 px-6 bg-gray-900">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div>
        <h3 class="text-3xl font-light mb-6">Contact Our <span class="font-medium">Concierge</span></h3>
        <p class="text-gray-400 mb-8">Our watch specialists are available to assist you with any inquiries about our collection, authentication process, or purchasing experience.</p>
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="text-yellow-600 text-xl w-10 mr-4 mt-1">
              <i class="fas fa-phone"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Phone</h4>
              <p class="text-gray-400">+1 (888) 555-8888</p>
              <p class="text-sm text-gray-500">Mon-Fri: 9AM-9PM EST</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-yellow-600 text-xl w-10 mr-4 mt-1">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Email</h4>
              <p class="text-gray-400">concierge@chronoelite.com</p>
              <p class="text-sm text-gray-500">Response within 24 hours</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-yellow-600 text-xl w-10 mr-4 mt-1">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Boutique</h4>
              <p class="text-gray-400">450 Park Avenue, New York</p>
              <p class="text-sm text-gray-500">By appointment only</p>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-black p-8 border border-gray-800 rounded-lg">
        <h4 class="text-xl font-medium mb-6">Send Us a Message</h4>
        <form class="space-y-4">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-400 mb-1">Name</label>
            <input type="text" id="name" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-600">
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-400 mb-1">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-600">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-400 mb-1">Message</label>
            <textarea id="message" rows="4" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-600"></textarea>
          </div>
          <button type="submit" class="w-full bg-yellow-600 hover:bg-yellow-700 text-black py-3 rounded-lg font-medium transition duration-300">
            Send Message
          </button>
        </form>
      </div>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="py-16 px-6 bg-gradient-to-r from-gray-900 to-black">
    <div class="max-w-4xl mx-auto text-center">
      <h3 class="text-3xl font-light mb-4">Join Our <span class="font-medium">Collector's Circle</span></h3>
      <p class="text-gray-400 mb-8 max-w-2xl mx-auto">Subscribe for exclusive access to limited editions, private viewings, and horological insights.</p>
      <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
        <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-1 focus:ring-yellow-600">
        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-black px-6 py-3 rounded-lg font-medium transition duration-300">
          Subscribe
        </button>
      </form>
      <p class="text-xs text-gray-500 mt-4">We respect your privacy. Unsubscribe at any time.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black py-12 px-6 border-t border-gray-800">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <div class="flex items-center mb-4">
          <div class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-600 to-yellow-800 flex items-center justify-center mr-3">
            <i class="fas fa-clock text-white"></i>
          </div>
          <h4 class="text-xl font-light tracking-wider">CHRONO<span class="font-bold">ELITE</span></h4>
        </div>
        <p class="text-gray-500 mb-4">The premier destination for discerning collectors of fine timepieces.</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-500 hover:text-white">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-500 hover:text-white">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-500 hover:text-white">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-500 hover:text-white">
            <i class="fab fa-pinterest-p"></i>
          </a>
        </div>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Collections</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-500 hover:text-white transition">New Arrivals</a></li>
          <li><a href="#" class="text-gray-500 hover:text-white transition">Limited Editions</a></li>
          <li><a href="#" class="text-gray-500 hover:text-white transition">Vintage Selection</a></li>
          <li><a href="#" class="text-gray-500 hover:text-white transition">Investment Grade</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Services</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-500 hover:text-white transition">Authentication</a></li>
          <li><a href="#" class="text-gray-500 hover:text-white transition">Valuation</a></li>
          <li><a href="#" class="text-gray-500 hover:text-white transition">Servicing</a></li>
          <li><a href="#" class="text-gray-500 hover:text-white transition">Trade-In</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Company</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-500 hover:text-white transition">About Us</a></li>
          <li><a href="#" class="text-gray-500 hover:text-white transition">Our Experts</a></li>
          <li><a href="#" class="text-gray-500 hover:text-white transition">Privacy Policy</a></li>
          <li><a href="#" class="text-gray-500 hover:text-white transition">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
      <p>&copy; 2025 ChronoElite. All rights reserved. ChronoElite is not affiliated with any watch manufacturers.</p>
    </div>
  </footer>

  <script>
    // Simple animation for testimonial stars
    document.querySelectorAll('.fa-star').forEach(star => {
      star.addEventListener('mouseover', () => {
        star.style.transform = 'scale(1.2)';
        star.style.transition = 'transform 0.2s ease';
      });
      star.addEventListener('mouseout', () => {
        star.style.transform = 'scale(1)';
      });
    });
  </script>
</body>

</html>