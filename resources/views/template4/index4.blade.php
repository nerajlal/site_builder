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
          <h3 class="text-3xl font-semibold mb-4">The <span class="text-[#7e22ce]">Art</span> of Style</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Each piece represents timeless elegance and refined taste
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="p-8 text-center border-b border-[#7e22ce]/20 hover:border-[#7e22ce] transition-all duration-300">
            <div class="text-[#7e22ce] text-3xl mb-6">
              <i class="fas fa-star"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Premium Quality</h4>
            <p class="text-gray-600">Every garment is crafted with the finest materials and attention to detail</p>
          </div>
          <div class="p-8 text-center border-b border-[#7e22ce]/20 hover:border-[#7e22ce] transition-all duration-300">
            <div class="text-[#7e22ce] text-3xl mb-6">
              <i class="fas fa-history"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Timeless Design</h4>
            <p class="text-gray-600">Classic silhouettes that never go out of style and always look elegant</p>
          </div>
          <div class="p-8 text-center border-b border-[#7e22ce]/20 hover:border-[#7e22ce] transition-all duration-300">
            <div class="text-[#7e22ce] text-3xl mb-6">
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
          <div class="p-8 text-center border-b border-[#7e22ce]/20 hover:border-[#7e22ce] transition-all duration-300">
            <div class="text-[#7e22ce] text-3xl mb-6">
              <i class="fas fa-star"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Premium Quality</h4>
            <p class="text-gray-600">Every garment is crafted with the finest materials and attention to detail</p>
          </div>
          <div class="p-8 text-center border-b border-[#7e22ce]/20 hover:border-[#7e22ce] transition-all duration-300">
            <div class="text-[#7e22ce] text-3xl mb-6">
              <i class="fas fa-history"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Timeless Design</h4>
            <p class="text-gray-600">Classic silhouettes that never go out of style and always look elegant</p>
          </div>
          <div class="p-8 text-center border-b border-[#7e22ce]/20 hover:border-[#7e22ce] transition-all duration-300">
            <div class="text-[#7e22ce] text-3xl mb-6">
              <i class="fas fa-magic"></i>
            </div>
            <h4 class="text-xl font-semibold mb-3">Personal Touch</h4>
            <p class="text-gray-600">Expert styling advice to help you create your perfect look</p>
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- Categories -->
  <section id="brands" class="py-20 px-6 bg-[#faf9f7]">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-16">
      <h3 class="text-3xl font-semibold mb-4">
        Fashion <span class="text-[#7e22ce]">Categories</span>
      </h3>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Explore our curated collection of premium fashion categories
      </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @php
        $categories = [
            ['name' => 'Women', 'image' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=720&q=80'],
            ['name' => 'Men', 'image' => 'https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=723&q=80'],
            ['name' => 'Kids', 'image' => 'https://images.unsplash.com/photo-1519340241574-2cec6a12a52d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80'],
        ];
      @endphp
      @foreach ($categories as $category)
        @if ($is_default)
          <div class="relative group overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
            <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}" class="w-full h-96 object-cover transition-transform duration-300 group-hover:scale-105">
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition-colors duration-300"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6">
              <h4 class="text-white text-2xl font-serif font-semibold drop-shadow-md">{{ $category['name'] }}</h4>
              <div class="h-0.5 bg-pink-500 w-16 mt-2 transition-all duration-300 group-hover:w-24"></div>
            </div>
            <a href="#" class="absolute inset-0" aria-label="Shop {{ $category['name'] }}"></a>
          </div>
        @else
          <a href="{{ route('template4.product4.customer', ['headerFooterId' => $headerFooter->id, 'category_name' => $category['name']]) }}" class="group block text-center p-8 rounded-lg">
            <h4 class="text-3xl font-serif text-gray-800 group-hover:text-pink-500 transition-colors duration-300">{{ $category['name'] }}</h4>
            <div class="w-24 h-1 bg-gray-200 mx-auto mt-4 group-hover:bg-pink-500 transition-colors duration-300"></div>
          </a>
        @endif
      @endforeach
    </div>
  </div>
