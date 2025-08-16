@include('template1.head1', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<div class="bg-gray-50 font-sans">
    <!-- Product Container -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image with Video Support -->
                <div class="relative group">
                    <div class="aspect-[4/5] bg-gray-100 rounded-lg overflow-hidden">
                        <img id="mainProductImage" src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @if($product->video_url)
                        <button id="playVideoButton" class="absolute bottom-4 left-4 bg-black/70 text-white px-3 py-2 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-play mr-2"></i>Try-on Video
                        </button>
                        @endif
                    </div>
                </div>

                <!-- Image Gallery Thumbnails -->
                <div class="flex space-x-2 overflow-x-auto pb-2">
                    @if($product->images && is_array($product->images))
                        @foreach($product->images as $index => $image)
                            <button class="w-20 h-20 bg-gray-200 rounded-lg flex-shrink-0 border-2 {{ $loop->first ? 'border-pink-600' : 'border-transparent' }} hover:border-pink-600 thumbnail-button" onclick="changeImage('{{ $image }}', this)">
                                <img src="{{ $image }}" alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-cover rounded-md">
                            </button>
                        @endforeach
                    @endif
                    @if($product->video_url)
                        <button class="w-20 h-20 bg-gray-200 rounded-lg flex-shrink-0 border-2 border-transparent hover:border-pink-600 thumbnail-button" onclick="playVideo('{{ $product->video_url }}', this)">
                            <div class="w-full h-full flex items-center justify-center text-pink-600">
                                <i class="fas fa-video text-2xl"></i>
                            </div>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <!-- Product Title & Rating -->
                <div>
                    <h1 class="text-3xl font-bold mb-3">{{ $product->name }}</h1>
                    <p class="text-gray-600">{{ $product->description }}</p>
                </div>

                <!-- Price Stack -->
                <div class="space-y-2">
                    <div class="flex items-center space-x-4">
                        <span class="text-3xl font-bold text-gray-900">₹{{ number_format($product->price, 0) }}</span>
                        @if($product->original_price && $product->original_price > $product->price)
                            <span class="text-xl text-gray-500 line-through">₹{{ number_format($product->original_price, 0) }}</span>
                            <span class="text-lg text-green-600 font-semibold bg-green-100 px-2 py-1 rounded">{{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}% OFF</span>
                        @endif
                    </div>
                    <p class="text-sm text-gray-600">Inclusive of all taxes • GST invoice available</p>
                </div>

                <!-- Key Features from details -->
                @if(isset($product->details['key_features']) && is_array($product->details['key_features']))
                <div class="bg-blue-50 p-4 rounded-lg">
                    <div class="grid grid-cols-3 gap-4 text-sm">
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
                @if($product->colors && is_array($product->colors) && count($product->colors) > 0)
                <div>
                    <h3 class="text-sm font-semibold mb-3">Color: <span id="selectedColorName">{{ $product->colors[0]['name'] }}</span></h3>
                    <div class="flex space-x-3">
                        @foreach($product->colors as $color)
                        <button class="color-btn w-10 h-10 rounded-full border-2 shadow-md relative" style="background-color: {{ $color['hex'] }};" onclick="selectColor('{{ $color['name'] }}', this)" data-color-name="{{ $color['name'] }}">
                            <i class="fas fa-check text-white text-sm absolute inset-0 items-center justify-center {{ $loop->first ? 'flex' : 'hidden' }}"></i>
                        </button>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Size Selection with Stock Info -->
                @if($product->sizes && is_array($product->sizes) && count($product->sizes) > 0)
                <div>
                    <h3 class="text-sm font-semibold">Size: <span id="selectedSizeName"></span></h3>
                    <div class="grid grid-cols-5 gap-2 my-2">
                        @foreach($product->sizes as $size)
                            <button class="size-btn py-3 text-center border rounded hover:border-pink-600" onclick="selectSize('{{ $size['size'] }}', {{ $size['stock'] }}, this)" data-size="{{ $size['size'] }}" data-stock="{{ $size['stock'] }}">
                                <span>{{ $size['size'] }}</span>
                                @if($size['stock'] == 0)
                                <div class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full"></div>
                                @endif
                            </button>
                        @endforeach
                    </div>
                    <p class="text-sm text-orange-600" id="stockInfo"></p>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="space-y-3 pt-4">
                    <div class="grid grid-cols-2 gap-3">
                        <button class="py-4 border-2 border-pink-600 text-pink-600 rounded-lg font-semibold hover:bg-pink-600 hover:text-white transition-colors">
                            Add to Cart
                        </button>
                        <button class="py-4 bg-pink-600 text-white rounded-lg font-semibold hover:bg-pink-700 transition-colors">
                            Buy Now
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
                        <span>Easy Returns</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <i class="fas fa-truck text-orange-600"></i>
                        <span>Fast Delivery</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Information Tabs -->
        @if(is_array($product->details))
        <div class="mt-16">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8 overflow-x-auto">
                    <button class="tab-btn active py-4 px-1 border-b-2 border-pink-600 text-pink-600 font-medium whitespace-nowrap" onclick="showTab('description', this)">Description</button>
                    @if(isset($product->details['care_instructions']))<button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" onclick="showTab('care', this)">Care</button>@endif
                </nav>
            </div>
            <div class="mt-8">
                <div id="description" class="tab-content">
                    <div class="prose max-w-none text-gray-700">
                        @if(isset($product->details['key_features']))
                            <h4>Key Features</h4>
                            <ul>
                                @foreach($product->details['key_features'] as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(isset($product->details['styling_tips']))
                            <h4>Styling Tips</h4>
                            <ul>
                                @foreach($product->details['styling_tips'] as $tip)
                                    <li><strong>{{ $tip['occasion'] }}:</strong> {{ $tip['tip'] }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                @if(isset($product->details['care_instructions']))
                <div id="care" class="tab-content hidden">
                    <div class="prose max-w-none text-gray-700">
                        <h4>Fabric Details</h4>
                        <ul>
                            @foreach($product->details['fabric_details'] as $key => $value)
                                <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                            @endforeach
                        </ul>
                        <h4>Care Instructions</h4>
                        <ul>
                             @foreach($product->details['care_instructions'] as $instruction)
                                <li>{{ $instruction }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    let currentState = {
        selectedColor: '{{ $product->colors[0]['name'] ?? '' }}',
        selectedSize: null,
    };

    function changeImage(imageUrl, buttonElement) {
        document.getElementById('mainProductImage').src = imageUrl;
        document.querySelectorAll('.thumbnail-button').forEach(btn => btn.classList.remove('border-pink-600'));
        buttonElement.classList.add('border-pink-600');
    }

    function playVideo(videoUrl, buttonElement) {
        const mainImageContainer = document.getElementById('mainProductImage').parentElement;
        mainImageContainer.innerHTML = `<iframe src="${videoUrl}" class="w-full h-full" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>`;
        document.querySelectorAll('.thumbnail-button').forEach(btn => btn.classList.remove('border-pink-600'));
        buttonElement.classList.add('border-pink-600');
    }

    function selectColor(colorName, buttonElement) {
        currentState.selectedColor = colorName;
        document.getElementById('selectedColorName').textContent = colorName;
        document.querySelectorAll('.color-btn').forEach(btn => {
            btn.querySelector('i').classList.add('hidden');
            btn.querySelector('i').classList.remove('flex');
        });
        buttonElement.querySelector('i').classList.remove('hidden');
        buttonElement.querySelector('i').classList.add('flex');
    }

    function selectSize(size, stock, buttonElement) {
        currentState.selectedSize = size;
        document.getElementById('selectedSizeName').textContent = size;
        document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('bg-pink-600', 'text-white'));
        buttonElement.classList.add('bg-pink-600', 'text-white');

        const stockInfo = document.getElementById('stockInfo');
        if (stock <= 5 && stock > 0) {
            stockInfo.textContent = `Only ${stock} left in ${size} size!`;
        } else {
            stockInfo.textContent = '';
        }
    }

    function showTab(tabName, buttonElement) {
        document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
        document.getElementById(tabName).classList.remove('hidden');

        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active', 'border-pink-600', 'text-pink-600');
            btn.classList.add('border-transparent', 'text-gray-500');
        });
        buttonElement.classList.add('active', 'border-pink-600', 'text-pink-600');
        buttonElement.classList.remove('border-transparent', 'text-gray-500');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const firstSize = document.querySelector('.size-btn');
        if(firstSize) {
            firstSize.click();
        }
    });

</script>

@include('template1.footer1')
