@include('includes.d_head')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .template-card {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }
        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .preview-btn {
            transition: all 0.3s ease;
        }
        .preview-btn:hover {
            background-color: #3730a3;
        }
        .use-template-btn {
            transition: all 0.3s ease;
        }
        .use-template-btn:hover {
            background-color: #f3f4f6;
            color: #4f46e5;
        }
        .badge-new {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }
    </style>
</head>

<!-- Scrollable Content -->
<div class="flex-1 overflow-y-auto">
    <main class="flex-1 overflow-y-auto p-6">
        <!-- Gallery Header -->
        <div class="mb-8 flex flex-col md:flex-row items-start md:items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Premium Store Templates</h1>
                <p class="text-gray-600">Choose from our professionally designed templates</p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="relative">
                    <input type="text" placeholder="Search templates..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Template Categories -->
        <div class="mb-6 flex overflow-x-auto pb-2">
            <button class="px-4 py-2 mr-2 bg-indigo-600 text-white rounded-full text-sm font-medium">All</button>
            <button class="px-4 py-2 mr-2 bg-white border border-gray-300 rounded-full text-sm font-medium hover:bg-gray-50">Minimalist</button>
            <button class="px-4 py-2 mr-2 bg-white border border-gray-300 rounded-full text-sm font-medium hover:bg-gray-50">Dark Theme</button>
            <button class="px-4 py-2 mr-2 bg-white border border-gray-300 rounded-full text-sm font-medium hover:bg-gray-50">Luxury</button>
            <button class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm font-medium hover:bg-gray-50">Modern</button>
        </div>

        <!-- Template Gallery Grid -->
        <!-- Template Gallery Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6 items-stretch">
    <!-- Template 1 - Light Luxury -->
    <div class="template-card bg-white rounded-lg shadow-sm overflow-hidden flex flex-col h-full">
        <div class="relative flex-grow-0">
            <img src="{{ asset('images/1.png') }}" 
                alt="Light Luxury Watch Template" 
                class="w-full h-auto max-w-full">
            <span class="absolute top-3 right-3 bg-green-500 text-white text-xs font-medium px-2 py-1 rounded-full badge-new">NEW</span>
        </div>
        <div class="p-4 flex flex-col flex-grow">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-lg font-medium text-gray-800">Horizon Elegance</h3>
                    <p class="text-sm text-gray-500">Clean, premium light theme with gold accents</p>
                </div>
                <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">Popular</span>
            </div>
            <div class="mt-4 flex space-x-3 mt-auto">
                <button onclick="openPreviewModal('/index1')" class="preview-btn flex-1 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm font-medium text-center">
                    Live Preview
                </button>
                <button class="use-template-btn flex-1 px-4 py-2 bg-white border border-indigo-600 text-indigo-600 rounded-md text-sm font-medium">
                    Use Template
                </button>
            </div>
        </div>
    </div>

    <!-- Template 2 - Dark Luxury -->
    <div class="template-card bg-white rounded-lg shadow-sm overflow-hidden flex flex-col h-full">
        <div class="relative flex-grow-0">
            <img src="{{ asset('images/2.png') }}" 
                alt="Dark Luxury Watch Template" 
                class="w-full h-auto max-w-full">
        </div>
        <div class="p-4 flex flex-col flex-grow">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-lg font-medium text-gray-800">Nocturne</h3>
                    <p class="text-sm text-gray-500">Sophisticated dark theme with gold highlights</p>
                </div>
            </div>
            <div class="mt-4 flex space-x-3 mt-auto">
                <button onclick="openPreviewModal('/index2')" class="preview-btn flex-1 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm font-medium text-center">
                    Live Preview
                </button>
                <button class="use-template-btn flex-1 px-4 py-2 bg-white border border-indigo-600 text-indigo-600 rounded-md text-sm font-medium">
                    Use Template
                </button>
            </div>
        </div>
    </div>

    <!-- Template 3 - Scandinavian Minimal -->
    <div class="template-card bg-white rounded-lg shadow-sm overflow-hidden flex flex-col h-full">
        <div class="relative flex-grow-0">
            <img src="{{ asset('images/3.png') }}" 
                alt="Scandinavian Watch Template" 
                class="w-full h-auto max-w-full">
        </div>
        <div class="p-4 flex flex-col flex-grow">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-lg font-medium text-gray-800">Nordic Time</h3>
                    <p class="text-sm text-gray-500">Minimalist Scandinavian-inspired design template</p>
                </div>
            </div>
            <div class="mt-4 flex space-x-3 mt-auto">
                <button onclick="openPreviewModal('/index3')" class="preview-btn flex-1 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm font-medium text-center">
                    Live Preview
                </button>
                <button class="use-template-btn flex-1 px-4 py-2 bg-white border border-indigo-600 text-indigo-600 rounded-md text-sm font-medium">
                    Use Template
                </button>
            </div>
        </div>
    </div>

    <!-- Template 4 - Modern Premium -->
    <div class="template-card bg-white rounded-lg shadow-sm overflow-hidden flex flex-col h-full">
        <div class="relative flex-grow-0">
            <img src="{{ asset('images/4.png') }}" 
                alt="Modern Premium Watch Template" 
                class="w-full h-auto max-w-full">
            <span class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-medium px-2 py-1 rounded-full">FEATURED</span>
        </div>
        <div class="p-4 flex flex-col flex-grow">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-lg font-medium text-gray-800">Modern Horology</h3>
                    <p class="text-sm text-gray-500">Contemporary design with premium aesthetics</p>
                </div>
            </div>
            <div class="mt-4 flex space-x-3 mt-auto">
                <button onclick="openPreviewModal('/index4')" class="preview-btn flex-1 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm font-medium text-center">
                    Live Preview
                </button>
                <button class="use-template-btn flex-1 px-4 py-2 bg-white border border-indigo-600 text-indigo-600 rounded-md text-sm font-medium">
                    Use Template
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Template Preview Modal -->
<div id="template-preview-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-10 mx-auto p-0 border w-11/12 md:w-4/5 lg:w-3/4 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center p-4 border-b">
            <h3 class="text-xl font-semibold text-gray-800">Template Preview</h3>
            <button onclick="closePreviewModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="p-0">
            <iframe id="template-preview-frame" src="" class="w-full h-[70vh] border-0"></iframe>
        </div>
        
        <div class="flex justify-end space-x-3 p-4 border-t">
            <button type="button" onclick="closePreviewModal()" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                Close
            </button>
            <button type="button" id="use-template" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                Use This Template
            </button>
        </div>
    </div>
</div>

<script>
    // Template preview functionality
    const previewModal = document.getElementById('template-preview-modal');
    const previewFrame = document.getElementById('template-preview-frame');
    
    function openPreviewModal(url) {
        previewFrame.src = url;
        previewModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closePreviewModal() {
        previewModal.classList.add('hidden');
        previewFrame.src = "about:blank";
        document.body.style.overflow = 'auto';
    }

    // Use Template button in modal
    document.getElementById('use-template').addEventListener('click', function() {
        alert('Template selected! You will be redirected to the editor.');
        closePreviewModal();
    });

    // Use Template buttons on cards
    document.querySelectorAll('.use-template-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            alert('Template selected! You will be redirected to the editor.');
        });
    });

    // Close modal when clicking outside content
    previewModal.addEventListener('click', function(e) {
        if (e.target === previewModal) {
            closePreviewModal();
        }
    });
</script>

        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <nav class="inline-flex rounded-md shadow">
                <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-indigo-600 font-medium">1</a>
                <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">2</a>
                <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">3</a>
                <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </main>
</div>

@include('includes.d_footer')


