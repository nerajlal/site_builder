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

  <!-- Categories -->
  <section id="brands" class="py-20 px-6 bg-[#faf9f7]">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-16">
      <h3 class="text-3xl font-semibold mb-4">
        Fashion <span class="text-[#ec4899]">Categories</span>
      </h3>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Explore our curated collection of premium fashion categories
      </p>
    </div>
    <div class="grid grid-cols-3 md:grid-cols-3 gap-8">
      @php
        $categoriesToDisplay = [];
        if ($is_default) {
            $categoriesToDisplay = [
                ['name' => 'Women', 'image' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80'],
                ['name' => 'Men', 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80'],
                ['name' => 'Kids', 'image' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80'],
            ];
        } else {
            $categoryNames = $categories->pluck('name')->all();
            $categoryImages = [$section2->image1, $section2->image2, $section2->image3];
            for ($i = 0; $i < 3; $i++) {
                $categoriesToDisplay[] = [
                    'name' => $categoryNames[$i] ?? 'Category ' . ($i + 1),
                    'image' => $categoryImages[$i] ?? 'https://via.placeholder.com/400x400',
                ];
            }
        }
      @endphp
      @foreach ($categoriesToDisplay as $category)
      <div class="group">
        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
          <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
        </div>
        <h3 class="mt-4 text-sm text-gray-700">{{ $category['name'] }}</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">Shop Now</p>
      </div>
      @endforeach
    </div>
  </div>
</section>


  <!-- Collection -->
  @if($is_default)
    <section id="collection" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">Our <span class="text-[#ec4899]">Collection</span></h3>
          <p class="text-gray-600 max-w-2xl mx-auto">Discover our handpicked selection of fashion pieces</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
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
    <section id="collection" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-semibold mb-4">
            <span class="text-[#d4af37]">{{ $section2->main_text2 ?? 'Best Collections' }}</span>
          </h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $section2->sub_text2 ?? 'Perfect choices specially for you' }}</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          @foreach($products as $product)
            <div class="watch-card p-6 rounded-lg border border-gray-100">
              <a href="{{ route('template4.single-product', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}">
                <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
                  <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                  @if($product->is_new)
                    <span class="absolute top-4 right-4 bg-white text-gray-900 text-xs font-medium px-2 py-1 rounded">NEW</span>
                  @elseif($product->is_limited)
                    <span class="absolute top-4 right-4 bg-white text-gray-900 text-xs font-medium px-2 py-1 rounded">LIMITED</span>
                  @endif
                </div>
                <h4 class="font-semibold text-lg mb-1">{{ $product->name }}</h4>
                <p class="text-gray-500 text-sm mb-3">{{ $product->description }}</p>
                <p class="text-gray-900 font-semibold text-xl mb-4">${{ number_format($product->price, 2) }}</p>
                <button class="w-full btn-pink py-2 rounded font-medium">
                  View Product
                </button>
              </a>
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
          <h3 class="text-3xl font-semibold mb-4">Client <span class="text-[#ec4899]">Love</span></h3>
          <p class="text-gray-600 max-w-2xl mx-auto">Experiences from our amazing community of fashion lovers</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-white p-8 rounded-lg shadow-sm">
            <div class="flex mb-4 text-[#ec4899]">
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
            <div class="flex mb-4 text-[#ec4899]">
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
            <div class="flex mb-4 text-[#ec4899]">
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
        <h3 class="text-3xl font-semibold mb-6">Contact Our <span class="text-[#ec4899]">Stylists</span></h3>
        <p class="text-gray-600 mb-8">Our fashion specialists are available to assist you with any inquiries about our collection or services.</p>
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="text-[#ec4899] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-phone"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Phone</h4>
              <p class="text-gray-600">+1 (888) 555-8888</p>
              <p class="text-sm text-gray-500">Mon-Fri: 9AM-9PM EST</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-[#ec4899] text-xl w-10 mr-4 mt-1">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Email</h4>
              <p class="text-gray-600">stylist@boutique.com</p>
              <p class="text-sm text-gray-500">Response within 24 hours</p>
            </div>
          </div>
          <div class="flex items-start">
            <div class="text-[#ec4899] text-xl w-10 mr-4 mt-1">
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
            <input type="text" id="name" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#ec4899]">
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#ec4899]">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <textarea id="message" rows="4" class="w-full px-4 py-2 bg-white border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-[#ec4899]"></textarea>
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
  <section class="py-16 px-6 bg-[#ec4899] text-white">
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