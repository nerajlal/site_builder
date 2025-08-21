@include('template2.head2', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<div class="bg-black py-12 text-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-light text-pink-500 mb-8">My Orders</h1>

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
                    <div class="bg-gray-900 rounded-lg shadow-lg p-4 sm:p-6">
                        <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 border-b border-gray-700 pb-4">
                            <div class="mb-4 md:mb-0">
                                <h2 class="text-xl font-semibold text-white">Order #{{ $order->id }}</h2>
                                <p class="text-sm text-gray-400">Placed on: {{ $order->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                            <div class="text-left md:text-right">
                                <span class="block text-lg font-semibold text-white">Total: ₹{{ number_format($order->total_amount, 2) }}</span>
                                @if($totalSavings > 0)
                                    <span class="block text-sm font-semibold text-green-400">You saved: ₹{{ number_format($totalSavings, 2) }}</span>
                                @endif
                                <span class="mt-2 inline-block px-3 py-1 text-xs font-semibold rounded-full
                                    @switch($order->status)
                                        @case(0) bg-yellow-500 text-yellow-100 @break
                                        @case(1) bg-green-500 text-green-100 @break
                                        @case(2) bg-red-500 text-red-100 @break
                                        @default bg-gray-600 text-gray-100
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

                        <div class="divide-y divide-gray-700">
                            @foreach($order->products as $orderProduct)
                                <div class="flex items-center py-4">
                                    <a href="{{ route('template2.single-product2.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $orderProduct->product->id]) }}" class="w-20 h-20 flex-shrink-0 overflow-hidden rounded-md border border-gray-700">
                                        <img src="{{ $orderProduct->product->image_url }}" alt="{{ $orderProduct->product->name }}" class="h-full w-full object-cover object-center">
                                    </a>
                                    <div class="ml-4 flex-1">
                                        <h3 class="text-base font-semibold text-white">
                                            <a href="{{ route('template2.single-product2.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $orderProduct->product->id]) }}">{{ $orderProduct->product->name }}</a>
                                        </h3>
                                        <div class="flex justify-between mt-2 text-sm">
                                            <p class="text-gray-400">Qty: {{ $orderProduct->quantity }}</p>
                                            <p class="font-medium text-white">Price: ₹{{ number_format($orderProduct->price, 2) }}</p>
                                        </div>
                                        <button class="text-sm text-pink-500 hover:underline review-btn" data-product-id="{{ $orderProduct->product->id }}">Add Review</button>
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
                    <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                    <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">Write a Review</h3>
                                    <div class="mt-2">
                                        <form id="review-form">
                                            <input type="hidden" name="product_id" id="product_id">
                                             <input type="hidden" name="header_footer_id" value="{{ $headerFooter->id }}">
                                            <div class="mb-4">
                                                <label for="rating" class="block text-sm font-medium text-gray-300">Rating</label>
                                                <div id="star-rating" class="flex">
                                                    <i class="fas fa-star text-gray-500 cursor-pointer" data-rating="1"></i>
                                                    <i class="fas fa-star text-gray-500 cursor-pointer" data-rating="2"></i>
                                                    <i class="fas fa-star text-gray-500 cursor-pointer" data-rating="3"></i>
                                                    <i class="fas fa-star text-gray-500 cursor-pointer" data-rating="4"></i>
                                                    <i class="fas fa-star text-gray-500 cursor-pointer" data-rating="5"></i>
                                                </div>
                                                <input type="hidden" name="rating" id="rating" value="0">
                                            </div>
                                            <div class="mb-4">
                                                <label for="review" class="block text-sm font-medium text-gray-300">Review</label>
                                                <textarea name="review" id="review" rows="4" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" id="submit-review" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-pink-600 text-base font-medium text-white hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 sm:ml-3 sm:w-auto sm:text-sm">Submit</button>
                            <button type="button" id="close-modal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
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
                                    s.classList.remove('text-gray-500');
                                    s.classList.add('text-yellow-400');
                                } else {
                                    s.classList.remove('text-yellow-400');
                                    s.classList.add('text-gray-500');
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
            <div class="text-center py-16 bg-gray-900 rounded-lg shadow-lg">
                <i class="fas fa-box-open text-6xl text-gray-700"></i>
                <h3 class="mt-4 text-2xl font-light text-pink-500">You have no orders yet.</h3>
                <p class="text-gray-400 mt-2">Looks like you haven't placed any orders with us.</p>
                <a href="{{ route('template2.product2.customer', ['headerFooterId' => $headerFooter->id]) }}" class="mt-6 inline-block px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 font-medium">
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</div>

@include('template2.footer2')
