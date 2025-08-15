@include('template3.head3', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<div class="bg-beige-50">
  <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
    <div class="text-center">
      <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
        <span class="block">
            @if($is_default)
                Timeless Collection
            @else
                {{ $headerFooter->site_name }}'s Collection
            @endif
        </span>
      </h1>
      <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
        Explore our curated selection of high-quality products.
      </p>
    </div>
  </div>
</div>

<div class="bg-white">
  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="border-b border-gray-200 pb-4">
      <div class="flex items-center justify-between">
        <form action="{{ url()->current() }}" method="GET" class="flex items-center space-x-4">
            <div class="relative">
                <select name="sort" onchange="this.form.submit()" class="appearance-none bg-transparent border-none text-gray-700 py-2 pr-8 leading-tight focus:outline-none">
                    <option value="">Sort By</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </div>
            <div class="relative">
                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min Price" class="w-32 bg-transparent border-b border-gray-300 focus:outline-none focus:border-black">
            </div>
            <div class="relative">
                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max Price" class="w-32 bg-transparent border-b border-gray-300 focus:outline-none focus:border-black">
            </div>
            <button type="submit" class="px-4 py-2 text-sm font-medium text-black border border-black rounded-full hover:bg-black hover:text-white">Filter</button>
        </form>
        <div class="text-sm text-gray-500">
            @if($is_default)
                Showing all products
            @else
                {{ count($products) }} products
            @endif
        </div>
      </div>
    </div>
  </div>
</div>

<div class="bg-white">
  <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @if($is_default)
            @include('template3.collection-default')
        @else
            @foreach($products as $product)
            <a href="{{ route('template3.single-product', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}" class="group">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                <img src="{{$product->image_url}}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover group-hover:opacity-75">
                </div>
                <h3 class="mt-4 text-sm text-gray-700">
                {{ $product->name }}
                </h3>
                <p class="mt-1 text-lg font-medium text-gray-900">
                ₹{{ number_format($product->price, 2) }}
                </p>
            </a>
            @endforeach
        @endif
    </div>
  </div>
</div>

@include('template3.footer3')
