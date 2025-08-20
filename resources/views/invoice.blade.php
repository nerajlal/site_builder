<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body { -webkit-print-color-adjust: exact; }
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg my-8">
        <div class="flex justify-between items-center border-b pb-4">
            <div>
                <h1 class="text-3xl font-bold">{{ $order->customer->site->site_name ?? 'Your Store' }}</h1>
                <p class="text-sm">{{ $order->customer->site->contact_line1 ?? '123 Business Rd.' }}</p>
                <p class="text-sm">{{ $order->customer->site->contact_line2 ?? 'Business City, 12345' }}</p>
            </div>
            <div class="text-right">
                <h2 class="text-2xl font-semibold text-gray-700">Invoice</h2>
                <p class="text-sm">#{{ $order->id }}</p>
                <p class="text-sm">Date: {{ $order->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="flex justify-between mt-8">
            <div>
                <h3 class="font-semibold">Bill To:</h3>
                <p>{{ $order->customer->name }}</p>
                <p>{{ $order->customer->address_line_1 }}</p>
                @if($order->customer->address_line_2)
                <p>{{ $order->customer->address_line_2 }}</p>
                @endif
                <p>{{ $order->customer->city }}, {{ $order->customer->state }} {{ $order->customer->postal_code }}</p>
                <p>{{ $order->customer->country }}</p>
                <p>P: {{ $order->customer->phone }}</p>
            </div>
        </div>

        <table class="w-full mt-8 border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="text-left p-2">Item</th>
                    <th class="text-center p-2">Quantity</th>
                    <th class="text-right p-2">Unit Price</th>
                    <th class="text-right p-2">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $item)
                <tr class="border-b">
                    <td class="p-2">{{ $item->product->name }}</td>
                    <td class="text-center p-2">{{ $item->quantity }}</td>
                    <td class="text-right p-2">₹{{ number_format($item->price, 2) }}</td>
                    <td class="text-right p-2">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-end mt-8">
            <div class="w-1/2">
                <div class="flex justify-between">
                    <span class="font-semibold">Subtotal:</span>
                    <span>₹{{ number_format($order->total_amount, 2) }}</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span class="font-semibold">Shipping:</span>
                    <span>₹0.00</span>
                </div>
                <div class="flex justify-between mt-4 border-t pt-2">
                    <span class="font-bold text-lg">Total:</span>
                    <span class="font-bold text-lg">₹{{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>
        </div>

        <div class="text-center mt-12 text-sm text-gray-600">
            <p>Thank you for your business!</p>
        </div>
    </div>
    <div class="text-center mb-8 no-print">
        <button onclick="window.print()" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Print Invoice</button>
    </div>
</body>
</html>
