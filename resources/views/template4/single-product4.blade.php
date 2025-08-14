@include('template4.head4', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<body class="bg-[#faf9f7]">
  <main class="py-12 px-6" style="font-family: 'Montserrat', sans-serif;">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Product Image Gallery -->
        <div>
          <div class="relative h-[500px] mb-4 overflow-hidden rounded-lg">
            <img id="mainImage" src="{{ $product->image_url }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
          </div>
          <div class="grid grid-cols-4 gap-4">
            <div class="h-24 rounded-lg overflow-hidden border-2 border-[#ec4899]">
              <img src="{{ $product->image_url }}" alt="Thumbnail 1" class="w-full h-full object-cover cursor-pointer" onclick="changeImage('{{ $product->image_url }}')">
            </div>
            <!-- Add more thumbnails if available -->
          </div>
        </div>

        <!-- Product Details -->
        <div class="flex flex-col justify-center">
          <h2 class="text-4xl mb-4 gold-underline" style="font-family: 'Cormorant Garamond', serif;">{{ $product->name }}</h2>
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-500">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text-gray-600 ml-3 text-sm">4.5 (1,234 reviews)</p>
          </div>
          <p class="text-gray-700 mb-6 leading-relaxed">{{ $product->description }}</p>
          <p class="text-gray-900 font-semibold text-4xl mb-6">${{ number_format($product->price, 2) }}</p>

          <div class="flex items-center mb-8">
            <label for="quantity" class="font-medium mr-4">Quantity:</label>
            <div class="flex items-center border border-gray-300 rounded-lg">
              <button class="px-3 py-1 text-gray-600 hover:text-gray-900">-</button>
              <input type="text" id="quantity" value="1" class="w-12 text-center border-l border-r border-gray-300">
              <button class="px-3 py-1 text-gray-600 hover:text-gray-900">+</button>
            </div>
          </div>

          <div class="flex space-x-4">
            <button class="w-full py-3 rounded-lg font-medium btn-pink">
              Add to Cart
            </button>
            <button class="p-3 rounded-lg btn-outline">
              <i class="fas fa-heart"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Product Information Tabs -->
      <div class="mt-20">
        <div class="border-b border-gray-200">
          <nav class="flex space-x-8">
            <button class="py-4 px-1 text-lg text-[#ec4899] border-b-2 border-[#ec4899]" style="font-family: 'Cormorant Garamond', serif;">Details</button>
            <button class="py-4 px-1 text-lg text-gray-500 hover:text-gray-900" style="font-family: 'Cormorant Garamond', serif;">Reviews</button>
          </nav>
        </div>
        <div class="py-8">
          <p class="text-gray-700">
            A truly stylish piece, this item is designed for the modern fashionista. Its unique design and high-quality construction make it a standout addition to any collection.
          </p>
        </div>
      </div>
    </div>
  </main>
</body>

<script>
  function changeImage(src) {
    document.getElementById('mainImage').src = src;
  }
</script>

@include('template4.footer4')
