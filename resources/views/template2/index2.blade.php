@include('template2.head2')

<!-- Hero Section -->
@if($is_default)
  <section class="relative h-screen flex items-center">
    <div class="absolute inset-0 bg-black opacity-60"></div>
    <div class="absolute inset-0 flex items-center">
      <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80" 
           alt="Luxury Fashion" 
           class="w-full h-full object-cover object-center">
    </div>
    <div class="relative max-w-7xl mx-auto px-6 z-10">
      <div class="max-w-xl">
        <h2 class="text-5xl font-light mb-6 leading-tight">Exclusive <span class="font-medium">Fashion</span> Collection</h2>
        <p class="text-gray-300 mb-8">Discover our curated selection of premium fashion pieces that define luxury and elegance.</p>
        <div class="flex space-x-4">
          <button class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 font-medium transition duration-300">
            Shop Collection
          </button>
          <button class="border border-gray-400 hover:border-white text-white px-8 py-3 font-medium transition duration-300">
            Book Styling
          </button>
        </div>
      </div>
    </div>
  </section>
@else
  <section class="relative h-screen flex items-center">
    <div class="absolute inset-0 bg-black opacity-60"></div>
    <div class="absolute inset-0 flex items-center">
      <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80" 
           alt="Luxury Fashion" 
           class="w-full h-full object-cover object-center">
    </div>
    <div class="relative max-w-7xl mx-auto px-6 z-10">
      <div class="max-w-xl">
        <h2 class="text-5xl font-light mb-6 leading-tight">{{ $homesetting->main_text }}</h2>
        <p class="text-gray-300 mb-8">{{ $homesetting->sub_text }}</p>
        @php
          $currentUrl = request()->url();
          $headerFooterId = null;
          if (preg_match('/\/index2\/(\d+)/', $currentUrl, $matches)) {
            $headerFooterId = $matches[1];
          }
        @endphp
        
        <div class="flex space-x-4">
          @if($headerFooterId)
            <button class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 font-medium transition duration-300" onclick="window.location.href='/product2/{{ $headerFooterId }}'">
              {{ $homesetting->button1_text }}
            </button>
            <button class="border border-gray-400 hover:border-white text-white px-8 py-3 font-medium transition duration-300" onclick="window.location.href='/product2/{{ $headerFooterId }}'">
              {{ $homesetting->button2_text }}
            </button>
          @else
            <button class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 font-medium transition duration-300" onclick="window.location.href='/product2'">
              {{ $homesetting->button1_text }}
            </button>
            <button class="border border-gray-400 hover:border-white text-white px-8 py-3 font-medium transition duration-300" onclick="window.location.href='/product2'">
              {{ $homesetting->button2_text }}
            </button>
          @endif
        </div>
      </div>
    </div>
  </section>
@endif

<!-- Features -->
@if($is_default)
  <section id="features" class="py-20 px-6 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">The <span class="font-medium">BoutiqueElite</span> Experience</h3>
        <p class="text-gray-400 max-w-2xl mx-auto">Why fashion enthusiasts choose our exclusive boutique collection</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-pink-600 text-3xl mb-4">
            <i class="fas fa-star"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">Premium Quality</h4>
          <p class="text-gray-400">Every piece is carefully selected for its exceptional quality and timeless design.</p>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-pink-600 text-3xl mb-4">
            <i class="fas fa-magic"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">Personal Styling</h4>
          <p class="text-gray-400">Expert fashion consultants provide personalized styling advice for every occasion.</p>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-pink-600 text-3xl mb-4">
            <i class="fas fa-shipping-fast"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">Express Delivery</h4>
          <p class="text-gray-400">Fast and secure shipping with complimentary returns for your convenience.</p>
        </div>
      </div>
    </div>
  </section>
