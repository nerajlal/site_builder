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
        .preview-btn:hover {
            background-color: #be185d;
        }
        .use-template-btn:hover {
            background-color: #fdf2f8;
            color: #be185d;
        }
        .badge-new {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
    </style>
</head>

<div class="flex-1 overflow-y-auto">
    <main class="p-6">
        <!-- Header -->
        <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Boutique Website Templates</h1>
                <p class="text-gray-600">Choose from our professionally designed boutique templates</p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="relative">
                    <input type="text" placeholder="Search templates..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="mb-6 flex overflow-x-auto pb-2">
            @foreach(['All', 'Modern', 'Dark', 'Minimalist', 'Vintage'] as $category)
                <button class="px-4 py-2 mr-2 {{ $loop->first ? 'bg-pink-600 text-white' : 'bg-white border border-gray-300' }} rounded-full text-sm font-medium hover:bg-gray-50">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <!-- Hidden Form for POSTing Template Selection -->
        <form id="templateForm" method="POST" action="{{ route('template.select') }}">
            @csrf
            <input type="hidden" name="template_name" id="templateInput">
            <input type="hidden" name="header_footer_id" value="{{ $website_id }}">
        </form>

        <!-- Templates Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            @php
                $templates = [
                    ['title' => 'Pink Boutique', 'desc' => 'Modern boutique with pink accents and clean design', 'img' => '1.png', 'preview' => '/index1', 'blade' => 'template1.index1', 'badge' => 'NEW', 'label' => 'Popular'],
                    ['title' => 'Dark Luxury', 'desc' => 'Sophisticated dark theme with premium fashion focus', 'img' => '2.png', 'preview' => '/index2', 'blade' => 'template2.index2'],
                    ['title' => 'Minimalist Elegance', 'desc' => 'Clean white design with subtle pink highlights', 'img' => '3.png', 'preview' => '/index3', 'blade' => 'template3.index3'],
                    ['title' => 'Vintage Classic', 'desc' => 'Timeless vintage-inspired boutique design', 'img' => '4.png', 'preview' => '/index4', 'blade' => 'template4.index4'],
                ];
            @endphp

            @foreach($templates as $template)
                <div class="template-card bg-white rounded-lg shadow-sm overflow-hidden flex flex-col h-full">
                    <div class="relative">
                        <img src="{{ asset('images/' . $template['img']) }}" alt="{{ $template['title'] }}" class="w-full h-auto">
                        @if(isset($template['badge']))
                            <span class="absolute top-3 right-3 bg-{{ $template['badge'] === 'NEW' ? 'green' : 'yellow' }}-500 text-white text-xs font-medium px-2 py-1 rounded-full badge-new">
                                {{ $template['badge'] }}
                            </span>
                        @endif
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-medium text-gray-800">{{ $template['title'] }}</h3>
                                <p class="text-sm text-gray-500">{{ $template['desc'] }}</p>
                            </div>
                            @if(isset($template['label']))
                                <span class="bg-pink-100 text-pink-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $template['label'] }}</span>
                            @endif
                        </div>
                        <div class="mt-4 flex space-x-3 mt-auto">
                            <button type="button" onclick="openPreviewModal('{{ $template['preview'] }}')" class="preview-btn flex-1 px-4 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-700 text-sm font-medium">
                                Live Preview
                            </button>
                            <!-- <a href="{{ $template['preview'] }}" target="_blank" class="flex-1 px-4 py-2 bg-gray-200 border border-gray-400 text-gray-700 rounded-md text-sm font-medium text-center hover:bg-gray-300">
                                Full Screen
                            </a> -->
                            <button type="button" class="use-template-btn flex-1 px-4 py-2 bg-white border border-pink-600 text-pink-600 rounded-md text-sm font-medium" onclick="submitTemplate('{{ $template['blade'] }}')">
                                Use Template
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <nav class="inline-flex rounded-md shadow">
                <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </a>
                @for($i = 1; $i <= 3; $i++)
                    <a href="#" class="px-4 py-2 border-t border-b border-gray-300 {{ $i === 1 ? 'text-pink-600 font-medium' : 'text-gray-500 hover:bg-gray-50' }}">
                        {{ $i }}
                    </a>
                @endfor
                <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </main>
</div>

<!-- Modal -->
<div id="template-preview-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto z-50">
    <div class="relative top-10 mx-auto w-11/12 md:w-4/5 lg:w-3/4 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center p-4 border-b">
            <h3 class="text-xl font-semibold text-gray-800">Template Preview</h3>
            <button onclick="closePreviewModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-0">
            <iframe id="template-preview-frame" class="w-full h-[70vh] border-0"></iframe>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    function openPreviewModal(url) {
        document.getElementById('template-preview-modal').classList.remove('hidden');
        document.getElementById('template-preview-frame').src = url;
        document.body.style.overflow = 'hidden';
    }

    function closePreviewModal() {
        document.getElementById('template-preview-modal').classList.add('hidden');
        document.getElementById('template-preview-frame').src = 'about:blank';
        document.body.style.overflow = 'auto';
    }

    function submitTemplate(templateName) {
        const form = document.getElementById('templateForm');
        document.getElementById('templateInput').value = templateName;
        form.submit();
    }

    // Close modal on background click
    document.getElementById('template-preview-modal').addEventListener('click', function (e) {
        if (e.target === this) closePreviewModal();
    });
</script>

@include('includes.d_footer')
