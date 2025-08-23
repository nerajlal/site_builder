@include('template4.head4', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">My Orders</h1>

        @if(count($orders) > 0)
            <div class="space-y-8">
                @foreach($orders as $order)
                    @php
                        $totalSavings = 0;
                        foreach($order->products as $orderProduct) {
                            if ($orderProduct->product && $orderProduct->product->original_price > $orderProduct->product->price) {
                                $totalSavings += ($orderProduct->product->original_price - $orderProduct->product->price) * $orderProduct->quantity;
                            }
                        }
                    @endphp
                    <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                        <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 border-b pb-4">
                            <div class="mb-4 md:mb-0">
                                <h2 class="text-xl font-bold text-gray-800">Order #{{ $order->id }}</h2>
                                <p class="text-sm text-gray-500">Placed on: {{ $order->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                            <div class="text-left md:text-right">
                                <span class="block text-lg font-semibold text-gray-900">Total: ₹{{ number_format($order->total_amount, 2) }}</span>
                                @if($totalSavings > 0)
                                    <span class="block text-sm font-semibold text-green-600">You saved: ₹{{ number_format($totalSavings, 2) }}</span>
                                @endif
                                <span class="mt-2 inline-block px-3 py-1 text-xs font-semibold rounded-full
                                    @switch($order->status)
                                        @case(0) bg-yellow-200 text-yellow-800 @break
                                        @case(1) bg-green-200 text-green-800 @break
                                        @case(2) bg-red-200 text-red-800 @break
                                        @default bg-gray-200 text-gray-800
                                    @endswitch
                                ">
                                    @switch($order->status)
                                        @case(0) New @break
                                        @case(1) Pending @break
                                        @case(2) Packed @break
                                        @case(3) Ready to Ship @break
                                        @case(4) Shipped @break
                                        @case(5) Out for Delivery @break
                                        @case(6) Delivered @break
                                        @case(7) Cancelled @break
                                        @default Unknown
                                    @endswitch
                                </span>
                            </div>
                        </div>

                        <div class="divide-y divide-gray-200">
                            @foreach($order->grouped_products as $items)
                                @php
                                    $product = $items->first()->product;
                                @endphp
                                <div class="py-4">
                                    <div class="flex items-center">
                                        <a href="{{ route('single-product.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}" class="w-20 h-20 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
                                        </a>
                                        <div class="ml-4 flex-1">
                                            <h3 class="text-base font-semibold text-gray-900">
                                                <a href="{{ route('single-product.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $product->id]) }}">{{ $product->name }}</a>
                                            </h3>
                                            <button class="text-sm text-blue-500 hover:underline review-btn" data-product-id="{{ $product->id }}">Add Review</button>
                                        </div>
                                    </div>
                                    <div class="ml-24 mt-2 pl-2 border-l border-gray-200">
                                        @foreach($items as $item)
                                            <div class="text-sm text-gray-600 py-1 flex justify-between">
                                                <div>
                                                    @if(isset($item->options['color']))
                                                        <span>Color: <span class="font-medium text-gray-800">{{ $item->options['color'] }}</span></span>
                                                    @endif
                                                    @if(isset($item->options['size']))
                                                        <span class="ml-2">Size: <span class="font-medium text-gray-800">{{ $item->options['size'] }}</span></span>
                                                    @endif
                                                    <span class="ml-2">Qty: {{ $item->quantity }}</span>
                                                </div>
                                                <span class="font-medium text-gray-900">Price: ₹{{ number_format($item->price * $item->quantity, 2) }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Review Modal -->
            <div id="review-modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Write a Review</h3>
                                    <div class="mt-2">
                                        <form id="review-form">
                                            <input type="hidden" name="product_id" id="product_id">
                                             <input type="hidden" name="header_footer_id" value="{{ $headerFooter->id }}">
                                            <div class="mb-4">
                                                <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                                                <div id="star-rating" class="flex">
                                                    <i class="fas fa-star text-gray-300 cursor-pointer" data-rating="1"></i>
                                                    <i class="fas fa-star text-gray-300 cursor-pointer" data-rating="2"></i>
                                                    <i class="fas fa-star text-gray-300 cursor-pointer" data-rating="3"></i>
                                                    <i class="fas fa-star text-gray-300 cursor-pointer" data-rating="4"></i>
                                                    <i class="fas fa-star text-gray-300 cursor-pointer" data-rating="5"></i>
                                                </div>
                                                <input type="hidden" name="rating" id="rating" value="0">
                                            </div>
                                            <div class="mb-4">
                                                <label for="review" class="block text-sm font-medium text-gray-700">Review</label>
                                                <textarea name="review" id="review" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" id="submit-review" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">Submit</button>
                            <button type="button" id="close-modal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const reviewModal = document.getElementById('review-modal');
                    const closeModal = document.getElementById('close-modal');
                    const reviewBtns = document.querySelectorAll('.review-btn');
                    const productIdInput = document.getElementById('product_id');
                    const ratingInput = document.getElementById('rating');
                    const stars = document.querySelectorAll('#star-rating i');
                    const submitReviewBtn = document.getElementById('submit-review');
                    const reviewForm = document.getElementById('review-form');

                    reviewBtns.forEach(btn => {
                        btn.addEventListener('click', function () {
                            // Reset form for a new review
                            reviewForm.reset();
                            ratingInput.value = '0';
                            stars.forEach(s => {
                                s.classList.remove('text-yellow-400');
                                s.classList.add('text-gray-300');
                            });

                            const productId = this.dataset.productId;
                            productIdInput.value = productId;
                            reviewModal.classList.remove('hidden');
                        });
                    });

                    closeModal.addEventListener('click', function () {
                        reviewModal.classList.add('hidden');
                    });

                    stars.forEach(star => {
                        star.addEventListener('click', function () {
                            const rating = this.dataset.rating;
                            ratingInput.value = rating;
                            stars.forEach(s => {
                                if (s.dataset.rating <= rating) {
                                    s.classList.remove('text-gray-300');
                                    s.classList.add('text-yellow-400');
                                } else {
                                    s.classList.remove('text-yellow-400');
                                    s.classList.add('text-gray-300');
                                }
                            });
                        });
                    });

                    submitReviewBtn.addEventListener('click', function () {
                        const formData = new FormData(reviewForm);
                        fetch('{{ route('review.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                reviewModal.classList.add('hidden');
                                alert(data.message);
                            } else {
                                let errorMessage = '';
                                for (const error in data.errors) {
                                    errorMessage += data.errors[error].join('\\n') + '\\n';
                                }
                                alert(errorMessage || data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                    });
                });
            </script>
        @else
            <div class="text-center py-16 bg-white rounded-lg shadow-lg">
                <i class="fas fa-box-open text-6xl text-gray-300"></i>
                <h3 class="mt-4 text-2xl font-bold text-gray-800">You have no orders yet.</h3>
                <p class="text-gray-500 mt-2">Looks like you haven't placed any orders with us.</p>
                <a href="{{ route('template4.product4.customer', ['headerFooterId' => $headerFooter->id]) }}" class="mt-6 inline-block px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 font-medium">
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</div>

@include('template4.footer4')