@else
  <section id="features" class="py-20 px-6 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">{{ $section1->main_heading }}</h3>
        <p class="text-gray-400 max-w-2xl mx-auto">{{ $section1->sub_heading }}</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-pink-600 text-3xl mb-4">
            <i class="fas fa-star"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">{{ $section1->feature1_heading }}</h4>
          <p class="text-gray-400">{{ $section1->feature1_detail }}</p>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-pink-600 text-3xl mb-4">
            <i class="fas fa-magic"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">{{ $section1->feature2_heading }}</h4>
          <p class="text-gray-400">{{ $section1->feature2_detail }}</p>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-pink-600 text-3xl mb-4">
            <i class="fas fa-shipping-fast"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">{{ $section1->feature3_heading }}</h4>
          <p class="text-gray-400">{{ $section1->feature3_detail }}</p>
        </div>
      </div>
    </div>
  </section>
@endif

<!-- Categories -->
<section id="brands" class="py-20 px-6 bg-black">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-16">
      <h3 class="text-3xl font-light mb-4">
        <span class="font-medium">Fashion Categories</span>
      </h3>
      <p class="text-gray-400 max-w-2xl mx-auto">
        Explore our curated collection of premium fashion categories
      </p>
    </div>
    <div class="grid grid-cols-3 gap-8">
      <!-- Category Item -->
      <div class="flex flex-col items-center justify-center p-6">
        <div class="w-40 h-40 rounded-lg bg-white overflow-hidden">
          <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
              alt="Women's Fashion"
              class="w-full h-full object-cover">
        </div>
        <p class="text-center mt-4 text-lg font-medium">Women</p>
      </div>

      <div class="flex flex-col items-center justify-center p-6">
        <div class="w-40 h-40 rounded-lg bg-white overflow-hidden">
          <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
              alt="Men's Fashion"
              class="w-full h-full object-cover">
        </div>
        <p class="text-center mt-4 text-lg font-medium">Men</p>
      </div>

      <div class="flex flex-col items-center justify-center p-6">
        <div class="w-40 h-40 rounded-lg bg-white overflow-hidden">
          <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
              alt="Kids' Fashion"
              class="w-full h-full object-cover">
        </div>
        <p class="text-center mt-4 text-lg font-medium">Kids</p>
      </div>
    </div>
  </div>
</section>


