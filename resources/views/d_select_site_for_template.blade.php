@include('includes.d_head')

<div class="flex-1 overflow-y-auto">
    <main class="flex-1 overflow-y-auto p-6">
        <div class="mb-6 flex flex-col md:flex-row items-start md:items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Select a Site</h1>
                <p class="text-gray-600">Choose the website for which you want to select a template.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($headerFooters as $site)
                <a href="/template/select/{{ $site->id }}"
                   class="bg-white rounded-lg shadow p-6 hover:shadow-md transition-shadow">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-laptop text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">{{ $site->site_name }}</h3>
                        <p class="text-sm text-gray-500">{{ $site->footer_text }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    No sites available. Please create one first.
                </div>
            @endforelse
        </div>
    </main>
</div>

@include('includes.d_footer')
