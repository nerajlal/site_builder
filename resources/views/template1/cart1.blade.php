@include('template1.head1', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Title -->
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900">Your Shopping Cart</h2>
        <p class="text-gray-600 mt-2">{{ count($cartItems) }} items in your cart</p>
    </div>

    @if(count($cartItems) > 0)
        <!-- Cart Items Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($cartItems as $item)
                <div class="bg-white rounded-lg overflow-hidden product-card boutique-shadow">
                    <div class="relative">
                        <div class="aspect-square bg-pink-50 flex items-center justify-center">
                            <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium text-gray-900 mb-2">{{ $item->product->name }}</h3>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-lg font-bold text-gray-900">₹{{ number_format($item->product->price, 2) }}</span>
                            <span class="text-gray-600">Qty: {{ $item->quantity }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-gray-900">Subtotal: ₹{{ number_format($item->product->price * $item->quantity, 2) }}</span>
                             <button class="w-half bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg font-medium transition flex items-center justify-center">
                                <i class="fas fa-trash-alt mr-2"></i> Remove
                            </button>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- Cart Summary -->
        <div class="mt-8 bg-pink-50 p-6 rounded-lg shadow-sm text-right">
            <h3 class="text-2xl font-bold text-gray-900">Cart Total</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">₹{{ number_format($totalPrice, 2) }}</p>
            <button class="mt-4 w-full md:w-auto px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 text-lg font-medium">
                Proceed to Checkout
            </button>
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-shopping-cart text-6xl text-gray-300"></i>
            <h3 class="mt-4 text-2xl font-bold text-gray-800">Your cart is empty.</h3>
            <p class="text-gray-500 mt-2">Looks like you haven't added anything to your cart yet.</p>
            <a href="{{ route('template1.product1.customer', ['headerFooterId' => $headerFooter->id]) }}" class="mt-6 inline-block px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 font-medium">
                Continue Shopping
            </a>
        </div>
    @endif
</main>

@include('template1.footer1')
