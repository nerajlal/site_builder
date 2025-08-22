@include('template4.head4', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

@if($is_default)
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" style="font-family: 'Montserrat', sans-serif;">
        <!-- Page Title -->
        <div class="mb-8 text-center">
            <h3 class="text-3xl font-semibold mb-4" style="font-family: 'Cormorant Garamond', serif;">Our <span class="text-[#7e22ce]">Collection</span></h3>
            <p class="text-gray-600 max-w-2xl mx-auto">Discover our handpicked selection of fashion pieces</p>
        </div>

        <!-- Filters Bar -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-8 bg-purple-50 p-4 rounded-lg">
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 w-full">
                <div class="relative w-full md:w-auto">
                    <select name="sort" onchange="this.form.submit()" class="w-full px-4 py-2 rounded-lg border-purple-200 focus:border-purple-500 focus:ring-purple-500">
                        <option value="">Sort by</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="rating_desc" {{ request('sort') == 'rating_desc' ? 'selected' : '' }}>Rating: High to Low</option>
                    </select>
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min Price" class="w-full px-4 py-2 rounded-lg border-purple-200 focus:border-purple-500 focus:ring-purple-500">
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max Price" class="w-full px-4 py-2 rounded-lg border-purple-200 focus:border-purple-500 focus:ring-purple-500">
                </div>
                <button type="submit" class="w-full md:w-auto px-4 py-2 rounded-lg bg-purple-600 text-white hover:bg-purple-700">Filter</button>
            </form>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6" id="productGrid">
            <!-- Static Product Cards -->
            <div class="bg-white rounded-lg overflow-hidden boutique-card">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-[#7e22ce] text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=705&q=80" alt="Elegant Dress" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-4 gold-underline" style="font-family: 'Cormorant Garamond', serif;">Chic Summer Dress</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹129.99</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="text-yellow-500 text-sm">★★★★</span>
                            <span class="text-gray-300 text-sm">★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">45</span>
                    </div>
                    <button class="w-full btn-pink py-2 rounded font-medium">
                        View Product
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden boutique-card">
                <div class="relative">
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Leather Handbag" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-4 gold-underline" style="font-family: 'Cormorant Garamond', serif;">Classic Leather Handbag</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹249.99</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="text-yellow-500 text-sm">★★★★★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">30</span>
                    </div>
                    <button class="w-full btn-pink py-2 rounded font-medium">
                        View Product
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden boutique-card">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-[#7e22ce] text-white px-3 py-1 rounded-full text-xs font-medium z-10">LIMITED</span>
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Silk Scarf" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-4 gold-underline" style="font-family: 'Cormorant Garamond', serif;">Printed Silk Scarf</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹79.99</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="text-yellow-500 text-sm">★★★★</span>
                            <span class="text-gray-300 text-sm">★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">62</span>
                    </div>
                    <button class="w-full btn-pink py-2 rounded font-medium">
                        View Product
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden boutique-card">
                <div class="relative">
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=698&q=80" alt="Designer Heels" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-4 gold-underline" style="font-family: 'Cormorant Garamond', serif;">Elegant High Heels</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹199.99</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="text-yellow-500 text-sm">★★★★★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">98</span>
                    </div>
                    <button class="w-full btn-pink py-2 rounded font-medium">
                        View Product
                    </button>
                </div>
            </div>
        </div>
    </main>
@else
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" style="font-family: 'Montserrat', sans-serif;">
        <!-- Page Title -->
        <div class="mb-8 text-center">
            <h3 class="text-3xl font-semibold mb-4" style="font-family: 'Cormorant Garamond', serif;">
                <span class="text-[#7e22ce]">{{ $section2->main_text2 ?? 'Best Collections' }}</span>
            </h3>
            <p class="text-gray-600 mt-2">{{ count($products) }} products</p>
        </div>

        <!-- Filters Bar -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-8 bg-purple-50 p-4 rounded-lg">
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 w-full">
                <div class="relative w-full md:w-auto">
                    <select name="sort" onchange="this.form.submit()" class="w-full px-4 py-2 rounded-lg border-purple-200 focus:border-purple-500 focus:ring-purple-500">
                        <option value="">Sort by</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="rating_desc" {{ request('sort') == 'rating_desc' ? 'selected' : '' }}>Rating: High to Low</option>
                    </select>
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min Price" class="w-full px-4 py-2 rounded-lg border-purple-200 focus:border-purple-500 focus:ring-purple-500">
                </div>
                <div class="relative w-full md:w-auto">
                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max Price" class="w-full px-4 py-2 rounded-lg border-purple-200 focus:border-purple-500 focus:ring-purple-500">
                </div>
                <button type="submit" class="w-full md:w-auto px-4 py-2 rounded-lg bg-purple-600 text-white hover:bg-purple-700">Filter</button>
            </form>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6" id="productGrid">
            @foreach($products as $product)
                <a href="{{ route('single-product.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}" class="block">
                    <div class="bg-white rounded-lg overflow-hidden boutique-card">
                        <div class="relative">
                        @if($product->is_new)
                            <span class="absolute top-3 left-3 bg-[#7e22ce] text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                        @elseif($product->is_limited)
                             <span class="absolute top-3 left-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-medium z-10">LIMITED</span>
                        @endif
                        <div class="aspect-square bg-pink-50 flex items-center justify-center">
                             <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-4 gold-underline" style="font-family: 'Cormorant Garamond', serif;">{{ $product->name }}</h3>
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-lg font-bold text-gray-900">₹{{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="flex items-center">
                                @php
                                    $averageRating = $product->reviews_avg_rating ?? 0;
                                    $fullStars = floor($averageRating);
                                    $halfStar = $averageRating - $fullStars >= 0.5;
                                    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                @endphp
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <i class="fas fa-star text-yellow-500 text-sm"></i>
                                @endfor
                                @if ($halfStar)
                                    <i class="fas fa-star-half-alt text-yellow-500 text-sm"></i>
                                @endif
                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <i class="far fa-star text-yellow-500 text-sm"></i>
                                @endfor
                            </div>
                            <span class="ml-2 text-sm text-gray-500">({{ $product->reviews_count }})</span>
                        </div>
                            <button class="w-full text-purple-600 hover:text-purple-800 hover:underline py-2 rounded font-medium flex items-center justify-center">
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

@include('template4.footer4')
