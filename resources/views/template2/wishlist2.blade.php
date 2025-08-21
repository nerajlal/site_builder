@include('template2.head2', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<div class="bg-black py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-900 border border-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-light text-white mb-6">Your <span class="font-medium">Wishlist</span> ({{ count($wishlistItems) }} items)</h2>

            @if(count($wishlistItems) > 0)
                <div id="wishlist-items-container" class="divide-y divide-gray-800">
                    @foreach($wishlistItems as $item)
                        <div class="wishlist-item flex items-center py-6" data-id="{{ $item->id }}">
                            <a href="{{ route('single-product.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $item->product->id]) }}" class="w-24 h-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-700">
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="h-full w-full object-cover object-center">
                            </a>

                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-white">
                                        <h3>
                                            <a href="{{ route('single-product.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $item->product->id]) }}" class="hover:text-pink-500">{{ $item->product->name }}</a>
                                        </h3>
                                        <p class="ml-4">₹{{ number_format($item->product->price, 2) }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm mt-4">
                                    <div class="flex">
                                        <button type="button" class="remove-item-btn font-medium text-pink-600 hover:text-pink-500" data-id="{{ $item->id }}" data-product-id="{{ $item->product->id }}">Remove</button>
                                    </div>
                                    <div class="flex">
                                        <a href="{{ route('single-product.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $item->product->id]) }}" class="add-to-cart-btn font-medium text-white bg-gray-800 hover:bg-pink-600 px-4 py-2 rounded-md">View Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div id="empty-wishlist-message" class="text-center py-16" style="{{ count($wishlistItems) > 0 ? 'display: none;' : '' }}">
                <i class="fas fa-heart text-6xl text-gray-700"></i>
                <h3 class="mt-4 text-2xl font-light text-white">Your wishlist is empty.</h3>
                <p class="text-gray-400 mt-2">Looks like you haven't added anything to your wishlist yet.</p>
                <a href="{{ route('products.show', ['headerFooterId' => $headerFooter->id]) }}" class="mt-6 inline-block px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 font-medium">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const removeButtons = document.querySelectorAll('.remove-item-btn');

    removeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const wishlistItemId = this.dataset.id;
            const productId = this.dataset.productId;

            fetch(`/wishlist/remove/{{ $headerFooter->id }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove the item from the view
                    const itemElement = document.querySelector(`.wishlist-item[data-id="${wishlistItemId}"]`);
                    if (itemElement) {
                        itemElement.remove();
                    }

                    // Update header wishlist count
                    const wishlistCountElement = document.getElementById('wishlist-count');
                    if (wishlistCountElement) {
                        wishlistCountElement.textContent = data.wishlist_count;
                    }

                    // Check if wishlist is now empty
                    const remainingItems = document.querySelectorAll('.wishlist-item');
                    if (remainingItems.length === 0) {
                        document.getElementById('empty-wishlist-message').style.display = 'block';
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

@include('template2.footer2')
