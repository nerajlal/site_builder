@include('includes.d_head')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- Scrollable Content -->
<div class="flex-1 overflow-y-auto">
    <main class="flex-1 overflow-y-auto p-6">

        <!-- Page Header -->
        <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-3">
            <h1 class="text-2xl font-bold text-gray-800">Add New Products For Your Site</h1>
            <div class="flex flex-wrap gap-3">
                <button id="add-brand-btn" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    Add Brands
                </button>
                <button id="add-category-btn" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    Add Categories
                </button>
                <button id="add-product-btn" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    Add Products
                </button>
            </div>
        </div>

        <!-- Brands & Categories Section -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Brands List -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Brands</h2>
                @if ($brands->count())
                    <ul class="divide-y divide-gray-200">
                        @foreach ($brands as $brand)
                            <li class="flex items-center justify-between py-2">
                                <span>{{ $brand->name }}</span>
                                <form action="{{ route('deleteBrand', $brand->id) }}" method="POST" onsubmit="return confirm('Delete this brand?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No brands added yet.</p>
                @endif
            </div>

            <!-- Categories List -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Categories</h2>
                @if ($categories->count())
                    <ul class="divide-y divide-gray-200">
                        @foreach ($categories as $category)
                            <li class="flex items-center justify-between py-2">
                                <span>{{ $category->name }}</span>
                                <form action="{{ route('deleteCategory', $category->id) }}" method="POST" onsubmit="return confirm('Delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No categories added yet.</p>
                @endif
            </div>
        </div>


        <!-- Recently Added Products -->
        <div class="mt-10">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr>
                            <td class="px-6 py-4">
                                @if($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="Product Image" class="w-12 h-12 object-cover rounded">
                                @else
                                    <span class="text-gray-400">No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $product->name }}</td>
                            <td class="px-6 py-4">{{ $product->category->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $product->price }}</td>
                            <td class="px-6 py-4">{{ $product->quantity > 0 ? 'Available' : 'Out of Stock' }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <!-- Edit Button -->
                                <button 
                                    type="button" 
                                    class="text-blue-600 hover:underline edit-product-btn"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                    data-quantity="{{ $product->quantity }}"
                                    data-category="{{ $product->category_id }}"
                                    data-brand="{{ $product->brand_id }}"
                                    data-image="{{ $product->image_url }}">
                                    Edit
                                </button>

                                <!-- Delete Button -->
                                <form action="{{ route('deleteProduct', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No products added yet.</td>
                        </tr>
                    @endforelse
                </tbody>

                </table>
            </div>
        </div>
    </main>
</div>

@include('includes.d_footer')

<!-- ========== MODALS ========== -->

<!-- Add Product Modal -->
<div id="product-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 lg:w-1/3 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3">
            <h3 class="text-xl font-semibold text-gray-800">Add Products</h3>
            <button class="close-modal text-gray-500 hover:text-gray-700 text-lg">&times;</button>
        </div>

        <form id="product-form" method="POST" action="{{ route('storeProduct', $headerFooter->id) }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                <input type="text" name="product_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-4 flex space-x-4">
                <!-- Product Category -->
                <div class="w-1/2">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Product Category</label>
                    <select name="category" id="category" required class="w-full px-3 py-2 border">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Brand -->
                <div class="w-1/2">
                    <label for="brand" class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                    <select name="brand" id="brand" required class="w-full px-3 py-2 border">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Image Link</label>
                <input type="text" name="image_url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                    <input type="number" name="price" required step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                    <input type="number" name="quantity" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <button type="button" class="close-modal px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Add Product</button>
            </div>
        </form>

    </div>
</div>

<!-- Add Brand Modal -->
<div id="brand-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/3 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3">
            <h3 class="text-xl font-semibold text-gray-800">Add Brand</h3>
            <button class="close-modal text-gray-500 hover:text-gray-700 text-lg">&times;</button>
        </div>

        <form id="brand-form" method="POST" action="{{ route('storeBrand', $headerFooter->id) }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Brand Name</label>
                <input type="text" name="brand_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <button type="button" class="close-modal px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Add Brand</button>
            </div>
        </form>

    </div>
</div>

<!-- Add Category Modal -->
<div id="category-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/3 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3">
            <h3 class="text-xl font-semibold text-gray-800">Add Category</h3>
            <button class="close-modal text-gray-500 hover:text-gray-700 text-lg">&times;</button>
        </div>

        <form id="category-form" method="POST" action="{{ route('storeCategory', $headerFooter->id) }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                <input type="text" name="category_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <button type="button" class="close-modal px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Add Category</button>
            </div>
        </form>
    </div>
</div>

<!-- ========== JS ========== -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modals = {
            product: document.getElementById('product-modal'),
            brand: document.getElementById('brand-modal'),
            category: document.getElementById('category-modal')
        };

        // Buttons
        document.getElementById('add-product-btn').addEventListener('click', () => openModal(modals.product));
        document.getElementById('add-brand-btn').addEventListener('click', () => openModal(modals.brand));
        document.getElementById('add-category-btn').addEventListener('click', () => openModal(modals.category));

        // Modal open/close functions
        function openModal(modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            Object.values(modals).forEach(m => m.classList.add('hidden'));
            document.body.style.overflow = 'auto';
        }

        // Close buttons
        document.querySelectorAll('.close-modal').forEach(btn => btn.addEventListener('click', closeModal));
        window.addEventListener('click', (e) => {
            if (Object.values(modals).includes(e.target)) closeModal();
        });

    });

    document.addEventListener('DOMContentLoaded', function () {
        let hasBrands = {{ $brands->count() > 0 ? 'true' : 'false' }};
        let hasCategories = {{ $categories->count() > 0 ? 'true' : 'false' }};

        const addProductBtn = document.getElementById('add-product-btn');
        if (!hasBrands || !hasCategories) {
            addProductBtn.disabled = true;
            addProductBtn.classList.add('opacity-50', 'cursor-not-allowed');
            addProductBtn.title = "Add a brand and category first!";
        }
    });

</script>
