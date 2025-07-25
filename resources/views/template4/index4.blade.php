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
      <h1 class="text-2xl font-semibold">LUXURIA</h1>
      <nav class="hidden md:flex space-x-8">
        <a href="#" class="nav-link text-gray-700">Home</a>
        <a href="#craftsmanship" class="nav-link text-gray-700">Craftsmanship</a>
        <a href="#brands" class="nav-link text-gray-700">Brands</a>
        <a href="#collection" class="nav-link text-gray-700">Collection</a>
        <a href="#contact" class="nav-link text-gray-700">Contact</a>
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

  <!-- Hero Section -->
  <section class="relative h-[90vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-white/80 via-white/30 to-transparent z-10"></div>
    <div class="absolute inset-0">
      <img src="https://img.freepik.com/premium-photo/luxury-gold-watch-dark-background-close-up_961829-13799.jpg" 
           alt="Luxury Gold Watch" 
           class="w-full h-full object-cover object-center">
    </div>
    <div class="relative max-w-7xl mx-auto px-6 z-20">
      <div class="max-w-xl">
        <h2 class="text-5xl font-semibold mb-6 leading-tight"><span class="gold-underline">Golden Era</span> Timepieces</h2>
        <p class="text-white mb-8">Where precision meets legacy in every golden detail</p>
        <div class="flex space-x-4">
          <button class="btn-gold px-8 py-3 rounded font-medium">
            Discover Collection
          </button>
          <button class="btn-outline px-8 py-3 rounded font-medium">
            Book Appointment
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Craftsmanship -->
  <section id="craftsmanship" class="py-20 px-6 bg-white">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-semibold mb-4">The <span class="text-[#d4af37]">Art</span> of Excellence</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">Each timepiece represents centuries of refined craftsmanship</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="p-8 text-center border-b border-[#d4af37]/20 hover:border-[#d4af37] transition-all duration-300">
          <div class="text-[#d4af37] text-3xl mb-6">
            <i class="fas fa-gem"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">Authenticity</h4>
          <p class="text-gray-600">Every watch undergoes our 12-point authentication by master watchmakers</p>
        </div>
        <div class="p-8 text-center border-b border-[#d4af37]/20 hover:border-[#d4af37] transition-all duration-300">
          <div class="text-[#d4af37] text-3xl mb-6">
            <i class="fas fa-crown"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">Heritage</h4>
          <p class="text-gray-600">Timepieces with storied histories from the world's most respected maisons</p>
        </div>
        <div class="p-8 text-center border-b border-[#d4af37]/20 hover:border-[#d4af37] transition-all duration-300">
          <div class="text-[#d4af37] text-3xl mb-6">
            <i class="fas fa-clock"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">Precision</h4>
          <p class="text-gray-600">Swiss-made movements with chronometer certification for unmatched accuracy</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Brands -->
  <section id="brands" class="py-20 px-6 bg-[#faf9f7]">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-semibold mb-4">Our <span class="text-[#d4af37]">Prestige</span> Partners</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">Representing the pinnacle of horological excellence</p>
      </div>
      <div class="grid grid-cols-3 md:grid-cols-6 gap-8">
        <div class="flex items-center justify-center p-6 hover:bg-white transition-all duration-300 rounded-lg">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Rolex_logo.svg/2560px-Rolex_logo.svg.png" 
               alt="Rolex" 
               class="h-8 opacity-80 hover:opacity-100 transition-all duration-300">
        </div>
        <div class="flex items-center justify-center p-6 hover:bg-white transition-all duration-300 rounded-lg">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Omega_Logo.svg/1200px-Omega_Logo.svg.png" 
               alt="Omega" 
               class="h-6 opacity-80 hover:opacity-100 transition-all duration-300">
        </div>
        <div class="flex items-center justify-center p-6 hover:bg-white transition-all duration-300 rounded-lg">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Patek_Philippe_Logo.svg/2560px-Patek_Philippe_Logo.svg.png" 
               alt="Patek Philippe" 
               class="h-8 opacity-80 hover:opacity-100 transition-all duration-300">
        </div>
        <div class="flex items-center justify-center p-6 hover:bg-white transition-all duration-300 rounded-lg">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Cartier_logo.svg/2560px-Cartier_logo.svg.png" 
               alt="Cartier" 
               class="h-6 opacity-80 hover:opacity-100 transition-all duration-300">
        </div>
        <div class="flex items-center justify-center p-6 hover:bg-white transition-all duration-300 rounded-lg">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/IWC_logo.svg/2560px-IWC_logo.svg.png" 
               alt="IWC" 
               class="h-6 opacity-80 hover:opacity-100 transition-all duration-300">
        </div>
        <div class="flex items-center justify-center p-6 hover:bg-white transition-all duration-300 rounded-lg">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Audemars_Piguet_Logo.svg/2560px-Audemars_Piguet_Logo.svg.png" 
               alt="Audemars Piguet" 
               class="h-6 opacity-80 hover:opacity-100 transition-all duration-300">
        </div>
      </div>
    </div>
  </section>

  <!-- Collection -->
  <section id="collection" class="py-20 px-6 bg-white">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-semibold mb-4">The <span class="text-[#d4af37]">Golden</span> Collection</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">Select timepieces for the discerning collector</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="watch-card p-6 rounded-lg border border-gray-100">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1099&q=80" 
                 alt="Rolex Submariner" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
            <span class="absolute top-4 right-4 bg-[#d4af37] text-white text-xs font-medium px-2 py-1 rounded">NEW</span>
          </div>
          <h4 class="font-semibold text-lg mb-1">Rolex Submariner</h4>
          <p class="text-gray-500 text-sm mb-3">Oystersteel, Ceramic Bezel</p>
          <p class="text-gray-900 font-semibold text-xl mb-4">$8,950.00</p>
          <button class="w-full btn-gold py-2 rounded font-medium">
            Add to Collection
          </button>
        </div>
        <div class="watch-card p-6 rounded-lg border border-gray-100">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                 alt="Omega Speedmaster" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
          </div>
          <h4 class="font-semibold text-lg mb-1">Omega Speedmaster</h4>
          <p class="text-gray-500 text-sm mb-3">Moonwatch Professional</p>
          <p class="text-gray-900 font-semibold text-xl mb-4">$6,300.00</p>
          <button class="w-full btn-gold py-2 rounded font-medium">
            Add to Collection
          </button>
        </div>
        <div class="watch-card p-6 rounded-lg border border-gray-100">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1611591437281-4608be122683?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                 alt="Patek Philippe Calatrava" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
            <span class="absolute top-4 right-4 bg-[#d4af37] text-white text-xs font-medium px-2 py-1 rounded">LIMITED</span>
          </div>
          <h4 class="font-semibold text-lg mb-1">Patek Philippe Calatrava</h4>
          <p class="text-gray-500 text-sm mb-3">White Gold, Hand-Guilloché</p>
          <p class="text-gray-900 font-semibold text-xl mb-4">$29,900.00</p>
          <button class="w-full btn-gold py-2 rounded font-medium">
            Add to Collection
          </button>
        </div>
        <div class="watch-card p-6 rounded-lg border border-gray-100">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1612817159949-195b6eb9e31a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                 alt="Cartier Tank" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
          </div>
          <h4 class="font-semibold text-lg mb-1">Cartier Tank Solo</h4>
          <p class="text-gray-500 text-sm mb-3">Stainless Steel, Black Leather</p>
          <p class="text-gray-900 font-semibold text-xl mb-4">$2,850.00</p>
          <button class="w-full btn-gold py-2 rounded font-medium">
            Add to Collection
          </button>
        </div>
      </div>
      <div class="text-center mt-12">
        <button class="btn-outline px-8 py-3 rounded font-medium">
          View Full Collection
        </button>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-20 px-6 bg-[#faf9f7]">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-semibold mb-4">Collector <span class="text-[#d4af37]">Testimonials</span></h3>
        <p class="text-gray-600 max-w-2xl mx-auto">Experiences from our community of horology enthusiasts</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-lg shadow-sm">
          <div class="flex mb-4">
            <div class="text-[#d4af37]">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-700 mb-6 italic">"The authentication process gave me complete confidence in my purchase. My Patek arrived in impeccable condition with all original papers."</p>
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
        <div class="bg-white p-8 rounded-lg shadow-sm">
          <div class="flex mb-4">
            <div class="text-[#d4af37]">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-700 mb-6 italic">"Exceptional service from start to finish. My consultant helped me find the perfect Rolex Daytona that I'd been searching for years."</p>
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
        <div class="bg-white p-8 rounded-lg shadow-sm">
          <div class="flex mb-4">
            <div class="text-[#d4af37]">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <p class="text-gray-700 mb-6 italic">"The after-sales service is unparalleled. When my watch needed servicing, they handled everything seamlessly."</p>
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
  <section id="contact" class="py-20 px-6 bg-white">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div>
        <h3 class="text-3xl font-semibold mb-6">Contact Our <span class="text-[#d4af37]">Concierge</span></h3>
        <p class="text-gray-600 mb-8">Our watch specialists are available to assist you with any inquiries about our collection or services.</p>
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="text-[#d4af37] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-phone"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Phone</h4>
              <p class="text-gray-600">+1 (888) 555-8888</p>
              <p class="text-sm text-gray-500">Mon-Fri: 9AM-9PM EST</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-[#d4af37] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Email</h4>
              <p class="text-gray-600">concierge@luxuria.com</p>
              <p class="text-sm text-gray-500">Response within 24 hours</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-[#d4af37] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Showroom</h4>
              <p class="text-gray-600">450 Park Avenue, New York</p>
              <p class="text-sm text-gray-500">By appointment only</p>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-[#faf9f7] p-8 rounded-lg border border-gray-100">
        <h4 class="text-xl font-semibold mb-6">Send Us a Message</h4>
        <form class="space-y-4">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" id="name" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#d4af37]">
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#d4af37]">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <textarea id="message" rows="4" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#d4af37]"></textarea>
          </div>
          <button type="submit" class="w-full btn-gold py-3 rounded font-medium">
            Send Message
          </button>
        </form>
      </div>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="py-16 px-6 bg-[#d4af37] text-white">
    <div class="max-w-4xl mx-auto text-center">
      <h3 class="text-3xl font-semibold mb-4">Join Our <span class="text-white">Collector's Circle</span></h3>
      <p class="text-white/90 mb-8 max-w-2xl mx-auto">Subscribe for exclusive access to limited editions and private events</p>
      <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
        <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded bg-white/90 text-gray-900 border border-white/30 focus:outline-none focus:ring-1 focus:ring-white">
        <button type="submit" class="bg-black hover:bg-gray-900 text-white px-6 py-3 rounded font-medium transition duration-300">
          Subscribe
        </button>
      </form>
      <p class="text-xs text-white/70 mt-4">We respect your privacy. Unsubscribe at any time.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-12 px-6 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <h4 class="text-xl font-semibold mb-4">LUXURIA</h4>
        <p class="text-gray-500 mb-4">The premier destination for discerning collectors of fine timepieces.</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-500 hover:text-[#d4af37]">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-500 hover:text-[#d4af37]">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-500 hover:text-[#d4af37]">
            <i class="fab fa-twitter"></i>
          </a>
        </div>
      </div>
      <div>
        <h5 class="font-semibold text-lg mb-4">Collections</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">New Arrivals</a></li>
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">Limited Editions</a></li>
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">Vintage Selection</a></li>
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">Investment Grade</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-semibold text-lg mb-4">Services</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">Authentication</a></li>
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">Valuation</a></li>
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">Servicing</a></li>
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">Trade-In</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-semibold text-lg mb-4">Company</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">About Us</a></li>
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">Our Experts</a></li>
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">Privacy Policy</a></li>
          <li><a href="#" class="text-gray-500 hover:text-[#d4af37]">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-gray-100 mt-12 pt-8 text-center text-gray-500">
      <p>&copy; 2025 Luxuria. All rights reserved.</p>
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