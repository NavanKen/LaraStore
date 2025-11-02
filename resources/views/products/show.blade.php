<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('products.index') }}" class="mr-4 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ __('Detail Produk') }}
                </h2>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition bg-red-600 rounded-lg hover:bg-red-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-8">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                        <div>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="w-full h-auto rounded-lg shadow-lg">
                        </div>

                        <div class="space-y-6">
                            <div>
                                <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $product->title }}</h3>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $product->stock > 0 ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' }}">
                                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </div>

                            <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                                <h4 class="mb-2 text-sm font-medium tracking-wider text-gray-500 uppercase dark:text-gray-400">Deskripsi</h4>
                                <p class="leading-relaxed text-gray-700 dark:text-gray-300">{{ $product->description }}</p>
                            </div>

                            <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                                <h4 class="mb-3 text-sm font-medium tracking-wider text-gray-500 uppercase dark:text-gray-400">Detail Produk</h4>
                                <dl class="space-y-3">
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600 dark:text-gray-400">Stock :</dt>
                                        <dd class="font-medium text-gray-900 dark:text-gray-100">{{ $product->stock }} pcs</dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600 dark:text-gray-400">Product ID:</dt>
                                        <dd class="text-xs font-medium text-gray-900 dark:text-gray-100">{{ $product->id }}</dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600 dark:text-gray-400">Dibuat Pada :</dt>
                                        <dd class="font-medium text-gray-900 dark:text-gray-100">{{ $product->created_at->format('M d, Y') }}</dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600 dark:text-gray-400">Terakhir Di Upadate:</dt>
                                        <dd class="font-medium text-gray-900 dark:text-gray-100">{{ $product->updated_at->format('M d, Y') }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