<!-- Collection -->
@if($is_default)
  <section id="collection" class="py-20 px-6 bg-gray-900">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">Featured <span class="font-medium">Collection</span></h3>
        <p class="text-gray-400 max-w-2xl mx-auto">Handpicked fashion pieces for the discerning collector</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Fashion Product Cards -->
        <div class="product-card bg-black p-6 border border-gray-800 rounded-lg">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=705&q=80" alt="Elegant Dress" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            <span class="absolute top-4 right-4 bg-pink-600 text-white text-xs font-medium px-2 py-1 rounded">NEW</span>
          </div>
          <h4 class="font-medium text-lg mb-1">Elegant Evening Dress</h4>
          <p class="text-gray-400 text-sm mb-3">Sophisticated design for special occasions</p>
          <p class="text-pink-600 font-medium text-xl mb-4">$299.99</p>
          <button class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-lg font-medium transition duration-300">
            Add to Collection
          </button>
        </div>

        <div class="product-card bg-black p-6 border border-gray-800 rounded-lg">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Designer Heels" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            <span class="absolute top-4 right-4 bg-pink-600 text-white text-xs font-medium px-2 py-1 rounded">LIMITED</span>
          </div>
          <h4 class="font-medium text-lg mb-1">Designer Heels</h4>
          <p class="text-gray-400 text-sm mb-3">Premium leather with elegant design</p>
          <p class="text-pink-600 font-medium text-xl mb-4">$189.99</p>
          <button class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-lg font-medium transition duration-300">
            Add to Collection
          </button>
        </div>

        <div class="product-card bg-black p-6 border border-gray-800 rounded-lg">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1594223274512-ad4803739b7c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Luxury Handbag" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
          </div>
          <h4 class="font-medium text-lg mb-1">Luxury Handbag</h4>
          <p class="text-gray-400 text-sm mb-3">Timeless elegance meets modern functionality</p>
          <p class="text-pink-600 font-medium text-xl mb-4">$459.99</p>
          <button class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-lg font-medium transition duration-300">
            Add to Collection
          </button>
        </div>

        <div class="product-card bg-black p-6 border border-gray-800 rounded-lg">
          <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Statement Jewelry" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
          </div>
          <h4 class="font-medium text-lg mb-1">Statement Jewelry</h4>
          <p class="text-gray-400 text-sm mb-3">Bold pieces that make a lasting impression</p>
          <p class="text-pink-600 font-medium text-xl mb-4">$129.99</p>
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
@else
  <section id="collection" class="py-20 px-6 bg-gray-900">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">Best Collections</h3>
        <p class="text-gray-400 max-w-2xl mx-auto">Perfect choices specially for you</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($products as $product)
          <div class="product-card bg-black p-6 border border-gray-800 rounded-lg">
            <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
              <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
              @if($product->is_new)
                <span class="absolute top-4 right-4 bg-yellow-600 text-black text-xs font-medium px-2 py-1 rounded">NEW</span>
              @elseif($product->is_limited)
                <span class="absolute top-4 right-4 bg-red-600 text-white text-xs font-medium px-2 py-1 rounded">LIMITED</span>
              @endif
            </div>
            <h4 class="font-medium text-lg mb-1">{{ $product->name }}</h4>
            <p class="text-gray-400 text-sm mb-3">{{ $product->description }}</p>
            <p class="text-yellow-600 font-medium text-xl mb-4">${{ number_format($product->price, 2) }}</p>
            <button class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-lg font-medium transition duration-300">
              Add to Collection
            </button>
          </div>
        @endforeach
      </div>
      <div class="text-center mt-12">
        @if($headerFooterId)
          <a href="/product2/{{ $headerFooterId }}">
            <button class="border border-gray-600 hover:border-white text-white px-8 py-3 rounded-lg font-medium transition duration-300">
              View Full Collection
            </button>
          </a>
        @else
          <a href="/product2">
            <button class="border border-gray-600 hover:border-white text-white px-8 py-3 rounded-lg font-medium transition duration-300">
              View Full Collection
            </button>
          </a>
        @endif
      </div>
    </div>
  </section>
@endif


<!-- Testimonials -->
@if($is_default)
  <section class="py-20 px-6 bg-black">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">Customer <span class="font-medium">Testimonials</span></h3>
        <p class="text-gray-400 max-w-2xl mx-auto">What our distinguished clients say about their boutique experience</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="flex mb-4">
            <div class="text-pink-500">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-300 mb-6 italic">"The personal styling service was incredible. I found the perfect dress for my special occasion and felt absolutely stunning."</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">Sarah Johnson</h5>
              <p class="text-gray-500 text-sm">Fashion Enthusiast</p>
            </div>
          </div>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="flex mb-4">
            <div class="text-pink-500">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-300 mb-6 italic">"Exceptional quality and service from start to finish. The boutique helped me build a complete wardrobe that I love."</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">Emily Davis</h5>
              <p class="text-gray-500 text-sm">Style Consultant</p>
            </div>
          </div>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="flex mb-4">
            <div class="text-pink-500">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-300 mb-6 italic">"The attention to detail and personalized service is unmatched. Every piece I've purchased has exceeded my expectations."</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">Michelle Chen</h5>
              <p class="text-gray-500 text-sm">Fashion Blogger</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@else
  <section class="py-20 px-6 bg-black">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">{{ $testimonials->testi_main }}</h3>
        <p class="text-gray-400 max-w-2xl mx-auto">{{ $testimonials->testi_sub }}</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="flex mb-4">
            <div class="text-yellow-500">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-300 mb-6 italic">"{{ $testimonials->testi1 }}"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">{{ $testimonials->testi_user1 }}</h5>
            </div>
          </div>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="flex mb-4">
            <div class="text-yellow-500">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-300 mb-6 italic">"{{ $testimonials->testi2 }}"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">{{ $testimonials->testi_user2 }}</h5>
            </div>
          </div>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="flex mb-4">
            <div class="text-yellow-500">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <p class="text-gray-300 mb-6 italic">"{{ $testimonials->testi3 }}"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">{{ $testimonials->testi_user3 }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif


