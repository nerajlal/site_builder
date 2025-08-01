@include('template1.head1', ['is_default' => $is_default, 'headerFooter' => $headerFooter])


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

        
    </section>
  @endif


@include('template1.footer1')
