@include('template2.head2', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Image gallery -->
        <div class="space-y-4">
            <div class="aspect-w-3 aspect-h-4 rounded-lg overflow-hidden">
                <img id="mainImage" src="{{ $product->image_url ?? '' }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover">
            </div>
            @php
                $all_images = [];
                if ($product->image_url) {
                    $all_images[] = $product->image_url;
                }
                if (is_array($product->images)) {
                    $all_images = array_merge($all_images, $product->images);
                }
            @endphp
            @if(!empty($all_images) && count($all_images) > 1)
            <div class="grid grid-cols-5 gap-4">
                @foreach($all_images as $image)
                <button onclick="changeImage('{{ $image }}', this)" class="thumbnail-btn rounded-lg overflow-hidden border-2 border-transparent hover:border-primary transition">
                    <img src="{{ $image }}" alt="{{ $product->name }} thumbnail" class="w-full h-full object-center object-cover">
                </button>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Product info -->
        <div class="space-y-6">
            <div>
                @if($product->brand)
                <p class="text-sm uppercase text-gray-500">{{ $product->brand->name }}</p>
                @endif
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $product->name }}</h1>
            </div>

            <div class="space-y-2">
                <p class="text-3xl text-gray-900">₹{{ number_format($product->price, 2) }}</p>
                @if($product->original_price && $product->original_price > $product->price)
                <div class="flex items-baseline space-x-2">
                    <p class="text-lg text-gray-500 line-through">₹{{ number_format($product->original_price, 2) }}</p>
                    <p class="text-lg font-medium text-green-600">{{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}% OFF</p>
                </div>
                @endif
            </div>

            <div class="space-y-4">
                <div class="prose">
                    <p>{{ $product->description }}</p>
                </div>
            </div>

            <form>
                @if(is_array($product->colors) && !empty($product->colors))
                <div>
                    <h3 class="text-sm text-gray-900 font-medium">Color</h3>
                    <div class="flex items-center space-x-3 mt-2">
                        @foreach($product->colors as $index => $color)
                        <label class="relative -m-0.5 flex items-center justify-center rounded-full p-0.5 focus:outline-none">
                            <input type="radio" name="color-choice" value="{{ $color['name'] }}" class="sr-only" {{ $index == 0 ? 'checked' : '' }}>
                            <span style="background-color: {{ $color['value'] }}" class="h-8 w-8 border border-black border-opacity-10 rounded-full"></span>
                        </label>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(is_array($product->sizes) && !empty($product->sizes))
                <div class="mt-8">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm text-gray-900 font-medium">Size</h3>
                        <a href="#" class="text-sm font-medium text-primary hover:text-primary-dark">Size guide</a>
                    </div>

                    <div class="grid grid-cols-4 gap-4 mt-2">
                        @foreach($product->sizes as $sizeData)
                        <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 cursor-pointer">
                            <input type="radio" name="size-choice" value="{{ $sizeData['size'] }}" class="sr-only">
                            <span>{{ $sizeData['size'] }}</span>
                            @if($sizeData['stock'] == 0)
                            <span aria-hidden="true" class="absolute -inset-px rounded-md border-2 border-gray-200 pointer-events-none">
                                <svg class="absolute inset-0 w-full h-full text-gray-200 stroke-2" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                    <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                                </svg>
                            </span>
                            @endif
                        </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="mt-8">
                    <button type="submit" class="w-full bg-primary border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Add to bag</button>
                </div>
            </form>

            @if(isset($product->details) && !empty(array_filter((array)$product->details)))
            <div class="pt-6">
                <h3 class="text-lg font-medium text-gray-900">Details</h3>
                <div class="mt-4 prose prose-sm text-gray-500">
                    <ul>
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
            </div>
            @endif

        </div>
    </div>
</div>

<script>
    function changeImage(imageUrl, thumbElement) {
        document.getElementById('mainImage').src = imageUrl;

        const thumbnails = document.querySelectorAll('.thumbnail-btn');
        thumbnails.forEach(btn => {
            btn.classList.remove('border-primary');
            btn.classList.add('border-transparent');
        });

        thumbElement.classList.remove('border-transparent');
        thumbElement.classList.add('border-primary');
    }

    document.addEventListener('DOMContentLoaded', () => {
        const firstThumbnail = document.querySelector('.thumbnail-btn');
        if(firstThumbnail) {
            firstThumbnail.classList.remove('border-transparent');
            firstThumbnail.classList.add('border-primary');
        }
    });
</script>

@include('template2.footer2', ['is_default' => $is_default, 'headerFooter' => $headerFooter])
