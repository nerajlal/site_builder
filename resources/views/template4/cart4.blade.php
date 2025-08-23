@include('template4.head4', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row -mx-4">
            <!-- Cart Items -->
            <div class="w-full lg:w-2/3 px-4">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Your Cart ({{ count($cartItems) }} items)</h2>

                    @if(count($cartItems) > 0)
                        <div id="cart-items-container" class="divide-y divide-gray-200">
                            @foreach($cartItems as $items)
                                @php
                                    $product = $items->first()->product;
                                @endphp
                                <div class="product-group py-6">
                                    <div class="flex">
                                        <a href="{{ route('single-product.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}" class="w-24 h-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
                                        </a>
                                        <div class="ml-4 flex flex-1 flex-col justify-center">
                                            <h3 class="text-base font-medium text-gray-900">
                                                <a href="{{ route('single-product.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}">{{ $product->name }}</a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Unit Price: ₹{{ number_format($product->price, 2) }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="ml-28 mt-4 space-y-4">
                                        @foreach($items as $item)
                                            <div class="cart-item flex items-end justify-between text-sm" data-id="{{ $item->id }}">
                                                <div class="flex-1">
                                                    @if(isset($item->options['color']))
                                                        <p class="text-gray-500">Color: <span class="font-medium text-gray-800">{{ $item->options['color'] }}</span></p>
                                                    @endif
                                                    @if(isset($item->options['size']))
                                                        <p class="text-gray-500">Size: <span class="font-medium text-gray-800">{{ $item->options['size'] }}</span></p>
                                                    @endif
                                                </div>
                                                <div class="flex items-center">
                                                    <label for="quantity-{{$item->id}}" class="mr-2 text-gray-500">Qty:</label>
                                                    <input type="number" id="quantity-{{$item->id}}" name="quantity" value="{{ $item->quantity }}" class="w-16 rounded-md border border-gray-300 py-1.5 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500 sm:text-sm" min="1">
                                                </div>
                                                <div class="w-24 text-right">
                                                    <p class="font-medium text-gray-900">₹{{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                                </div>
                                                <div class="w-20 text-right">
                                                    <button type="button" class="remove-item-btn font-medium text-purple-600 hover:text-purple-500" data-id="{{ $item->id }}">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div id="empty-cart-message" class="text-center py-16" style="{{ count($cartItems) > 0 ? 'display: none;' : '' }}">
                        <i class="fas fa-shopping-cart text-6xl text-gray-300"></i>
                        <h3 class="mt-4 text-2xl font-bold text-gray-800">Your cart is empty.</h3>
                        <p class="text-gray-500 mt-2">Looks like you haven't added anything to your cart yet.</p>
                        <a href="{{ route('products.show', ['headerFooterId' => $headerFooter->id]) }}" class="mt-6 inline-block bg-purple-600 text-white px-8 py-3 rounded-md hover:bg-purple-700 transition-colors">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="w-full lg:w-1/3 px-4 mt-8 lg:mt-0">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-800 border-b pb-4 mb-4">Order Summary</h3>
                    <div class="flex justify-between mb-4">
                        <span class="text-gray-600">Subtotal</span>
                        <span id="cart-subtotal" class="font-medium text-gray-900">₹{{ number_format($totalPrice, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="text-gray-600">Shipping</span>
                        <span class="font-medium text-gray-900">Free</span>
                    </div>
                    <div class="border-t pt-4 flex justify-between font-bold text-lg">
                        <span class="text-gray-900">Total</span>
                        <span id="cart-total" class="text-purple-600">₹{{ number_format($totalPrice, 2) }}</span>
                    </div>
                    <button id="checkout-btn" class="w-full mt-6 bg-purple-700 hover:bg-purple-600 text-white py-3 px-4 rounded-lg font-bold text-lg transition">
                        Proceed to Checkout
                    </button>
                    <a href="{{ route('products.show', ['headerFooterId' => $headerFooter->id]) }}" class="block text-center mt-4 text-purple-600 hover:text-purple-700 font-medium">
                        or Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkoutBtn = document.getElementById('checkout-btn');

    if(checkoutBtn) {
        checkoutBtn.addEventListener('click', function () {
            fetch('{{ route("order.place", ["headerFooterId" => $headerFooter->id]) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => {
                if (response.status === 401) {
                    openLoginModal();
                    return Promise.reject('User not logged in');
                }
                if (response.status === 400) {
                    return response.json().then(data => {
                        if (data.redirect_to_profile) {
                            openProfileModal();
                        } else {
                            alert('Error placing order: ' + data.message);
                        }
                        return Promise.reject('Profile update required');
                    });
                }
                if (!response.ok) {
                    return response.json().then(errorData => {
                        throw new Error(errorData.message || 'An unknown error occurred.');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert('Order placed successfully!');
                    window.location.href = '{{ route("index.customer", ["headerFooterId" => $headerFooter->id]) }}';
                } else {
                    // This part might now be redundant but kept as a fallback.
                    alert('Error placing order: ' + data.message);
                }
            })
            .catch(error => {
                const errorMessage = error.message || error;
                if (errorMessage !== 'User not logged in' && errorMessage !== 'Profile update required') {
                    console.error('Error:', error);
                    alert('An error occurred while placing the order: ' + errorMessage);
                }
            });
        });
    }

    const removeButtons = document.querySelectorAll('.remove-item-btn');

    removeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const cartItemId = this.dataset.id;

            fetch('{{ route("cart.remove") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ cart_item_id: cartItemId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove the item from the view
                    const itemElement = document.querySelector(`.cart-item[data-id="${cartItemId}"]`);
                    if (itemElement) {
                        itemElement.remove();
                    }

                    // Update header cart count
                    const cartCountElement = document.getElementById('cart-count');
                    if (cartCountElement) {
                        cartCountElement.textContent = data.cart_count;
                    }

                    // Update order summary
                    const subtotalElement = document.getElementById('cart-subtotal');
                    const totalElement = document.getElementById('cart-total');
                    if (subtotalElement && totalElement) {
                        subtotalElement.textContent = '₹' + data.total_price;
                        totalElement.textContent = '₹' + data.total_price;
                    }

                    // Check if cart is now empty
                    const remainingItems = document.querySelectorAll('.cart-item');
                    if (remainingItems.length === 0) {
                        document.getElementById('empty-cart-message').style.display = 'block';
                    }
                } else {
                    alert('Error removing item: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while removing the item.');
            });
        });
    });
});
</script>

@include('includes.customer_profile_modal4')
@include('template4.footer4')
