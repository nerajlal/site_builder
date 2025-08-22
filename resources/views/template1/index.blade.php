@include('template1.head1')

  <!-- Hero Banner -->
  @if($is_default)
    <section class="relative h-screen flex items-center justify-center text-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80');">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 text-white px-4">
            <h2 class="text-5xl md:text-6xl font-bold mb-6">Elegant Fashion for Every Occasion</h2>
            <p class="text-xl md:text-2xl mb-8">Discover our curated collection of stylish boutique pieces</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 rounded-lg font-medium transition">
                    Shop Collection <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a href="#" class="bg-transparent hover:bg-white hover:text-gray-900 border-2 border-white text-white px-8 py-3 rounded-lg font-medium transition">
                    Book Appointment
                </a>
            </div>
        </div>
    </section>
  @else
    <section class="relative h-screen flex items-center justify-center text-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80');">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 text-white px-4">
            <h2 class="text-5xl md:text-6xl font-bold mb-6">{{ $homesetting->main_text }}</h2>
            <p class="text-xl md:text-2xl mb-8">{{ $homesetting->sub_text }}</p>
            @php
              $currentUrl = request()->url();
              $headerFooterId = null;
              if (preg_match('/\/index1\/(\d+)/', $currentUrl, $matches)) {
                $headerFooterId = $matches[1];
              }
            @endphp
            <div class="flex flex-col sm:flex-row justify-center gap-4">
              @if($headerFooterId)
                <a href="{{ route('products.show', ['headerFooterId' => $headerFooterId]) }}" class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 rounded-lg font-medium transition">
                  {{ $homesetting->button1_text }} <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a href="{{ route('products.show', ['headerFooterId' => $headerFooterId]) }}" class="bg-transparent hover:bg-white hover:text-gray-900 border-2 border-white text-white px-8 py-3 rounded-lg font-medium transition">
                  {{ $homesetting->button2_text }}
                </a>
              @else
                <a href="#" class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 rounded-lg font-medium transition">
                  {{ $homesetting->button1_text }} <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a href="#" class="bg-transparent hover:bg-white hover:text-gray-900 border-2 border-white text-white px-8 py-3 rounded-lg font-medium transition">
                  {{ $homesetting->button2_text }}
                </a>
              @endif
            </div>
        </div>
    </section>
  @endif

  <!-- Features -->
  @if($is_default)
    <section id="features" class="py-20 px-6 bg-white">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-bold mb-4">The BoutiqueStyle Difference</h3>
        <p class="max-w-2xl mx-auto text-gray-600">Why fashion-forward customers choose our curated boutique collection</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div class="text-center p-8 rounded-lg boutique-shadow">
          <div class="bg-pink-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-star text-pink-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">Curated Selection</h4>
          <p class="text-gray-600">Handpicked pieces from the latest fashion trends and timeless classics.</p>
        </div>
        <div class="text-center p-8 rounded-lg boutique-shadow">
          <div class="bg-pink-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-heart text-pink-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">Personal Styling</h4>
          <p class="text-gray-600">Expert fashion advice and personalized styling sessions for every customer.</p>
        </div>
        <div class="text-center p-8 rounded-lg boutique-shadow">
          <div class="bg-pink-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-shipping-fast text-pink-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">Fast Delivery</h4>
          <p class="text-gray-600">Quick and secure shipping with easy returns for your convenience.</p>
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
        <div class="text-center p-8 rounded-lg boutique-shadow">
          <div class="bg-pink-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-star text-pink-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">{{ $section1->feature1_heading }}</h4>
          <p class="text-gray-600">{{ $section1->feature1_detail }}</p>
        </div>
        <div class="text-center p-8 rounded-lg boutique-shadow">
          <div class="bg-pink-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-heart text-pink-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">{{ $section1->feature2_heading }}</h4>
          <p class="text-gray-600">{{ $section1->feature2_detail }}</p>
        </div>
        <div class="text-center p-8 rounded-lg boutique-shadow">
          <div class="bg-pink-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-shipping-fast text-pink-600 text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-3">{{ $section1->feature3_heading }}</h4>
          <p class="text-gray-600">{{ $section1->feature3_detail }}</p>
        </div>
      </div>
    </section>
  @endif

  <!-- Categories -->
  <section id="categories" class="py-20 px-6 bg-gray-50">
    <div class="text-center mb-16">
      <h3 class="text-3xl font-bold mb-4">Shop by Category</h3>
      <p class="max-w-2xl mx-auto text-gray-600">Find the perfect outfit for any occasion from our curated collections.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      @php
        $displayCategories = $is_default ? [
            ['name' => 'Women', 'image' => 'https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80', 'category_name' => 'Women'],
            ['name' => 'Men', 'image' => 'https://www.yellowbrick.co/wp-content/uploads/2021/02/fbe_landingpage_2.jpg', 'category_name' => 'Men'],
            ['name' => 'Kids', 'image' => 'https://media.istockphoto.com/id/956002732/photo/little-cute-girl-in-dress.jpg?s=612x612&w=0&k=20&c=zpn86EPE9nttoARCw6OvgxI_t34f0cv35ODBZLYZSRo=', 'category_name' => 'Kids'],
        ] : $categories;
      @endphp
      @foreach ($displayCategories as $category)
        <a href="{{ $is_default ? '#' : route('products.show', ['headerFooterId' => $headerFooter->id, 'category_name' => $category->name]) }}" class="relative group overflow-hidden rounded-xl border border-gray-200/50 shadow-sm hover:shadow-xl transition-all duration-300 ease-in-out">
          <div class="aspect-w-1 aspect-h-1">
            <img src="{{ $is_default ? $category['image'] : $category->image_url }}" alt="{{ $category->name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
          </div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
          <div class="absolute bottom-0 left-0 p-6">
            <h4 class="text-2xl font-semibold text-white tracking-wider">{{ $category['name'] }}</h4>
          </div>
          <div class="absolute inset-0 bg-white/80 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <span class="bg-pink-600 text-white px-8 py-3 rounded-lg font-medium">
              Explore
            </span>
          </div>
        </a>
      @endforeach
    </div>

  </section>

  <!-- Products -->
  @if($is_default)
    <section id="products" class="bg-white">
      <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-bold mb-4">Featured Collection</h3>
          <p class="max-w-2xl mx-auto text-gray-600">Handpicked pieces for the fashion-forward</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
          <div class="bg-white p-6 rounded-lg product-card boutique-shadow">
            <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
              <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=705&q=80" alt="Elegant Dress" class="absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
              <span class="absolute top-4 right-4 bg-pink-600 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
            </div>
            <h4 class="font-semibold text-lg mb-1">Elegant Evening Dress</h4>
            <p class="text-gray-600 text-sm mb-3">Silk, Designer Collection</p>
            <p class="text-green-700 font-bold text-xl mb-4">$299.00</p>
            <button class="w-full bg-gray-900 hover:bg-gray-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
              <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
          <div class="bg-white p-6 rounded-lg product-card boutique-shadow">
            <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
              <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Designer Heels" class="absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            </div>
            <h4 class="font-semibold text-lg mb-1">Designer Heels</h4>
            <p class="text-gray-600 text-sm mb-3">Leather, Premium Quality</p>
            <p class="text-green-700 font-bold text-xl mb-4">$189.00</p>
            <button class="w-full bg-gray-900 hover:bg-gray-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
              <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
          <div class="bg-white p-6 rounded-lg product-card boutique-shadow">
            <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
              <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Luxury Handbag" class="absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
              <span class="absolute top-4 right-4 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded">LIMITED</span>
            </div>
            <h4 class="font-semibold text-lg mb-1">Luxury Handbag</h4>
            <p class="text-gray-600 text-sm mb-3">Genuine Leather, Italian-made</p>
            <p class="text-green-700 font-bold text-xl mb-4">$450.00</p>
            <button class="w-full bg-gray-900 hover:bg-gray-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
              <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
          <div class="bg-white p-6 rounded-lg product-card watch-shadow">
            <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
              <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=705&q=80Cartier Tank" class="absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            </div>
            <h4 class="font-semibold text-lg mb-1">Statement Necklace</h4>
            <p class="text-gray-600 text-sm mb-3">Gold-plated, Crystal Embellished</p>
            <p class="text-green-700 font-bold text-xl mb-4">$150.00</p>
            <button class="w-full bg-gray-900 hover:bg-gray-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
              <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
        <div class="text-center mt-12">
          <button class="bg-transparent hover:bg-pink-600 text-pink-600 hover:text-white border-2 border-gray-900 px-8 py-3 rounded-lg font-medium transition">
            View Full Collection <i class="fas fa-arrow-right ml-2"></i>
          </button>
        </div>
      </div>
    </section>
  @else
    <section id="products" class="bg-white">
      <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h3 class="text-3xl font-bold mb-4">Best Collections</h3>
            <p class="max-w-2xl mx-auto text-gray-600">Perfect choices specially for you</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
            @foreach($products as $product)
                <a href="{{ route('single-product.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}" class="block">
                    <div class="bg-white rounded-lg overflow-hidden product-card boutique-shadow">
                        <div class="relative">
                            @if($product->is_new)
                                <span class="absolute top-3 left-3 bg-pink-600 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                            @elseif($product->is_limited)
                                 <span class="absolute top-3 left-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-medium z-10">LIMITED</span>
                            @endif
                            <div class="aspect-square bg-pink-50 flex items-center justify-center">
                                 <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-medium text-gray-900 mb-2">{{ $product->name }}</h3>
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="text-lg font-bold text-gray-900">₹{{ number_format($product->price, 2) }}</span>
                            </div>
                            <div class="flex items-center mb-3">
                                <div class="flex items-center">
                                    <span class="text-yellow-500 text-sm">★★★★</span>
                                    <span class="text-gray-300 text-sm">★</span>
                                </div>
                                <span class="ml-2 text-sm text-gray-500">76</span> <!-- Placeholder for reviews -->
                            </div>
                                <button class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2 px-4 rounded-lg font-medium transition flex items-center justify-center">
                                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                </button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="text-center mt-12">
            @if($headerFooterId)
                <a href="{{ route('products.show', ['headerFooterId' => $headerFooterId]) }}">
                    <button class="bg-transparent hover:bg-pink-600 text-pink-600 hover:text-white border-2 border-gray-900 px-8 py-3 rounded-lg font-medium transition">
                        View Full Collection <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </a>
            @else
                <a href="#">
                    <button class="bg-transparent hover:bg-pink-600 text-pink-600 hover:text-white border-2 border-pink-600 px-8 py-3 rounded-lg font-medium transition">
                        View Full Collection <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </a>
            @endif
        </div>
      </div>
    </section>
  @endif

  <!-- Testimonials -->
  @if($is_default)
    <section class="py-20 px-6 bg-white">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-bold mb-4">What Our Clients Say</h3>
        <p class="max-w-2xl mx-auto text-gray-600">Experiences from our amazing community of fashion lovers</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div class="bg-gray-50 p-8 rounded-lg boutique-shadow">
          <div class="flex items-center mb-4">
            <div class="text-pink-600 text-xl mr-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-700 mb-6">"The personal styling session was a game-changer! I discovered a new sense of confidence and a wardrobe that truly represents me."</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-semibold">Jessica L.</h5>
              <p class="text-gray-600 text-sm">Happy Customer</p>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 p-8 rounded-lg boutique-shadow">
          <div class="flex items-center mb-4">
            <div class="text-pink-600 text-xl mr-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-700 mb-6">"An absolutely stunning collection with unparalleled quality. I always find unique pieces that I can't get anywhere else."</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-semibold">Sophia M.</h5>
              <p class="text-gray-600 text-sm">Fashion Blogger</p>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 p-8 rounded-lg boutique-shadow">
          <div class="flex items-center mb-4">
            <div class="text-pink-600 text-xl mr-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <p class="text-gray-700 mb-6">"The customer service is exceptional. They went above and beyond to ensure my order was perfect. I'm a customer for life!"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
              <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Client" class="w-full h-full object-cover">
            </div>
            <div>
              <h5 class="font-semibold">David R.</h5>
              <p class="text-gray-600 text-sm">Loyal Client</p>
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
        <div class="bg-gray-50 p-8 rounded-lg boutique-shadow">
          <div class="flex items-center mb-4">
            <div class="text-pink-600 text-xl mr-2">
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
        <div class="bg-gray-50 p-8 rounded-lg boutique-shadow">
          <div class="flex items-center mb-4">
            <div class="text-pink-600 text-xl mr-2">
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
        <div class="bg-gray-50 p-8 rounded-lg boutique-shadow">
          <div class="flex items-center mb-4">
            <div class="text-pink-600 text-xl mr-2">
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
          <h3 class="text-3xl font-bold mb-6">Get In Touch</h3>
          <p class="text-gray-600 mb-8">Our fashion specialists are available to assist you with any inquiries about our collection, styling, or your order.</p>
          <div class="space-y-6">
            <div class="flex items-start">
              <div class="bg-pink-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-phone text-pink-600"></i>
              </div>
              <div>
                <h4 class="font-semibold mb-1">Phone</h4>
                <p class="text-gray-600">+1 (888) 555-8888</p>
                <p class="text-sm text-gray-500">Mon-Fri: 9AM-9PM EST</p>
              </div>
            </div>
            <div class="flex items-start">
              <div class="bg-pink-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-envelope text-pink-600"></i>
              </div>
              <div>
                <h4 class="font-semibold mb-1">Email</h4>
                <p class="text-gray-600">stylist@boutique.com</p>
                <p class="text-sm text-gray-500">Response within 24 hours</p>
              </div>
            </div>
            <div class="flex items-start">
              <div class="bg-pink-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-map-marker-alt text-pink-600"></i>
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
          <form class="bg-gray-50 p-8 rounded-lg boutique-shadow">
            <h4 class="text-xl font-semibold mb-6">Send Us a Message</h4>
            <div class="space-y-4">
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 focus:border-transparent">
              </div>
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 focus:border-transparent">
              </div>
              <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone (Optional)</label>
                <input type="tel" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 focus:border-transparent">
              </div>
              <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 focus:border-transparent"></textarea>
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
              <div class="bg-pink-600 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-phone text-pink-300"></i>
              </div>
              <div>
                <h4 class="font-semibold mb-1">Phone</h4>
                <p class="text-gray-600">{{ $contactus->contact_phone }}</p>
                <p class="text-sm text-gray-500">{{ $contactus->contact_hours }}</p>
              </div>
            </div>
            <div class="flex items-start">
              <div class="bg-pink-600 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-envelope text-pink-300"></i>
              </div>
              <div>
                <h4 class="font-semibold mb-1">Email</h4>
                <p class="text-gray-600">{{ $contactus->contact_email }}</p>
                <!-- <p class="text-sm text-gray-500">Response within 24 hours</p> -->
              </div>
            </div>
            <div class="flex items-start">
              <div class="bg-pink-600 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-map-marker-alt text-pink-300"></i>
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
          <form class="bg-pink-50 p-8 rounded-lg watch-shadow">
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
              <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-medium transition">
                Send Message <i class="fas fa-paper-plane ml-2"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
  @endif

  <!-- Newsletter -->
  <section class="py-16 px-6 bg-pink-600 text-white">
    <div class="max-w-4xl mx-auto text-center">
      <h3 class="text-3xl font-bold mb-4">Join Our Style Circle</h3>
      <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Subscribe to receive exclusive access to new arrivals, private styling sessions, and fashion insights.</p>
      <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
        <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-pink-600">
        <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-white px-6 py-3 rounded-lg font-medium transition">
          Subscribe
        </button>
      </form>
      <p class="text-xs text-gray-400 mt-4">We respect your privacy. Unsubscribe at any time.</p>
    </div>
  </section>

@include('template1.footer1')
