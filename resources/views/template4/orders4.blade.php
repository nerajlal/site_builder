@include('template4.head4', ['is_default' => $is_default, 'headerFooter' => $headerFooter])

<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">My Orders</h1>

        @if(count($orders) > 0)
            <div class="space-y-8">
                @foreach($orders as $order)
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h2 class="text-xl font-bold text-gray-800">Order #{{ $order->id }}</h2>
                                <p class="text-sm text-gray-500">Placed on: {{ $order->created_at->format('d M Y') }}</p>
                            </div>
                            <div>
                                <span class="text-lg font-medium text-gray-900">Total: ₹{{ number_format($order->total_amount, 2) }}</span>
                                <span class="ml-4 px-2 py-1 text-sm rounded-full
                                    @switch($order->status)
                                        @case(0) bg-yellow-200 text-yellow-800 @break
                                        @case(1) bg-green-200 text-green-800 @break
                                        @case(2) bg-red-200 text-red-800 @break
                                        @default bg-gray-200 text-gray-800
                                    @endswitch
                                ">
                                    @switch($order->status)
                                        @case(0) Pending @break
                                        @case(1) Shipped @break
                                        @case(2) Cancelled @break
                                        @default Unknown
                                    @endswitch
                                </span>
                            </div>
                        </div>

                        <div class="divide-y divide-gray-200">
                            @foreach($order->products as $orderProduct)
                                <div class="flex items-center py-4">
                                    <a href="{{ route('template4.single-product4.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $orderProduct->product->id]) }}" class="w-16 h-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                        <img src="{{ $orderProduct->product->image_url }}" alt="{{ $orderProduct->product->name }}" class="h-full w-full object-cover object-center">
                                    </a>
                                    <div class="ml-4 flex flex-1 flex-col">
                                        <div>
                                            <h3 class="text-base font-medium text-gray-900">
                                                <a href="{{ route('template4.single-product4.customer', ['headerFooterId' => $headerFooter->id, 'productId' => $orderProduct->product->id]) }}">{{ $orderProduct->product->name }}</a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">Qty: {{ $orderProduct->quantity }}</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900">₹{{ number_format($orderProduct->price, 2) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
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
