<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="border p-8 mb-8 shadow-lg bg-gradient-to-r bg-gray-800 rounded-xl border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="mb-2 text-2xl font-bold text-white">Selamat datang kembali, {{ Auth::user()->name }}!</h3>
                        <p class="text-indigo-100">Laravel 12</p>
                    </div>
                   
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div class="p-6 bg-white border border-gray-200 shadow-sm dark:bg-gray-800 rounded-xl dark:border-gray-700">
                    <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Aksi Cepat</h3>
                    <div class="space-y-3">
                        <a href="{{ route('products.create') }}" class="flex items-center p-3 transition rounded-lg bg-indigo-50 dark:bg-indigo-900/20 hover:bg-indigo-100 dark:hover:bg-indigo-900/30 group">
                            <div class="p-2 mr-3 bg-indigo-600 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400">Tambah Produk Baru</span>
                        </a>
                        <a href="{{ route('products.index') }}" class="flex items-center p-3 transition rounded-lg bg-gray-50 dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <div class="p-2 mr-3 bg-gray-600 rounded-lg dark:bg-gray-600">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-gray-100 group-hover:text-gray-600 dark:group-hover:text-gray-400">Lihat Semua Produk</span>
                        </a>
                        <a href="{{ route('home') }}" class="flex items-center p-3 transition rounded-lg bg-gray-50 dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <div class="p-2 mr-3 bg-gray-600 rounded-lg dark:bg-gray-600">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-gray-100 group-hover:text-gray-600 dark:group-hover:text-gray-400">Lihat App</span>
                        </a>
                    </div>
                </div>

                <div class="p-6 bg-white border border-gray-200 shadow-sm lg:col-span-2 dark:bg-gray-800 rounded-xl dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Produk Terbaru</h3>
                        <a href="{{ route('products.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">Lihat semua</a>
                    </div>
                    <div class="space-y-3">
                        @forelse(\App\Models\Product::latest()->take(3)->get() as $product)
                            <div class="flex items-center justify-between p-3 transition rounded-lg bg-gray-50 dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="object-cover w-12 h-12 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ Str::limit($product->title, 30) }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Stok: {{ $product->stock }} pcs</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <a href="{{ route('products.edit', $product) }}" class="text-xs text-indigo-600 dark:text-indigo-400 hover:text-indigo-700">Edit</a>
                                </div>
                            </div>
                        @empty
                            <div class="py-8 text-center text-gray-500 dark:text-gray-400">
                                <p>Belum ada produk. Buat produk pertama Anda!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
