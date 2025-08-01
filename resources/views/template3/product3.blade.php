@include('template3.head3', ['is_default' => $is_default, 'headerFooter' => $headerFooter])


    <!-- Collection -->
  @if($is_default)
    <section id="collection" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-medium mb-4">Curated Collection</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">Select timepieces for the discerning collector</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Static Product Cards -->
          @include('template2.collection-default')
        </div>
        <div class="text-center mt-12">
          <button class="border border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 px-8 py-3 rounded-lg font-medium transition duration-300">
            View Full Collection
          </button>
        </div>
      </div>
    </section>
  @else
    <section id="collection" class="py-20 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h3 class="text-3xl font-medium mb-4">{{ $section3->main_text ?? 'Best Collections' }}</h3>
          <p class="text-gray-600 max-w-2xl mx-auto">{{ $section3->sub_text ?? 'Perfect choices specially for you' }}</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          @foreach($products as $product)
            <div class="watch-card p-6 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">
              <div class="relative h-64 mb-6 overflow-hidden rounded-lg">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                @if($product->is_new)
                  <span class="absolute top-4 right-4 bg-white text-gray-900 text-xs font-medium px-2 py-1 rounded">NEW</span>
                @elseif($product->is_limited)
                  <span class="absolute top-4 right-4 bg-white text-gray-900 text-xs font-medium px-2 py-1 rounded">LIMITED</span>
                @endif
              </div>
              <h4 class="font-medium text-lg mb-1">{{ $product->name }}</h4>
              <p class="text-gray-500 text-sm mb-3">{{ $product->description }}</p>
              <p class="text-gray-900 font-medium text-xl mb-4">${{ number_format($product->price, 2) }}</p>
              <button class="w-full border border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 py-2 rounded-lg font-medium transition duration-300">
                Add to Cart
              </button>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif


@include('template3.footer3')
