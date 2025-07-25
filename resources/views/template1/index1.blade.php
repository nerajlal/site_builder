@include('template1.head1')

  <!-- Hero Banner -->
  <section class="relative bg-gray-900 text-white py-24 text-center overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4">
      <h2 class="text-5xl font-bold mb-6">Precision Crafted Luxury Timepieces</h2>
      <p class="text-xl mb-8">Experience the pinnacle of Swiss watchmaking excellence</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-8 py-3 rounded-lg font-medium transition">
          Discover Collection <i class="fas fa-arrow-right ml-2"></i>
        </button>
        <button class="bg-transparent hover:bg-white hover:text-gray-900 border-2 border-white text-white px-8 py-3 rounded-lg font-medium transition">
          Book Consultation
        </button>
      </div>
    </div>
    <img src="https://images.unsplash.com/photo-1523170335258-f5ed11844a49?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80" alt="Luxury Watch" class="absolute inset-0 w-full h-full object-cover">
  </section>

  <!-- Features -->
  <section id="features" class="py-20 px-6 bg-white">
    <div class="text-center mb-16">
      <h3 class="text-3xl font-bold mb-4">The LuxuryTime Difference</h3>
      <p class="max-w-2xl mx-auto text-gray-600">Why discerning collectors choose our curated selection of timepieces</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <div class="text-center p-8 rounded-lg watch-shadow">
        <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
          <i class="fas fa-gem text-yellow-600 text-2xl"></i>
        </div>
        <h4 class="text-xl font-semibold mb-3">Authenticity Guaranteed</h4>
        <p class="text-gray-600">Every watch undergoes rigorous authentication by our Swiss-trained experts.</p>
      </div>
      <div class="text-center p-8 rounded-lg watch-shadow">
        <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
          <i class="fas fa-shield-alt text-yellow-600 text-2xl"></i>
        </div>
        <h4 class="text-xl font-semibold mb-3">Extended Warranty</h4>
        <p class="text-gray-600">3-year comprehensive warranty on all purchases for complete peace of mind.</p>
      </div>
      <div class="text-center p-8 rounded-lg watch-shadow">
        <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
          <i class="fas fa-headset text-yellow-600 text-2xl"></i>
        </div>
        <h4 class="text-xl font-semibold mb-3">Concierge Service</h4>
        <p class="text-gray-600">Dedicated personal consultants for bespoke shopping experiences.</p>
      </div>
    </div>
  </section>

  <!-- Categories -->
  <section id="categories" class="py-20 px-6 bg-gray-50">
    <div class="text-center mb-16">
      <h3 class="text-3xl font-bold mb-4">Our Prestigious Brands</h3>
      <p class="max-w-2xl mx-auto text-gray-600">Partnering with the most revered names in horology</p>
    </div>
    <div class="flex flex-wrap justify-center gap-8 max-w-6xl mx-auto">
      <div class="bg-white p-6 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Rolex_logo.svg/2560px-Rolex_logo.svg.png" alt="Rolex" class="h-12">
      </div>
      <div class="bg-white p-6 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Omega_Logo.svg/1200px-Omega_Logo.svg.png" alt="Omega" class="h-8">
      </div>
      <div class="bg-white p-6 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Patek_Philippe_Logo.svg/2560px-Patek_Philippe_Logo.svg.png" alt="Patek Philippe" class="h-10">
      </div>
      <div class="bg-white p-6 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Cartier_logo.svg/2560px-Cartier_logo.svg.png" alt="Cartier" class="h-8">
      </div>
      <div class="bg-white p-6 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/IWC_logo.svg/2560px-IWC_logo.svg.png" alt="IWC" class="h-8">
      </div>
      <div class="bg-white p-6 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Audemars_Piguet_Logo.svg/2560px-Audemars_Piguet_Logo.svg.png" alt="Audemars Piguet" class="h-8">
      </div>
    </div>
  </section>

  <!-- Products -->
  <section id="products" class="py-20 px-6 bg-white">
    <div class="text-center mb-16">
      <h3 class="text-3xl font-bold mb-4">Curated Collections</h3>
      <p class="max-w-2xl mx-auto text-gray-600">Exceptional timepieces for the discerning collector</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
      <div class="bg-white p-6 rounded-lg product-card watch-shadow">
        <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
          <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1099&q=80" alt="Rolex Submariner" class="absolute inset-0 w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
          <span class="absolute top-4 right-4 bg-yellow-600 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
        </div>
        <h4 class="font-semibold text-lg mb-1">Rolex Submariner</h4>
        <p class="text-gray-600 text-sm mb-3">Oystersteel, Ceramic Bezel</p>
        <p class="text-green-700 font-bold text-xl mb-4">$8,950.00</p>
        <button class="w-full bg-gray-900 hover:bg-gray-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
          <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
        </button>
      </div>
      <div class="bg-white p-6 rounded-lg product-card watch-shadow">
        <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
          <img src="https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Omega Speedmaster" class="absolute inset-0 w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
        </div>
        <h4 class="font-semibold text-lg mb-1">Omega Speedmaster</h4>
        <p class="text-gray-600 text-sm mb-3">Moonwatch Professional</p>
        <p class="text-green-700 font-bold text-xl mb-4">$6,300.00</p>
        <button class="w-full bg-gray-900 hover:bg-gray-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
          <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
        </button>
      </div>
      <div class="bg-white p-6 rounded-lg product-card watch-shadow">
        <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
          <img src="https://images.unsplash.com/photo-1611591437281-4608be122683?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Patek Philippe Calatrava" class="absolute inset-0 w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
          <span class="absolute top-4 right-4 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded">LIMITED</span>
        </div>
        <h4 class="font-semibold text-lg mb-1">Patek Philippe Calatrava</h4>
        <p class="text-gray-600 text-sm mb-3">White Gold, Hand-Guilloché</p>
        <p class="text-green-700 font-bold text-xl mb-4">$29,900.00</p>
        <button class="w-full bg-gray-900 hover:bg-gray-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
          <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
        </button>
      </div>
      <div class="bg-white p-6 rounded-lg product-card watch-shadow">
        <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
          <img src="https://images.unsplash.com/photo-1612817159949-195b6eb9e31a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Cartier Tank" class="absolute inset-0 w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
        </div>
        <h4 class="font-semibold text-lg mb-1">Cartier Tank Solo</h4>
        <p class="text-gray-600 text-sm mb-3">Stainless Steel, Black Leather</p>
        <p class="text-green-700 font-bold text-xl mb-4">$2,850.00</p>
        <button class="w-full bg-gray-900 hover:bg-gray-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
          <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
        </button>
      </div>
    </div>
    <div class="text-center mt-12">
      <button class="bg-transparent hover:bg-gray-900 text-gray-900 hover:text-white border-2 border-gray-900 px-8 py-3 rounded-lg font-medium transition">
        View Full Collection <i class="fas fa-arrow-right ml-2"></i>
      </button>
    </div>
  </section>

  <!-- Promo Banner -->
  <section class="py-16 px-6 bg-gray-900 text-white">
    <div class="max-w-6xl mx-auto bg-gradient-to-r from-yellow-600 to-yellow-800 rounded-xl p-12 text-center relative overflow-hidden">
      <div class="absolute -right-20 -top-20 w-64 h-64 bg-yellow-400 rounded-full opacity-20"></div>
      <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-yellow-400 rounded-full opacity-20"></div>
      <div class="relative z-10">
        <h3 class="text-3xl font-bold mb-4">Exclusive Limited Edition</h3>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Discover our rare collector's pieces with complimentary authentication and premium gift packaging</p>
        <button class="bg-black hover:bg-gray-900 text-white px-8 py-3 rounded-lg font-medium transition">
          Explore Limited Editions <i class="fas fa-arrow-right ml-2"></i>
        </button>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-20 px-6 bg-white">
    <div class="text-center mb-16">
      <h3 class="text-3xl font-bold mb-4">Client Testimonials</h3>
      <p class="max-w-2xl mx-auto text-gray-600">What our discerning clients say about their LuxuryTime experience</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <div class="bg-gray-50 p-8 rounded-lg watch-shadow">
        <div class="flex items-center mb-4">
          <div class="text-yellow-500 text-xl mr-2">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
        <p class="text-gray-700 mb-6">"The authentication process gave me complete confidence in my purchase. My Patek arrived in impeccable condition with all original papers."</p>
        <div class="flex items-center">
          <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="w-full h-full object-cover">
          </div>
          <div>
            <h5 class="font-semibold">James Wilson</h5>
            <p class="text-gray-600 text-sm">Collector since 2015</p>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 p-8 rounded-lg watch-shadow">
        <div class="flex items-center mb-4">
          <div class="text-yellow-500 text-xl mr-2">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
        <p class="text-gray-700 mb-6">"Exceptional service from start to finish. My consultant helped me find the perfect Rolex Daytona that I'd been searching for years."</p>
        <div class="flex items-center">
          <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="w-full h-full object-cover">
          </div>
          <div>
            <h5 class="font-semibold">Sarah Johnson</h5>
            <p class="text-gray-600 text-sm">Collector since 2018</p>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 p-8 rounded-lg watch-shadow">
        <div class="flex items-center mb-4">
          <div class="text-yellow-500 text-xl mr-2">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </div>
        <p class="text-gray-700 mb-6">"The after-sales service is unparalleled. When my watch needed servicing, LuxuryTime handled everything seamlessly."</p>
        <div class="flex items-center">
          <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Client" class="w-full h-full object-cover">
          </div>
          <div>
            <h5 class="font-semibold">Michael Chen</h5>
            <p class="text-gray-600 text-sm">Collector since 2012</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-20 px-6 bg-gray-50">
    <div class="max-w-4xl mx-auto">
      <h3 class="text-3xl font-bold text-center mb-12">Frequently Asked Questions</h3>
      <div class="space-y-4">
        <div class="border-b border-gray-200 pb-4">
          <button class="flex justify-between items-center w-full text-left font-semibold text-lg">
            <span>How do you ensure the authenticity of your watches?</span>
            <i class="fas fa-chevron-down text-yellow-600 transition-transform duration-300"></i>
          </button>
          <div class="mt-2 text-gray-600">
            <p>Every timepiece undergoes a rigorous 12-point inspection by our Swiss-trained watchmakers. We verify movement, case, dial, hands, crown, bracelet, serial numbers, and accompanying documentation. Only after passing all checks do we certify a watch as authentic.</p>
          </div>
        </div>
        <div class="border-b border-gray-200 pb-4">
          <button class="flex justify-between items-center w-full text-left font-semibold text-lg">
            <span>What payment methods do you accept?</span>
            <i class="fas fa-chevron-down text-yellow-600 transition-transform duration-300"></i>
          </button>
          <div class="mt-2 text-gray-600">
            <p>We accept all major credit cards (Visa, Mastercard, American Express), bank transfers, and secure payment platforms like PayPal. For high-value purchases, we also offer installment plans through our financing partners.</p>
          </div>
        </div>
        <div class="border-b border-gray-200 pb-4">
          <button class="flex justify-between items-center w-full text-left font-semibold text-lg">
            <span>Do you offer international shipping?</span>
            <i class="fas fa-chevron-down text-yellow-600 transition-transform duration-300"></i>
          </button>
          <div class="mt-2 text-gray-600">
            <p>Yes, we ship worldwide via insured, trackable courier services. All international shipments include proper customs documentation. Import duties and taxes are the responsibility of the recipient and vary by destination country.</p>
          </div>
        </div>
        <div class="border-b border-gray-200 pb-4">
          <button class="flex justify-between items-center w-full text-left font-semibold text-lg">
            <span>What is your return policy?</span>
            <i class="fas fa-chevron-down text-yellow-600 transition-transform duration-300"></i>
          </button>
          <div class="mt-2 text-gray-600">
            <p>We offer a 14-day return policy for unworn watches in their original condition with all packaging and documentation intact. Special orders and limited editions may be exempt from returns. Please contact our concierge for return authorization.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-20 px-6 bg-white">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
      <div>
        <h3 class="text-3xl font-bold mb-6">Contact Our Concierge</h3>
        <p class="text-gray-600 mb-8">Our watch specialists are available to assist you with any inquiries about our collection, authentication process, or purchasing experience.</p>
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-phone text-yellow-600"></i>
            </div>
            <div>
              <h4 class="font-semibold mb-1">Phone</h4>
              <p class="text-gray-600">+1 (888) 555-8888</p>
              <p class="text-sm text-gray-500">Mon-Fri: 9AM-9PM EST</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-envelope text-yellow-600"></i>
            </div>
            <div>
              <h4 class="font-semibold mb-1">Email</h4>
              <p class="text-gray-600">concierge@luxurytime.com</p>
              <p class="text-sm text-gray-500">Response within 24 hours</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-map-marker-alt text-yellow-600"></i>
            </div>
            <div>
              <h4 class="font-semibold mb-1">Boutique</h4>
              <p class="text-gray-600">450 Park Avenue, New York</p>
              <p class="text-sm text-gray-500">By appointment only</p>
            </div>
          </div>
        </div>
      </div>
      <div>
        <form class="bg-gray-50 p-8 rounded-lg watch-shadow">
          <h4 class="text-xl font-semibold mb-6">Send Us a Message</h4>
          <div class="space-y-4">
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
              <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-600 focus:border-transparent">
            </div>
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
              <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-600 focus:border-transparent">
            </div>
            <div>
              <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone (Optional)</label>
              <input type="tel" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-600 focus:border-transparent">
            </div>
            <div>
              <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
              <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-600 focus:border-transparent"></textarea>
            </div>
            <button type="submit" class="w-full bg-gray-900 hover:bg-gray-800 text-white py-3 rounded-lg font-medium transition">
              Send Message <i class="fas fa-paper-plane ml-2"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="py-16 px-6 bg-gray-900 text-white">
    <div class="max-w-4xl mx-auto text-center">
      <h3 class="text-3xl font-bold mb-4">Join Our Collector's Circle</h3>
      <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Subscribe to receive exclusive access to limited editions, private viewings, and horological insights.</p>
      <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
        <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-600">
        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-3 rounded-lg font-medium transition">
          Subscribe
        </button>
      </form>
      <p class="text-xs text-gray-400 mt-4">We respect your privacy. Unsubscribe at any time.</p>
    </div>
  </section>

  @include('template1.footer1')