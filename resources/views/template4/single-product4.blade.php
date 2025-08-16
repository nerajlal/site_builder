@include('template4.head4', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<section class="py-20 px-6 bg-white">
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div>
        <div class="relative h-[500px] mb-6 overflow-hidden rounded-lg">
          <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
        </div>
      </div>
      <div>
        <h2 class="text-4xl font-medium mb-4">{{ $product->name }}</h2>
        <p class="text-gray-600 mb-6">{{ $product->description }}</p>
        <p class="text-gray-900 font-medium text-3xl mb-6">${{ number_format($product->price, 2) }}</p>
        <div class="flex items-center mb-6">
          <div class="flex text-yellow-500">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <p class="text-gray-600 ml-2">4.5 (1,234 reviews)</p>
        </div>
        <div class="flex space-x-4">
          <button class="bg-teal-600 hover:bg-teal-700 text-white px-8 py-3 font-medium transition duration-300">
            Add to Cart
          </button>
          <button class="border border-gray-300 hover:border-teal-600 text-gray-900 px-8 py-3 font-medium transition duration-300">
            Add to Wishlist
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

@include('template4.footer4')
