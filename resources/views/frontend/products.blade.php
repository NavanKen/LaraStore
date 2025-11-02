<x-frontend-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <aside class="w-full lg:w-64 flex-shrink-0">
                <div class="bg-white rounded-lg shadow-sm p-6 sticky top-24">
                    <form action="{{ route('home') }}" method="GET" id="filterForm">
                        <!-- Hidden field untuk sort -->
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                        
                        <!-- Search -->
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-900 mb-3">Cari</h3>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari..."
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <svg class="absolute right-3 top-2.5 h-4 w-4 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-900 mb-3">Kategori</h3>
                            <div class="space-y-2">
                                @if (isset($categories))
                                    @foreach ($categories as $category)
                                        <label
                                            class="flex items-center justify-between cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <div class="flex items-center">
                                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                                    {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                                <span class="ml-2 text-sm text-gray-700">{{ $category->name }}</span>
                                            </div>
                                            <span class="text-xs text-gray-400">({{ $category->products_count ?? 0 }})</span>
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- Apply Filter Button -->
                        <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg text-sm font-medium transition">
                            Terapkan Filter
                        </button>

                        <!-- Reset Button -->
                        @if (request('categories') || request('search'))
                            <button type="button"
                                onclick="window.location.href='{{ route('home', ['sort' => request('sort')]) }}'"
                                class="mt-3 w-full text-sm text-indigo-600 hover:text-indigo-700 font-medium">
                                Reset Semua Filter
                            </button>
                        @endif
                    </form>
                </div>
            </aside>

            <div class="flex-1">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">
                            @if (request('categories') && count(request('categories')) > 0)
                                Produk ({{ count(request('categories')) }} Kategori Dipilih)
                            @else
                                Semua Produk
                            @endif
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Results: {{ $products->total() }} items</p>
                    </div>

                    <div class="flex items-center space-x-2">
                        <label class="text-sm text-gray-700">Urutkan Berdasarkan:</label>
                        <form action="{{ route('home') }}" method="GET" id="sortForm">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            @if(request('categories'))
                                @foreach(request('categories') as $cat)
                                    <input type="hidden" name="categories[]" value="{{ $cat }}">
                                @endforeach
                            @endif
                            <select name="sort" onchange="this.form.submit()"
                                class="text-sm border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Produk
                                    Terbaru</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama Produk
                                </option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga:
                                    Rendah ke Besar</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                                    Harga: Besar ke Rendah</option>
                            </select>
                        </form>
                    </div>
                </div>

                @if ($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div
                                class="flex flex-col justify-between h-full bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                                        class="w-full h-[350px] object-cover object-top">

                                    @if ($product->category)
                                        <div class="absolute top-3 left-3">
                                            <span
                                                class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                                {{ $product->category->name }}
                                            </span>
                                        </div>
                                    @endif

                                    @if ($product->stock <= 0)
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                            <span class="bg-red-500 text-white px-4 py-2 rounded-lg font-semibold">Stok
                                                Habis</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex flex-col flex-1 justify-between p-5">
                                    <div>
                                        <h3
                                            class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2 group-hover:text-indigo-600 transition">
                                            {{ $product->title }}
                                        </h3>
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                            {{ $product->description }}
                                        </p>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <div class="text-2xl font-bold text-indigo-600">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </div>
                                                <div class="text-xs text-gray-500 mt-1">
                                                    Stok: {{ $product->stock }} pcs
                                                </div>
                                            </div>

                                            <a href="{{ route('product.show', $product) }}"
                                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center space-x-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <span>Lihat</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($products->hasPages())
                        <div class="flex justify-between mt-12">
                            {{ $products->links('components.pagination') }}
                        </div>
                    @endif
                @else
                    <div class="text-center py-20">
                        <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="mt-4 text-xl font-semibold text-gray-900">Tidak ada produk tersedia</h3>
                        <p class="mt-2 text-gray-600">Silakan cek kembali nanti!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-frontend-layout>
