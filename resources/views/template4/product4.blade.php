@include('template4.head4', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

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
              <button class="w-full btn-gold py-2 rounded font-medium">
                Add to Collection
              </button>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif


@include('template4.footer4')
