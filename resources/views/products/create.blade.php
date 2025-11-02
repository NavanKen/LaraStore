<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('products.index') }}" class="mr-4 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Buat Produk Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Judul Produk
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('title') border-red-500 @enderror" 
                                required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Deskripsi
                            </label>
                            <textarea name="description" id="description" rows="4" 
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('description') border-red-500 @enderror" 
                                required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Kategori
                            </label>
                            <select name="category_id" id="category_id" 
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('category_id') border-red-500 @enderror">
                                <option value="">Pilih Kategori (Opsional)</option>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Harga (Rp)
                                </label>
                                <input type="number" name="price" id="price" value="{{ old('price') }}" min="0" 
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('price') border-red-500 @enderror" 
                                    required>
                                @error('price')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="stock" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Stock
                                </label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" min="0" 
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('stock') border-red-500 @enderror" 
                                    required>
                                @error('stock')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Gambar
                            </label>
                            <div class="flex justify-center px-6 pt-5 pb-6 mt-1 transition border-2 border-gray-300 border-dashed rounded-lg dark:border-gray-600 hover:border-indigo-500">
                                <div class="space-y-1 text-center">
                                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                        <label for="image" class="relative flex items-center justify-center w-40 font-medium text-indigo-600 bg-white rounded-md cursor-pointer dark:bg-gray-800 dark:text-indigo-400 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="image" name="image" type="file" class="sr-only" accept="image/*" required onchange="previewImage(event)">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                            <div id="imagePreview" class="hidden mt-4">
                                <img id="preview" class="mx-auto rounded-lg max-h-64" alt="Image preview">
                            </div>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end pt-6 space-x-3 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('products.index') }}" class="px-6 py-2 text-gray-700 transition border border-gray-300 rounded-lg dark:border-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                Batal
                            </a>
                            <button type="submit" class="px-6 py-2 text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700">
                                Buat Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
