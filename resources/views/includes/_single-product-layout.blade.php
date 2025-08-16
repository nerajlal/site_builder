<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Boutique</title>
    <meta name="description" content="{{ $product->description }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#e91e63',
                        secondary: '#10b981'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    @if(isset($headerFooter))
        @include('template' . $headerFooter->template_id . '.head' . $headerFooter->template_id, ['is_default' => false, 'headerFooter' => $headerFooter])
    @else
        @include('template1.head1', ['is_default' => true, 'headerFooter' => null])
    @endif

    <!-- Product Container -->
    <div class="max-w-7xl mx-auto px-4 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image with Video Support -->
                <div class="relative group">
                    <div class="aspect-[4/5] bg-pink-100 rounded-lg overflow-hidden">
                        <img id="mainImage" src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <!-- Product Title & Rating -->
                <div>
                    <h1 class="text-3xl font-bold mb-3">{{ $product->name }}</h1>
                </div>

                <!-- Price Stack -->
                <div class="space-y-2">
                    <div class="flex items-center space-x-4">
                        <span class="text-3xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                        @if($product->original_price)
                            <span class="text-xl text-gray-500 line-through">${{ number_format($product->original_price, 2) }}</span>
                            <span class="text-lg text-green-600 font-semibold bg-green-100 px-2 py-1 rounded">
                                -{{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}% OFF
                            </span>
                        @endif
                    </div>
                    <p class="text-sm text-gray-600">Inclusive of all taxes • GST invoice available</p>
                </div>

                <!-- Key Features -->
                @php
                    $key_features = is_array($product->key_features) ? $product->key_features : json_decode($product->key_features, true);
                @endphp
                @if(is_array($key_features))
                <div class="bg-blue-50 p-4 rounded-lg">
                    <div class="grid grid-cols-3 gap-4 text-sm">
                        @foreach($key_features as $feature)
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check text-green-600"></i>
                            <span>{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Color Selection -->
                <div>
                    <h3 class="text-sm font-semibold mb-3">Color: <span id="selectedColorName"></span></h3>
                    <div class="flex space-x-3">
                        @php
                            $colors = is_array($product->colors) ? $product->colors : json_decode($product->colors, true);
                        @endphp
                        @if(is_array($colors))
                            @foreach($colors as $index => $color)
                                <button class="color-btn w-10 h-10 rounded-full border-2 hover:border-gray-400 shadow-md"
                                        style="background-color: {{ $color['hex'] }};"
                                        onclick="selectColor('{{ $color['name'] }}', '{{ $color['name'] }}')"
                                        data-color="{{ $color['name'] }}">
                                    @if($index == 0)
                                        <i class="fas fa-check text-white text-sm absolute inset-0 flex items-center justify-center"></i>
                                    @endif
                                </button>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Size Selection with Stock Info -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-semibold">Size: <span id="selectedSizeName"></span></h3>
                        <button class="text-sm text-primary hover:underline" onclick="openSizeGuide()">Size Guide</button>
                    </div>
                    <div class="grid grid-cols-5 gap-2 mb-2">
                        @php
                            $sizes = is_array($product->sizes) ? $product->sizes : json_decode($product->sizes, true);
                        @endphp
                        @if(is_array($sizes))
                            @foreach($sizes as $size)
                                <button class="size-btn py-3 text-center border rounded hover:border-primary"
                                        onclick="selectSize('{{ $size['size'] }}')"
                                        data-size="{{ $size['size'] }}"
                                        data-stock="{{ $size['stock'] }}"
                                        @if($size['stock'] == 0) disabled @endif>
                                    <span>{{ $size['size'] }}</span>
                                    @if($size['stock'] == 0)
                                        <div class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full"></div>
                                    @endif
                                </button>
                            @endforeach
                        @endif
                    </div>
                    <p class="text-sm text-orange-600" id="stockInfo"></p>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <!-- Primary CTAs -->
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
                    <button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" onclick="showTab('fit')">Fit & Materials</button>
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
                                <div>
                                    <h4 class="font-semibold mb-2">Key Features:</h4>
                                    @php
                                        $key_features = is_array($product->key_features) ? $product->key_features : json_decode($product->key_features, true);
                                    @endphp
                                    @if(is_array($key_features))
                                    <ul class="space-y-2 text-gray-700">
                                        @foreach($key_features as $feature)
                                        <li class="flex items-start space-x-2">
                                            <i class="fas fa-check text-green-600 mt-1"></i>
                                            <span>{{ $feature }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-4">Styling Tips:</h4>
                            @php
                                $styling_tips = is_array($product->styling_tips) ? $product->styling_tips : json_decode($product->styling_tips, true);
                            @endphp
                            @if(is_array($styling_tips))
                            <div class="space-y-4">
                                @foreach($styling_tips as $tip)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h5 class="font-medium mb-2">{{ $tip['title'] }}</h5>
                                    <p class="text-sm text-gray-700">{{ $tip['description'] }}</p>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Fit & Materials Tab -->
                <div id="fit" class="tab-content hidden">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Fit & Measurements</h3>
                            <div class="space-y-4">
                                @php
                                    $model_info = is_array($product->model_info) ? $product->model_info : json_decode($product->model_info, true);
                                @endphp
                                @if(is_array($model_info))
                                <div class="bg-blue-50 p-4 rounded-lg">
                                    <h4 class="font-semibold mb-3">Model Information</h4>
                                    <div class="space-y-2 text-sm">
                                        @foreach($model_info as $info)
                                            <p><strong>{{ $info['label'] }}:</strong> {{ $info['value'] }}</p>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                @php
                                    $garment_details = is_array($product->garment_details) ? $product->garment_details : json_decode($product->garment_details, true);
                                @endphp
                                @if(is_array($garment_details))
                                <div>
                                    <h4 class="font-semibold mb-3">Garment Details</h4>
                                    <div class="space-y-2 text-sm">
                                        @foreach($garment_details as $detail)
                                            <p><strong>{{ $detail['label'] }}:</strong> {{ $detail['value'] }}</p>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Size Chart -->
                                <div>
                                    <h4 class="font-semibold mb-3">Size Chart</h4>
                                    @php
                                        $size_chart = is_array($product->size_chart) ? $product->size_chart : json_decode($product->size_chart, true);
                                    @endphp
                                    @if(is_array($size_chart))
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm border border-gray-300">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    @foreach($size_chart['headers'] as $header)
                                                        <td class="border border-gray-300 p-2 font-medium">{{ $header }}</td>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($size_chart['rows'] as $row)
                                                <tr>
                                                    @foreach($row as $cell)
                                                        <td class="border border-gray-300 p-2">{{ $cell }}</td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                    <p class="text-xs text-gray-600 mt-2">*All measurements are approximate and may vary by 1-2 cm</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-4">Materials & Care</h3>
                            <div class="space-y-6">
                                @php
                                    $fabric_details = is_array($product->fabric_details) ? $product->fabric_details : json_decode($product->fabric_details, true);
                                @endphp
                                @if(is_array($fabric_details))
                                <div>
                                    <h4 class="font-semibold mb-3">Fabric Details</h4>
                                    <div class="space-y-2 text-sm">
                                        @foreach($fabric_details as $detail)
                                            <p><strong>{{ $detail['label'] }}:</strong> {{ $detail['value'] }}</p>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                @php
                                    $care_instructions = is_array($product->care_instructions) ? $product->care_instructions : json_decode($product->care_instructions, true);
                                @endphp
                                @if(is_array($care_instructions))
                                <div>
                                    <h4 class="font-semibold mb-3">Care Instructions</h4>
                                    <div class="grid grid-cols-2 gap-4">
                                        @foreach($care_instructions as $instruction)
                                        <div class="flex items-center space-x-3 p-3 bg-blue-50 rounded-lg">
                                            <i class="{{ $instruction['icon'] }} text-blue-500 text-xl"></i>
                                            <div>
                                                <p class="font-medium">{{ $instruction['instruction'] }}</p>
                                                <p class="text-xs text-gray-600">{{ $instruction['details'] }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                @php
                                    $care_tips = is_array($product->care_tips) ? $product->care_tips : json_decode($product->care_tips, true);
                                @endphp
                                @if(is_array($care_tips))
                                <div class="bg-green-50 p-4 rounded-lg">
                                    <h4 class="font-semibold mb-2 text-green-800">Care Tips</h4>
                                    <ul class="text-sm text-green-700 space-y-1">
                                        @foreach($care_tips as $tip)
                                            <li>• {{ $tip }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($headerFooter))
        @include('template' . $headerFooter->template_id . '.footer' . $headerFooter->template_id)
    @else
        @include('template1.footer1')
    @endif

    <script>
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
                button.classList.remove('active', 'border-primary', 'text-primary');
                button.classList.add('border-transparent', 'text-gray-500');
            });

            // Show selected tab content
            document.getElementById(tabName).classList.remove('hidden');

            // Add active class to clicked tab button
            event.target.classList.add('active', 'border-primary', 'text-primary');
            event.target.classList.remove('border-transparent', 'text-gray-500');
        }

        // Color selection
        function selectColor(color, colorName) {
            // Update selected color name
            document.getElementById('selectedColorName').textContent = colorName;

            // Update color button states
            const colorButtons = document.querySelectorAll('.color-btn');
            colorButtons.forEach(button => {
                const buttonColor = button.dataset.color;
                const checkIcon = button.querySelector('i');

                if (buttonColor === color) {
                    button.classList.add('border-primary');
                    button.classList.remove('border-gray-200');
                    if (checkIcon) checkIcon.style.display = 'flex';
                } else {
                    button.classList.remove('border-primary');
                    button.classList.add('border-gray-200');
                    if (checkIcon) checkIcon.style.display = 'none';
                }
            });
        }

        // Size selection
        function selectSize(size) {
            // Update selected size name
            document.getElementById('selectedSizeName').textContent = size;

            // Update size button states
            const sizeButtons = document.querySelectorAll('.size-btn');
            sizeButtons.forEach(button => {
                const buttonSize = button.dataset.size;

                if (buttonSize === size) {
                    button.classList.add('border-2', 'border-primary', 'bg-primary', 'text-white');
                    button.classList.remove('border', 'border-gray-200');
                } else if (!button.disabled) {
                    button.classList.remove('border-2', 'border-primary', 'bg-primary', 'text-white');
                    button.classList.add('border', 'border-gray-200');
                }
            });

            // Update stock info
            const selectedButton = document.querySelector(`[data-size="${size}"]`);
            const stock = selectedButton.dataset.stock;
            const stockInfo = document.getElementById('stockInfo');

            if (stock && parseInt(stock) <= 5) {
                stockInfo.textContent = `Only ${stock} left in ${size} size!`;
                stockInfo.className = 'text-sm text-orange-600';
            } else if (stock) {
                stockInfo.textContent = ``;
            }
        }
    </script>
</body>
</html>
