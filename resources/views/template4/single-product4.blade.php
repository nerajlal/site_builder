@include('template4.head4', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

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
            <!-- Product Title & Brand -->
            <div>
                <h1 class="text-3xl font-bold mb-3">{{ $product->name }}</h1>
                @if($product->brand)
                <p class="text-lg text-gray-600 mb-3">By {{ $product->brand->name }}</p>
                @endif
            </div>

            <!-- Price -->
            <div class="space-y-2">
                <div class="flex items-baseline space-x-4">
                    <span class="text-3xl font-bold text-gray-900">₹{{ number_format($product->price, 2) }}</span>
                    @if($product->original_price && $product->original_price > $product->price)
                        <span class="text-xl text-gray-500 line-through">₹{{ number_format($product->original_price, 2) }}</span>
                        <span class="text-lg font-semibold text-green-600">{{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}% off</span>
                    @endif
                </div>
                <p class="text-sm text-gray-600">Inclusive of all taxes</p>
            </div>

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

            <!-- Size Selection -->
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

            <!-- Description & Details Tabs -->
            <div class="mt-8">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <button class="tab-btn active py-4 px-1 border-b-2 border-primary text-primary font-medium" onclick="showTab('description')">Description</button>
                        @if(isset($product->details) && !empty(array_filter((array)$product->details)))
                        <button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700" onclick="showTab('details')">Details</button>
                        @endif
                    </nav>
                </div>
                <div class="py-6">
                    <div id="descriptionContent" class="tab-content prose max-w-none text-gray-600">
                        <p>{{ $product->description }}</p>
                    </div>
                    @if(isset($product->details) && !empty(array_filter((array)$product->details)))
                    <div id="detailsContent" class="tab-content hidden prose max-w-none text-gray-600">
                        <ul class="list-disc list-inside">
                        @foreach($product->details as $key => $value)
                            @if(!empty($value))
                                @if(is_array($value))
                                    <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong>
                                        <ul class="list-disc list-inside ml-4">
                                            @foreach($value as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                                @endif
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let selectedColor = '{{ $product->colors[0]['name'] ?? '' }}';
    let selectedSize = '';

    function changeImage(imageUrl, thumbElement) {
        document.getElementById('mainImage').querySelector('img').src = imageUrl;

        document.querySelectorAll('.flex.space-x-2.overflow-x-auto button').forEach(btn => {
            btn.classList.remove('border-primary');
            btn.classList.add('border-gray-200');
        });
        thumbElement.classList.remove('border-gray-200');
        thumbElement.classList.add('border-primary');
    }

    function selectColor(colorValue, colorName, btnElement) {
        selectedColor = colorName;
        document.getElementById('selectedColorName').textContent = colorName;

        document.querySelectorAll('.color-btn').forEach(btn => {
            btn.classList.remove('border-primary');
            btn.classList.add('border-gray-200');
            btn.querySelector('.fa-check').classList.add('hidden');
        });
        btnElement.classList.add('border-primary');
        btnElement.classList.remove('border-gray-200');
        btnElement.querySelector('.fa-check').classList.remove('hidden');
    }

    function selectSize(size, btnElement) {
        const stock = btnElement.dataset.stock;
        selectedSize = size;
        document.getElementById('selectedSizeName').textContent = size;

        document.querySelectorAll('.size-btn').forEach(btn => {
            btn.classList.remove('border-primary', 'bg-primary', 'text-white');
        });
        btnElement.classList.add('border-primary', 'bg-primary', 'text-white');

        const stockInfo = document.getElementById('stockInfo');
        if (stock > 0 && stock <= 5) {
            stockInfo.textContent = `Only ${stock} left in ${size} size!`;
            stockInfo.className = 'text-sm text-orange-600';
        } else if (stock > 5) {
            stockInfo.textContent = `In Stock`;
            stockInfo.className = 'text-sm text-green-600';
        } else {
            stockInfo.textContent = `Out of stock`;
             stockInfo.className = 'text-sm text-red-600';
        }
    }

    function showTab(tabName) {
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active', 'border-primary', 'text-primary');
            btn.classList.add('border-transparent', 'text-gray-500');
        });

        document.getElementById(tabName + 'Content').classList.remove('hidden');
        const activeBtn = document.querySelector(`.tab-btn[onclick="showTab('${tabName}')"]`);
        activeBtn.classList.add('active', 'border-primary', 'text-primary');
        activeBtn.classList.remove('border-transparent', 'text-gray-500');
    }

    function addToCart() {
        if (!selectedSize) {
            alert('Please select a size.');
            return;
        }
        console.log(`Added to cart: {{ $product->name }}, Color: ${selectedColor}, Size: ${selectedSize}`);
        alert('Added to cart!');
    }

    function buyNow() {
        if (!selectedSize) {
            alert('Please select a size.');
            return;
        }
        console.log(`Buying now: {{ $product->name }}, Color: ${selectedColor}, Size: ${selectedSize}`);
        alert('Proceeding to checkout!');
    }

    function openSizeGuide() {
        alert('Displaying size guide...');
    }

    document.addEventListener('DOMContentLoaded', () => {
        const firstSizeBtn = document.querySelector('.size-btn');
        if(firstSizeBtn) {
            selectSize(firstSizeBtn.dataset.size, firstSizeBtn);
        }
    });

</script>

@include('template4.footer4', ['is_default' => $is_default, 'headerFooter' => $headerFooter])
