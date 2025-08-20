<div id="orderDetailsModal" class="hidden fixed inset-0 z-[1000] items-center justify-center">
  <div class="absolute inset-0 bg-black/50" onclick="closeOrderDetailsModal()"></div>
  <div class="relative bg-white w-full max-w-3xl rounded-lg shadow-xl p-6">
    <div class="flex justify-between items-center mb-4 border-b pb-4">
      <h3 class="text-xl font-semibold">Order Details</h3>
      <button onclick="closeOrderDetailsModal()" class="text-gray-500 hover:text-gray-800"><i class="fas fa-times"></i></button>
    </div>

    <div id="modal-content" class="space-y-6 max-h-[80vh] overflow-y-auto pr-4">
      <!-- Order Info -->
      <div id="order-info"></div>

      <!-- Customer Info -->
      <div id="customer-info"></div>

      <!-- Products List -->
      <div id="products-list"></div>
    </div>

    <div class="mt-6 pt-4 border-t flex justify-end space-x-3">
        <a href="#" id="whatsapp-btn" target="_blank" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 text-sm font-medium">WhatsApp</a>
        <a href="#" id="call-btn" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm font-medium">Call</a>
        <a href="#" id="invoice-btn" target="_blank" class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800 text-sm font-medium">Download Invoice</a>
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
    document.getElementById('modal-content').dataset.orderId = order.id;
    // Order Info
    const orderInfo = `
      <h4 class="text-lg font-semibold border-b mb-2 pb-2">Order Information</h4>
      <div class="grid grid-cols-2 gap-4 text-sm">
        <p><strong>Order ID:</strong> #${order.id}</p>
        <p><strong>Date:</strong> ${new Date(order.created_at).toLocaleString()}</p>
        <p><strong>Total Amount:</strong> ₹${order.total_amount}</p>
        <div>
            <p><strong>Status:</strong> ${getStatusText(order.status)}</p>
        </div>
      </div>
       <div class="mt-2">
            <label for="modal-status-dropdown" class="block text-sm font-medium text-gray-700">Update Status</label>
            <select id="modal-status-dropdown" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                ${Object.entries({ 0: 'New', 1: 'Pending', 2: 'Packed', 3: 'Ready to Ship', 4: 'Shipped', 5: 'Out for Delivery', 6: 'Delivered', 7: 'Cancelled' }).map(([key, value]) => `<option value="${key}" ${key == order.status ? 'selected' : ''}>${value}</option>`).join('')}
            </select>
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

    // Buttons
    document.getElementById('invoice-btn').href = `/orders/${order.id}/invoice`;
    document.getElementById('whatsapp-btn').href = `https://wa.me/${customer.whatsapp.replace(/[^0-9]/g, '')}`;
    document.getElementById('call-btn').href = `tel:${customer.phone || customer.whatsapp}`;

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

    document.addEventListener('DOMContentLoaded', () => {
    const modalContent = document.getElementById('modal-content');
    if (modalContent) {
        modalContent.addEventListener('change', async (e) => {
            if (e.target.id === 'modal-status-dropdown') {
                const orderId = modalContent.dataset.orderId;
                const newStatus = e.target.value;

                if (!orderId) {
                    console.error('Order ID not found');
                    return;
                }

                try {
                    const response = await fetch(`/orders/${orderId}/status`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ status: newStatus })
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        throw new Error(errorData.message || 'Failed to update status');
                    }

                    // Refresh dashboard data
                    if (typeof fetchAndDisplayStats === 'function' && typeof currentWebsiteId !== 'undefined' && currentWebsiteId) {
                        fetchAndDisplayStats(currentWebsiteId);
                    }

                    alert('Order status updated successfully!');

                    // Update status text in the modal
                    const orderInfoDiv = document.getElementById('order-info');
                    const statusDiv = orderInfoDiv.querySelector('div:last-child > p');
                    if (statusDiv) {
                        statusDiv.innerHTML = `<strong>Status:</strong> ${getStatusText(newStatus)}`;
                    }

                } catch (error) {
                    console.error('Error updating order status:', error);
                    alert(`Failed to update order status: ${error.message}`);
                }
            }
        });
    }
});
</script>
