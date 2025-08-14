@include('template3.head3', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<body class="bg-[#f9f9f7]">

@if($is_default)
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" style="font-family: 'Inter', sans-serif;">
        <!-- Page Title -->
        <div class="mb-8 text-center">
            <h3 class="text-3xl font-medium mb-4" style="font-family: 'Playfair Display', serif;">Curated Collection</h3>
            <p class="text-gray-600 max-w-2xl mx-auto">Select timepieces for the discerning collector</p>
        </div>

        <!-- Filters Bar -->
        <div class="flex items-center justify-between mb-8 bg-white p-4 rounded-lg shadow-sm">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button id="filtersBtn" class="flex items-center space-x-2 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <span>Filters</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div class="relative">
                    <button id="sortBtn" class="flex items-center space-x-2 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <span>Sort</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                    In stock
                </button>
            </div>
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
        <div class="flex items-center justify-between mb-8 bg-white p-4 rounded-lg shadow-sm">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button id="filtersBtn" class="flex items-center space-x-2 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <span>Filters</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div class="relative">
                    <button id="sortBtn" class="flex items-center space-x-2 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <span>Sort</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                    In stock
                </button>
            </div>
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
                        <div class="aspect-square bg-gray-50 flex items-center justify-center">
                             <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium text-gray-900 mb-2" style="font-family: 'Playfair Display', serif;">{{ $product->name }}</h3>
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="flex items-center">
                                <span class="text-yellow-500 text-sm">★★★★</span>
                                <span class="text-gray-300 text-sm">★</span>
                            </div>
                            <span class="ml-2 text-sm text-gray-500">76</span> <!-- Placeholder for reviews -->
                        </div>
                        <a href="{{ route('template3.single-product', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}">
                            <button class="w-full border border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 py-2 px-4 rounded-lg font-medium transition duration-300">
                                View Product
                            </button>
                        </a>
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
</body>
