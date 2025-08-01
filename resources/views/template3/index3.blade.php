  @include('template3.head3')

  <!-- Hero Section -->
  @if($is_default)
    <section class="relative h-[80vh] flex items-center">
      <div class="absolute inset-0 bg-gradient-to-r from-white/90 to-white/30 z-10"></div>
      <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
            alt="Luxury Watch" 
            class="w-full h-full object-cover object-center">
      </div>
      <div class="relative max-w-7xl mx-auto px-6 z-20">
        <div class="max-w-xl">
          <h2 class="text-5xl font-medium mb-6 leading-tight">Timeless Elegance,<br>Modern Precision</h2>
          <p class="text-gray-600 mb-8">Discover horological masterpieces that transcend generations</p>
          <div class="flex space-x-4">
            <button class="bg-gray-900 hover:bg-gray-800 text-white px-8 py-3 font-medium transition duration-300">
              View Collection
            </button>
            <button class="border border-gray-300 hover:border-gray-900 text-gray-900 px-8 py-3 font-medium transition duration-300">
              Book Consultation
            </button>
          </div>
        </div>
      </div>
    </section>
  @else
    <section class="relative h-[80vh] flex items-center">
      <div class="absolute inset-0 bg-gradient-to-r from-white/90 to-white/30 z-10"></div>
      <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
            alt="Hero Image" 
            class="w-full h-full object-cover object-center">
      </div>
      <div class="relative max-w-7xl mx-auto px-6 z-20">
        <div class="max-w-xl">
          <h2 class="text-5xl font-medium mb-6 leading-tight">{{ $homesetting->main_text }}</h2>
          <p class="text-gray-600 mb-8">{{ $homesetting->sub_text }}</p>
          <div class="flex space-x-4">
            <button class="bg-gray-900 hover:bg-gray-800 text-white px-8 py-3 font-medium transition duration-300" onclick="window.location.href='/product3'">
              {{ $homesetting->button1_text }}
            </button>
            <button class="border border-gray-300 hover:border-gray-900 text-gray-900 px-8 py-3 font-medium transition duration-300" onclick="window.location.href='/product3'">
              {{ $homesetting->button2_text }}
            </button>
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- Features Section -->
  @if($is_default)
    <section id="features" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-medium mb-4">The Art of Watchmaking</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">Each timepiece represents centuries of refined craftsmanship</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="p-8 text-center">
            <div class="w-20 h-20 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-6">
              <i class="fas fa-gem text-gray-700 text-2xl"></i>
            </div>
            <h4 class="text-xl font-medium mb-3">Authenticity</h4>
            <p class="text-gray-600">Every watch undergoes rigorous authentication by our master watchmakers</p>
          </div>
          <div class="p-8 text-center">
            <div class="w-20 h-20 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-6">
              <i class="fas fa-cogs text-gray-700 text-2xl"></i>
            </div>
            <h4 class="text-xl font-medium mb-3">Precision</h4>
            <p class="text-gray-600">Swiss-made movements with chronometer certification for unmatched accuracy</p>
          </div>
          <div class="p-8 text-center">
            <div class="w-20 h-20 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-6">
              <i class="fas fa-history text-gray-700 text-2xl"></i>
            </div>
            <h4 class="text-xl font-medium mb-3">Heritage</h4>
            <p class="text-gray-600">Timepieces with storied histories from the world's most respected maisons</p>
          </div>
        </div>
      </div>
    </section>
  @else
    <section id="features" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-medium mb-4">{{ $section1->main_heading }}</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $section1->sub_heading }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="p-8 text-center">
            <div class="w-20 h-20 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-6">
              <i class="fas fa-gem text-gray-700 text-2xl"></i>
            </div>
            <h4 class="text-xl font-medium mb-3">{{ $section1->feature1_heading }}</h4>
            <p class="text-gray-600">{{ $section1->feature1_detail }}</p>
          </div>
          <div class="p-8 text-center">
            <div class="w-20 h-20 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-6">
              <i class="fas fa-cogs text-gray-700 text-2xl"></i>
            </div>
            <h4 class="text-xl font-medium mb-3">{{ $section1->feature2_heading }}</h4>
            <p class="text-gray-600">{{ $section1->feature2_detail }}</p>
          </div>
          <div class="p-8 text-center">
            <div class="w-20 h-20 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-6">
              <i class="fas fa-history text-gray-700 text-2xl"></i>
            </div>
            <h4 class="text-xl font-medium mb-3">{{ $section1->feature3_heading }}</h4>
            <p class="text-gray-600">{{ $section1->feature3_detail }}</p>
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- Brands Section -->
  @if($is_default)
    <section id="brands" class="py-20 px-6 bg-[#f9f9f7]">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-medium mb-4">Our Partners</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">Representing the pinnacle of horological excellence</p>
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
  @else
    <section id="brands" class="py-20 px-6 bg-[#f9f9f7]">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-medium mb-4">{{ $section2->main_text1 }}</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $section2->sub_text1 }}</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-6 gap-8">
          @foreach (range(1,6) as $i)
            <div class="flex items-center justify-center p-6">
              <div class="w-24 h-24 rounded-full bg-white shadow-md flex items-center justify-center overflow-hidden transition-transform duration-300 hover:scale-110 hover:shadow-xl">
                <img src="{{ $section2->{'image'.$i} }}" 
                    alt="Brand {{ $i }}" 
                    class="object-cover w-full h-full">
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  <!-- Collection -->
  @if($is_default)
    <section id="collection" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-medium mb-4">Curated Collection</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">Select timepieces for the discerning collector</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Static Product Cards -->
          @include('template2.collection-default')
        </div>
        <div class="text-center mt-12">
          <button class="border border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 px-8 py-3 rounded-lg font-medium transition duration-300">
            View Full Collection
          </button>
        </div>
      </div>
    </section>
  @else
    <section id="collection" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-medium mb-4">{{ $section3->main_text ?? 'Best Collections' }}</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $section3->sub_text ?? 'Perfect choices specially for you' }}</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          @foreach($products as $product)
            <div class="watch-card p-6 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">
              <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                @if($product->is_new)
                  <span class="absolute top-4 right-4 bg-white text-gray-900 text-xs font-medium px-2 py-1 rounded">NEW</span>
                @elseif($product->is_limited)
                  <span class="absolute top-4 right-4 bg-white text-gray-900 text-xs font-medium px-2 py-1 rounded">LIMITED</span>
                @endif
              </div>
              <h4 class="font-medium text-lg mb-1">{{ $product->name }}</h4>
              <p class="text-gray-500 text-sm mb-3">{{ $product->description }}</p>
              <p class="text-gray-900 font-medium text-xl mb-4">${{ number_format($product->price, 2) }}</p>
              <button class="w-full border border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 py-2 rounded-lg font-medium transition duration-300">
                Add to Cart
              </button>
            </div>
          @endforeach
        </div>
        <div class="text-center mt-12">
          <button class="border border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 px-8 py-3 rounded-lg font-medium transition duration-300" onclick="window.location.href='/product3'">
            View Full Collection
          </button>
        </div>
      </div>
    </section>
  @endif

  <!-- Testimonials -->
