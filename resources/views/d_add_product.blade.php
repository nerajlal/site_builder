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
                                    data-product='@json($product)'>
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
            <h3 id="product-modal-title" class="text-xl font-semibold text-gray-800">Add Product</h3>
            <button class="close-modal text-gray-500 hover:text-gray-700 text-lg">&times;</button>
        </div>

        <form id="product-form" method="POST" action="{{ route('storeProduct', $headerFooter->id) }}" class="space-y-4 max-h-[80vh] overflow-y-auto pr-2" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" id="product_id">

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
            </div>

            <!-- Media -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Main Image</label>
                <input type="file" name="image_url" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md" accept="image/webp" onchange="validateImage(this)">
                <div id="main-image-preview" class="mt-2"></div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Additional Images</label>
                <div id="additional-images-preview" class="grid grid-cols-3 gap-2 mt-2"></div>
                <div id="images-container" class="space-y-2 mt-2">
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
                <button id="product-form-submit-btn" type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Add Product</button>
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
            resetProductForm();
        }

        function resetProductForm() {
            const productForm = document.getElementById('product-form');
            productForm.reset();
            document.getElementById('product-modal-title').textContent = 'Add Product';
            document.getElementById('product-form-submit-btn').textContent = 'Add Product';
            productForm.action = "{{ route('storeProduct', $headerFooter->id) }}";

            // Remove method spoofing
            const methodInput = productForm.querySelector('input[name="_method"]');
            if (methodInput) {
                methodInput.remove();
            }

            // Clear all dynamic fields
            const containers = [
                'colors-container', 'images-container', 'styling-tips-container',
                'model-info-container', 'garment-details-container', 'size-chart-container',
                'fabric-details-container', 'care-instructions-container', 'faqs-container',
                'main-image-preview', 'additional-images-preview'
            ];
            containers.forEach(id => document.getElementById(id).innerHTML = '');

            // Reset size inputs
            document.querySelectorAll('input[name^="sizes"]').forEach(input => input.value = 0);
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
        const modalTitle = document.getElementById('product-modal-title');
        const submitBtn = document.getElementById('product-form-submit-btn');
        const addProductBtn = document.getElementById('add-product-btn');
        const editProductBtns = document.querySelectorAll('.edit-product-btn');

        addProductBtn.addEventListener('click', function () {
            resetProductForm();
        });

        editProductBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const product = JSON.parse(this.dataset.product);

                modalTitle.textContent = 'Edit Product';
                submitBtn.textContent = 'Update Product';
                productForm.action = `/products/update/${product.id}`;

                if (!productForm.querySelector('input[name="_method"]')) {
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    productForm.prepend(methodInput);
                }

                // Populate main form fields
                for (const key in product) {
                    const field = productForm.querySelector(`[name="${key}"]`);
                    if (field && field.type !== 'file') {
                        field.value = product[key];
                    }
                }

                // Populate textareas for details
                if (product.details) {
                    if (product.details.key_features) {
                        productForm.querySelector('[name="details[key_features]"]').value = product.details.key_features.join('\n');
                    }
                    if (product.details.care_tips) {
                        productForm.querySelector('[name="details[care_tips]"]').value = product.details.care_tips.join('\n');
                    }
                }

                // Populate sizes
                document.querySelectorAll('input[name^="sizes"]').forEach(input => input.value = 0);
                if (product.sizes) {
                    JSON.parse(product.sizes).forEach(item => {
                        const sizeInput = productForm.querySelector(`[name="sizes[${item.size}]"]`);
                        if (sizeInput) sizeInput.value = item.stock;
                    });
                }

                // Previews for images
                if (product.image_url) {
                    document.getElementById('main-image-preview').innerHTML = `<img src="${product.image_url}" class="w-20 h-20 object-cover rounded">`;
                }
                if (product.product_images) {
                    const additionalImagesPreview = document.getElementById('additional-images-preview');
                    additionalImagesPreview.innerHTML = '';
                    product.product_images.forEach(img => {
                        additionalImagesPreview.innerHTML += `<img src="${img.image_url}" class="w-20 h-20 object-cover rounded">`;
                    });
                }

                // Populate dynamic sections
                if(product.colors) product.colors.forEach(c => addColorInput(c.name, c.value));
                if(product.styling_tips) product.styling_tips.forEach(st => addStylingTipInput(st.title, st.description));
                if(product.model_info) product.model_info.forEach(mi => addModelInfoInput(mi.key, mi.value));
                if(product.garment_details) product.garment_details.forEach(gd => addGarmentDetailInput(gd.key, gd.value));
                if(product.size_chart) product.size_chart.forEach(sc => addSizeChartInput(sc.size, JSON.stringify(sc.measurements, null, 2)));
                if(product.fabric_details) product.fabric_details.forEach(fd => addFabricDetailInput(fd.key, fd.value));
                if(product.care_instructions) product.care_instructions.forEach(ci => addCareInstructionInput(ci.instruction));
                if(product.faqs) product.faqs.forEach(f => addFaqInput(f.question, f.answer));

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

        // Generic function to add dynamic inputs
        function addDynamicInput(container, innerHTMLCallback, index) {
            const inputDiv = document.createElement('div');
            inputDiv.innerHTML = innerHTMLCallback(index);
            container.appendChild(inputDiv);
            return inputDiv;
        }

        // Generic function to handle adding and removing dynamic inputs
        function manageDynamicSection(buttonId, containerId, innerHTMLCallback) {
            const addButton = document.getElementById(buttonId);
            const container = document.getElementById(containerId);
            let index = 0;

            addButton.addEventListener('click', () => {
                const newIndex = Date.now(); // Use timestamp for unique index
                addDynamicInput(container, innerHTMLCallback, newIndex);
            });

            container.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-btn')) {
                    e.target.closest('.dynamic-input-item').remove();
                }
            });

            // Return a function to add inputs programmatically (for editing)
            return (...args) => {
                const newIndex = Date.now();
                const inputDiv = addDynamicInput(container, innerHTMLCallback, newIndex);
                // This is a simplification. For full functionality, you'd need to populate the fields here.
                // The functions below handle this properly.
            };
        }

        // Color management
        let colorIndex = 0;
        const colorsContainer = document.getElementById('colors-container');
        document.getElementById('add-color-btn').addEventListener('click', () => addColorInput());
        function addColorInput(name = '', value = '#000000') {
            const div = document.createElement('div');
            div.className = 'flex items-center space-x-2 dynamic-input-item';
            div.innerHTML = `
                <input type="text" name="colors[${colorIndex}][name]" placeholder="Color Name" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${name}">
                <input type="color" name="colors[${colorIndex}][value]" class="p-1 h-8 w-14 block bg-white border border-gray-200 cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none" value="${value}">
                <button type="button" class="remove-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            `;
            colorsContainer.appendChild(div);
            colorIndex++;
        }
        colorsContainer.addEventListener('click', e => {
            if (e.target.classList.contains('remove-btn')) e.target.parentElement.remove();
        });


        // Image management
        let imageIndex = 0;
        const imagesContainer = document.getElementById('images-container');
        document.getElementById('add-image-btn').addEventListener('click', () => addImageInput());
        function addImageInput() {
            const div = document.createElement('div');
            div.className = 'flex items-center space-x-2 dynamic-input-item';
            div.innerHTML = `
                <input type="file" name="images[]" class="w-full px-2 py-1 border border-gray-300 rounded-md" accept="image/webp" onchange="validateImage(this)">
                <button type="button" class="remove-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            `;
            imagesContainer.appendChild(div);
            imageIndex++;
        }
        imagesContainer.addEventListener('click', e => {
            if (e.target.classList.contains('remove-btn')) e.target.parentElement.remove();
        });

        // Simplified dynamic section management
        function setupDynamicSection(btnId, containerId, templateCallback) {
            let index = 0;
            const container = document.getElementById(containerId);
            document.getElementById(btnId).addEventListener('click', () => {
                const div = document.createElement('div');
                div.className = 'dynamic-input-item';
                div.innerHTML = templateCallback(index++);
                container.appendChild(div);
            });
            container.addEventListener('click', e => {
                if (e.target.classList.contains('remove-btn')) e.target.closest('.dynamic-input-item').remove();
            });
            return (data) => {
                const div = document.createElement('div');
                div.className = 'dynamic-input-item';
                div.innerHTML = templateCallback(index++, data);
                container.appendChild(div);
            };
        }

        const addStylingTipInput = setupDynamicSection('add-styling-tip-btn', 'styling-tips-container', (i, d={}) => `
            <div class="space-y-1 p-2 border rounded">
                <div class="flex items-center space-x-2">
                    <input type="text" name="details[styling_tips][${i}][title]" placeholder="Title" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${d.title || ''}">
                    <button type="button" class="remove-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
                </div>
                <textarea name="details[styling_tips][${i}][description]" placeholder="Description" rows="2" class="w-full px-2 py-1 border border-gray-300 rounded-md">${d.description || ''}</textarea>
            </div>`);

        const addModelInfoInput = setupDynamicSection('add-model-info-btn', 'model-info-container', (i, d={}) => `
            <div class="flex items-center space-x-2 p-2 border rounded">
                <input type="text" name="details[model_info][${i}][key]" placeholder="Key" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${d.key || ''}">
                <input type="text" name="details[model_info][${i}][value]" placeholder="Value" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${d.value || ''}">
                <button type="button" class="remove-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            </div>`);

        const addGarmentDetailInput = setupDynamicSection('add-garment-detail-btn', 'garment-details-container', (i, d={}) => `
            <div class="flex items-center space-x-2 p-2 border rounded">
                <input type="text" name="details[garment_details][${i}][key]" placeholder="Key" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${d.key || ''}">
                <input type="text" name="details[garment_details][${i}][value]" placeholder="Value" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${d.value || ''}">
                <button type="button" class="remove-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            </div>`);

        const addSizeChartInput = setupDynamicSection('add-size-chart-btn', 'size-chart-container', (i, d={}) => `
            <div class="space-y-1 p-2 border rounded">
                <div class="flex items-center space-x-2">
                    <input type="text" name="details[size_chart][${i}][size]" placeholder="Size (e.g., S, M, L)" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${d.size || ''}">
                    <button type="button" class="remove-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
                </div>
                <textarea name="details[size_chart][${i}][measurements]" placeholder='Measurements (JSON format)' rows="3" class="w-full px-2 py-1 border border-gray-300 rounded-md font-mono text-xs">${d.measurements ? JSON.stringify(d.measurements, null, 2) : ''}</textarea>
            </div>`);

        const addFabricDetailInput = setupDynamicSection('add-fabric-detail-btn', 'fabric-details-container', (i, d={}) => `
            <div class="flex items-center space-x-2 p-2 border rounded">
                <input type="text" name="details[fabric_details][${i}][key]" placeholder="Key" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${d.key || ''}">
                <input type="text" name="details[fabric_details][${i}][value]" placeholder="Value" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${d.value || ''}">
                <button type="button" class="remove-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            </div>`);

        const addCareInstructionInput = setupDynamicSection('add-care-instruction-btn', 'care-instructions-container', (i, d={}) => `
            <div class="flex items-center space-x-2 p-2 border rounded">
                <input type="text" name="details[care_instructions][${i}][instruction]" placeholder="Instruction" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${d.instruction || ''}">
                <button type="button" class="remove-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
            </div>`);

        const addFaqInput = setupDynamicSection('add-faq-btn', 'faqs-container', (i, d={}) => `
            <div class="space-y-1 p-2 border rounded">
                <div class="flex items-center space-x-2">
                    <input type="text" name="details[faqs][${i}][question]" placeholder="Question" class="w-full px-2 py-1 border border-gray-300 rounded-md" value="${d.question || ''}">
                    <button type="button" class="remove-btn px-2 py-1 bg-red-500 text-white rounded-md text-sm">X</button>
                </div>
                <textarea name="details[faqs][${i}][answer]" placeholder="Answer" rows="2" class="w-full px-2 py-1 border border-gray-300 rounded-md">${d.answer || ''}</textarea>
            </div>`);

    });

    function validateImage(input) {
        const file = input.files[0];
        if (!file) {
            return;
        }

        const allowedType = 'image/webp';
        const maxSize = 10 * 1024 * 1024; // 10MB

        if (file.type !== allowedType) {
            alert('Error: Please select a .webp image file.');
            input.value = ''; // Clear the input
            return;
        }

        if (file.size > maxSize) {
            alert('Error: The image size cannot exceed 10MB.');
            input.value = ''; // Clear the input
            return;
        }
    }
</script>
