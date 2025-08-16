<!-- Footer - Now properly contained within main content area -->
            <footer class="flex items-center justify-between px-6 py-3 bg-white border-t border-gray-200">
                <div class="flex items-center">
                    <div class="text-sm text-gray-500">
                        © 2023 BuildYourBoutique. All rights reserved.
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                        <i class="fas fa-info-circle"></i>
                    </button>
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                        <i class="fas fa-history"></i>
                    </button>
                    <div class="relative">
                        <button id="theme-toggle" class="text-gray-500 hover:text-indigo-600 focus:outline-none">
                            <i class="fas fa-moon"></i>
                        </button>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden');
    });

    // Profile dropdown toggle
    document.getElementById('profile-btn').addEventListener('click', function() {
        const dropdown = document.getElementById('dropdown-menu');
        dropdown.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown-menu');
        const profileBtn = document.getElementById('profile-btn');
        
        if (!profileBtn.contains(event.target) && (!dropdown || !dropdown.contains(event.target))) {
            if (dropdown) dropdown.classList.add('hidden');
        }
    });

    // Notification button alert
    document.getElementById('notification-btn').addEventListener('click', function() {
        alert('You have 3 new notifications!');
    });

    // Theme toggle
    document.getElementById('theme-toggle').addEventListener('click', function() {
        const icon = this.querySelector('i');
        if (icon.classList.contains('fa-moon')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    });

    // Check for saved theme preference
    if (localStorage.getItem('theme') === 'dark' || 
        (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        const icon = document.querySelector('#theme-toggle i');
        if (icon) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        }
    }

    // Initialize Chart
    function initChart() {
        const ctx = document.createElement('canvas');
        ctx.id = 'salesChart';
        const placeholder = document.getElementById('chart-placeholder');
        placeholder.innerHTML = '';
        placeholder.appendChild(ctx);
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Sales',
                    data: [12000, 19000, 15000, 18000, 21000, 24780, 23000],
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    // Initialize weekly chart
    function initWeeklyChart() {
        const ctx = document.createElement('canvas');
        ctx.id = 'weeklyChart';
        const placeholder = document.getElementById('chart-placeholder');
        placeholder.innerHTML = '';
        placeholder.appendChild(ctx);
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Sales',
                    data: [4500, 5200, 4800, 6100, 7500, 8200, 6900],
                    backgroundColor: 'rgba(79, 70, 229, 0.7)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    // Chart view toggle
    document.getElementById('monthly-btn').addEventListener('click', function() {
        document.getElementById('monthly-btn').classList.add('bg-indigo-100', 'text-indigo-800');
        document.getElementById('monthly-btn').classList.remove('bg-gray-100', 'text-gray-800');
        document.getElementById('weekly-btn').classList.add('bg-gray-100', 'text-gray-800');
        document.getElementById('weekly-btn').classList.remove('bg-indigo-100', 'text-indigo-800');
        initChart();
    });

    document.getElementById('weekly-btn').addEventListener('click', function() {
        document.getElementById('weekly-btn').classList.add('bg-indigo-100', 'text-indigo-800');
        document.getElementById('weekly-btn').classList.remove('bg-gray-100', 'text-gray-800');
        document.getElementById('monthly-btn').classList.add('bg-gray-100', 'text-gray-800');
        document.getElementById('monthly-btn').classList.remove('bg-indigo-100', 'text-indigo-800');
        initWeeklyChart();
    });

    // Sample data for activity feed
    const activities = [
        { icon: 'shopping-cart', color: 'blue', text: 'New order #1234', time: '2 minutes ago' },
        { icon: 'user-plus', color: 'green', text: 'New user registered', time: '1 hour ago' },
        { icon: 'comment', color: 'purple', text: 'New customer review', time: '3 hours ago' },
        { icon: 'exclamation', color: 'yellow', text: 'System update required', time: '5 hours ago' }
    ];

    // Populate activity feed
    const activityFeed = document.getElementById('activity-feed');
    activities.forEach(activity => {
        const activityItem = document.createElement('div');
        activityItem.className = 'flex items-start';
        activityItem.innerHTML = `
            <div class="p-2 rounded-full bg-${activity.color}-100 text-${activity.color}-600 mr-3">
                <i class="fas fa-${activity.icon}"></i>
            </div>
            <div>
                <p class="text-sm font-medium">${activity.text}</p>
                <p class="text-xs text-gray-500">${activity.time}</p>
            </div>
        `;
        activityFeed.appendChild(activityItem);
    });

    // Sample data for orders table
    const orders = [
        { id: '#12345', customer: 'John Smith', status: 'Completed', date: '2023-06-15', amount: '$245.00' },
        { id: '#12344', customer: 'Sarah Johnson', status: 'Processing', date: '2023-06-14', amount: '$178.50' },
        { id: '#12343', customer: 'Michael Brown', status: 'Cancelled', date: '2023-06-13', amount: '$89.99' },
        { id: '#12342', customer: 'Emily Davis', status: 'Completed', date: '2023-06-12', amount: '$320.00' },
        { id: '#12341', customer: 'Robert Wilson', status: 'Shipped', date: '2023-06-11', amount: '$145.50' }
    ];

    // Populate orders table
    const ordersTableBody = document.getElementById('orders-table-body');
    orders.forEach(order => {
        let statusClass, statusText;
        switch(order.status) {
            case 'Completed':
                statusClass = 'bg-green-100 text-green-800';
                break;
            case 'Processing':
                statusClass = 'bg-yellow-100 text-yellow-800';
                break;
            case 'Cancelled':
                statusClass = 'bg-red-100 text-red-800';
                break;
            case 'Shipped':
                statusClass = 'bg-blue-100 text-blue-800';
                break;
            default:
                statusClass = 'bg-gray-100 text-gray-800';
        }

        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${order.id}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${order.customer}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">${order.status}</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${order.date}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${order.amount}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
            </td>
        `;
        ordersTableBody.appendChild(row);
    });

    // Initialize DataTable
    $(document).ready(function() {
        $('#orders-table').DataTable({
            paging: false,
            searching: false,
            info: false
        });
    });

    // Initialize chart on page load
    window.addEventListener('DOMContentLoaded', (event) => {
        initChart();
    });
</script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</body>
</html>