@if($is_default)
  <section class="py-20 px-6 bg-[#f9f9f7]">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-medium mb-4">Collector Testimonials</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">Experiences from our community of horology enthusiasts</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @include('template2.testimonials-default')
      </div>
    </div>
  </section>
@else
  <section class="py-20 px-6 bg-[#f9f9f7]">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-medium mb-4">{{ $testimonials->testi_main ?? 'Collector Testimonials' }}</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">{{ $testimonials->testi_sub ?? 'Experiences from our community of horology enthusiasts' }}</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Testimonial 1 -->
        <div class="testimonial-card p-8 rounded-lg bg-white shadow">
          <div class="flex mb-4 text-yellow-500">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
          </div>
          <p class="text-gray-700 mb-6 italic">"{{ $testimonials->testi1 }}"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="{{ $testimonials->image1 ?? 'https://randomuser.me/api/portraits/men/32.jpg' }}" alt="{{ $testimonials->testi_user1 }}" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">{{ $testimonials->testi_user1 }}</h5>
            </div>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="testimonial-card p-8 rounded-lg bg-white shadow">
          <div class="flex mb-4 text-yellow-500">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
          </div>
          <p class="text-gray-700 mb-6 italic">"{{ $testimonials->testi2 }}"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="{{ $testimonials->image2 ?? 'https://randomuser.me/api/portraits/women/44.jpg' }}" alt="{{ $testimonials->testi_user2 }}" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-medium">{{ $testimonials->testi_user2 }}</h5>
            </div>
          </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="testimonial-card p-8 rounded-lg bg-white shadow">
          <div class="flex mb-4 text-yellow-500">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
          </div>
          <p class="text-gray-700 mb-6 italic">"{{ $testimonials->testi3 }}"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img src="{{ $testimonials->image3 ?? 'https://randomuser.me/api/portraits/men/75.jpg' }}" alt="{{ $testimonials->testi_user3 }}" class="w-full h-full object-cover">
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
  <section id="contact" class="py-20 px-6 bg-white">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div>
        <h3 class="text-3xl font-medium mb-6">Contact Our Concierge</h3>
        <p class="text-gray-600 mb-8">Our watch specialists are available to assist you with any inquiries about our collection or services.</p>
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="text-gray-900 text-xl w-10 mr-4 mt-1">
              <i class="fas fa-phone"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Phone</h4>
              <p class="text-gray-600">+1 (888) 555-8888</p>
              <p class="text-sm text-gray-500">Mon-Fri: 9AM-9PM EST</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-gray-900 text-xl w-10 mr-4 mt-1">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Email</h4>
              <p class="text-gray-600">concierge@horologe.com</p>
              <p class="text-sm text-gray-500">Response within 24 hours</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-gray-900 text-xl w-10 mr-4 mt-1">
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
      <div class="bg-[#f9f9f7] p-8 rounded-lg">
        <h4 class="text-xl font-medium mb-6">Send Us a Message</h4>
        <form class="space-y-4">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" id="name" class="w-full px-4 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-900">
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-900">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <textarea id="message" rows="4" class="w-full px-4 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-900"></textarea>
          </div>
          <button type="submit" class="w-full bg-gray-900 hover:bg-gray-800 text-white py-3 rounded-lg font-medium transition duration-300">
            Send Message
          </button>
        </form>
      </div>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="py-16 px-6 bg-gray-900 text-white">
    <div class="max-w-4xl mx-auto text-center">
      <h3 class="text-3xl font-medium mb-4">Join Our Collector's Circle</h3>
      <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Subscribe for exclusive access to limited editions and private events</p>
      <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
        <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-300">
        <button type="submit" class="bg-white hover:bg-gray-100 text-gray-900 px-6 py-3 rounded-lg font-medium transition duration-300">
          Subscribe
        </button>
      </form>
      <p class="text-xs text-gray-400 mt-4">We respect your privacy. Unsubscribe at any time.</p>
    </div>
  </section>

  <!-- Footer -->
  @include('template3.footer3')