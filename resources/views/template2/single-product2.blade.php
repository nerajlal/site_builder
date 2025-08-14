@include('template2.head2', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<main class="py-12 px-6 bg-black text-white">
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <!-- Product Image Gallery -->
      <div>
        <div class="relative h-[500px] mb-4 overflow-hidden rounded-lg border border-gray-800">
          <img id="mainImage" src="{{ $product->image_url }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
        </div>
        <div class="grid grid-cols-4 gap-4">
          <div class="h-24 rounded-lg overflow-hidden border-2 border-yellow-600">
            <img src="{{ $product->image_url }}" alt="Thumbnail 1" class="w-full h-full object-cover cursor-pointer" onclick="changeImage('{{ $product->image_url }}')">
          </div>
          <!-- Add more thumbnails if available -->
        </div>
      </div>

      <!-- Product Details -->
      <div class="flex flex-col justify-center">
        <h2 class="text-4xl font-light mb-3">{{ $product->name }}</h2>
        <div class="flex items-center mb-4">
          <div class="flex text-yellow-500">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <p class="text-gray-400 ml-3 text-sm">4.5 (1,234 reviews)</p>
        </div>
        <p class="text-gray-300 mb-6 leading-relaxed">{{ $product->description }}</p>
        <p class="text-yellow-600 font-medium text-4xl mb-6">${{ number_format($product->price, 2) }}</p>

        <div class="flex items-center mb-8">
          <label for="quantity" class="font-medium mr-4">Quantity:</label>
          <div class="flex items-center border border-gray-700 rounded-lg">
            <button class="px-3 py-1 text-gray-400 hover:text-white">-</button>
            <input type="text" id="quantity" value="1" class="w-12 text-center bg-black border-l border-r border-gray-700">
            <button class="px-3 py-1 text-gray-400 hover:text-white">+</button>
          </div>
        </div>

        <div class="flex space-x-4">
          <button class="w-full bg-yellow-600 hover:bg-yellow-700 text-black py-3 rounded-lg font-medium transition flex items-center justify-center">
            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
          </button>
          <button class="p-3 border border-gray-700 rounded-lg text-gray-400 hover:text-yellow-600 hover:border-yellow-600 transition">
            <i class="fas fa-heart"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Product Information Tabs -->
    <div class="mt-20">
      <div class="border-b border-gray-800">
        <nav class="flex space-x-8">
          <button class="py-4 px-1 text-lg font-medium text-yellow-600 border-b-2 border-yellow-600">Details</button>
          <button class="py-4 px-1 text-lg font-medium text-gray-500 hover:text-white">Reviews</button>
        </nav>
      </div>
      <div class="py-8">
        <p class="text-gray-300">
          A timeless masterpiece, this watch is crafted with precision and elegance. The perfect accessory for any occasion, it combines classic design with modern technology.
        </p>
      </div>
    </div>
  </div>
</main>

<script>
  function changeImage(src) {
    document.getElementById('mainImage').src = src;
  }
</script>

@include('template2.footer2')
