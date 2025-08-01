@include('template1.head1', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

  <!-- Hero Banner -->
  @if($is_default)
    <section class="relative bg-gray-900 text-white py-24 text-center overflow-hidden">
      <div class="absolute inset-0 bg-black opacity-50"></div>
      <div class="relative z-10 max-w-4xl mx-auto px-4">
        <h2 class="text-5xl font-bold mb-6">Precisions Crafted Luxury Timepiecess</h2>
        <p class="text-xl mb-8">Experiences the pinnacle of Swiss watchmaking excellences</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-8 py-3 rounded-lg font-medium transition">
            Discover Collectionss <i class="fas fa-arrow-right ml-2"></i>
          </button>
          <button class="bg-transparent hover:bg-white hover:text-gray-900 border-2 border-white text-white px-8 py-3 rounded-lg font-medium transition">
            Book Consultationss
          </button>
        </div>
      </div>
      <img src="https://images.unsplash.com/photo-1523170335258-f5ed11844a49?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80" alt="Luxury Watch" class="absolute inset-0 w-full h-full object-cover">
    </section>
  @else
    <section class="relative bg-gray-900 text-white py-24 text-center overflow-hidden">
      <div class="absolute inset-0 bg-black opacity-50"></div>
      <div class="relative z-10 max-w-4xl mx-auto px-4">
        <h2 class="text-5xl font-bold mb-6">{{ $homesetting->main_text }}</h2>
        <p class="text-xl mb-8">{{ $homesetting->sub_text }}</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-8 py-3 rounded-lg font-medium transition" onclick="window.location.href='/product1'">
            {{ $homesetting->button1_text }} <i class="fas fa-arrow-right ml-2"></i>
          </button>
          <button class="bg-transparent hover:bg-white hover:text-gray-900 border-2 border-white text-white px-8 py-3 rounded-lg font-medium transition" onclick="window.location.href='/product1'">
            {{ $homesetting->button2_text }}
          </button>
        </div>
      </div>
      <img src="https://images.unsplash.com/photo-1523170335258-f5ed11844a49?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80" alt="Luxury Watch" class="absolute inset-0 w-full h-full object-cover">
    </section>
  @endif

  <!-- Features -->
  @if($is_default)
    <section id="features" class="py-20 px-6 bg-white">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-bold mb-4">The LuxuryTime Differencesss</h3>
        <p class="max-w-2xl mx-auto text-gray-600">Why discerning collectors choose our curated selection of timepiecessss</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div class="text-center p-8 rounded-lg watch-shadow">
          <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-gem text-yellow-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">Authenticity Guaranteedss</h4>
          <p class="text-gray-600">Every watch undergoes rigorous authentication by our Swiss-trained expertsss.</p>
        </div>
        <div class="text-center p-8 rounded-lg watch-shadow">
          <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-shield-alt text-yellow-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">Extended Warrantyss</h4>
          <p class="text-gray-600">3-year comprehensive warranty on all purchases for complete peace of mindss.</p>
        </div>
        <div class="text-center p-8 rounded-lg watch-shadow">
          <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-headset text-yellow-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">Concierge Servicesss</h4>
          <p class="text-gray-600">Dedicated personal consultants for bespoke shopping experiencessss.</p>
        </div>
      </div>
    </section>
  @else
    <section id="features" class="py-20 px-6 bg-white">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-bold mb-4">{{ $section1->main_heading }}</h3>
        <p class="max-w-2xl mx-auto text-gray-600">{{ $section1->sub_heading }}</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div class="text-center p-8 rounded-lg watch-shadow">
          <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-gem text-yellow-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">{{ $section1->feature1_heading }}</h4>
          <p class="text-gray-600">{{ $section1->feature1_detail }}</p>
        </div>
        <div class="text-center p-8 rounded-lg watch-shadow">
          <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-shield-alt text-yellow-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">{{ $section1->feature2_heading }}</h4>
          <p class="text-gray-600">{{ $section1->feature2_detail }}</p>
        </div>
        <div class="text-center p-8 rounded-lg watch-shadow">
          <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-headset text-yellow-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">{{ $section1->feature3_heading }}</h4>
          <p class="text-gray-600">{{ $section1->feature3_detail }}</p>
        </div>
      </div>
    </section>
  @endif

  <!-- Categories -->
  @if($is_default)
    <section id="categories" class="py-20 px-6 bg-gray-50">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-bold mb-4">Our Prestigious Brands</h3>
        <p class="max-w-2xl mx-auto text-gray-600">Partnering with the most revered names in horology</p>
      </div>
      <div class="flex flex-wrap justify-center gap-8 max-w-6xl mx-auto">
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="https://i.pinimg.com/originals/53/38/5b/53385b0c2197b1be4bacfd2b565df096.jpg" alt="Rolex" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="https://cdn.wallpapersafari.com/76/18/UOzmNv.jpg" alt="Omega" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="http://upload.wikimedia.org/wikipedia/commons/9/94/Patek-Philippe_MG_2580.jpg" alt="Patek Philippe" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="https://i.pinimg.com/originals/99/ce/74/99ce74c90a44b31e77af5916666424a2.jpg" alt="Cartier" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="http://prideandpinion.com/cdn/shop/collections/HT4A9169.jpg?v=1699013980" alt="IWC" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="https://www.aviandco.com/media/magefan_blog/1_4.jpg" alt="Audemars Piguet" class="w-full h-full rounded-full object-cover">
        </div>
      </div>
    </section>
  @else
    <section id="categories" class="py-20 px-6 bg-gray-50">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-bold mb-4">{{ $section2->main_text1 }}</h3>
        <p class="max-w-2xl mx-auto text-gray-600">{{ $section2->sub_text1 }}</p>
      </div>
      <div class="flex flex-wrap justify-center gap-8 max-w-6xl mx-auto">
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="{{ $section2->image1 }}" alt="image1" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="{{ $section2->image2 }}" alt="image2" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="{{ $section2->image3 }}" alt="image3" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="{{ $section2->image4 }}" alt="image4" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="{{ $section2->image5 }}" alt="image5" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="bg-white p-2 rounded-full brand-logo w-32 h-32 flex items-center justify-center">
          <img src="{{ $section2->image6 }}" alt="image6" class="w-full h-full rounded-full object-cover">
        </div>
      </div>
    </section>
  @endif

  <!-- Products -->
  @if($is_default)
    <section id="products" class="py-20 px-6 bg-white">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-bold mb-4">Best Collections</h3>
        <p class="max-w-2xl mx-auto text-gray-600">Perfect choices specially for you </p>
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
            <img src="https://storage.googleapis.com/stateless-watchilove-com/2021/04/6e01f781-pp_6119r_001_press.jpg" alt="Patek Philippe Calatrava" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            <span class="absolute top-4 right-4 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded">LIMITED</span>
          </div>
          <h4 class="font-semibold text-lg mb-1">Patek Philippe </h4>
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
  @else
    <section id="products" class="py-20 px-6 bg-white">
        <div class="text-center mb-16">
            <h3 class="text-3xl font-bold mb-4">Best Collections</h3>
            <p class="max-w-2xl mx-auto text-gray-600">Perfect choices specially for you</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
            @foreach($products as $product)
                <div class="bg-white p-6 rounded-lg product-card watch-shadow">
                    <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
                        <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        @if($product->is_new)
                            <span class="absolute top-4 right-4 bg-yellow-600 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
                        @elseif($product->is_limited)
                            <span class="absolute top-4 right-4 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded">LIMITED</span>
                        @endif
                    </div>
                    <h4 class="font-semibold text-lg mb-1">{{ $product->name }}</h4>
                    <p class="text-gray-600 text-sm mb-3">{{ $product->description }}</p>
                    <p class="text-green-700 font-bold text-xl mb-4">${{ number_format($product->price, 2) }}</p>
                    <button class="w-full bg-gray-900 hover:bg-gray-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
                        <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                    </button>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="#">
                <button class="bg-transparent hover:bg-gray-900 text-gray-900 hover:text-white border-2 border-gray-900 px-8 py-3 rounded-lg font-medium transition"onclick="window.location.href='/product1'">
                    View Full Collection <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </a>
        </div>
    </section>
  @endif

  <!-- Testimonials -->
  @if($is_default)
    <section class="py-20 px-6 bg-white">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-bold mb-4">Client Testimonialssss</h3>
        <p class="max-w-2xl mx-auto text-gray-600">What our discerning clients say about their LuxuryTime experiencess</p>
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
  @else
    <section class="py-20 px-6 bg-white">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-bold mb-4">{{ $testimonials->testi_main }}</h3>
        <p class="max-w-2xl mx-auto text-gray-600">{{ $testimonials->testi_sub }}</p>
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
          <p class="text-gray-700 mb-6">"{{ $testimonials->testi1 }}"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-semibold">{{ $testimonials->testi_user1 }}</h5>
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
          <p class="text-gray-700 mb-6">"{{ $testimonials->testi2 }}"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-semibold">{{ $testimonials->testi_user2 }}</h5>
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
          <p class="text-gray-700 mb-6">"{{ $testimonials->testi3 }}"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-semibold">{{ $testimonials->testi_user3 }}</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- Contact Section -->
  @if($is_default)
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
  @else
    <section id="contact" class="py-20 px-6 bg-white">
      <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
        <div>
          <h3 class="text-3xl font-bold mb-6">{{ $contactus->contact_name }}</h3>
          <p class="text-gray-600 mb-8">{{ $contactus->contact_sub }}</p>
          <div class="space-y-6">
            <div class="flex items-start">
              <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-phone text-yellow-600"></i>
              </div>
              <div>
                <h4 class="font-semibold mb-1">Phone</h4>
                <p class="text-gray-600">{{ $contactus->contact_phone }}</p>
                <p class="text-sm text-gray-500">{{ $contactus->contact_hours }}</p>
              </div>
            </div>
            <div class="flex items-start">
              <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-envelope text-yellow-600"></i>
              </div>
              <div>
                <h4 class="font-semibold mb-1">Email</h4>
                <p class="text-gray-600">{{ $contactus->contact_email }}</p>
                <!-- <p class="text-sm text-gray-500">Response within 24 hours</p> -->
              </div>
            </div>
            <div class="flex items-start">
              <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-map-marker-alt text-yellow-600"></i>
              </div>
              <div>
                <h4 class="font-semibold mb-1">{{ $contactus->contact_building }}</h4>
                <p class="text-gray-600">{{ $contactus->contact_line1 }}</p>
                <p class="text-sm text-gray-500">{{ $contactus->contact_line2 }}</p>
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
  @endif

  <!-- Newsletter -->
  <section class="py-16 px-6 bg-gray-900 text-white">
    <div class="max-w-4xl mx-auto text-center">
      <h3 class="text-3xl font-bold mb-4">Join Our Circle</h3>
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
