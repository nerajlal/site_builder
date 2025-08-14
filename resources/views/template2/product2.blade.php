@include('template2.head2', ['is_default' => $is_default, 'headerFooter' => $headerFooter])


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
      <!-- <div class="text-center mt-12">
        <button class="border border-gray-600 hover:border-white text-white px-8 py-3 rounded-lg font-medium transition duration-300">
          View Full Collection
        </button>
      </div> -->
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
            <a href="{{ route('template2.single-product', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}">
            <h4 class="font-medium text-lg mb-1">{{ $product->name }}</h4>
            <p class="text-gray-400 text-sm mb-3">{{ $product->description }}</p>
            <p class="text-yellow-600 font-medium text-xl mb-4">${{ number_format($product->price, 2) }}</p>
            <button class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-lg font-medium transition duration-300">
              View Product
            </button>
            </a>
          </div>
        @endforeach
      </div>
      
      </div>
    </div>
  </section>
@endif



@include('template2.footer2')
