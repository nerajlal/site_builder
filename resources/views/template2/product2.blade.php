@include('template2.head2', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

@if($is_default)
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-white">
        <!-- Page Title -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-light mb-4">Curated <span class="font-medium">Collection</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Exceptional timepieces for the discerning collector</p>
        </div>

        <!-- Filters Bar -->
        <div class="flex items-center justify-between mb-8 bg-black p-4 rounded-lg shadow-sm border border-gray-800">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button id="filtersBtn" class="flex items-center space-x-2 px-4 py-2 border border-gray-700 rounded-lg hover:bg-gray-800">
                        <span>Filters</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div class="relative">
                    <button id="sortBtn" class="flex items-center space-x-2 px-4 py-2 border border-gray-700 rounded-lg hover:bg-gray-800">
                        <span>Sort</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <button class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">
                    In stock
                </button>
            </div>
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
        <div class="flex items-center justify-between mb-8 bg-black p-4 rounded-lg shadow-sm border border-gray-800">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button id="filtersBtn" class="flex items-center space-x-2 px-4 py-2 border border-gray-700 rounded-lg hover:bg-gray-800">
                        <span>Filters</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div class="relative">
                    <button id="sortBtn" class="flex items-center space-x-2 px-4 py-2 border border-gray-700 rounded-lg hover:bg-gray-800">
                        <span>Sort</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <button class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">
                    In stock
                </button>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6" id="productGrid">
            @foreach($products as $product)
                <div class="bg-black rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow border border-gray-800">
                    <div class="relative">
                        @if($product->is_new)
                            <span class="absolute top-3 left-3 bg-pink-600 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                        @elseif($product->is_limited)
                             <span class="absolute top-3 left-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-medium z-10">LIMITED</span>
                        @endif
                        <div class="aspect-square bg-gray-900 flex items-center justify-center">
                             <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium text-white mb-2">{{ $product->name }}</h3>
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-lg font-bold text-pink-600">${{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="flex items-center">
                                <span class="text-yellow-500 text-sm">★★★★</span>
                                <span class="text-gray-600 text-sm">★</span>
                            </div>
                            <span class="ml-2 text-sm text-gray-500">76</span> <!-- Placeholder for reviews -->
                        </div>
                        <a href="{{ route('template2.single-product', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}">
                            <button class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded-lg transition-colors">
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

@include('template2.footer2')
