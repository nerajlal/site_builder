@include('template1.head1', ['is_default' => $is_default, 'headerFooter' => $headerFooter])


  <!-- Products -->
  @if($is_default)
    <section id="products" class="py-20 px-6 bg-white">
      <div class="text-center mb-16">
        <h3 class="text-3xl font-bold mb-4">Our Collections</h3>
        <p class="max-w-2xl mx-auto text-gray-600">Find your next favorite piece in our curated collection.</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-4xl mx-auto">
        <div class="bg-white p-6 rounded-lg product-card boutique-shadow">
          <div class="relative h-80 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=705&q=80" alt="Elegant Dress" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            <span class="absolute top-4 right-4 bg-pink-600 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
          </div>
          <h4 class="font-semibold text-lg mb-1">Chic Summer Dress</h4>
          <p class="text-gray-600 text-sm mb-3">Light and airy fabric</p>
          <p class="text-pink-700 font-bold text-xl mb-4">$129.99</p>
          <button class="w-full bg-gray-900 hover:bg-pink-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
            <i class="fas fa-shopping-bag mr-2"></i> Add to Bag
          </button>
        </div>
        <div class="bg-white p-6 rounded-lg product-card boutique-shadow">
          <div class="relative h-80 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Leather Handbag" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
          </div>
          <h4 class="font-semibold text-lg mb-1">Classic Leather Handbag</h4>
          <p class="text-gray-600 text-sm mb-3">Timeless design, premium leather</p>
          <p class="text-pink-700 font-bold text-xl mb-4">$249.99</p>
          <button class="w-full bg-gray-900 hover:bg-pink-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
            <i class="fas fa-shopping-bag mr-2"></i> Add to Bag
          </button>
        </div>
        <div class="bg-white p-6 rounded-lg product-card boutique-shadow">
          <div class="relative h-80 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Silk Scarf" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            <span class="absolute top-4 right-4 bg-pink-600 text-white text-xs font-semibold px-2 py-1 rounded">LIMITED</span>
          </div>
          <h4 class="font-semibold text-lg mb-1">Printed Silk Scarf</h4>
          <p class="text-gray-600 text-sm mb-3">Luxurious and versatile accessory</p>
          <p class="text-pink-700 font-bold text-xl mb-4">$79.99</p>
          <button class="w-full bg-gray-900 hover:bg-pink-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
            <i class="fas fa-shopping-bag mr-2"></i> Add to Bag
          </button>
        </div>
        <div class="bg-white p-6 rounded-lg product-card boutique-shadow">
          <div class="relative h-80 mb-6 overflow-hidden rounded-lg">
            <img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=698&q=80" alt="Designer Heels" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
          </div>
          <h4 class="font-semibold text-lg mb-1">Elegant High Heels</h4>
          <p class="text-gray-600 text-sm mb-3">Perfect for any special occasion</p>
          <p class="text-pink-700 font-bold text-xl mb-4">$199.99</p>
          <button class="w-full bg-gray-900 hover:bg-pink-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
            <i class="fas fa-shopping-bag mr-2"></i> Add to Bag
          </button>
        </div>
      </div>
      <!-- <div class="text-center mt-12">
        <button class="bg-transparent hover:bg-gray-900 text-gray-900 hover:text-white border-2 border-gray-900 px-8 py-3 rounded-lg font-medium transition">
          View Full Collection <i class="fas fa-arrow-right ml-2"></i>
        </button>
      </div> -->
    </section>
  @else
    <section id="products" class="py-20 px-6 bg-white">
        <div class="text-center mb-16">
            <h3 class="text-3xl font-bold mb-4">Our Collections</h3>
            <p class="max-w-2xl mx-auto text-gray-600">Find your next favorite piece in our curated collection.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-4xl mx-auto">
            @foreach($products as $product)
                <div class="bg-white p-6 rounded-lg product-card boutique-shadow">
                    <div class="relative h-80 mb-6 overflow-hidden rounded-lg">
                        <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        @if($product->is_new)
                            <span class="absolute top-4 right-4 bg-pink-600 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
                        @elseif($product->is_limited)
                            <span class="absolute top-4 right-4 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded">LIMITED</span>
                        @endif
                    </div>
                    <a href="{{ route('template1.single-product', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}">
                    <h4 class="font-semibold text-lg mb-1">{{ $product->name }}</h4>
                    <p class="text-gray-600 text-sm mb-3">{{ $product->description }}</p>
                    <p class="text-pink-700 font-bold text-xl mb-4">${{ number_format($product->price, 2) }}</p>
                    <button class="w-full bg-gray-900 hover:bg-pink-800 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
                        <i class="fas fa-shopping-bag mr-2"></i> View Product
                    </button>
                    </a>
                </div>
            @endforeach
        </div>

        
    </section>
  @endif


@include('template1.footer1')
