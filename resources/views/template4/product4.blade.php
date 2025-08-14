@include('template4.head4', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

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
              <img src="https://images.unsplash.com/photo-1571951103752-53c15cad21e6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
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
              <img src="https://images.unsplash.com/photo-1598554747476-3842883a84a6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
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
              <img src="https://images.unsplash.com/photo-1627292828062-a4744e3e1a93?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
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
            <span class="text-[#ec4899]">{{ $section2->main_text2 ?? 'Best Collections' }}</span>
          </h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $section2->sub_text2 ?? 'Perfect choices specially for you' }}</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          @foreach($products as $product)
            <div class="boutique-card p-6 rounded-lg border border-gray-100">
              <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                @if($product->is_new)
                  <span class="absolute top-4 right-4 bg-white text-gray-900 text-xs font-medium px-2 py-1 rounded">NEW</span>
                @elseif($product->is_limited)
                  <span class="absolute top-4 right-4 bg-white text-gray-900 text-xs font-medium px-2 py-1 rounded">LIMITED</span>
                @endif
              </div>
              <a href="{{ route('template4.single-product', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}">
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
      </div>
    </section>
  @endif


@include('template4.footer4')
