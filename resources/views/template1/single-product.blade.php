@include('template1.head1')
    

    <!-- Product Container -->
    <div class="max-w-7xl mx-auto px-4 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image with Video Support -->
                <div class="relative group">
                    <div class="aspect-[4/5] bg-pink-50 rounded-lg overflow-hidden">
                        <div id="mainImage" class="w-full h-full">
                            <img id="mainProductImage" src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>
                        @if($product->video_url)
                        <!-- Try-on Video Button -->
                        <a href="{{ $product->video_url }}" target="_blank" class="absolute bottom-4 left-4 bg-black/70 text-white px-3 py-2 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-play mr-2"></i>Try-on Video
                        </a>
                        @endif
                    </div>
                    <!-- Zoom Button -->
                    <button class="absolute top-4 right-4 p-2 bg-white rounded-full shadow-md opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fas fa-expand text-gray-600"></i>
                    </button>
                </div>
                
                <!-- Image Gallery Thumbnails -->
                <div class="flex space-x-2 overflow-x-auto pb-2" id="thumbnail-gallery">
                    <button class="thumbnail-btn w-20 h-20 bg-pink-100 rounded-lg flex-shrink-0 border-2 border-pink-600">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                    </button>
                    @foreach($productImages as $image)
                    <button class="thumbnail-btn w-20 h-20 bg-pink-50 rounded-lg flex-shrink-0 border border-gray-200 hover:border-pink-600">
                        <img src="{{ $image->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                    </button>
                    @endforeach
                    @if($product->video_url)
                    <a href="{{ $product->video_url }}" target="_blank" class="w-20 h-20 bg-pink-50 rounded-lg flex-shrink-0 border border-gray-200 hover:border-pink-600 flex items-center justify-center text-gray-400">
                        <i class="fas fa-video text-pink-600"></i>
                    </a>
                    @endif
                </div>

                <!-- Social Proof Gallery -->
                <div class="bg-white rounded-lg p-4 mt-6">
                    <h3 class="text-sm font-semibold mb-3 flex items-center">
                        <i class="fab fa-instagram text-pink-600 mr-2"></i>
                        As seen on Instagram
                    </h3>
                    <div class="flex space-x-2 overflow-x-auto">
                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex-shrink-0"></div>
                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex-shrink-0"></div>
                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex-shrink-0"></div>
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <!-- Product Title & Rating -->
                <div>
                    <h1 class="text-3xl font-bold mb-3">{{ $product->name }}</h1>
                    <div class="flex items-center space-x-4 mb-4">
                        <button class="flex items-center space-x-2 hover:bg-gray-50 p-1 rounded" onclick="scrollToReviews()">
                            <div class="flex text-yellow-400">
                                @php
                                    $averageRating = $product->reviews_avg_rating ?? 0;
                                    $fullStars = floor($averageRating);
                                    $halfStar = $averageRating - $fullStars >= 0.5;
                                    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                @endphp
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                @if ($halfStar)
                                    <i class="fas fa-star-half-alt"></i>
                                @endif
                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <i class="far fa-star"></i>
                                @endfor
                            </div>
                            <span class="text-gray-600">({{ $product->reviews_count }} reviews)</span>
                        </button>
                    </div>
                </div>

                <!-- Price Stack -->
                <div class="space-y-2">
                    <div class="flex items-center space-x-4">
                        <span class="text-3xl font-bold text-gray-900">₹{{ number_format($product->price, 2) }}</span>
                        @if($product->original_price)
                            <span class="text-xl text-gray-500 line-through">₹{{ number_format($product->original_price, 2) }}</span>
                        @endif
                    </div>
                    <p class="text-sm text-gray-600">Inclusive of all taxes • GST invoice available</p>
                </div>

                <!-- Color Selection -->
                <div>
                    <h3 class="text-sm font-semibold mb-3">Color: <span id="selectedColorName"></span></h3>
                    <div class="flex space-x-3">
                        @foreach($productColors ?? [] as $color)
                        <button class="color-btn w-10 h-10 rounded-full border-2 border-gray-200 hover:border-gray-400 shadow-md"
                                onclick="selectColor('{{ $color->value }}', '{{ $color->name }}')"
                                data-color="{{ $color->value }}"
                                style="background-color: {{ $color->value }};">
                        </button>
                        @endforeach
                    </div>
                </div>

                <!-- Size Selection with Stock Info -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-semibold">Size: <span id="selectedSizeName"></span></h3>
                        <button class="text-sm text-pink-600 hover:underline" onclick="openSizeGuide()">Size Guide</button>
                    </div>
                    <div class="grid grid-cols-6 gap-2 mb-2">
                        @foreach($sizes as $size)
                            @if($size->in_stock)
                                <button class="size-btn py-3 text-center border rounded hover:border-pink-600"
                                        onclick="selectSize('{{ $size->size }}')"
                                        data-size="{{ $size->size }}"
                                        data-stock="{{ $size->stock }}">
                                    <span>{{ $size->size }}</span>
                                </button>
                            @else
                                <button class="size-btn py-3 text-center border rounded bg-gray-100 text-gray-400 cursor-not-allowed"
                                        disabled
                                        onclick="showOutOfStockMessage()">
                                    <span>{{ $size->size }}</span>
                                </button>
                            @endif
                        @endforeach
                    </div>
                    <p class="text-sm text-orange-600" id="stockInfo"></p>
                </div>

                <!-- PIN Code Check -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-sm font-semibold mb-3">Delivery Options</h3>
                    <div class="flex items-center space-x-2 mb-3">
                        <input type="text" 
                               placeholder="Enter PIN code" 
                               class="flex-1 px-3 py-2 border rounded focus:outline-none focus:border-pink-600"
                               id="pinCodeInput"
                               maxlength="6">
                        <button class="px-6 py-2 bg-pink-600 text-white rounded hover:bg-pink-700 transition-colors" onclick="checkPinCode()">Check</button>
                    </div>
                    <div id="deliveryInfo" class="text-sm space-y-1 text-gray-600">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-truck text-green-600"></i>
                            <span>Enter PIN to check delivery options</span>
                        </div>
                    </div>
                </div>

                <!-- Offers -->
                <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                    <h3 class="text-sm font-semibold mb-3 text-green-800">Available Offers</h3>
                    <div class="space-y-2 text-sm">
                        @if($product->comboOffers->count() > 0)
                        <div class="mt-4 border-t pt-4">
                            <h4 class="font-semibold mb-2 text-purple-800">Combo Deals!</h4>
                            <ul class="space-y-2 text-sm">
                                @foreach($product->comboOffers as $offer)
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-tags text-purple-600"></i>
                                    <span>Buy <strong>{{ $offer->buy_quantity }}</strong> for ₹{{ number_format($offer->offer_price, 2) }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-percentage text-green-600"></i>
                            <span>Get 10% off on orders above ₹1,999. Code: <strong>SAVE10</strong></span>
                            <button class="text-green-700 underline hover:no-underline" onclick="applyCoupon('SAVE10')">Apply</button>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-shipping-fast text-blue-600"></i>
                            <span>Free shipping on orders above ₹2,000</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-gift text-purple-600"></i>
                            <span>Free gift wrapping available</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <!-- WhatsApp Button -->
                    <button class="w-full bg-green-600 text-white py-4 rounded-lg font-semibold hover:bg-green-700 transition-colors flex items-center justify-center" onclick="chatOnWhatsApp()">
                        <i class="fab fa-whatsapp mr-2 text-xl"></i>Chat on WhatsApp
                    </button>
                    
                    <!-- Primary CTAs -->
                    <div class="grid grid-cols-2 gap-3">
                        <button class="py-4 border-2 border-pink-600 text-pink-600 rounded-lg font-semibold hover:bg-pink-600 hover:text-white transition-colors" onclick="addToCart()">
                            Add to Cart
                        </button>
                        <button class="py-4 bg-pink-600 text-white rounded-lg font-semibold hover:bg-pink-700 transition-colors" onclick="buyNow()">
                            Buy Now
                        </button>
                    </div>
                    
                    <!-- Secondary Actions -->
                    <div class="flex justify-center space-x-8 pt-4">
                        <button class="flex items-center space-x-2 text-gray-600 hover:text-pink-600 transition-colors" onclick="toggleWishlist(this)" data-product-id="{{ $product->id }}">
                            <i class="{{ $inWishlist ? 'fas' : 'far' }} fa-heart text-lg"></i>
                            <span>{{ $inWishlist ? 'Wishlisted' : 'Wishlist' }}</span>
                        </button>
                        <button class="flex items-center space-x-2 text-gray-600 hover:text-pink-600 transition-colors" onclick="shareProduct()">
                            <i class="fas fa-share-alt text-lg"></i>
                            <span>Share</span>
                        </button>
                        <button class="flex items-center space-x-2 text-gray-600 hover:text-pink-600 transition-colors" onclick="compareProduct()">
                            <i class="fas fa-balance-scale text-lg"></i>
                            <span>Compare</span>
                        </button>
                    </div>
                </div>

                <!-- Trust Badges -->
                <div class="flex flex-wrap items-center justify-center gap-6 pt-6 border-t">
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <i class="fas fa-shield-alt text-green-600"></i>
                        <span>Secure Payment</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <i class="fas fa-undo text-blue-600"></i>
                        <span>7-Day Returns</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <i class="fas fa-file-invoice text-orange-600"></i>
                        <span>GST Invoice</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <i class="fas fa-money-bill text-green-600"></i>
                        <span>COD Available</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Add to Cart Bar (Mobile) -->
        <div id="stickyBar" class="fixed bottom-0 left-0 right-0 bg-white border-t shadow-lg p-4 hidden lg:hidden z-30">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-lg font-bold">₹2,199</span>
                    <span class="text-sm text-gray-500 ml-2">Size: M</span>
                </div>
                <div class="flex space-x-2">
                    <button class="px-4 py-2 border border-pink-600 text-pink-600 rounded" onclick="addToCart()">Add to Cart</button>
                    <button class="px-4 py-2 bg-pink-600 text-white rounded" onclick="buyNow()">Buy Now</button>
                </div>
            </div>
        </div>

        <!-- Product Information Tabs -->
        <div class="mt-16">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8 overflow-x-auto">
                    <button class="tab-btn active py-4 px-1 border-b-2 border-pink-600 text-pink-600 font-medium whitespace-nowrap" onclick="showTab('description')">Description</button>
                    <button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" onclick="showTab('fit')">Fit & Materials</button>
                    <button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" onclick="showTab('reviews')">Reviews ({{ $product->reviews->count() }})</button>
                    <button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" onclick="showTab('shipping')">Shipping & Returns</button>
                    <button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" onclick="showTab('faq')">FAQ</button>
                </nav>
            </div>

            <!-- Tab Content -->
            <div class="mt-8">
                <!-- Description Tab -->
                <div id="description" class="tab-content">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Product Details</h3>
                            <p class="text-gray-700 mb-6">{{ $product->description }}</p>
                            
                            <div class="space-y-4">
                                @if(!empty($product->key_features))
                                <div>
                                    <h4 class="font-semibold mb-2">Key Features:</h4>
                                    <ul class="space-y-2 text-gray-700">
                                        @foreach($product->key_features as $feature)
                                        <li class="flex items-start space-x-2">
                                            <i class="fas fa-check text-green-600 mt-1"></i>
                                            <span>{{ $feature }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="font-semibold mb-4">Styling Tips:</h4>
                            <div class="space-y-4">
                                @foreach($product->stylingTips ?? [] as $tip)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h5 class="font-semibold">{{ $tip->title }}</h5>
                                    <p class="text-sm text-gray-700">{{ $tip->description }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fit & Materials Tab -->
                <div id="fit" class="tab-content hidden">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Fit & Measurements</h3>
                            <div class="space-y-4">
                                <div class="bg-blue-50 p-4 rounded-lg">
                                    <h4 class="font-semibold mb-3">Model Information</h4>
                                    <div class="space-y-2 text-sm">
                                        @foreach($product->modelInfo ?? [] as $info)
                                        <p><strong>{{ $info->key }}:</strong> {{ $info->value }}</p>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <div>
                                    <h4 class="font-semibold mb-3">Garment Details</h4>
                                    <div class="space-y-2 text-sm">
                                        @foreach($product->garmentDetails ?? [] as $detail)
                                        <p><strong>{{ $detail->key }}:</strong> {{ $detail->value }}</p>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Size Chart -->
                                <div>
                                    <h4 class="font-semibold mb-3">Size Chart</h4>
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm border border-gray-300">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th class="border border-gray-300 p-2 font-medium">Size</th>
                                                    @if($product->sizeChart->count() > 0)
                                                        @foreach((is_string($product->sizeChart[0]->measurements) ? json_decode($product->sizeChart[0]->measurements, true) : $product->sizeChart[0]->measurements) as $key => $value)
                                                            <th class="border border-gray-300 p-2 font-medium">{{ ucfirst($key) }}</th>
                                                        @endforeach
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($product->sizeChart ?? [] as $size)
                                                <tr>
                                                    <td class="border border-gray-300 p-2">{{ $size->size }}</td>
                                                    @foreach((is_string($size->measurements) ? json_decode($size->measurements, true) : $size->measurements) as $key => $value)
                                                        <td class="border border-gray-300 p-2">{{ $value }}</td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Materials & Care</h3>
                            <div class="space-y-6">
                                <div>
                                    <h4 class="font-semibold mb-3">Fabric Details</h4>
                                    <div class="space-y-2 text-sm">
                                        @foreach($product->fabricDetails ?? [] as $detail)
                                        <p><strong>{{ $detail->key }}:</strong> {{ $detail->value }}</p>
                                        @endforeach
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-semibold mb-3">Care Instructions</h4>
                                    <div class="grid grid-cols-2 gap-4">
                                        @foreach($product->careInstructions ?? [] as $instruction)
                                        <div class="flex items-center space-x-3 p-3 bg-blue-50 rounded-lg">
                                            <i class="fas fa-info-circle text-blue-500 text-xl"></i>
                                            <div>
                                                <p class="font-medium">{{ $instruction->instruction }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                @if(is_array($product->care_tips))
                                <div class="bg-green-50 p-4 rounded-lg">
                                    <h4 class="font-semibold mb-2 text-green-800">Care Tips</h4>
                                    <ul class="text-sm text-green-700 space-y-1">
                                        @foreach($product->care_tips as $tip)
                                        <li>• {{ $tip }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviews Tab -->
                <div id="reviews" class="tab-content hidden">
                    @php
                        $totalReviews = $product->reviews->count();
                        $averageRating = $totalReviews > 0 ? $product->reviews->avg('rating') : 0;
                        $ratingDistribution = $totalReviews > 0 ? $product->reviews->groupBy('rating')->map->count() : collect();
                    @endphp
                    <div class="space-y-8">
                        <!-- Review Summary -->
                        <div class="grid md:grid-cols-3 gap-8">
                            <div class="bg-gray-50 p-6 rounded-lg text-center">
                                <div class="text-4xl font-bold mb-2">{{ number_format($averageRating, 1) }}</div>
                                <div class="flex justify-center text-yellow-400 mb-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $averageRating)
                                            <i class="fas fa-star"></i>
                                        @elseif ($i - 0.5 <= $averageRating)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="text-sm text-gray-600">Based on {{ $totalReviews }} reviews</p>
                            </div>
                            
                            <div class="md:col-span-2">
                                <h3 class="font-semibold mb-4">Rating Breakdown</h3>
                                <div class="space-y-2">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <div class="flex items-center space-x-2">
                                            <span class="text-sm w-8">{{ $i }}★</span>
                                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                                <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $totalReviews > 0 ? ($ratingDistribution->get($i, 0) / $totalReviews) * 100 : 0 }}%"></div>
                                            </div>
                                            <span class="text-sm text-gray-600">{{ $totalReviews > 0 ? round(($ratingDistribution->get($i, 0) / $totalReviews) * 100) : 0 }}%</span>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <!-- Individual Reviews -->
                        <div class="space-y-6">
                            @forelse($product->reviews as $review)
                                <div class="border-b pb-6">
                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-pink-600 text-white rounded-full flex items-center justify-center font-semibold">{{ strtoupper(substr($review->customer->name, 0, 1)) }}</div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-2">
                                                <div>
                                                    <h4 class="font-semibold">{{ $review->customer->name }}</h4>
                                                    <div class="flex items-center space-x-2 mt-1">
                                                        <div class="flex text-yellow-400 text-sm">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                                            @endfor
                                                        </div>
                                                        <span class="text-sm text-green-600">✓ Verified Purchase</span>
                                                    </div>
                                                </div>
                                                <span class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                            </div>

                                            <p class="text-gray-700 mb-3">{{ $review->review }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No reviews yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- FAQ Tab -->
                <div id="faq" class="tab-content hidden">
                    <div class="space-y-6">
                        @if($product->faqs->count() > 0)
                            @foreach($product->faqs as $faq)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h4 class="font-semibold mb-2 flex items-start">
                                        <i class="fas fa-question-circle text-pink-600 mr-3 mt-1"></i>
                                        <span>{{ $faq->question }}</span>
                                    </h4>
                                    <p class="text-gray-700 ml-8">{{ $faq->answer }}</p>
                                </div>
                            @endforeach
                        @else
                            <p class="text-gray-500">No frequently asked questions for this product yet.</p>
                        @endif
                    </div>
                </div>

                <!-- Shipping & Returns Tab -->
                <div id="shipping" class="tab-content hidden">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Shipping Information</h3>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-truck text-green-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Free Shipping</h4>
                                        <p class="text-sm text-gray-600">On orders above ₹2,000 across India</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-clock text-blue-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Delivery Time</h4>
                                        <p class="text-sm text-gray-600">2-4 business days for metro cities<br>4-7 business days for other locations</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-money-bill-wave text-green-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Cash on Delivery</h4>
                                        <p class="text-sm text-gray-600">Available for orders below ₹5,000<br>Additional ₹40 COD charges apply</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-box text-purple-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Packaging</h4>
                                        <p class="text-sm text-gray-600">Eco-friendly packaging with care<br>Gift wrapping available on request</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-4">Returns & Exchanges</h3>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-undo-alt text-blue-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">7-Day Easy Returns</h4>
                                        <p class="text-sm text-gray-600">Return within 7 days of delivery<br>Original condition with tags attached</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-exchange-alt text-green-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Size Exchange</h4>
                                        <p class="text-sm text-gray-600">Free size exchange within 7 days<br>Subject to stock availability</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-credit-card text-orange-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Refund Process</h4>
                                        <p class="text-sm text-gray-600">Refunds processed within 3-5 business days<br>Original payment method</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-phone text-purple-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Customer Support</h4>
                                        <p class="text-sm text-gray-600">WhatsApp: +91 98765 43210<br>Email: support@boutique.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Return Process -->
                    <div class="mt-8 bg-gray-50 p-6 rounded-lg">
                        <h4 class="font-semibold mb-4">How to Return/Exchange</h4>
                        <div class="grid md:grid-cols-4 gap-4 text-sm">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-pink-600 text-white rounded-full flex items-center justify-center mx-auto mb-2">1</div>
                                <p class="font-medium">Contact Us</p>
                                <p class="text-gray-600">Via WhatsApp or email within 7 days</p>
                            </div>
                            <div class="text-center">
                                <div class="w-12 h-12 bg-pink-600 text-white rounded-full flex items-center justify-center mx-auto mb-2">2</div>
                                <p class="font-medium">Schedule Pickup</p>
                                <p class="text-gray-600">We'll arrange free pickup from your location</p>
                            </div>
                            <div class="text-center">
                                <div class="w-12 h-12 bg-pink-600 text-white rounded-full flex items-center justify-center mx-auto mb-2">3</div>
                                <p class="font-medium">Quality Check</p>
                                <p class="text-gray-600">We verify the product condition</p>
                            </div>
                            <div class="text-center">
                                <div class="w-12 h-12 bg-pink-600 text-white rounded-full flex items-center justify-center mx-auto mb-2">4</div>
                                <p class="font-medium">Refund/Exchange</p>
                                <p class="text-gray-600">Process completed within 3-5 days</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        let currentState = {
            selectedColor: null,
            selectedSize: null,
            quantity: 1,
            pinCode: null
        };

        // Handle sticky add to cart bar
        window.addEventListener('scroll', function() {
            const stickyBar = document.getElementById('stickyBar');
            const windowWidth = window.innerWidth;
            
            if (windowWidth < 1024) { // Only show on mobile/tablet
                if (window.scrollY > 300) {
                    stickyBar.classList.remove('hidden');
                } else {
                    stickyBar.classList.add('hidden');
                }
            }
        });

        // Tab functionality
        function showTab(tabName) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });
            
            // Remove active class from all tab buttons
            const tabButtons = document.querySelectorAll('.tab-btn');
            tabButtons.forEach(button => {
                button.classList.remove('active', 'border-pink-600', 'text-pink-600');
                button.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Show selected tab content
            document.getElementById(tabName).classList.remove('hidden');
            
            // Add active class to clicked tab button
            event.target.classList.add('active', 'border-pink-600', 'text-pink-600');
            event.target.classList.remove('border-transparent', 'text-gray-500');
        }

        // Color selection
        function selectColor(color, colorName) {
            currentState.selectedColor = color;
            
            // Update selected color name
            document.getElementById('selectedColorName').textContent = colorName;
            
            // Update color button states
            const colorButtons = document.querySelectorAll('.color-btn');
            colorButtons.forEach(button => {
                const buttonColor = button.dataset.color;
                const checkIcon = button.querySelector('i');
                
                if (buttonColor === color) {
                    button.classList.add('border-pink-600');
                    button.classList.remove('border-gray-200');
                    if (checkIcon) checkIcon.style.display = 'flex';
                } else {
                    button.classList.remove('border-pink-600');
                    button.classList.add('border-gray-200');
                    if (checkIcon) checkIcon.style.display = 'none';
                }
            });
            
            // Analytics event
            trackEvent('select_color', { color: color });
        }

        // Size selection
        function selectSize(size) {
            currentState.selectedSize = size;
            
            // Update selected size name
            document.getElementById('selectedSizeName').textContent = size;
            
            // Update size button states
            const sizeButtons = document.querySelectorAll('.size-btn');
            sizeButtons.forEach(button => {
                const buttonSize = button.dataset.size;
                
                if (buttonSize === size) {
                    button.classList.add('border-2', 'border-pink-600', 'bg-pink-600', 'text-white');
                    button.classList.remove('border', 'border-gray-200');
                } else if (!button.disabled) {
                    button.classList.remove('border-2', 'border-pink-600', 'bg-pink-600', 'text-white');
                    button.classList.add('border', 'border-gray-200');
                }
            });
            
            // Update stock info
            const selectedButton = document.querySelector(`[data-size="${size}"]`);
            const stock = selectedButton.dataset.stock;
            const stockInfo = document.getElementById('stockInfo');
            
            if (stock && parseInt(stock) <= 3) {
                stockInfo.textContent = `Only ${stock} left in ${size} size!`;
                stockInfo.className = 'text-sm text-orange-600';
            } else if (stock) {
                stockInfo.textContent = `${stock} available in ${size} size`;
                stockInfo.className = 'text-sm text-green-600';
            }
            
            // Update sticky bar
            const stickySize = document.querySelector('#stickyBar .text-gray-500');
            if (stickySize) stickySize.textContent = `Size: ${size}`;
            
            // Analytics event
            trackEvent('select_size', { size: size });
        }

        // PIN code check
        function checkPinCode() {
            const pinCode = document.getElementById('pinCodeInput').value;
            const deliveryInfo = document.getElementById('deliveryInfo');
            
            if (pinCode.length === 6) {
                currentState.pinCode = pinCode;
                
                // Simulate PIN code check
                deliveryInfo.innerHTML = `
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="font-medium">Delivery available to ${pinCode}</span>
                        </div>
                        <div class="text-sm space-y-1">
                            <p>📦 Expected delivery: Fri-Sun (2-4 days)</p>
                            <p>🚚 Shipping fee: Free (orders above ₹2,000)</p>
                            <p>💰 Cash on Delivery: Available</p>
                        </div>
                    </div>
                `;
                
                // Analytics event
                trackEvent('pin_check', { pin: hashPinCode(pinCode) });
            } else {
                alert('Please enter a valid 6-digit PIN code');
            }
        }

        // A new robust function to handle adding items to the cart
        async function addItemToCart(productData) {
            try {
                const response = await fetch(`/cart/add/{{ $headerFooterId }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(productData)
                });

                // Handle non-ok responses first
                if (!response.ok) {
                    if (response.status === 401) {
                        openLoginModal();
                        return null; // Indicate failure
                    }
                    // Try to get more specific error message
                    const errorData = await response.json().catch(() => null);
                    showToast(errorData?.message || 'An error occurred.', 'error');
                    return null; // Indicate failure
                }

                // Handle successful response
                const data = await response.json();
                if (data.success) {
                    return data; // Indicate success, return data
                } else {
                    showToast(data.message || 'Something went wrong!', 'error');
                    return null; // Indicate failure
                }

            } catch (error) {
                console.error('Error adding item to cart:', error);
                showToast('An error occurred. Please try again.', 'error');
                return null;
            }
        }

        // Rewritten addToCart
        async function addToCart() {
            if (!currentState.selectedColor || !currentState.selectedSize) {
                showToast('Please select a color and size.', 'error');
                return;
            }

            const productData = {
                product_id: {{ $product->id }},
                quantity: currentState.quantity,
                options: {
                    color: currentState.selectedColor,
                    size: currentState.selectedSize,
                }
            };

            const result = await addItemToCart(productData);

            if (result) {
                showToast(result.message, 'success');
                updateCartCount(); // Update cart count in header
                trackEvent('add_to_cart', productData);
            }
        }

        // Update wishlist count in header
        async function updateWishlistCount() {
            try {
                const response = await fetch(`/wishlist/count/{{ $headerFooterId }}`);
                const data = await response.json();
                const wishlistCountElement = document.getElementById('wishlist-count');
                if (wishlistCountElement) {
                    wishlistCountElement.textContent = data.wishlist_count;
                }
            } catch (error) {
                console.error('Error fetching wishlist count:', error);
            }
        }

        // Rewritten buyNow
        async function buyNow() {
            if (!currentState.selectedColor || !currentState.selectedSize) {
                showToast('Please select a color and size.', 'error');
                return;
            }

            const productData = {
                product_id: {{ $product->id }},
                quantity: currentState.quantity,
                options: {
                    color: currentState.selectedColor,
                    size: currentState.selectedSize,
                }
            };

            const result = await addItemToCart(productData);

            if (result) {
                trackEvent('begin_checkout', productData);
                window.location.href = `/cart/{{ $headerFooterId }}`;
            }
        }

        // WhatsApp chat
        function chatOnWhatsApp() {
            const message = `Hi! I'm interested in the Summer Floral Midi Dress (Size: ${currentState.selectedSize}, Color: ${currentState.selectedColor}). Can you help me with more details?`;
            const whatsappURL = `https://wa.me/919876543210?text=${encodeURIComponent(message)}`;
            
            window.open(whatsappURL, '_blank');
            
            // Analytics event
            trackEvent('whatsapp_click', { size: currentState.selectedSize, color: currentState.selectedColor });
        }

        // Wishlist toggle
        async function toggleWishlist(button) {
            const productId = button.dataset.productId;
            const icon = button.querySelector('i');
            const span = button.querySelector('span');
            const isWishlisted = icon.classList.contains('fas');

            const url = isWishlisted ? `/wishlist/remove/{{ $headerFooterId }}` : `/wishlist/add/{{ $headerFooterId }}`;

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ product_id: productId })
                });

                const data = await response.json();

                if (data.success) {
                    showToast(data.message, 'success');
                    if (isWishlisted) {
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        span.textContent = 'Wishlist';
                    } else {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        span.textContent = 'Wishlisted';
                    }
                    updateWishlistCount(); // Update wishlist count in header
                } else {
                    showToast(data.message || 'Something went wrong!', 'error');
                }
            } catch (error) {
                console.error('Error toggling wishlist:', error);
                showToast('An error occurred. Please try again.', 'error');
            }
        }

        // Share product
        function shareProduct() {
            if (navigator.share) {
                navigator.share({
                    title: 'Summer Floral Midi Dress',
                    text: 'Check out this beautiful Summer Floral Midi Dress!',
                    url: window.location.href
                });
            } else {
                // Fallback for browsers that don't support Web Share API
                navigator.clipboard.writeText(window.location.href);
                showToast('Link copied to clipboard!', 'info');
            }
        }

        // Compare product
        function compareProduct() {
            showToast('Added to compare list!', 'info');
        }

        // Apply coupon
        function applyCoupon(code) {
            showToast(`Coupon ${code} applied successfully!`, 'success');
        }

        // Scroll to reviews
        function scrollToReviews() {
            showTab('reviews');
            document.getElementById('reviews').scrollIntoView({ behavior: 'smooth' });
        }

        // Size guide modal
        function openSizeGuide() {
            showToast('Size guide opened!', 'info');
            // Open size guide modal logic here
        }

        function showOutOfStockMessage() {
            showToast('This size is out of stock.', 'error');
        }

        // Notify when available
        function notifyWhenAvailable() {
            showToast('You will be notified when XS is back in stock!', 'success');
        }

        // Ask question
        function askQuestion() {
            showToast('Question form opened!', 'info');
            // Open question modal logic here
        }

        // Image gallery
        function changeImage(imageUrl) {
            const mainImage = document.getElementById('mainProductImage');
            if (mainImage) {
                mainImage.src = imageUrl;
            }
        }

        // Toast notification
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `fixed top-20 right-4 z-50 px-4 py-2 rounded-lg shadow-lg text-white transition-all duration-300 transform translate-x-full`;
            
            switch (type) {
                case 'success':
                    toast.classList.add('bg-green-500');
                    break;
                case 'error':
                    toast.classList.add('bg-red-500');
                    break;
                case 'info':
                    toast.classList.add('bg-blue-500');
                    break;
                default:
                    toast.classList.add('bg-gray-500');
            }
            
            toast.textContent = message;
            document.body.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 100);
            
            // Remove after 3 seconds
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }

        // Analytics tracking
        function trackEvent(eventName, data = {}) {
            // Send to analytics service
            console.log('Analytics Event:', eventName, data);
            
            // Example: Google Analytics 4
            if (typeof gtag !== 'undefined') {
                gtag('event', eventName, data);
            }
        }

        // Hash PIN code for privacy
        function hashPinCode(pin) {
            // Simple hash for demo - use proper hashing in production
            return btoa(pin).substring(0, 8);
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial state
            @if($productColors->isNotEmpty())
                selectColor('{{ $productColors->first()->value }}', '{{ $productColors->first()->name }}');
            @endif
            selectSize('M');
            
            // Track page view
            trackEvent('view_item', {
                item_id: 'summer-floral-midi-dress',
                item_name: 'Summer Floral Midi Dress',
                price: 2199,
                category: 'Dresses'
            });
        });

        // Bundle pricing calculation
        document.querySelectorAll('#accessory1, #accessory2').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                let total = 2199; // Base dress price
                
                if (document.getElementById('accessory1').checked) {
                    total += 1299; // White Sandals
                }
                
                if (document.getElementById('accessory2').checked) {
                    total += 799; // Statement Earrings
                }
                
                document.getElementById('bundleTotal').textContent = `₹${total.toLocaleString()}`;
            });
        });
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "{{ $product->name }}",
        "image": [
            "{{ $product->image_url }}"
            @foreach($productImages as $image)
            , "{{ $image->image_url }}"
            @endforeach
        ],
        "description": "{{ $product->description }}",
        "sku": "{{ $product->sku }}",
        "brand": {
            "@type": "Brand",
            "name": "{{ $product->brand->name ?? 'Boutique' }}"
        },
        "offers": {
            "@type": "Offer",
            "url": "{{ url()->current() }}",
            "priceCurrency": "INR",
            "price": "{{ $product->price }}",
            "itemCondition": "https://schema.org/NewCondition",
            "availability": "https://schema.org/InStock",
            "seller": {
                "@type": "Organization",
                "name": "Boutique"
            }
        }
    }
    </script>

    <!-- Performance and Analytics Scripts -->
    <script>
        // Performance monitoring
        window.addEventListener('load', function() {
            const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
            console.log('Page load time:', loadTime, 'ms');
            
            // Track performance
            trackEvent('page_performance', {
                load_time: loadTime,
                page_type: 'product_detail'
            });
        });

        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Service Worker registration for PWA
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('ServiceWorker registration successful');
                    }, function(err) {
                        console.log('ServiceWorker registration failed: ', err);
                    });
            });
        }

        // Enhanced error tracking
        window.addEventListener('error', function(e) {
            console.error('JavaScript error:', e.error);
            trackEvent('javascript_error', {
                message: e.message,
                filename: e.filename,
                lineno: e.lineno,
                colno: e.colno
            });
        });

        // Cart abandonment tracking
        let cartInteractionTimer;
        function resetCartTimer() {
            clearTimeout(cartInteractionTimer);
            cartInteractionTimer = setTimeout(() => {
                trackEvent('cart_abandonment_risk', {
                    time_on_page: Date.now() - pageLoadTime,
                    selected_size: currentState.selectedSize,
                    selected_color: currentState.selectedColor
                });
            }, 300000); // 5 minutes
        }

        const pageLoadTime = Date.now();
        document.addEventListener('click', resetCartTimer);
        document.addEventListener('scroll', resetCartTimer);

        // Enhanced search functionality
        function initSearchFeatures() {
            // Quick search in reviews
            const reviewSearch = document.createElement('input');
            reviewSearch.type = 'text';
            reviewSearch.placeholder = 'Search reviews...';
            reviewSearch.className = 'w-full p-2 border rounded mb-4';
            
            reviewSearch.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const reviews = document.querySelectorAll('.review-item');
                
                reviews.forEach(review => {
                    const reviewText = review.textContent.toLowerCase();
                    if (reviewText.includes(searchTerm) || searchTerm === '') {
                        review.style.display = 'block';
                    } else {
                        review.style.display = 'none';
                    }
                });
            });
        }

        // Enhanced mobile experience
        function initMobileFeatures() {
            // Pull to refresh on mobile
            let startY = 0;
            let pullThreshold = 100;
            
            document.addEventListener('touchstart', function(e) {
                startY = e.touches[0].pageY;
            }, { passive: true });
            
            document.addEventListener('touchmove', function(e) {
                const currentY = e.touches[0].pageY;
                const pullDistance = currentY - startY;
                
                if (pullDistance > pullThreshold && window.scrollY === 0) {
                    // Trigger refresh
                    location.reload();
                }
            }, { passive: true });

            // Haptic feedback for mobile interactions
            function triggerHaptic(type = 'light') {
                if ('vibrate' in navigator) {
                    switch(type) {
                        case 'light':
                            navigator.vibrate(10);
                            break;
                        case 'medium':
                            navigator.vibrate(20);
                            break;
                        case 'heavy':
                            navigator.vibrate(50);
                            break;
                    }
                }
            }

            // Add haptic feedback to buttons
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', () => triggerHaptic('light'));
            });
        }

        // Enhanced accessibility features
        function initAccessibilityFeatures() {
            // Keyboard navigation for image gallery
            document.addEventListener('keydown', function(e) {
                const gallery = document.querySelector('.image-gallery');
                if (!gallery) return;

                switch(e.key) {
                    case 'ArrowLeft':
                        if (currentState.currentImageIndex > 0) {
                            changeImage(currentState.currentImageIndex - 1);
                        }
                        break;
                    case 'ArrowRight':
                        changeImage(currentState.currentImageIndex + 1);
                        break;
                    case 'Enter':
                        if (e.target.classList.contains('size-btn')) {
                            e.target.click();
                        }
                        break;
                }
            });

            // Screen reader announcements
            function announceToScreenReader(message) {
                const announcement = document.createElement('div');
                announcement.setAttribute('aria-live', 'polite');
                announcement.setAttribute('aria-atomic', 'true');
                announcement.className = 'sr-only';
                announcement.textContent = message;
                
                document.body.appendChild(announcement);
                setTimeout(() => {
                    document.body.removeChild(announcement);
                }, 1000);
            }

            // Update announcements for state changes
            const originalSelectSize = selectSize;
            selectSize = function(size) {
                originalSelectSize(size);
                announceToScreenReader(`Size ${size} selected`);
            };
        }

        // Advanced analytics and user behavior tracking
        function initAdvancedAnalytics() {
            // Track scroll depth
            let maxScrollDepth = 0;
            window.addEventListener('scroll', function() {
                const scrollDepth = Math.round((window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100);
                if (scrollDepth > maxScrollDepth) {
                    maxScrollDepth = scrollDepth;
                    
                    // Track milestone scroll depths
                    if ([25, 50, 75, 90].includes(maxScrollDepth)) {
                        trackEvent('scroll_depth', { depth: maxScrollDepth });
                    }
                }
            });

            // Track time spent on different sections
            const sectionObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const sectionName = entry.target.id || entry.target.className;
                        trackEvent('section_view', { 
                            section: sectionName,
                            timestamp: Date.now() 
                        });
                    }
                });
            }, { threshold: 0.5 });

            // Observe main sections
            document.querySelectorAll('.tab-content, .product-details').forEach(section => {
                sectionObserver.observe(section);
            });

            // Track user engagement patterns
            let clickHeatmap = {};
            document.addEventListener('click', function(e) {
                const elementType = e.target.tagName.toLowerCase();
                const className = e.target.className;
                const key = `${elementType}.${className}`;
                
                clickHeatmap[key] = (clickHeatmap[key] || 0) + 1;
                
                // Send heatmap data periodically
                if (Object.keys(clickHeatmap).length % 10 === 0) {
                    trackEvent('click_heatmap', clickHeatmap);
                }
            });
        }

        // Performance optimization
        function initPerformanceOptimizations() {
            // Debounce scroll events
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Optimize scroll handlers
            const debouncedScrollHandler = debounce(function() {
                // Scroll-based functionality here
            }, 16); // ~60fps

            window.addEventListener('scroll', debouncedScrollHandler);

            // Preload critical resources
            function preloadResources() {
                const preloadLinks = [
                    { href: '/api/related-products', as: 'fetch' },
                    { href: '/fonts/primary-font.woff2', as: 'font', type: 'font/woff2', crossorigin: 'anonymous' }
                ];

                preloadLinks.forEach(resource => {
                    const link = document.createElement('link');
                    link.rel = 'preload';
                    Object.assign(link, resource);
                    document.head.appendChild(link);
                });
            }

            preloadResources();
        }

        // Initialize all features when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            // Image gallery functionality
            const thumbnailBtns = document.querySelectorAll('.thumbnail-btn');
            thumbnailBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const newImageUrl = this.querySelector('img').src;
                    changeImage(newImageUrl);

                    // Update active state for thumbnails
                    thumbnailBtns.forEach(innerBtn => {
                        innerBtn.classList.remove('border-2', 'border-pink-600');
                        innerBtn.classList.add('border', 'border-gray-200');
                    });
                    this.classList.add('border-2', 'border-pink-600');
                    this.classList.remove('border', 'border-gray-200');
                });
            });

            // Set initial state
            // selectColor('pink', 'Pink Floral');
            selectSize('M');
            
            // Initialize features
            initMobileFeatures();
            initAccessibilityFeatures();
            initAdvancedAnalytics();
            initPerformanceOptimizations();
            
            // Track page view
            trackEvent('view_item', {
                item_id: 'summer-floral-midi-dress',
                item_name: 'Summer Floral Midi Dress',
                price: 2199,
                category: 'Dresses'
            });

            console.log('Product page fully initialized');
        });
    </script>
@include('template1.footer1')