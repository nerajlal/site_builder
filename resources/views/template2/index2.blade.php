@include('template2.head2')

<!-- Hero Section -->
@if($is_default)
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
@else
  <section class="relative h-screen flex items-center">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 flex items-center">
      <img src="https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
           alt="Luxury Watch" 
           class="w-full h-full object-cover object-center">
    </div>
    <div class="relative max-w-7xl mx-auto px-6 z-10">
      <div class="max-w-xl">
        <h2 class="text-5xl font-light mb-6 leading-tight">{{ $homesetting->main_text }}</h2>
        <p class="text-gray-300 mb-8">{{ $homesetting->sub_text }}</p>
        <div class="flex space-x-4">
          <button class="bg-yellow-600 hover:bg-yellow-700 text-black px-8 py-3 font-medium transition duration-300" onclick="window.location.href='/product2'">
            {{ $homesetting->button1_text }}
          </button>
          <button class="border border-gray-400 hover:border-white text-white px-8 py-3 font-medium transition duration-300" onclick="window.location.href='/product2'">
            {{ $homesetting->button2_text }}
          </button>
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
@else
  <section id="features" class="py-20 px-6 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">{{ $section1->main_heading }}</h3>
        <p class="text-gray-400 max-w-2xl mx-auto">{{ $section1->sub_heading }}</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-yellow-600 text-3xl mb-4">
            <i class="fas fa-certificate"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">{{ $section1->feature1_heading }}</h4>
          <p class="text-gray-400">{{ $section1->feature1_detail }}</p>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-yellow-600 text-3xl mb-4">
            <i class="fas fa-shield-alt"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">{{ $section1->feature2_heading }}</h4>
          <p class="text-gray-400">{{ $section1->feature2_detail }}</p>
        </div>
        <div class="bg-gray-900 p-8 border border-gray-800 rounded-lg">
          <div class="text-yellow-600 text-3xl mb-4">
            <i class="fas fa-headset"></i>
          </div>
          <h4 class="text-xl font-medium mb-3">{{ $section1->feature3_heading }}</h4>
          <p class="text-gray-400">{{ $section1->feature3_detail }}</p>
        </div>
      </div>
    </div>
  </section>
@endif

<!-- Brands -->
@if($is_default)
  <section id="brands" class="py-20 px-6 bg-black">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">
          <span class="font-medium">Our Prestige Partners</span>
        </h3>
        <p class="text-gray-400 max-w-2xl mx-auto">
          Representing the most exclusive names in haute horlogerie
        </p>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-6 gap-8">
        <!-- Brand Item -->
        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Rolex_logo.svg/2560px-Rolex_logo.svg.png"
                alt="Rolex"
                class="w-full h-full object-cover">
          </div>
        </div>

        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Omega_Logo.svg/1200px-Omega_Logo.svg.png"
                alt="Omega"
                class="w-full h-full object-cover">
          </div>
        </div>

        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Patek_Philippe_Logo.svg/2560px-Patek_Philippe_Logo.svg.png"
                alt="Patek Philippe"
                class="w-full h-full object-cover">
          </div>
        </div>

        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Cartier_logo.svg/2560px-Cartier_logo.svg.png"
                alt="Cartier"
                class="w-full h-full object-cover">
          </div>
        </div>

        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/IWC_logo.svg/2560px-IWC_logo.svg.png"
                alt="IWC"
                class="w-full h-full object-cover">
          </div>
        </div>

        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Audemars_Piguet_Logo.svg/2560px-Audemars_Piguet_Logo.svg.png"
                alt="Audemars Piguet"
                class="w-full h-full object-cover">
          </div>
        </div>
      </div>
    </div>
  </section>
@else
  <section id="brands" class="py-20 px-6 bg-black">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">
          <span class="font-medium">{{ $section2->main_text1 }}</span>
        </h3>
        <p class="text-gray-400 max-w-2xl mx-auto">{{ $section2->sub_text1 }}</p>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-6 gap-8">
        <!-- Brand Item -->
        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="{{ $section2->image1 }}"
                alt="Image1"
                class="w-full h-full object-cover">
          </div>
        </div>

        <!-- Repeat for others -->
        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="{{ $section2->image2 }}"
                alt="Image2"
                class="w-full h-full object-cover">
          </div>
        </div>

        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="{{ $section2->image3 }}"
                alt="Image3"
                class="w-full h-full object-cover">
          </div>
        </div>

        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="{{ $section2->image4 }}"
                alt="Image4"
                class="w-full h-full object-cover">
          </div>
        </div>

        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="{{ $section2->image5 }}"
                alt="Image5"
                class="w-full h-full object-cover">
          </div>
        </div>

        <div class="flex items-center justify-center p-6">
          <div class="w-20 h-20 rounded-full bg-white overflow-hidden">
            <img src="{{ $section2->image6 }}"
                alt="Image6"
                class="w-full h-full object-cover">
          </div>
        </div>
      </div>
    </div>
  </section>
@endif

<!-- Collection -->
@if($is_default)
  <section id="collection" class="py-20 px-6 bg-gray-900">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-light mb-4">Curated <span class="font-medium">Collection</span></h3>
        <p class="text-gray-400 max-w-2xl mx-auto">Exceptional timepieces for the discerning collector</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Static Product Cards (Rolex, Omega, Patek, Cartier) -->
        @include('template2.collection-default')
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
          <div class="watch-card bg-black p-6 border border-gray-800 rounded-lg">
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
        <button class="border border-gray-600 hover:border-white text-white px-8 py-3 rounded-lg font-medium transition duration-300" onclick="window.location.href='/product2'">
          View Full Collection
        </button>
      </div>
    </div>
  </section>
@endif


<!-- Testimonials -->
@if($is_default)
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
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
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
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
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
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
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
@endif


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

@include('template2.footer2')
