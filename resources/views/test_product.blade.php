<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique - New Arrivals</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .star-filled { color: #f59e0b; }
        .star-empty { color: #d1d5db; }
    </style>
</head>
<body class="bg-gray-50">
    

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Title -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">New Arrivals</h2>
            <p class="text-gray-600 mt-2">128 products</p>
        </div>

        <!-- Filters Bar -->
        <div class="flex items-center justify-between mb-8 bg-white p-4 rounded-lg shadow-sm">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button id="filtersBtn" class="flex items-center space-x-2 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <span>Filters</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div class="relative">
                    <button id="sortBtn" class="flex items-center space-x-2 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <span>Sort</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                    In stock
                </button>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6" id="productGrid">
            <!-- Product Card 1 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <div class="w-24 h-24 opacity-20">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M12 2L2 22h20L12 2z"/>
                                <path d="M12 8v8"/>
                                <path d="M8 18h8"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium text-gray-900 mb-2">Floral Midi Dress</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹1,899</span>
                        <span class="text-sm text-gray-500 line-through">₹2,499</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="star-filled text-sm">★★★★</span>
                            <span class="star-empty text-sm">★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">76</span>
                    </div>
                    <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg transition-colors">
                        Add
                    </button>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <div class="w-24 h-24 opacity-20">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M12 2L2 22h20L12 2z"/>
                                <path d="M12 8v8"/>
                                <path d="M8 18h8"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium text-gray-900 mb-2">Floral Midi Dress</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹1,899</span>
                        <span class="text-sm text-gray-500 line-through">₹2,499</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="star-filled text-sm">★★★★</span>
                            <span class="star-empty text-sm">★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">76</span>
                    </div>
                    <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg transition-colors">
                        Add
                    </button>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <div class="w-24 h-24 opacity-20">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M12 2L2 22h20L12 2z"/>
                                <path d="M12 8v8"/>
                                <path d="M8 18h8"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium text-gray-900 mb-2">Floral Midi Dress</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹1,899</span>
                        <span class="text-sm text-gray-500 line-through">₹2,499</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="star-filled text-sm">★★★★</span>
                            <span class="star-empty text-sm">★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">76</span>
                    </div>
                    <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg transition-colors">
                        Add
                    </button>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <div class="w-24 h-24 opacity-20">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M12 2L2 22h20L12 2z"/>
                                <path d="M12 8v8"/>
                                <path d="M8 18h8"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium text-gray-900 mb-2">Floral Midi Dress</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹1,899</span>
                        <span class="text-sm text-gray-500 line-through">₹2,499</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="star-filled text-sm">★★★★</span>
                            <span class="star-empty text-sm">★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">76</span>
                    </div>
                    <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg transition-colors">
                        Add
                    </button>
                </div>
            </div>

            <!-- Product Card 5 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <div class="w-24 h-24 opacity-20">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M12 2L2 22h20L12 2z"/>
                                <path d="M12 8v8"/>
                                <path d="M8 18h8"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium text-gray-900 mb-2">Floral Midi Dress</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹1,899</span>
                        <span class="text-sm text-gray-500 line-through">₹2,499</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="star-filled text-sm">★★★★</span>
                            <span class="star-empty text-sm">★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">76</span>
                    </div>
                    <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg transition-colors">
                        Add
                    </button>
                </div>
            </div>

            <!-- Product Card 6 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <div class="w-24 h-24 opacity-20">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M12 2L2 22h20L12 2z"/>
                                <path d="M12 8v8"/>
                                <path d="M8 18h8"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium text-gray-900 mb-2">Floral Midi Dress</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹1,899</span>
                        <span class="text-sm text-gray-500 line-through">₹2,499</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="star-filled text-sm">★★★★</span>
                            <span class="star-empty text-sm">★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">76</span>
                    </div>
                    <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg transition-colors">
                        Add
                    </button>
                </div>
            </div>

            <!-- Product Card 7 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <div class="w-24 h-24 opacity-20">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M12 2L2 22h20L12 2z"/>
                                <path d="M12 8v8"/>
                                <path d="M8 18h8"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium text-gray-900 mb-2">Floral Midi Dress</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹1,899</span>
                        <span class="text-sm text-gray-500 line-through">₹2,499</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="star-filled text-sm">★★★★</span>
                            <span class="star-empty text-sm">★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">76</span>
                    </div>
                    <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg transition-colors">
                        Add
                    </button>
                </div>
            </div>

            <!-- Product Card 8 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="relative">
                    <span class="absolute top-3 left-3 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-medium z-10">NEW</span>
                    <div class="aspect-square bg-pink-50 flex items-center justify-center">
                        <div class="w-24 h-24 opacity-20">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M12 2L2 22h20L12 2z"/>
                                <path d="M12 8v8"/>
                                <path d="M8 18h8"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium text-gray-900 mb-2">Floral Midi Dress</h3>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-lg font-bold text-gray-900">₹1,899</span>
                        <span class="text-sm text-gray-500 line-through">₹2,499</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            <span class="star-filled text-sm">★★★★</span>
                            <span class="star-empty text-sm">★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">76</span>
                    </div>
                    <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg transition-colors">
                        Add
                    </button>
                </div>
            </div>
        </div>

        
    </main>


    <script>
        // Simple interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add to cart functionality
            const addButtons = document.querySelectorAll('button:contains("Add")');
            addButtons.forEach(button => {
                if (button.textContent.trim() === 'Add') {
                    button.addEventListener('click', function() {
                        this.textContent = 'Added!';
                        this.classList.remove('bg-pink-500', 'hover:bg-pink-600');
                        this.classList.add('bg-green-500', 'hover:bg-green-600');
                        setTimeout(() => {
                            this.textContent = 'Add';
                            this.classList.remove('bg-green-500', 'hover:bg-green-600');
                            this.classList.add('bg-pink-500', 'hover:bg-pink-600');
                        }, 2000);
                    });
                }
            });

            // Search functionality
            const searchInput = document.querySelector('input[placeholder="Search new arrivals..."]');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const products = document.querySelectorAll('#productGrid > div');
                
                products.forEach(product => {
                    const productName = product.querySelector('h3').textContent.toLowerCase();
                    if (productName.includes(searchTerm)) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            });

            // Filter and sort button interactions
            document.getElementById('filtersBtn').addEventListener('click', function() {
                alert('Filter options would open here');
            });

            document.getElementById('sortBtn').addEventListener('click', function() {
                alert('Sort options would open here');
            });
        });
    </script>
</body>
</html>