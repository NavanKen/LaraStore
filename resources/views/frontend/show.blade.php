<x-frontend-layout>
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('home') }}" class="inline-flex items-center text-gray-700 transition hover:text-indigo-600">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Produk
            </a>
        </div>

        <div class="overflow-hidden bg-white shadow-lg rounded-xl">
            <div class="grid grid-cols-1 gap-8 p-8 md:grid-cols-2">
                <div>
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->title }}" 
                         class="w-full h-[830px] rounded-lg shadow-md object-center">
                </div>
                <div class="space-y-6">
                    <div>
                        <h1 class="mb-2 text-3xl font-bold text-gray-900">{{ $product->title }}</h1>
                        <div class="flex items-center space-x-3">
                            <span class="text-4xl font-bold text-indigo-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                            @if($product->stock > 0)
                                <span class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-full">
                                    Stok Tersedia
                                </span>
                            @else
                                <span class="px-3 py-1 text-sm font-semibold text-red-800 bg-red-100 rounded-full">
                                    Stok Habis
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-200">
                        <h3 class="mb-3 text-lg font-semibold text-gray-900">Deskripsi Produk</h3>
                        <p class="leading-relaxed text-gray-700">{{ $product->description }}</p>
                    </div>

                    <div class="pt-6 border-t border-gray-200">
                        <h3 class="mb-3 text-lg font-semibold text-gray-900">Informasi Produk</h3>
                        <dl class="space-y-3">
                            @if($product->category)
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Kategori:</dt>
                                    <dd class="font-medium text-gray-900">
                                        <span class="px-3 py-1 text-sm font-semibold text-indigo-800 bg-indigo-100 rounded-full">
                                            {{ $product->category->name }}
                                        </span>
                                    </dd>
                                </div>
                            @endif
                            <div class="flex justify-between">
                                <dt class="text-gray-600">Stok:</dt>
                                <dd class="font-medium text-gray-900">{{ $product->stock }} pcs</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-gray-600">Ditambahkan:</dt>
                                <dd class="font-medium text-gray-900">{{ $product->created_at->format('d M Y') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend-layout>