</section>


  <!-- Collection -->
  @if($is_default)
    <section id="collection" class="bg-white">
      <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">Our <span class="text-[#7e22ce]">Collection</span></h3>
          <p class="text-gray-600 max-w-2xl mx-auto">Discover our handpicked selection of fashion pieces</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
          <!-- Static Product Cards -->
          <div class="boutique-card p-6 rounded-lg border border-gray-100">
            <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
              <img src="https://images.unsplash.com/photo-1594223274512-ad4803739b7c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Luxury Handbag"
                  alt="Elegant Dress"
                  class="absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
              <span class="absolute top-4 right-4 bg-white text-gray-900 text-xs font-medium px-2 py-1 rounded">NEW</span>
            </div>
            <h4 class="font-semibold text-lg mb-1">Chic Summer Dress</h4>
            <p class="text-gray-500 text-sm mb-3">Light and airy fabric</p>
            <p class="text-gray-900 font-semibold text-xl mb-4">$129.99</p>
            <button class="w-full btn-pink py-2 rounded font-medium">
              Add to Bag
            </button>
          </div>
          <div class="boutique-card p-6 rounded-lg border border-gray-100">
            <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
              <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Designer Heels"
                  alt="Leather Handbag"
                  class="absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
            </div>
            <h4 class="font-semibold text-lg mb-1">Classic Leather Handbag</h4>
            <p class="text-gray-500 text-sm mb-3">Timeless design, premium leather</p>
            <p class="text-gray-900 font-semibold text-xl mb-4">$249.99</p>
            <button class="w-full btn-pink py-2 rounded font-medium">
              Add to Bag
            </button>
          </div>
          <div class="boutique-card p-6 rounded-lg border border-gray-100">
            <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
              <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=705&q=80" alt="Elegant Dress"
                  alt="Silk Scarf"
                  class="absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
              <span class="absolute top-4 right-4 bg-white text-gray-900 text-xs font-medium px-2 py-1 rounded">LIMITED</span>
            </div>
            <h4 class="font-semibold text-lg mb-1">Printed Silk Scarf</h4>
            <p class="text-gray-500 text-sm mb-3">Luxurious and versatile accessory</p>
            <p class="text-gray-900 font-semibold text-xl mb-4">$79.99</p>
            <button class="w-full btn-pink py-2 rounded font-medium">
              Add to Bag
            </button>
          </div>
          <div class="boutique-card p-6 rounded-lg border border-gray-100">
            <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
              <img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=698&q=80"
                  alt="Designer Heels"
                  class="absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
            </div>
            <h4 class="font-semibold text-lg mb-1">Elegant High Heels</h4>
            <p class="text-gray-500 text-sm mb-3">Perfect for any special occasion</p>
            <p class="text-gray-900 font-semibold text-xl mb-4">$199.99</p>
            <button class="w-full btn-pink py-2 rounded font-medium">
              Add to Bag
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
    <section id="collection" class="bg-white">
      <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">
            <span class="text-[#d4af37]">{{ $section2->main_text2 ?? 'Best Collections' }}</span>
          </h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $section2->sub_text2 ?? 'Perfect choices specially for you' }}</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
            @foreach($products as $product)
                <a href="{{ route('template4.single-product4.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}" class="block group">
                    <div class="bg-white rounded-lg overflow-hidden transition-all duration-300 group-hover:shadow-2xl border border-gray-200/80">
                        <div class="relative">
                            @if($product->is_new)
                                <span class="absolute top-3 left-3 bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-xs font-bold z-10 -rotate-6">NEW!</span>
                            @elseif($product->is_limited)
                                <span class="absolute top-3 left-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold z-10 -rotate-6">LIMITED</span>
                            @endif
                            <div class="aspect-video bg-gray-100 overflow-hidden">
                                <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 group-hover:rotate-2">
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-serif font-semibold text-gray-800 mb-2 truncate">{{ $product->name }}</h3>
                            <p class="text-gray-500 text-sm mb-4 h-10 overflow-hidden">{{ $product->description }}</p>
                            <div class="flex justify-between items-center">
                                <p class="text-2xl font-bold text-pink-500">₹{{ number_format($product->price, 2) }}</p>
                                <button class="btn-pink rounded-full font-medium text-sm px-5 py-2.5 shadow-lg group-hover:shadow-pink-300 transition-shadow">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
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
          <h3 class="text-3xl font-semibold mb-4">Client <span class="text-[#7e22ce]">Love</span></h3>
          <p class="text-gray-600 max-w-2xl mx-auto">Experiences from our amazing community of fashion lovers</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-white p-8 rounded-lg shadow-sm">
            <div class="flex mb-4 text-[#7e22ce]">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="text-gray-700 mb-6 italic">"The personal styling session was a game-changer! I discovered a new sense of confidence and a wardrobe that truly represents me."</p>
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Client" class="w-full h-full object-cover">
              </div>
              <div>
                <h5 class="font-medium">Jessica L.</h5>
                <p class="text-gray-500 text-sm">Happy Customer</p>
              </div>
            </div>
          </div>
          <div class="bg-white p-8 rounded-lg shadow-sm">
            <div class="flex mb-4 text-[#7e22ce]">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="text-gray-700 mb-6 italic">"An absolutely stunning collection with unparalleled quality. I always find unique pieces that I can't get anywhere else."</p>
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="w-full h-full object-cover">
              </div>
              <div>
                <h5 class="font-medium">Sophia M.</h5>
                <p class="text-gray-500 text-sm">Fashion Blogger</p>
              </div>
            </div>
          </div>
          <div class="bg-white p-8 rounded-lg shadow-sm">
            <div class="flex mb-4 text-[#7e22ce]">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text-gray-700 mb-6 italic">"The customer service is exceptional. They went above and beyond to ensure my order was perfect. I'm a customer for life!"</p>
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Client" class="w-full h-full object-cover">
              </div>
              <div>
                <h5 class="font-medium">David R.</h5>
                <p class="text-gray-500 text-sm">Loyal Client</p>
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
          <h3 class="text-3xl font-semibold mb-4">{{ $testimonials->testi_main ?? 'Client Love' }}</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $testimonials->testi_sub ?? 'Experiences from our amazing community of fashion lovers' }}</p>
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
        <h3 class="text-3xl font-semibold mb-6">Contact Our <span class="text-[#7e22ce]">Stylists</span></h3>
        <p class="text-gray-600 mb-8">Our fashion specialists are available to assist you with any inquiries about our collection or services.</p>
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="text-[#7e22ce] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-phone"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Phone</h4>
              <p class="text-gray-600">+1 (888) 555-8888</p>
              <p class="text-sm text-gray-500">Mon-Fri: 9AM-9PM EST</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-[#7e22ce] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Email</h4>
              <p class="text-gray-600">stylist@boutique.com</p>
              <p class="text-sm text-gray-500">Response within 24 hours</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-[#7e22ce] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Boutique</h4>
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
            <input type="text" id="name" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#7e22ce]">
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#7e22ce]">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <textarea id="message" rows="4" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#7e22ce]"></textarea>
          </div>
          <button type="submit" class="w-full btn-pink py-3 rounded font-medium">
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
        <h3 class="text-3xl font-semibold mb-6">{{ $contactus->contact_name ?? 'Contact Our Stylists' }}</h3>
        <p class="text-gray-600 mb-8">{{ $contactus->contact_sub ?? 'Our fashion specialists are available to assist you.' }}</p>
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="text-[#7e22ce] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-phone"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Phone</h4>
              <p class="text-gray-600">{{ $contactus->contact_phone ?? '+1 (888) 555-8888' }}</p>
              <p class="text-sm text-gray-500">{{ $contactus->contact_hours ?? 'Mon-Fri: 9AM-9PM EST' }}</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-[#7e22ce] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Email</h4>
              <p class="text-gray-600">{{ $contactus->contact_email ?? 'concierge@luxuria.com' }}</p>
              <!-- <p class="text-sm text-gray-500">Response within 24 hours</p> -->
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-[#7e22ce] text-xl w-10 mr-4 mt-1">
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
            <input type="text" id="name" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#7e22ce]">
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#7e22ce]">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <textarea id="message" rows="4" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#7e22ce]"></textarea>
          </div>
          <button type="submit" class="w-full btn-pink py-3 rounded font-medium">
            Send Message
          </button>
        </form>
      </div>
    </div>
  </section>
@endif
  <!-- Newsletter -->
  <section class="py-16 px-6 bg-[#7e22ce] text-white">
    <div class="max-w-4xl mx-auto text-center">
      <h3 class="text-3xl font-semibold mb-4">Join Our <span class="text-white">Style Circle</span></h3>
      <p class="text-white/90 mb-8 max-w-2xl mx-auto">Subscribe for exclusive access to new arrivals, special offers, and private styling events.</p>
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