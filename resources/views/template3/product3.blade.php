@include('template3.head3', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

@if($is_default)
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" style="font-family: 'Inter', sans-serif;">
        <!-- Page Title -->
        <div class="mb-8 text-center">
            <h3 class="text-3xl font-medium mb-4" style="font-family: 'Playfair Display', serif;">Curated Collection</h3>
            <p class="text-gray-600 max-w-2xl mx-auto">Select timepieces for the discerning collector</p>
        </div>

        <!-- Filters Bar -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-8 pb-4 border-b border-blue-200">
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 w-full">
                <div class="relative w-full md:w-auto">
                    <select name="sort" onchange="this.form.submit()" class="w-full text-gray-600 hover:text-gray-900 nav-link bg-transparent border-b-2 border-blue-200 focus:border-blue-500">
                        <option value="">Sort by</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min Price" class="w-full text-gray-600 hover:text-gray-900 nav-link bg-transparent border-b-2 border-blue-200 focus:border-blue-500">
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max Price" class="w-full text-gray-600 hover:text-gray-900 nav-link bg-transparent border-b-2 border-blue-200 focus:border-blue-500">
                </div>
                <button type="submit" class="w-full md:w-auto px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Filter</button>
            </form>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6" id="productGrid">
            <!-- Static Product Cards -->
            @include('template3.collection-default')
        </div>
    </main>
@else
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" style="font-family: 'Inter', sans-serif;">
        <!-- Page Title -->
        <div class="mb-8 text-center">
            <h3 class="text-3xl font-medium mb-4" style="font-family: 'Playfair Display', serif;">{{ $section2->main_text2 ?? 'Best Collections' }}</h3>
            <p class="text-gray-600 mt-2">{{ count($products) }} products</p>
        </div>

        <!-- Filters Bar -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-8 pb-4 border-b border-blue-200">
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 w-full">
                <div class="relative w-full md:w-auto">
                    <select name="sort" onchange="this.form.submit()" class="w-full text-gray-600 hover:text-gray-900 nav-link bg-transparent border-b-2 border-blue-200 focus:border-blue-500">
                        <option value="">Sort by</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min Price" class="w-full text-gray-600 hover:text-gray-900 nav-link bg-transparent border-b-2 border-blue-200 focus:border-blue-500">
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max Price" class="w-full text-gray-600 hover:text-gray-900 nav-link bg-transparent border-b-2 border-blue-200 focus:border-blue-500">
                </div>
                <button type="submit" class="w-full md:w-auto px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Filter</button>
            </form>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6" id="productGrid">
            @foreach($products as $product)
                <div class="bg-white rounded-lg overflow-hidden boutique-card">
                    <div class="relative">
                        @if($product->is_new)
                            <span class="absolute top-3 left-3 bg-pink-600 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                        @elseif($product->is_limited)
                             <span class="absolute top-3 left-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-medium z-10">LIMITED</span>
                        @endif
                        <div class="aspect-w-1 aspect-h-1 bg-gray-50 flex items-center justify-center">
                             <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium text-gray-900 mb-2" style="font-family: 'Playfair Display', serif;">{{ $product->name }}</h3>
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-lg font-bold text-gray-900">₹{{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="flex items-center">
                                <span class="text-yellow-500 text-sm">★★★★</span>
                                <span class="text-gray-300 text-sm">★</span>
                            </div>
                            <span class="ml-2 text-sm text-gray-500">76</span> <!-- Placeholder for reviews -->
                        </div>
                            <button class="w-full bg-blue-800 hover:bg-blue-900 text-white py-2 px-4 rounded-lg font-medium transition duration-300 flex items-center justify-center">
                                <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                            </button>
                    </div>
                </div>
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

@include('template3.footer3')
