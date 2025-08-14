@include('includes.d_head')


            <!-- Scrollable Content -->
            <div class="flex-1 overflow-y-auto">
                <main class="flex-1 overflow-y-auto p-6">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Boutique Dashboard</h1>
                        
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Total Sales</p>
                                    <p class="text-2xl font-bold text-gray-800">$12,450</p>
                                    <p class="text-sm text-green-500">+15.2% from last month</p>
                                </div>
                                <div class="p-3 rounded-full bg-pink-100 text-pink-600">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Products Sold</p>
                                    <p class="text-2xl font-bold text-gray-800">342</p>
                                    <p class="text-sm text-green-500">+12.8% from last month</p>
                                </div>
                                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Active Customers</p>
                                    <p class="text-2xl font-bold text-gray-800">156</p>
                                    <p class="text-sm text-green-500">+8.5% from last month</p>
                                </div>
                                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Inventory Items</p>
                                    <p class="text-2xl font-bold text-gray-800">89</p>
                                    <p class="text-sm text-orange-500">12 items low stock</p>
                                </div>
                                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                    <i class="fas fa-boxes"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts and Tables -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                        <!-- Sales Chart -->
                        <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-semibold text-gray-800">Boutique Sales Overview</h2>
                                <div class="flex space-x-2">
                                    <button id="monthly-btn" class="px-3 py-1 text-xs bg-pink-100 text-pink-800 rounded-full">Monthly</button>
                                    <button id="weekly-btn" class="px-3 py-1 text-xs bg-gray-100 text-gray-800 rounded-full">Weekly</button>
                                </div>
                            </div>
                            <div class="h-64">
                                <!-- Chart placeholder -->
                                <div id="chart-placeholder" class="flex items-center justify-center h-full bg-gray-100 rounded-lg">
                                    <p class="text-gray-500">Monthly boutique sales data will appear here</p>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h2>
                            <div id="activity-feed" class="space-y-4">
                                <!-- Activity items will be added here by JavaScript -->
                            </div>
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
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="orders-table-body" class="bg-white divide-y divide-gray-200">
                                    <!-- Table rows will be added here by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                Showing <span id="start-count" class="font-medium">1</span> to <span id="end-count" class="font-medium">3</span> of <span id="total-count" class="font-medium">24</span> results
                            </div>
                            <div class="flex space-x-2">
                                <button id="prev-page" class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 disabled:opacity-50" disabled>Previous</button>
                                <button class="px-3 py-1 rounded-md bg-indigo-600 text-white">1</button>
                                <button class="px-3 py-1 rounded-md bg-gray-100 text-gray-700">2</button>
                                <button id="next-page" class="px-3 py-1 rounded-md bg-gray-100 text-gray-700">Next</button>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

            


            @include('includes.d_footer')