<!-- Contact -->
@if($is_default)
  <section id="contact" class="py-20 px-6 bg-gray-900">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div>
        <h3 class="text-3xl font-light mb-6">Contact Our <span class="font-medium">Stylists</span></h3>
        <p class="text-gray-400 mb-8">Our fashion specialists are available to assist you with any inquiries about our collection, styling services, or shopping experience.</p>
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="text-pink-600 text-xl w-10 mr-4 mt-1">
              <i class="fas fa-phone"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Phone</h4>
              <p class="text-gray-400">+1 (888) 555-8888</p>
              <p class="text-sm text-gray-500">Mon-Fri: 9AM-9PM EST</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-pink-600 text-xl w-10 mr-4 mt-1">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Email</h4>
              <p class="text-gray-400">stylists@boutiqueelite.com</p>
              <p class="text-sm text-gray-500">Response within 24 hours</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-pink-600 text-xl w-10 mr-4 mt-1">
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
            <input type="text" id="name" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-pink-600">
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-400 mb-1">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-pink-600">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-400 mb-1">Message</label>
            <textarea id="message" rows="4" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-pink-600"></textarea>
          </div>
          <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-medium transition duration-300">
            Send Message
          </button>
        </form>
      </div>
    </div>
  </section>
@else
  <section id="contact" class="py-20 px-6 bg-gray-900">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div>
        <h3 class="text-3xl font-light mb-6">{{ $contactus->contact_name }}</h3>
        <p class="text-gray-400 mb-8">{{ $contactus->contact_sub }}</p>
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="text-yellow-600 text-xl w-10 mr-4 mt-1">
              <i class="fas fa-phone"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Phone</h4>
              <p class="text-gray-400">{{ $contactus->contact_phone }}</p>
              <p class="text-sm text-gray-500">{{ $contactus->contact_hours }}</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-yellow-600 text-xl w-10 mr-4 mt-1">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Email</h4>
              <p class="text-gray-400">{{ $contactus->contact_email }}</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-yellow-600 text-xl w-10 mr-4 mt-1">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">{{ $contactus->contact_building }}</h4>
              <p class="text-gray-400">{{ $contactus->contact_line1 }}</p>
              <p class="text-sm text-gray-500">{{ $contactus->contact_line2 }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-black p-8 border border-gray-800 rounded-lg">
        <h4 class="text-xl font-medium mb-6">Send Us a Message</h4>
        <form class="space-y-4">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-400 mb-1">Name</label>
            <input type="text" id="name" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-pink-600">
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-400 mb-1">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-pink-600">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-400 mb-1">Message</label>
            <textarea id="message" rows="4" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-pink-600"></textarea>
          </div>
          <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-medium transition duration-300">
            Send Message
          </button>
        </form>
      </div>
    </div>
  </section>
@endif


<!-- Newsletter -->
<section class="py-16 px-6 bg-gradient-to-r from-gray-900 to-black">
  <div class="max-w-4xl mx-auto text-center">
    <h3 class="text-3xl font-light mb-4">Join Our <span class="font-medium">Style Circle</span></h3>
    <p class="text-gray-400 mb-8 max-w-2xl mx-auto">Subscribe for exclusive access to new collections, private styling sessions, and fashion insights.</p>
    <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
      <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-1 focus:ring-pink-600">
      <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg font-medium transition duration-300">
        Subscribe
      </button>
    </form>
    <p class="text-xs text-gray-500 mt-4">We respect your privacy. Unsubscribe at any time.</p>
  </div>
</section>

@include('template2.footer2')
