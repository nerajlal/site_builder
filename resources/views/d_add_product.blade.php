@include('includes.d_head')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- Scrollable Content -->
<div class="flex-1 overflow-y-auto">
    <main class="flex-1 overflow-y-auto p-6">

        <!-- Page Header -->
        <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-3">
            <h1 class="text-2xl font-bold text-gray-800">Add Products For Your Site</h1>
            <div class="flex flex-wrap gap-3">
                <button id="add-brand-btn" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    Add Brands
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
                            <td class="px-6 py-4">{{ $product->category_name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $product->price }}</td>
                            <td class="px-6 py-4">{{ $product->quantity > 0 ? 'Available' : 'Out of Stock' }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <!-- Edit Button -->
                                <button 
                                    type="button" 
                                    class="text-blue-600 hover:underline edit-product-btn"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-sku="{{ $product->sku }}"
                                    data-price="{{ $product->price }}"
                                    data-original_price="{{ $product->original_price }}"
                                    data-quantity="{{ $product->quantity }}"
                                    data-category_name="{{ $product->category_name }}"
                                    data-brand_id="{{ $product->brand_id }}"
                                    data-image_url="{{ $product->image_url }}"
                                    data-images="{{ json_encode($product->images) }}"
                                    data-video_url="{{ $product->video_url }}"
                                    data-description="{{ $product->description }}"
                                    data-colors="{{ json_encode($product->colors) }}"
                                    data-sizes="{{ json_encode($product->sizes) }}"
                                    data-details="{{ json_encode($product->details) }}">
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
    <div class="relative top-10 mx-auto p-5 border w-full md:w-3/4 lg:w-2/3 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3">
            <h3 class="text-xl font-semibold text-gray-800">Add Product</h3>
            <button class="close-modal text-gray-500 hover:text-gray-700 text-lg">&times;</button>
        </div>

        <form id="product-form" method="POST" action="{{ route('storeProduct', $headerFooter->id) }}" class="space-y-4 max-h-[80vh] overflow-y-auto pr-2">
            @csrf

            <!-- Core Product Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">SKU</label>
                    <input type="text" name="sku" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_name" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
                        <option value="Men">Men</option>
                        <option value="Women">Women</option>
                        <option value="Kids">Kids</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Brand</label>
                    <select name="brand_id" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" required step="0.01" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Original Price</label>
                    <input type="number" name="original_price" step="0.01" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="quantity" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
            </div>

            <!-- Media -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Main Image URL</label>
                <input type="text" name="image_url" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Additional Images (JSON)</label>
                <textarea name="images" rows="3" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md" placeholder='["url1", "url2", "url3"]'></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Video URL</label>
                <input type="text" name="video_url" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>

            <!-- Variants -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Colors (JSON)</label>
                    <textarea name="colors" rows="4" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md" placeholder='[{"name": "Pink Floral", "value": "#e91e63"}]'></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sizes & Stock</label>
                    <div class="grid grid-cols-3 gap-x-4 gap-y-2">
                        @foreach(['S', 'M', 'L', 'XL', 'XXL', 'XXXL'] as $size)
                            <div class="flex items-center">
                                <label for="size_{{ $size }}" class="w-10 text-sm font-medium text-gray-700">{{ $size }}</label>
                                <input type="number" name="sizes[{{ $size }}]" id="size_{{ $size }}" value="0" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Details -->
            <div class="space-y-4 border-t pt-4">
                <h4 class="text-lg font-semibold text-gray-800">Product Details</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Key Features (one per line)</label>
                        <textarea name="details[key_features]" rows="3" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Care Tips (one per line)</label>
                        <textarea name="details[care_tips]" rows="3" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Styling Tips (JSON)</label>
                        <textarea name="details[styling_tips]" rows="4" class="mt-1 w-full px-3 py-2 font-mono text-xs border border-gray-300 rounded-md" placeholder='[{"title": "Casual", "description": "..."}]'></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Model Info (JSON)</label>
                        <textarea name="details[model_info]" rows="4" class="mt-1 w-full px-3 py-2 font-mono text-xs border border-gray-300 rounded-md" placeholder='{"height": "5\'7\""}'></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Garment Details (JSON)</label>
                        <textarea name="details[garment_details]" rows="4" class="mt-1 w-full px-3 py-2 font-mono text-xs border border-gray-300 rounded-md" placeholder='{"fit_type": "Regular"}'></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Size Chart (JSON)</label>
                        <textarea name="details[size_chart]" rows="4" class="mt-1 w-full px-3 py-2 font-mono text-xs border border-gray-300 rounded-md" placeholder='{"S": {"bust": "34"}}'></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fabric Details (JSON)</label>
                        <textarea name="details[fabric_details]" rows="4" class="mt-1 w-full px-3 py-2 font-mono text-xs border border-gray-300 rounded-md" placeholder='{"material": "Cotton"}'></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Care Instructions (JSON)</label>
                        <textarea name="details[care_instructions]" rows="4" class="mt-1 w-full px-3 py-2 font-mono text-xs border border-gray-300 rounded-md" placeholder='[{"instruction": "Wash Cold"}]'></textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t">
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


<!-- ========== JS ========== -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modals = {
            product: document.getElementById('product-modal'),
            brand: document.getElementById('brand-modal')
        };

        // Buttons
        document.getElementById('add-product-btn').addEventListener('click', () => openModal(modals.product));
        document.getElementById('add-brand-btn').addEventListener('click', () => openModal(modals.brand));

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
        const productModal = document.getElementById('product-modal');
        const productForm = document.getElementById('product-form');
        const modalTitle = productModal.querySelector('h3');
        const addProductBtn = document.getElementById('add-product-btn');
        const editProductBtns = document.querySelectorAll('.edit-product-btn');

        addProductBtn.addEventListener('click', function () {
            modalTitle.textContent = 'Add Product';
            productForm.action = "{{ route('storeProduct', $headerFooter->id) }}";
            productForm.reset();
            // Reset sizes to 0
            document.querySelectorAll('input[name^="sizes"]').forEach(input => input.value = 0);
            const methodInput = productForm.querySelector('input[name="_method"]');
            if (methodInput) {
                methodInput.remove();
            }
        });

        editProductBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const data = this.dataset;
                modalTitle.textContent = 'Edit Product';
                productForm.action = `/products/update/${data.id}`;

                // Add method spoofing for PUT request
                if (!productForm.querySelector('input[name="_method"]')) {
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    productForm.prepend(methodInput);
                }

                // Populate fields
                productForm.querySelector('[name="name"]').value = data.name;
                productForm.querySelector('[name="sku"]').value = data.sku;
                productForm.querySelector('[name="category_name"]').value = data.category_name;
                productForm.querySelector('[name="brand_id"]').value = data.brand_id;
                productForm.querySelector('[name="price"]').value = data.price;
                productForm.querySelector('[name="original_price"]').value = data.original_price;
                productForm.querySelector('[name="quantity"]').value = data.quantity;
                productForm.querySelector('[name="image_url"]').value = data.image_url;
                productForm.querySelector('[name="video_url"]').value = data.video_url;
                productForm.querySelector('[name="description"]').value = data.description;

                // Handle JSON fields
                productForm.querySelector('[name="images"]').value = data.images ? JSON.stringify(JSON.parse(data.images), null, 2) : '';
                productForm.querySelector('[name="colors"]').value = data.colors ? JSON.stringify(JSON.parse(data.colors), null, 2) : '';

                // Handle details
                const details = data.details ? JSON.parse(data.details) : {};
                // Reset all detail fields
                document.querySelectorAll('[name^="details["]').forEach(input => input.value = '');

                if (details.key_features) {
                    productForm.querySelector('[name="details[key_features]"]').value = details.key_features.join('\\n');
                }
                if (details.care_tips) {
                    productForm.querySelector('[name="details[care_tips]"]').value = details.care_tips.join('\\n');
                }
                const jsonDetailFields = ['styling_tips', 'model_info', 'garment_details', 'size_chart', 'fabric_details', 'care_instructions'];
                jsonDetailFields.forEach(field => {
                    if (details[field]) {
                        productForm.querySelector(`[name="details[${field}]"]`).value = JSON.stringify(details[field], null, 2);
                    }
                });

                // Handle sizes
                const sizes = data.sizes ? JSON.parse(data.sizes) : [];
                document.querySelectorAll('input[name^="sizes"]').forEach(input => input.value = 0); // Reset all to 0 first
                sizes.forEach(item => {
                    const sizeInput = productForm.querySelector(`[name="sizes[${item.size}]"]`);
                    if (sizeInput) {
                        sizeInput.value = item.stock;
                    }
                });

                // Open the modal
                productModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        });

        let hasBrands = {{ $brands->count() > 0 ? 'true' : 'false' }};
        if (!hasBrands) {
            addProductBtn.disabled = true;
            addProductBtn.classList.add('opacity-50', 'cursor-not-allowed');
            addProductBtn.title = "Add a brand first!";
        }
    });

</script>
