@include('includes.d_head')


            <!-- Scrollable Content -->
            <div class="flex-1 overflow-y-auto">
                <main class="flex-1 overflow-y-auto p-6">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">My Websites</h1>
                    </div>

                    @if(count($websites) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($websites as $website)
                                <a href="/addproducts/{{ $website->id }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300 block">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-lg font-semibold text-gray-800">{{ $website->site_name }}</p>
                                            <p class="text-sm text-gray-500">Created on: {{ $website->created_at->format('d M Y') }}</p>
                                        </div>
                                        <div class="p-3 rounded-full bg-pink-100 text-pink-600">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-16 bg-white rounded-lg shadow-lg">
                            <i class="fas fa-sitemap text-6xl text-gray-300"></i>
                            <h3 class="mt-4 text-2xl font-bold text-gray-800">No websites found.</h3>
                            <p class="text-gray-500 mt-2">You haven't created any websites yet.</p>
                            <a href="/template" class="mt-6 inline-block px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 font-medium">
                                Create a new website
                            </a>
                        </div>
                    @endif
                </main>
            </div>

            


            @include('includes.d_footer')