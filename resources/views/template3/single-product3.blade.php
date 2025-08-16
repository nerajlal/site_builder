@include('template3.head3', ['is_default' => $is_default, 'headerFooter' => $headerFooter])
    
    <!-- Product Container -->
    <div class="max-w-7xl mx-auto px-4 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="relative group">
                    <div class="aspect-[4/5] bg-gray-100 rounded-lg overflow-hidden">
                        <div id="mainImage" class="w-full h-full">
                            @if($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <i class="fas fa-image fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        @if($product->video_url)
                        <a href="{{ $product->video_url }}" target="_blank" class="absolute bottom-4 left-4 bg-black/70 text-white px-3 py-2 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-play mr-2"></i>Try-on Video
                        </a>
                        @endif
                    </div>
                </div>
                
                <!-- Image Gallery Thumbnails -->
                @php
                    $all_images = [];
                    if ($product->image_url) {
                        $all_images[] = $product->image_url;
                    }
                    if (is_array($product->images)) {
                        $all_images = array_merge($all_images, $product->images);
                    }
                @endphp

                @if(!empty($all_images))
                <div class="flex space-x-2 overflow-x-auto pb-2">
                    @foreach($all_images as $index => $image)
                    <button class="w-20 h-20 bg-gray-100 rounded-lg flex-shrink-0 border-2 {{ $index == 0 ? 'border-primary' : 'border-gray-200' }} hover:border-primary" onclick="changeImage('{{ $image }}', this)">
                        <img src="{{ $image }}" alt="{{ $product->name }} thumbnail {{ $index + 1 }}" class="w-full h-full object-cover rounded-md">
                    </button>
                    @endforeach
                    @if($product->video_url)
                    <a href="{{ $product->video_url }}" target="_blank" class="w-20 h-20 bg-gray-100 rounded-lg flex-shrink-0 border border-gray-200 hover:border-primary flex items-center justify-center">
                        <i class="fas fa-video text-primary fa-2x"></i>
                    </a>
                    @endif
                </div>
                @endif
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <!-- Product Title & Rating -->
                <div>
                    <h1 class="text-3xl font-bold mb-3">{{ $product->name }}</h1>
                    @if($product->brand)
                    <p class="text-lg text-gray-600 mb-3">By {{ $product->brand->name }}</p>
                    @endif
                </div>

                <!-- Price Stack -->
                <div class="space-y-2">
                    <div class="flex items-baseline space-x-4">
                        <span class="text-3xl font-bold text-gray-900">₹{{ number_format($product->price, 2) }}</span>
                        @if($product->original_price && $product->original_price > $product->price)
                            <span class="text-xl text-gray-500 line-through">₹{{ number_format($product->original_price, 2) }}</span>
                            <span class="text-lg font-semibold text-green-600">{{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}% off</span>
                        @endif
                    </div>
                    <p class="text-sm text-gray-600">Inclusive of all taxes • GST invoice available</p>
                </div>

                <!-- Key Features -->
                @if(isset($product->details['key_features']) && is_array($product->details['key_features']))
                <div class="bg-blue-50 p-4 rounded-lg">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-sm">
                        @foreach(array_slice($product->details['key_features'], 0, 3) as $feature)
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check text-green-600"></i>
                            <span>{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Color Selection -->
                @if(is_array($product->colors) && !empty($product->colors))
                <div>
                    <h3 class="text-sm font-semibold mb-3">Color: <span id="selectedColorName">{{ $product->colors[0]['name'] ?? '' }}</span></h3>
                    <div class="flex space-x-3">
                        @foreach($product->colors as $index => $color)
                        <button class="color-btn w-10 h-10 rounded-full border-2 shadow-md relative {{ $index == 0 ? 'border-primary' : 'border-gray-200' }} hover:border-gray-400"
                                style="background-color: {{ $color['value'] }}"
                                onclick="selectColor('{{ $color['value'] }}', '{{ $color['name'] }}', this)"
                                data-color="{{ $color['name'] }}">
                            @if($index == 0)
                            <i class="fas fa-check text-white text-sm absolute inset-0 flex items-center justify-center"></i>
                            @else
                            <i class="fas fa-check text-white text-sm absolute inset-0 items-center justify-center hidden"></i>
                            @endif
                        </button>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Size Selection with Stock Info -->
                @if(is_array($product->sizes) && !empty($product->sizes))
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-semibold">Size: <span id="selectedSizeName"></span></h3>
                        <button class="text-sm text-primary hover:underline" onclick="openSizeGuide()">Size Guide</button>
                    </div>
                    <div class="grid grid-cols-5 gap-2 mb-2">
                        @foreach($product->sizes as $sizeData)
                        <button class="size-btn py-3 text-center border rounded hover:border-primary"
                                onclick="selectSize('{{ $sizeData['size'] }}', this)"
                                data-size="{{ $sizeData['size'] }}"
                                data-stock="{{ $sizeData['stock'] }}">
                            <span>{{ $sizeData['size'] }}</span>
                        </button>
                        @endforeach
                    </div>
                    <p class="text-sm text-orange-600" id="stockInfo"></p>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="space-y-3 pt-4">
                    <div class="grid grid-cols-2 gap-3">
                        <button class="py-4 border-2 border-primary text-primary rounded-lg font-semibold hover:bg-primary hover:text-white transition-colors" onclick="addToCart()">
                            Add to Cart
                        </button>
                        <button class="py-4 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition-colors" onclick="buyNow()">
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Information Tabs -->
        <div class="mt-16">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8 overflow-x-auto">
                    <button class="tab-btn active py-4 px-1 border-b-2 border-primary text-primary font-medium whitespace-nowrap" onclick="showTab('description')">Description</button>
                    @if(isset($product->details) && !empty(array_filter((array)$product->details)))
                    <button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" onclick="showTab('fit')">Fit & Materials</button>
                    @endif
                </nav>
            </div>

            <!-- Tab Content -->
            <div class="mt-8">
                <!-- Description Tab -->
                <div id="description" class="tab-content">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Product Details</h3>
                            <p class="text-gray-700 mb-6 prose">{!! nl2br(e($product->description)) !!}</p>
                            
                            @if(isset($product->details['key_features']) && is_array($product->details['key_features']))
                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-semibold mb-2">Key Features:</h4>
                                    <ul class="space-y-2 text-gray-700">
                                        @foreach($product->details['key_features'] as $feature)
                                        <li class="flex items-start space-x-2">
                                            <i class="fas fa-check text-green-600 mt-1"></i>
                                            <span>{{ $feature }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                        
                        @if(isset($product->details['styling_tips']) && is_array($product->details['styling_tips']))
                        <div>
                            <h4 class="font-semibold mb-4">Styling Tips:</h4>
                            <div class="space-y-4">
                                @foreach($product->details['styling_tips'] as $tip)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h5 class="font-medium mb-2">{{ $tip['title'] }}</h5>
                                    <p class="text-sm text-gray-700">{{ $tip['description'] }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Fit & Materials Tab -->
                @if(isset($product->details) && !empty(array_filter((array)$product->details)))
                <div id="fit" class="tab-content hidden">
                    <!-- ... content for fit & materials ... -->
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function changeImage(imageUrl, thumb) {
            document.getElementById('mainImage').querySelector('img').src = imageUrl;
            // Update active thumbnail
            document.querySelectorAll('.thumbnail-btn').forEach(btn => btn.classList.remove('border-primary'));
            thumb.classList.add('border-primary');
        }
    </script>

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "{{ $product->name }}",
        "image": [
            "{{ $product->image_url }}"
            @if(is_array($product->images))
                @foreach($product->images as $image)
                , "{{ $image }}"
                @endforeach
            @endif
        ],
        "description": "{{ $product->description }}",
        "sku": "{{ $product->sku }}",
        "brand": {
            "@type": "Brand",
            "name": "{{ $product->brand->name ?? '' }}"
        },
        "offers": {
            "@type": "Offer",
            "url": "{{ url()->current() }}",
            "priceCurrency": "INR",
            "price": "{{ $product->price }}",
            "itemCondition": "https://schema.org/NewCondition",
            "availability": "https://schema.org/InStock"
        }
    }
    </script>

    <script>
        function changeImage(imageUrl, thumb) {
            document.getElementById('mainImage').querySelector('img').src = imageUrl;
            const thumbnails = document.querySelectorAll('.thumbnail-btn');
            thumbnails.forEach(btn => {
                btn.classList.remove('border-primary');
                btn.classList.add('border-gray-200');
            });
            thumb.classList.add('border-primary');
            thumb.classList.remove('border-gray-200');
        }

        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
            document.querySelectorAll('.tab-btn').forEach(b => {
                b.classList.remove('active', 'border-primary', 'text-primary');
                b.classList.add('border-transparent', 'text-gray-500');
            });
            document.getElementById(tabName).classList.remove('hidden');
            const clickedButton = document.querySelector(`button[onclick="showTab('${tabName}')"]`);
            clickedButton.classList.add('active', 'border-primary', 'text-primary');
            clickedButton.classList.remove('border-transparent', 'text-gray-500');
        }

        function selectColor(colorValue, colorName, thumb) {
            document.getElementById('selectedColorName').textContent = colorName;
            document.querySelectorAll('.color-btn').forEach(btn => {
                btn.classList.remove('border-primary');
                btn.classList.add('border-gray-200');
                btn.querySelector('i').classList.add('hidden');
            });
            thumb.classList.add('border-primary');
            thumb.classList.remove('border-gray-200');
            thumb.querySelector('i').classList.remove('hidden');
        }

        function selectSize(size, thumb) {
            document.getElementById('selectedSizeName').textContent = size;
            document.querySelectorAll('.size-btn').forEach(btn => {
                btn.classList.remove('border-primary', 'bg-primary', 'text-white');
                btn.classList.add('border-gray-200');
            });
            thumb.classList.add('border-primary', 'bg-primary', 'text-white');
            thumb.classList.remove('border-gray-200');
            
            const stock = thumb.dataset.stock;
            const stockInfo = document.getElementById('stockInfo');
            if (stock && parseInt(stock, 10) < 5) {
                stockInfo.textContent = `Only ${stock} left!`;
                stockInfo.classList.remove('hidden');
            } else {
                stockInfo.classList.add('hidden');
            }
        }

        // Initialize default selections
        document.addEventListener('DOMContentLoaded', () => {
            const firstSize = document.querySelector('.size-btn');
            if (firstSize) {
                selectSize(firstSize.dataset.size, firstSize);
            }
        });
    </script>

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "{{ $product->name }}",
        "image": [
            "{{ $product->image_url }}"
            @if(is_array($product->images))
                @foreach($product->images as $image)
                , "{{ $image }}"
                @endforeach
            @endif
        ],
        "description": "{{ $product->description }}",
        "sku": "{{ $product->sku }}",
        "brand": {
            "@type": "Brand",
            "name": "{{ $product->brand->name ?? '' }}"
        },
        "offers": {
            "@type": "Offer",
            "url": "{{ url()->current() }}",
            "priceCurrency": "INR",
            "price": "{{ $product->price }}",
            "itemCondition": "https://schema.org/NewCondition",
            "availability": "https://schema.org/InStock"
        }
    }
    </script>

@include('template3.footer3')