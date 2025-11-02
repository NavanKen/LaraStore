<x-frontend-layout>
    <div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col gap-6 justify-center items-center">
                <h1 class="font-bold text-3xl text-gray-900 pb-2">Produk Unggulan</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($featuredProduct as $product)
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                <a href="{{ route('home') }}" class="mt-7 inline-flex items-center">
                    <span class="underline underline-offset-2 text-gray-600">Tampilkan Semua Produk</span>
                    <span class="ml-1">&gt;</span>
                </a>
            </div>
            <div class="py-16 mt-8">
                <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 text-center">
                    <div>
                        <div class="flex justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 11c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1zm-1 8a8 8 0 01-8-8V5l8-3 8 3v6a8 8 0 01-8 8z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Aman & Terpercaya</h3>
                        <p class="text-gray-600 leading-relaxed">Belanja (eh, daftar) di sini dijamin <i>insyaallah</i>
                            aman, karena Laravel 12 menjaga datamu seperti menjaga hati admin.</p>
                    </div>
    
                    <div>
                        <div class="flex justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Keamanan Terjamin</h3>
                        <p class="text-gray-600 leading-relaxed">Website ini dibangun dengan Laravel 12 — framework modern
                            yang menjaga data kamu dengan sistem terenkripsi.</p>
                    </div>
    
                    <div>
                        <div class="flex justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h18M3 12h18m-7 5h7" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Akses Mudah</h3>
                        <p class="text-gray-600 leading-relaxed">Tidak perlu repot, cukup buka dari browser favoritmu, semua
                            proses cepat dan responsif.</p>
                    </div>
                </div>
            </div>
             <div class="flex items-center justify-center flex-col gap-6 mt-8">
                <h1 class="font-bold text-3xl text-gray-900 pb-2">Produk Terbaru</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($latestProduct as $product)
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                <a href="{{ route('home') }}" class="mt-7 inline-flex items-center justify-end">
                    <span class="underline underline-offset-2 text-gray-600">Tampilkan Semua Produk</span>
                    <span class="ml-1">&gt;</span>
                </a>
            </div>
        </div>
    </div>
</x-frontend-layout>
