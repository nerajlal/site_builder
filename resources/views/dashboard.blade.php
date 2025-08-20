@include('includes.d_head')

<!-- Scrollable Content -->
<div class="flex-1 overflow-y-auto">
    <main class="flex-1 overflow-y-auto p-6">
        <!-- Website List Section -->
        <div id="website-list-section">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">My Websites</h1>
            </div>

            @if(count($websites) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($websites as $website)
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-laptop text-blue-600 text-xl"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-1">{{ $website->site_name }}</h3>
                                <p class="text-sm text-gray-500">Created on: {{ $website->created_at->format('d M Y') }}</p>
                            </div>
                            <div class="mt-4 flex justify-around">
                                <button class="website-link px-4 py-2 text-sm bg-pink-600 text-white rounded-lg hover:bg-pink-700" data-website-id="{{ $website->id }}">View Dashboard</button>
                                <a href="/addproducts/{{ $website->id }}" class="px-4 py-2 text-sm bg-gray-600 text-white rounded-lg hover:bg-gray-700">Manage Site</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 bg-white rounded-lg shadow-lg">
                    <i class="fas fa-sitemap text-6xl text-gray-300"></i>
                    <h3 class="mt-4 text-2xl font-bold text-gray-800">No websites found.</h3>
                    <p class="text-gray-500 mt-2">You haven't created any websites yet.</p>
                    <a href="/template" class="mt-6 inline-block px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 font-medium">
                        Create a new website
                    </a>
                </div>
            @endif
        </div>

        <!-- Website Stats Section -->
        <div id="website-stats-section" class="hidden">
            <div class="mb-6 flex justify-between items-center">
                <h1 id="stats-title" class="text-2xl font-bold text-gray-800"></h1>
                <button id="back-to-websites" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Back to Websites</button>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Sales</p>
                            <p id="total-sales" class="text-2xl font-bold text-gray-800"></p>
                            <p id="sales-change" class="text-sm"></p>
                        </div>
                        <div class="p-3 rounded-full bg-pink-100 text-pink-600">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Products Sold</p>
                            <p id="products-sold" class="text-2xl font-bold text-gray-800"></p>
                            <p id="products-sold-change" class="text-sm"></p>
                        </div>
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-tshirt"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Active Customers</p>
                            <p id="active-customers" class="text-2xl font-bold text-gray-800"></p>
                            <p id="customers-change" class="text-sm"></p>
                        </div>
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Inventory Items</p>
                            <p id="inventory-items" class="text-2xl font-bold text-gray-800"></p>
                            <p id="low-stock-items" class="text-sm text-orange-500"></p>
                        </div>
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex flex-col md:flex-row justify-between md:items-center space-y-4 md:space-y-0">
                    <h2 class="text-lg font-semibold text-gray-800">Recent Orders</h2>
                    <div class="flex flex-wrap items-center gap-4">
                        <select id="date-filter" class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                            <option value="all">All Time</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="year">This Year</option>
                        </select>
                        <select id="status-filter" class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                            <option value="all">All Statuses</option>
                            <option value="0">New</option>
                            <option value="1">Pending</option>
                            <option value="2">Packed</option>
                            <option value="3">Ready to Ship</option>
                            <option value="4">Shipped</option>
                            <option value="5">Out for Delivery</option>
                            <option value="6">Delivered</option>
                            <option value="7">Cancelled</option>
                        </select>
                        <a href="#" id="export-csv-btn" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-sm font-medium">Export as CSV</a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="orders-table-body" class="bg-white divide-y divide-gray-200">
                            <!-- Table rows will be added here by JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div id="pagination-footer" class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <!-- Pagination info and links will be added here by JavaScript -->
                </div>
            </div>
        </div>
    </main>
</div>

@include('includes.order_details_modal')

<script>
document.addEventListener('DOMContentLoaded', () => {
    const websiteListSection = document.getElementById('website-list-section');
    const websiteStatsSection = document.getElementById('website-stats-section');
    const backToWebsitesBtn = document.getElementById('back-to-websites');
    const dateFilterSelect = document.getElementById('date-filter');
    const statusFilterSelect = document.getElementById('status-filter');
    const exportCsvBtn = document.getElementById('export-csv-btn');
    let currentWebsiteId = null;

    async function fetchAndDisplayStats(websiteId, page = 1) {
        const dateFilter = dateFilterSelect.value;
        const statusFilter = statusFilterSelect.value;

        try {
            const response = await fetch(`/dashboard/stats/${websiteId}?date_filter=${dateFilter}&status_filter=${statusFilter}&page=${page}`);
            if (!response.ok) throw new Error('Failed to load stats');
            const stats = await response.json();

            document.getElementById('total-sales').textContent = `₹${stats.total_sales}`;
            document.getElementById('products-sold').textContent = stats.products_sold;
            document.getElementById('active-customers').textContent = stats.active_customers;
            document.getElementById('inventory-items').textContent = stats.inventory_items;
            document.getElementById('low-stock-items').textContent = `${stats.low_stock_items} items low stock`;

            const salesChangeEl = document.getElementById('sales-change');
            salesChangeEl.textContent = `${stats.sales_change >= 0 ? '+' : ''}${stats.sales_change}% from last month`;
            salesChangeEl.className = `text-sm ${stats.sales_change >= 0 ? 'text-green-500' : 'text-red-500'}`;

            const productsSoldChangeEl = document.getElementById('products-sold-change');
            productsSoldChangeEl.textContent = `${stats.products_sold_change >= 0 ? '+' : ''}${stats.products_sold_change}% from last month`;
            productsSoldChangeEl.className = `text-sm ${stats.products_sold_change >= 0 ? 'text-green-500' : 'text-red-500'}`;

            const customersChangeEl = document.getElementById('customers-change');
            customersChangeEl.textContent = `${stats.customers_change >= 0 ? '+' : ''}${stats.customers_change}% from last month`;
            customersChangeEl.className = `text-sm ${stats.customers_change >= 0 ? 'text-green-500' : 'text-red-500'}`;

            const ordersTableBody = document.getElementById('orders-table-body');
            ordersTableBody.innerHTML = '';
            if (stats.orders.data.length > 0) {
                stats.orders.data.forEach(order => {
                    const statuses = { 0: 'New', 1: 'Pending', 2: 'Packed', 3: 'Ready to Ship', 4: 'Shipped', 5: 'Out for Delivery', 6: 'Delivered', 7: 'Cancelled' };
                    let options = '';
                    for (const key in statuses) {
                        options += `<option value="${key}" ${key == order.status ? 'selected' : ''}>${statuses[key]}</option>`;
                    }

                    const row = `
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#${order.id}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${order.customer ? order.customer.name : 'N/A'}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <select class="status-dropdown border-gray-300 rounded-md" data-order-id="${order.id}">${options}</select>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${new Date(order.created_at).toLocaleDateString()}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₹${order.total_amount}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="view-order-details-btn text-indigo-600 hover:text-indigo-900" data-order-id="${order.id}">View Detail</button>
                            </td>
                        </tr>
                    `;
                    ordersTableBody.innerHTML += row;
                });
                addEventListenersToButtons();
                renderPagination(stats.orders);
            } else {
                ordersTableBody.innerHTML = '<tr><td colspan="6" class="text-center py-4">No orders found for the selected filters.</td></tr>';
                document.getElementById('pagination-footer').innerHTML = '';
            }
        } catch (error) {
            console.error('Error fetching website stats:', error);
            alert('Could not load website stats. Please try again.');
            websiteStatsSection.classList.add('hidden');
            websiteListSection.classList.remove('hidden');
        }
    }

    function addEventListenersToButtons() {
        document.querySelectorAll('.status-dropdown').forEach(dropdown => {
            dropdown.addEventListener('change', async (e) => {
                const orderId = e.target.dataset.orderId;
                const newStatus = e.target.value;
                try {
                    const response = await fetch(`/orders/${orderId}/status`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: JSON.stringify({ status: newStatus })
                    });
                    if (!response.ok) throw new Error('Failed to update status');
                    alert('Order status updated successfully!');
                } catch (error) {
                    console.error('Error updating order status:', error);
                    alert('Failed to update order status.');
                }
            });
        });

        document.querySelectorAll('.view-order-details-btn').forEach(button => {
            button.addEventListener('click', async (e) => {
                const orderId = e.target.dataset.orderId;
                try {
                    const response = await fetch(`/orders/${orderId}/details`);
                    if (!response.ok) throw new Error('Failed to load order details');
                    const orderDetails = await response.json();
                    populateOrderDetailsModal(orderDetails);
                    openOrderDetailsModal();
                } catch (error) {
                    console.error('Error fetching order details:', error);
                    alert('Failed to load order details.');
                }
            });
        });
    }

    function renderPagination(paginator) {
        const paginationFooter = document.getElementById('pagination-footer');
        let paginationHtml = `
            <div class="text-sm text-gray-500">
                Showing <span class="font-medium">${paginator.from}</span> to <span class="font-medium">${paginator.to}</span> of <span class="font-medium">${paginator.total}</span> results
            </div>
            <div class="flex space-x-2">
        `;
        paginator.links.forEach(link => {
            if (link.url) {
                paginationHtml += `<button data-page="${link.url.split('page=')[1]}" class="pagination-link px-3 py-1 rounded-md ${link.active ? 'bg-pink-600 text-white' : 'bg-gray-100 text-gray-700'}">${link.label}</button>`;
            } else {
                paginationHtml += `<span class="px-3 py-1 rounded-md bg-gray-100 text-gray-400 cursor-not-allowed">${link.label}</span>`;
            }
        });
        paginationHtml += '</div>';
        paginationFooter.innerHTML = paginationHtml;

        document.querySelectorAll('.pagination-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const page = e.target.dataset.page;
                fetchAndDisplayStats(currentWebsiteId, page);
            });
        });
    }

    function updateExportLink() {
        if (currentWebsiteId) {
            const dateFilter = dateFilterSelect.value;
            const statusFilter = statusFilterSelect.value;
            exportCsvBtn.href = `/dashboard/export/${currentWebsiteId}?date_filter=${dateFilter}&status_filter=${statusFilter}`;
        }
    }

    document.querySelectorAll('.website-link').forEach(link => {
        link.addEventListener('click', async (e) => {
            e.preventDefault();
            currentWebsiteId = link.dataset.websiteId;
            const websiteName = link.closest('.bg-white').querySelector('h3').textContent;

            websiteListSection.classList.add('hidden');
            websiteStatsSection.classList.remove('hidden');
            document.getElementById('stats-title').textContent = `${websiteName} - Dashboard`;

            updateExportLink();
            fetchAndDisplayStats(currentWebsiteId);
        });
    });

    dateFilterSelect.addEventListener('change', () => {
        if (currentWebsiteId) {
            updateExportLink();
            fetchAndDisplayStats(currentWebsiteId);
        }
    });

    statusFilterSelect.addEventListener('change', () => {
        if (currentWebsiteId) {
            updateExportLink();
            fetchAndDisplayStats(currentWebsiteId);
        }
    });

    backToWebsitesBtn.addEventListener('click', () => {
        websiteStatsSection.classList.add('hidden');
        websiteListSection.classList.remove('hidden');
        currentWebsiteId = null;
    });
});
</script>

@include('includes.d_footer')