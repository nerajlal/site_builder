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
                        <a href="#" class="website-link bg-white rounded-lg shadow p-6 hover:shadow-md transition-shadow duration-300 block" data-website-id="{{ $website->id }}">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-laptop text-blue-600 text-xl"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-1">{{ $website->site_name }}</h3>
                                <p class="text-sm text-gray-500">Created on: {{ $website->created_at->format('d M Y') }}</p>
                            </div>
                        </a>
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
                    <p class="text-sm font-medium text-gray-500">Total Sales</p>
                    <p id="total-sales" class="text-2xl font-bold text-gray-800"></p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm font-medium text-gray-500">Products Sold</p>
                    <p id="products-sold" class="text-2xl font-bold text-gray-800"></p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm font-medium text-gray-500">Active Customers</p>
                    <p id="active-customers" class="text-2xl font-bold text-gray-800"></p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm font-medium text-gray-500">Inventory Items</p>
                    <p id="inventory-items" class="text-2xl font-bold text-gray-800"></p>
                    <p id="low-stock-items" class="text-sm text-orange-500"></p>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Recent Orders</h2>
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
                            </tr>
                        </thead>
                        <tbody id="orders-table-body" class="bg-white divide-y divide-gray-200">
                            <!-- Table rows will be added here by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const websiteListSection = document.getElementById('website-list-section');
    const websiteStatsSection = document.getElementById('website-stats-section');
    const backToWebsitesBtn = document.getElementById('back-to-websites');

    document.querySelectorAll('.website-link').forEach(link => {
        link.addEventListener('click', async (e) => {
            e.preventDefault();
            const websiteId = link.dataset.websiteId;
            const websiteName = link.querySelector('.text-lg').textContent;
            
            websiteListSection.classList.add('hidden');
            websiteStatsSection.classList.remove('hidden');
            document.getElementById('stats-title').textContent = `${websiteName} - Dashboard`;

            try {
                const response = await fetch(`/dashboard/stats/${websiteId}`);
                if (!response.ok) throw new Error('Failed to load stats');
                const stats = await response.json();

                document.getElementById('total-sales').textContent = `₹${stats.total_sales}`;
                document.getElementById('products-sold').textContent = stats.products_sold;
                document.getElementById('active-customers').textContent = stats.active_customers;
                document.getElementById('inventory-items').textContent = stats.inventory_items;
                document.getElementById('low-stock-items').textContent = `${stats.low_stock_items} items low stock`;

                const ordersTableBody = document.getElementById('orders-table-body');
                ordersTableBody.innerHTML = '';
                if (stats.recent_orders.length > 0) {
                    stats.recent_orders.forEach(order => {
                        const row = `
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#${order.id}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${order.customer ? order.customer.name : 'N/A'}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${order.status == 0 ? 'Pending' : (order.status == 1 ? 'Shipped' : 'Cancelled')}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${new Date(order.created_at).toLocaleDateString()}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₹${order.total_amount}</td>
                            </tr>
                        `;
                        ordersTableBody.innerHTML += row;
                    });
                } else {
                    ordersTableBody.innerHTML = '<tr><td colspan="5" class="text-center py-4">No recent orders found.</td></tr>';
                }

            } catch (error) {
                console.error('Error fetching website stats:', error);
                alert('Could not load website stats. Please try again.');
                websiteListSection.classList.remove('hidden');
                websiteStatsSection.classList.add('hidden');
            }
        });
    });

    backToWebsitesBtn.addEventListener('click', () => {
        websiteStatsSection.classList.add('hidden');
        websiteListSection.classList.remove('hidden');
    });
});
</script>

@include('includes.d_footer')