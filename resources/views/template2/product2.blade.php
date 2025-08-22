@include('template2.head2', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

@if($is_default)
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-white">
        <!-- Page Title -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-light mb-4">Curated <span class="font-medium">Collection</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Exceptional timepieces for the discerning collector</p>
        </div>

        <!-- Filters Bar -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-8 bg-gray-900 p-4 rounded-lg border border-gray-700">
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 w-full">
                <div class="relative w-full md:w-auto">
                    <select name="sort" onchange="this.form.submit()" class="w-full px-4 py-2 border border-gray-600 rounded-lg hover:border-yellow-500 focus:border-yellow-500 focus:ring-yellow-500 transition-colors bg-gray-800 text-white">
                        <option value="">Sort by</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min Price" class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white focus:border-yellow-500 focus:ring-yellow-500">
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max Price" class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white focus:border-yellow-500 focus:ring-yellow-500">
                </div>
                <button type="submit" class="w-full md:w-auto px-4 py-2 bg-yellow-500 text-black rounded-lg hover:bg-yellow-600">Filter</button>
            </form>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6" id="productGrid">
            <!-- Static Product Cards -->
            @include('template2.collection-default')
        </div>
    </main>
@else
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-white">
        <!-- Page Title -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-light mb-4">Best <span class="font-medium">Collections</span></h2>
            <p class="text-gray-400 mt-2">{{ count($products) }} products</p>
        </div>

        <!-- Filters Bar -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-8 bg-gray-900 p-4 rounded-lg border border-gray-700">
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 w-full">
                <div class="relative w-full md:w-auto">
                    <select name="sort" onchange="this.form.submit()" class="w-full px-4 py-2 border border-gray-600 rounded-lg hover:border-yellow-500 focus:border-yellow-500 focus:ring-yellow-500 transition-colors bg-gray-800 text-white">
                        <option value="">Sort by</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min Price" class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white focus:border-yellow-500 focus:ring-yellow-500">
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max Price" class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white focus:border-yellow-500 focus:ring-yellow-500">
                </div>
                <button type="submit" class="w-full md:w-auto px-4 py-2 bg-yellow-500 text-black rounded-lg hover:bg-yellow-600">Filter</button>
            </form>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6" id="productGrid">
            @foreach($products as $product)
                <a href="{{ route('single-product.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}" class="block">
                    <div class="bg-black rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow border border-gray-800">
                        <div class="relative">
                        @if($product->is_new)
                            <span class="absolute top-3 left-3 bg-pink-600 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                        @elseif($product->is_limited)
                             <span class="absolute top-3 left-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-medium z-10">LIMITED</span>
                        @endif
                        <div class="aspect-w-1 aspect-h-1 bg-gray-900 flex items-center justify-center h-80">
                             <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium text-white mb-2">{{ $product->name }}</h3>
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-lg font-bold text-yellow-600">₹{{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="flex items-center">
                                <span class="text-yellow-500 text-sm">★★★★</span>
                                <span class="text-gray-600 text-sm">★</span>
                            </div>
                            <span class="ml-2 text-sm text-gray-500">76</span> <!-- Placeholder for reviews -->
                        </div>
                            <button class="w-full border-2 border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-black py-2 px-4 rounded-lg transition-colors flex items-center justify-center">
                                <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                            </button>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
    </main>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('filtersBtn')?.addEventListener('click', function() {
            alert('Filter options would open here');
        });

        document.getElementById('sortBtn')?.addEventListener('click', function() {
            alert('Sort options would open here');
        });
    });
</script>

@include('template2.footer2')
