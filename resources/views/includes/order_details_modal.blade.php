<div id="orderDetailsModal" class="hidden fixed inset-0 z-[1000] items-center justify-center">
  <div class="absolute inset-0 bg-black/50" onclick="closeOrderDetailsModal()"></div>
  <div class="relative bg-white w-full max-w-3xl rounded-lg shadow-xl p-6">
    <div class="flex justify-between items-center mb-4 border-b pb-4">
      <h3 class="text-xl font-semibold">Order Details</h3>
      <button onclick="closeOrderDetailsModal()" class="text-gray-500 hover:text-gray-800"><i class="fas fa-times"></i></button>
    </div>

    <div id="modal-content" class="space-y-6 max-h-[80vh] overflow-y-auto">
      <!-- Order Info -->
      <div id="order-info"></div>

      <!-- Customer Info -->
      <div id="customer-info"></div>

      <!-- Products List -->
      <div id="products-list"></div>
    </div>
  </div>
</div>

<script>
  function openOrderDetailsModal() {
    document.getElementById('orderDetailsModal').classList.remove('hidden');
    document.getElementById('orderDetailsModal').classList.add('flex');
  }

  function closeOrderDetailsModal() {
    document.getElementById('orderDetailsModal').classList.add('hidden');
  }

  function populateOrderDetailsModal(order) {
    // Order Info
    const orderInfo = `
      <h4 class="text-lg font-semibold border-b mb-2 pb-2">Order Information</h4>
      <div class="grid grid-cols-2 gap-4 text-sm">
        <p><strong>Order ID:</strong> #${order.id}</p>
        <p><strong>Date:</strong> ${new Date(order.created_at).toLocaleString()}</p>
        <p><strong>Total Amount:</strong> ₹${order.total_amount}</p>
        <p><strong>Status:</strong> ${getStatusText(order.status)}</p>
      </div>
    `;
    document.getElementById('order-info').innerHTML = orderInfo;

    // Customer Info
    const customer = order.customer;
    const customerInfo = `
      <h4 class="text-lg font-semibold border-b mb-2 pb-2">Customer Details</h4>
      <div class="grid grid-cols-2 gap-4 text-sm">
        <p><strong>Name:</strong> ${customer.name}</p>
        <p><strong>Phone:</strong> ${customer.phone || 'N/A'}</p>
        <p><strong>WhatsApp:</strong> ${customer.whatsapp}</p>
        <p><strong>Address:</strong> ${formatAddress(customer)}</p>
      </div>
    `;
    document.getElementById('customer-info').innerHTML = customerInfo;

    // Products List
    let productsHtml = '<h4 class="text-lg font-semibold border-b mb-2 pb-2">Products</h4>';
    productsHtml += '<div class="divide-y">';
    order.products.forEach(item => {
      productsHtml += `
        <div class="flex items-center py-2">
          <img src="${item.product.image_url}" class="w-16 h-16 rounded-md mr-4">
          <div class="flex-1">
            <p class="font-semibold">${item.product.name}</p>
            <p class="text-sm text-gray-600">Qty: ${item.quantity}</p>
          </div>
          <p class="text-sm">₹${item.price}</p>
        </div>
      `;
    });
    productsHtml += '</div>';
    document.getElementById('products-list').innerHTML = productsHtml;
  }

  function getStatusText(status) {
    const statuses = { 0: 'New', 1: 'Pending', 2: 'Packed', 3: 'Ready to Ship', 4: 'Shipped', 5: 'Out for Delivery', 6: 'Delivered', 7: 'Cancelled' };
    return statuses[status] || 'Unknown';
  }

  function formatAddress(customer) {
    const parts = [
      customer.address_line_1,
      customer.address_line_2,
      customer.city,
      customer.state,
      customer.postal_code,
      customer.country
    ];
    return parts.filter(part => part).join(', ') || 'N/A';
  }
</script>
