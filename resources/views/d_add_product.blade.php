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
                                    data-images="{{ json_encode($product->productImages) }}"
                                    data-video_url="{{ $product->video_url }}"
                                    data-description="{{ $product->description }}"
                                    data-colors="{{ json_encode($product->colors) }}"
                                    data-sizes="{{ json_encode($product->sizes) }}"
                                    data-styling_tips="{{ json_encode($product->stylingTips) }}"
                                    data-model_info="{{ json_encode($product->modelInfo) }}"
                                    data-garment_details="{{ json_encode($product->garmentDetails) }}"
                                    data-size_chart="{{ json_encode($product->sizeChart) }}"
                                    data-fabric_details="{{ json_encode($product->fabricDetails) }}"
                                    data-care_instructions="{{ json_encode($product->careInstructions) }}"
                                    data-faqs="{{ json_encode($product->faqs) }}"
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
                <label class="block text-sm font-medium text-gray-700">Additional Images</label>
                <div id="images-container" class="space-y-2">
                    <!-- Dynamic image inputs will be added here -->
                </div>
                <button type="button" id="add-image-btn" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded-md text-sm">Add Image</button>
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
                    <label class="block text-sm font-medium text-gray-700">Colors</label>
                    <div id="colors-container" class="space-y-2">
                        <!-- Dynamic color inputs will be added here -->
                    </div>
                    <button type="button" id="add-color-btn" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded-md text-sm">Add Color</button>
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
                        <label class="block text-sm font-medium text-gray-700">FAQs</label>
                        <div id="faqs-container" class="space-y-2">
                            <!-- Dynamic faq inputs will be added here -->
                        </div>
                        <button type="button" id="add-faq-btn" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded-md text-sm">Add FAQ</button>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Styling Tips</label>
                        <div id="styling-tips-container" class="space-y-2">
                            <!-- Dynamic styling tip inputs will be added here -->
                        </div>
                        <button type="button" id="add-styling-tip-btn" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded-md text-sm">Add Tip</button>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Model Info</label>
                        <div id="model-info-container" class="space-y-2">
                            <!-- Dynamic model info inputs will be added here -->
                        </div>
                        <button type="button" id="add-model-info-btn" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded-md text-sm">Add Info</button>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Garment Details</label>
                        <div id="garment-details-container" class="space-y-2">
                            <!-- Dynamic garment detail inputs will be added here -->
                        </div>
                        <button type="button" id="add-garment-detail-btn" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded-md text-sm">Add Detail</button>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Size Chart</label>
                        <div id="size-chart-container" class="space-y-2">
                            <!-- Dynamic size chart inputs will be added here -->
                        </div>
                        <button type="button" id="add-size-chart-btn" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded-md text-sm">Add Size</button>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fabric Details</label>
                        <div id="fabric-details-container" class="space-y-2">
                            <!-- Dynamic fabric detail inputs will be added here -->
                        </div>
                        <button type="button" id="add-fabric-detail-btn" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded-md text-sm">Add Detail</button>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Care Instructions</label>
                        <div id="care-instructions-container" class="space-y-2">
                            <!-- Dynamic care instruction inputs will be added here -->
                        </div>
                        <button type="button" id="add-care-instruction-btn" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded-md text-sm">Add Instruction</button>
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

                // Clear and populate colors
                const colorsContainer = document.getElementById('colors-container');
                colorsContainer.innerHTML = '';
                JSON.parse(data.colors).forEach(c => addColorInput(c.name, c.value));

                // Clear and populate images
                const imagesContainer = document.getElementById('images-container');
                imagesContainer.innerHTML = '';
                JSON.parse(data.images).forEach(i => addImageInput(i.image_url));

                // Clear and populate styling tips
                const stylingTipsContainer = document.getElementById('styling-tips-container');
                stylingTipsContainer.innerHTML = '';
                JSON.parse(data.styling_tips).forEach(st => addStylingTipInput(st.title, st.description));

                // Clear and populate model info
                const modelInfoContainer = document.getElementById('model-info-container');
                modelInfoContainer.innerHTML = '';
                JSON.parse(data.model_info).forEach(mi => addModelInfoInput(mi.key, mi.value));

                // Clear and populate garment details
                const garmentDetailsContainer = document.getElementById('garment-details-container');
                garmentDetailsContainer.innerHTML = '';
                JSON.parse(data.garment_details).forEach(gd => addGarmentDetailInput(gd.key, gd.value));

                // Clear and populate size chart
                const sizeChartContainer = document.getElementById('size-chart-container');
                sizeChartContainer.innerHTML = '';
                JSON.parse(data.size_chart).forEach(sc => addSizeChartInput(sc.size, JSON.stringify(sc.measurements, null, 2)));

                // Clear and populate fabric details
                const fabricDetailsContainer = document.getElementById('fabric-details-container');
                fabricDetailsContainer.innerHTML = '';
                JSON.parse(data.fabric_details).forEach(fd => addFabricDetailInput(fd.key, fd.value));

                // Clear and populate care instructions
                const careInstructionsContainer = document.getElementById('care-instructions-container');
                careInstructionsContainer.innerHTML = '';
                JSON.parse(data.care_instructions).forEach(ci => addCareInstructionInput(ci.instruction));

                // Clear and populate FAQs
                const faqsContainer = document.getElementById('faqs-container');
                faqsContainer.innerHTML = '';
                if (data.faqs) {
                    JSON.parse(data.faqs).forEach(f => addFaqInput(f.question, f.answer));
                }

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

        // Color management
        const addColorBtn = document.getElementById('add-color-btn');
        const colorsContainer = document.getElementById('colors-container');
        let colorIndex = 0;

        function addColorInput(name = '', value = '') {
            const colorInput = document.createElement('div');
            colorInput.classList.add('flex', 'items-center', 'space-x-2');
            colorInput.innerHTML = `
                <input type="text" name="colors[${colorIndex}][name]" placeholder="Color Name" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${name}">
                <input type="color" name="colors[${colorIndex}][value]" placeholder="Color Value" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${value}">
                <button type="button" class="remove-color-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            `;
            colorsContainer.appendChild(colorInput);
            colorIndex++;
        }

        addColorBtn.addEventListener('click', () => addColorInput());

        colorsContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-color-btn')) {
                e.target.parentElement.remove();
            }
        });

        // When opening the "Add Product" modal, clear the colors
        addProductBtn.addEventListener('click', function () {
            colorsContainer.innerHTML = '';
            imagesContainer.innerHTML = '';
        });

        // Image management
        const addImageBtn = document.getElementById('add-image-btn');
        const imagesContainer = document.getElementById('images-container');
        let imageIndex = 0;

        function addImageInput(url = '') {
            const imageInput = document.createElement('div');
            imageInput.classList.add('flex', 'items-center', 'space-x-2');
            imageInput.innerHTML = `
                <input type="text" name="images[${imageIndex}][url]" placeholder="Image URL" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${url}">
                <button type="button" class="remove-image-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            `;
            imagesContainer.appendChild(imageInput);
            imageIndex++;
        }

        addImageBtn.addEventListener('click', () => addImageInput());

        imagesContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-image-btn')) {
                e.target.parentElement.remove();
            }
        });

        // Styling Tip management
        const addStylingTipBtn = document.getElementById('add-styling-tip-btn');
        const stylingTipsContainer = document.getElementById('styling-tips-container');
        let stylingTipIndex = 0;

        function addStylingTipInput(title = '', description = '') {
            const stylingTipInput = document.createElement('div');
            stylingTipInput.classList.add('space-y-1');
            stylingTipInput.innerHTML = `
                <div class="flex items-center space-x-2">
                    <input type="text" name="details[styling_tips][${stylingTipIndex}][title]" placeholder="Title" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${title}">
                    <button type="button" class="remove-styling-tip-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
                </div>
                <textarea name="details[styling_tips][${stylingTipIndex}][description]" placeholder="Description" rows="2" class="w-full px-2 py-1 border border-gray-300 rounded-md">${description}</textarea>
            `;
            stylingTipsContainer.appendChild(stylingTipInput);
            stylingTipIndex++;
        }

        addStylingTipBtn.addEventListener('click', () => addStylingTipInput());

        stylingTipsContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-styling-tip-btn')) {
                e.target.parentElement.parentElement.remove();
            }
        });

        // Model Info management
        const addModelInfoBtn = document.getElementById('add-model-info-btn');
        const modelInfoContainer = document.getElementById('model-info-container');
        let modelInfoIndex = 0;

        function addModelInfoInput(key = '', value = '') {
            const modelInfoInput = document.createElement('div');
            modelInfoInput.classList.add('flex', 'items-center', 'space-x-2');
            modelInfoInput.innerHTML = `
                <input type="text" name="details[model_info][${modelInfoIndex}][key]" placeholder="Key" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${key}">
                <input type="text" name="details[model_info][${modelInfoIndex}][value]" placeholder="Value" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${value}">
                <button type="button" class="remove-model-info-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            `;
            modelInfoContainer.appendChild(modelInfoInput);
            modelInfoIndex++;
        }

        addModelInfoBtn.addEventListener('click', () => addModelInfoInput());

        modelInfoContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-model-info-btn')) {
                e.target.parentElement.remove();
            }
        });

        // Garment Detail management
        const addGarmentDetailBtn = document.getElementById('add-garment-detail-btn');
        const garmentDetailsContainer = document.getElementById('garment-details-container');
        let garmentDetailIndex = 0;

        function addGarmentDetailInput(key = '', value = '') {
            const garmentDetailInput = document.createElement('div');
            garmentDetailInput.classList.add('flex', 'items-center', 'space-x-2');
            garmentDetailInput.innerHTML = `
                <input type="text" name="details[garment_details][${garmentDetailIndex}][key]" placeholder="Key" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${key}">
                <input type="text" name="details[garment_details][${garmentDetailIndex}][value]" placeholder="Value" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${value}">
                <button type="button" class="remove-garment-detail-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            `;
            garmentDetailsContainer.appendChild(garmentDetailInput);
            garmentDetailIndex++;
        }

        addGarmentDetailBtn.addEventListener('click', () => addGarmentDetailInput());

        garmentDetailsContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-garment-detail-btn')) {
                e.target.parentElement.remove();
            }
        });

        // Size Chart management
        const addSizeChartBtn = document.getElementById('add-size-chart-btn');
        const sizeChartContainer = document.getElementById('size-chart-container');
        let sizeChartIndex = 0;

        function addSizeChartInput(size = '', measurements = '') {
            const sizeChartInput = document.createElement('div');
            sizeChartInput.classList.add('space-y-1');
            sizeChartInput.innerHTML = `
                <div class="flex items-center space-x-2">
                    <input type="text" name="details[size_chart][${sizeChartIndex}][size]" placeholder="Size (e.g., S, M, L)" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${size}">
                    <button type="button" class="remove-size-chart-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
                </div>
                <textarea name="details[size_chart][${sizeChartIndex}][measurements]" placeholder='Measurements (JSON format, e.g., {"bust": "34", "waist": "28"})' rows="3" class="w-full px-2 py-1 border border-gray-300 rounded-md font-mono text-xs">${measurements}</textarea>
            `;
            sizeChartContainer.appendChild(sizeChartInput);
            sizeChartIndex++;
        }

        addSizeChartBtn.addEventListener('click', () => addSizeChartInput());

        sizeChartContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-size-chart-btn')) {
                e.target.parentElement.parentElement.remove();
            }
        });

        // Fabric Detail management
        const addFabricDetailBtn = document.getElementById('add-fabric-detail-btn');
        const fabricDetailsContainer = document.getElementById('fabric-details-container');
        let fabricDetailIndex = 0;

        function addFabricDetailInput(key = '', value = '') {
            const fabricDetailInput = document.createElement('div');
            fabricDetailInput.classList.add('flex', 'items-center', 'space-x-2');
            fabricDetailInput.innerHTML = `
                <input type="text" name="details[fabric_details][${fabricDetailIndex}][key]" placeholder="Key" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${key}">
                <input type="text" name="details[fabric_details][${fabricDetailIndex}][value]" placeholder="Value" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${value}">
                <button type="button" class="remove-fabric-detail-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            `;
            fabricDetailsContainer.appendChild(fabricDetailInput);
            fabricDetailIndex++;
        }

        addFabricDetailBtn.addEventListener('click', () => addFabricDetailInput());

        fabricDetailsContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-fabric-detail-btn')) {
                e.target.parentElement.remove();
            }
        });

        // Care Instruction management
        const addCareInstructionBtn = document.getElementById('add-care-instruction-btn');
        const careInstructionsContainer = document.getElementById('care-instructions-container');
        let careInstructionIndex = 0;

        function addCareInstructionInput(instruction = '') {
            const careInstructionInput = document.createElement('div');
            careInstructionInput.classList.add('flex', 'items-center', 'space-x-2');
            careInstructionInput.innerHTML = `
                <input type="text" name="details[care_instructions][${careInstructionIndex}][instruction]" placeholder="Instruction" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${instruction}">
                <button type="button" class="remove-care-instruction-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            `;
            careInstructionsContainer.appendChild(careInstructionInput);
            careInstructionIndex++;
        }

        addCareInstructionBtn.addEventListener('click', () => addCareInstructionInput());

        careInstructionsContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-care-instruction-btn')) {
                e.target.parentElement.remove();
            }
        });

        // FAQ management
        const addFaqBtn = document.getElementById('add-faq-btn');
        const faqsContainer = document.getElementById('faqs-container');
        let faqIndex = 0;

        function addFaqInput(question = '', answer = '') {
            const faqInput = document.createElement('div');
            faqInput.classList.add('space-y-1');
            faqInput.innerHTML = `
                <div class="flex items-center space-x-2">
                    <input type="text" name="details[faqs][${faqIndex}][question]" placeholder="Question" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${question}">
                    <button type="button" class="remove-faq-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
                </div>
                <textarea name="details[faqs][${faqIndex}][answer]" placeholder="Answer" rows="2" class="w-full px-2 py-1 border border-gray-300 rounded-md">${answer}</textarea>
            `;
            faqsContainer.appendChild(faqInput);
            faqIndex++;
        }

        addFaqBtn.addEventListener('click', () => addFaqInput());

        faqsContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-faq-btn')) {
                e.target.parentElement.parentElement.remove();
            }
        });
    });

</script>
