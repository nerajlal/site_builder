@include('template4.head4')

  <!-- Hero Section -->
  <section class="relative h-[90vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-white/80 via-white/30 to-transparent z-10"></div>
    <div class="absolute inset-0">
      <img 
        src="{{ $is_default 
          ? 'https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80' 
          : ($homesetting->hero_image ?? 'https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80') }}" 
        alt="Vintage Fashion" 
        class="w-full h-full object-cover object-center">
    </div>
    <div class="relative max-w-7xl mx-auto px-6 z-20">
      <div class="max-w-xl">
        <h2 class="text-5xl font-semibold mb-6 leading-tight">
          <span class="gold-underline">
            {{ $is_default ? 'Vintage' : $homesetting->main_highlight }}
          </span> 
          {{ $is_default ? 'Elegance' : $homesetting->main_text }}
        </h2>
        <p class="text-gray-700 mb-8">
          {{ $is_default ? 'Where classic style meets modern sophistication' : $homesetting->sub_text }}
        </p>
        @php
          $currentUrl = request()->url();
          $headerFooterId = null;
          if (preg_match('/\/index4\/(\d+)/', $currentUrl, $matches)) {
            $headerFooterId = $matches[1];
          }
        @endphp
        
        <div class="flex space-x-4">
          @if($headerFooterId)
            <button class="btn-pink px-8 py-3 rounded font-medium" onclick="window.location.href='/product4/{{ $headerFooterId }}'">
              {{ $is_default ? 'Shop Collection' : $homesetting->button1_text }}
            </button>
            <button class="btn-outline px-8 py-3 rounded font-medium" onclick="window.location.href='/product4/{{ $headerFooterId }}'">
              {{ $is_default ? 'Book Styling' : $homesetting->button2_text }}
            </button>
          @else
            <button class="btn-pink px-8 py-3 rounded font-medium" onclick="window.location.href='/product4'">
              {{ $is_default ? 'Shop Collection' : $homesetting->button1_text }}
            </button>
            <button class="btn-outline px-8 py-3 rounded font-medium" onclick="window.location.href='/product4'">
              {{ $is_default ? 'Book Styling' : $homesetting->button2_text }}
            </button>
          @endif
        </div>
      </div>
    </div>
  </section>

  <!-- features -->
  @if($is_default)
    <section id="features" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">The <span class="text-[#ec4899]">Art</span> of Style</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Each piece represents timeless elegance and refined taste
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="p-8 text-center border-b border-[#ec4899]/20 hover:border-[#ec4899] transition-all duration-300">
            <div class="text-[#ec4899] text-3xl mb-6">
              <i class="fas fa-star"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Premium Quality</h4>
            <p class="text-gray-600">Every garment is crafted with the finest materials and attention to detail</p>
          </div>
          <div class="p-8 text-center border-b border-[#ec4899]/20 hover:border-[#ec4899] transition-all duration-300">
            <div class="text-[#ec4899] text-3xl mb-6">
              <i class="fas fa-history"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Timeless Design</h4>
            <p class="text-gray-600">Classic silhouettes that never go out of style and always look elegant</p>
          </div>
          <div class="p-8 text-center border-b border-[#ec4899]/20 hover:border-[#ec4899] transition-all duration-300">
            <div class="text-[#ec4899] text-3xl mb-6">
              <i class="fas fa-magic"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Personal Touch</h4>
            <p class="text-gray-600">Expert styling advice to help you create your perfect look</p>
          </div>
        </div>
      </div>
    </section>
  @else
    <section id="features" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">
            {!! $section1->main_heading !!}
          </h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $section1->sub_heading }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="p-8 text-center border-b border-[#ec4899]/20 hover:border-[#ec4899] transition-all duration-300">
            <div class="text-[#ec4899] text-3xl mb-6">
              <i class="fas fa-star"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Premium Quality</h4>
            <p class="text-gray-600">Every garment is crafted with the finest materials and attention to detail</p>
          </div>
          <div class="p-8 text-center border-b border-[#ec4899]/20 hover:border-[#ec4899] transition-all duration-300">
            <div class="text-[#ec4899] text-3xl mb-6">
              <i class="fas fa-history"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Timeless Design</h4>
            <p class="text-gray-600">Classic silhouettes that never go out of style and always look elegant</p>
          </div>
          <div class="p-8 text-center border-b border-[#ec4899]/20 hover:border-[#ec4899] transition-all duration-300">
            <div class="text-[#ec4899] text-3xl mb-6">
              <i class="fas fa-magic"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Personal Touch</h4>
            <p class="text-gray-600">Expert styling advice to help you create your perfect look</p>
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- Brands -->
  @if($is_default)
    <section id="brands" class="py-20 px-6 bg-[#faf9f7]">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">
            Our <span class="text-[#d4af37]">Prestige</span> Partners
          </h3>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Representing the pinnacle of horological excellence
          </p>
        </div>
        <div class="grid grid-cols-3 md:grid-cols-6 gap-8">
          <!-- Brand 1 -->
          <div class="flex items-center justify-center p-6">
            <div class="w-24 h-24 bg-white rounded-full shadow-md flex items-center justify-center 
                        transition-all duration-300 hover:scale-110 hover:rotate-3 hover:shadow-xl">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Rolex_logo.svg/2560px-Rolex_logo.svg.png"
                  alt="Rolex" 
                  class="object-contain w-16 h-16 opacity-80 hover:opacity-100 transition-opacity duration-300">
            </div>
          </div>

          <!-- Brand 2 -->
          <div class="flex items-center justify-center p-6">
            <div class="w-24 h-24 bg-white rounded-full shadow-md flex items-center justify-center 
                        transition-all duration-300 hover:scale-110 hover:rotate-3 hover:shadow-xl">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Omega_Logo.svg/1200px-Omega_Logo.svg.png"
                  alt="Omega" 
                  class="object-contain w-16 h-16 opacity-80 hover:opacity-100 transition-opacity duration-300">
            </div>
          </div>

          <!-- Brand 3 -->
          <div class="flex items-center justify-center p-6">
            <div class="w-24 h-24 bg-white rounded-full shadow-md flex items-center justify-center 
                        transition-all duration-300 hover:scale-110 hover:rotate-3 hover:shadow-xl">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Patek_Philippe_Logo.svg/2560px-Patek_Philippe_Logo.svg.png"
                  alt="Patek Philippe" 
                  class="object-contain w-16 h-16 opacity-80 hover:opacity-100 transition-opacity duration-300">
            </div>
          </div>

          <!-- Brand 4 -->
          <div class="flex items-center justify-center p-6">
            <div class="w-24 h-24 bg-white rounded-full shadow-md flex items-center justify-center 
                        transition-all duration-300 hover:scale-110 hover:rotate-3 hover:shadow-xl">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Cartier_logo.svg/2560px-Cartier_logo.svg.png"
                  alt="Cartier" 
                  class="object-contain w-16 h-16 opacity-80 hover:opacity-100 transition-opacity duration-300">
            </div>
          </div>

          <!-- Brand 5 -->
          <div class="flex items-center justify-center p-6">
            <div class="w-24 h-24 bg-white rounded-full shadow-md flex items-center justify-center 
                        transition-all duration-300 hover:scale-110 hover:rotate-3 hover:shadow-xl">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/IWC_logo.svg/2560px-IWC_logo.svg.png"
                  alt="IWC" 
                  class="object-contain w-16 h-16 opacity-80 hover:opacity-100 transition-opacity duration-300">
            </div>
          </div>

          <!-- Brand 6 -->
          <div class="flex items-center justify-center p-6">
            <div class="w-24 h-24 bg-white rounded-full shadow-md flex items-center justify-center 
                        transition-all duration-300 hover:scale-110 hover:rotate-3 hover:shadow-xl">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Audemars_Piguet_Logo.svg/2560px-Audemars_Piguet_Logo.svg.png"
                  alt="Audemars Piguet" 
                  class="object-contain w-16 h-16 opacity-80 hover:opacity-100 transition-opacity duration-300">
            </div>
          </div>
        </div>
      </div>
    </section>
  @else
    <section id="brands" class="py-20 px-6 bg-[#faf9f7]">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">
            {{ $section2->main_text1 }}
          </h3>
          <p class="text-gray-600 max-w-2xl mx-auto">
            {{ $section2->sub_text1 }}
          </p>
        </div>
        <div class="grid grid-cols-3 md:grid-cols-6 gap-8">
          @foreach (range(1,6) as $i)
            <div class="flex items-center justify-center p-6">
              <div class="w-24 h-24 bg-white rounded-full shadow-md overflow-hidden 
                          transition-all duration-300 hover:scale-110 hover:rotate-3 hover:shadow-xl">
                <img src="{{ $section2->{'image'.$i} }}" 
                    alt="Brand {{ $i }}" 
                    class="w-full h-full object-cover opacity-90 hover:opacity-100 transition-opacity duration-300">
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
          <h3 class="text-3xl font-semibold mb-4"><span class="text-[#d4af37]">Golden</span></h3>
          <p class="text-gray-600 max-w-2xl mx-auto">Select timepieces for the discerning collector</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Static Product Cards -->
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
  @else
    <section id="collection" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">
            <span class="text-[#d4af37]">{{ $section3->main_text ?? 'Best Collections' }}</span>
          </h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $section3->sub_text ?? 'Perfect choices specially for you' }}</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          @foreach($products as $product)
            <div class="watch-card p-6 rounded-lg border border-gray-100">
              <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                @if($product->is_new)
                  <span class="absolute top-4 right-4 bg-[#d4af37] text-white text-xs font-medium px-2 py-1 rounded">NEW</span>
                @elseif($product->is_limited)
                  <span class="absolute top-4 right-4 bg-[#d4af37] text-white text-xs font-medium px-2 py-1 rounded">LIMITED</span>
                @endif
              </div>
              <h4 class="font-semibold text-lg mb-1">{{ $product->name }}</h4>
              <p class="text-gray-500 text-sm mb-3">{{ $product->description }}</p>
              <p class="text-gray-900 font-semibold text-xl mb-4">${{ number_format($product->price, 2) }}</p>
              @if($headerFooterId)
                <button class="w-full btn-gold py-2 rounded font-medium" onclick="window.location.href='/product4/{{ $headerFooterId }}'">
                  Add to Collection
                </button>
              @else
                <button class="w-full btn-gold py-2 rounded font-medium" onclick="window.location.href='/product4'">
                  Add to Collection
                </button>
              @endif
            </div>
          @endforeach
        </div>
        <div class="text-center mt-12">
          @if($headerFooterId)
            <a href="/product4/{{ $headerFooterId }}">
              <button class="btn-outline px-8 py-3 rounded font-medium">
                View Full Collection
              </button>
            </a>
          @else
            <a href="/product4">
              <button class="btn-outline px-8 py-3 rounded font-medium">
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
    <section class="py-20 px-6 bg-[#faf9f7]">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">Collector <span class="text-[#d4af37]">Testimonials</span></h3>
          <p class="text-gray-600 max-w-2xl mx-auto">Experiences from our community of horology enthusiasts</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-white p-8 rounded-lg shadow-sm">
            <div class="flex mb-4 text-[#d4af37]">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
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
            <div class="flex mb-4 text-[#d4af37]">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
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
            <div class="flex mb-4 text-[#d4af37]">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
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
  @else
    <section class="py-20 px-6 bg-[#faf9f7]">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">{{ $testimonials->testi_main ?? 'Collector Testimonials' }}</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $testimonials->testi_sub ?? 'Experiences from our community of horology enthusiasts' }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-white p-8 rounded-lg shadow-sm">
            <div class="flex mb-4 text-[#d4af37]">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="text-gray-700 mb-6 italic">"{{ $testimonials->testi1 }}"</p>
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                <img src="{{ $testimonials->testi_img1 ?? 'https://randomuser.me/api/portraits/men/32.jpg' }}" alt="Client" class="w-full h-full object-cover">
              </div>
              <div>
                <h5 class="font-medium">{{ $testimonials->testi_user1 ?? 'James Wilson' }}</h5>
              </div>
            </div>
          </div>
          <div class="bg-white p-8 rounded-lg shadow-sm">
            <div class="flex mb-4 text-[#d4af37]">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="text-gray-700 mb-6 italic">"{{ $testimonials->testi2 }}"</p>
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                <img src="{{ $testimonials->testi_img2 ?? 'https://randomuser.me/api/portraits/women/44.jpg' }}" alt="Client" class="w-full h-full object-cover">
              </div>
              <div>
                <h5 class="font-medium">{{ $testimonials->testi_user2 ?? 'Sarah Johnson' }}</h5>
              </div>
            </div>
          </div>
          <div class="bg-white p-8 rounded-lg shadow-sm">
            <div class="flex mb-4 text-[#d4af37]">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text-gray-700 mb-6 italic">"{{ $testimonials->testi3 }}"</p>
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                <img src="{{ $testimonials->testi_img3 ?? 'https://randomuser.me/api/portraits/men/75.jpg' }}" alt="Client" class="w-full h-full object-cover">
              </div>
              <div>
                <h5 class="font-medium">{{ $testimonials->testi_user3 ?? 'Michael Chen' }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif


  <!-- Contact -->
@if($is_default)
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
@else
  <section id="contact" class="py-20 px-6 bg-white">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div>
        <h3 class="text-3xl font-semibold mb-6">{{ $contactus->contact_name ?? 'Contact Our Concierge' }}</h3>
        <p class="text-gray-600 mb-8">{{ $contactus->contact_sub ?? 'Our watch specialists are available to assist you.' }}</p>
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="text-[#d4af37] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-phone"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Phone</h4>
              <p class="text-gray-600">{{ $contactus->contact_phone ?? '+1 (888) 555-8888' }}</p>
              <p class="text-sm text-gray-500">{{ $contactus->contact_hours ?? 'Mon-Fri: 9AM-9PM EST' }}</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-[#d4af37] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Email</h4>
              <p class="text-gray-600">{{ $contactus->contact_email ?? 'concierge@luxuria.com' }}</p>
              <!-- <p class="text-sm text-gray-500">Response within 24 hours</p> -->
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-[#d4af37] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">{{ $contactus->contact_building }}</h4>
              <p class="text-gray-600">{{ $contactus->contact_line1 ?? '450 Park Avenue, New York' }}</p>
              <p class="text-sm text-gray-500">{{ $contactus->contact_line2 ?? 'By appointment only' }}</p>
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
@endif
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

  @include('template4.footer4')