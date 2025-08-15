@include('template2.head2', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<main class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-4 lg:gap-8">
            <div class="hidden lg:block lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Filters</h3>
                    <form action="{{ url()->current() }}" method="GET">
                        <div class="space-y-6">
                            <div>
                                <label for="sort" class="block text-sm font-medium text-gray-700">Sort by</label>
                                <select id="sort" name="sort" onchange="this.form.submit()" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Default</option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                                </select>
                            </div>
                            <div>
                                <label for="min_price" class="block text-sm font-medium text-gray-700">Price Range</label>
                                <div class="mt-1 flex space-x-2">
                                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="w-full bg-teal-600 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Apply Filters</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-3">
                <div class="mb-8 text-center">
                    <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
                        @if($is_default)
                            Our Exclusive Collection
                        @else
                            {{ $headerFooter->site_name }}'s Collection
                        @endif
                    </h1>
                    <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
                        Discover curated pieces for the modern connoisseur.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @if($is_default)
                        @include('template2.collection-default')
                    @else
                        @foreach($products as $product)
                            <div class="group relative">
                                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                    <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <a href="{{ route('template2.single-product', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $product->category->name ?? '' }}</p>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900">₹{{ number_format($product->price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

@include('template2.footer2')
