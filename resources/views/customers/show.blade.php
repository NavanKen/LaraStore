<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Customer
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Nama Customer</label>
                        <p class="text-lg text-gray-900 dark:text-gray-100">{{ $customer->name }}</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">No Member</label>
                        <p class="text-lg text-gray-900 dark:text-gray-100">{{ $customer->no_member }}</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Telepon</label>
                        <p class="text-lg text-gray-900 dark:text-gray-100">{{ $customer->telp }}</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Alamat</label>
                        <p class="text-gray-900 dark:text-gray-100">{{ $customer->alamat }}</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Jenis Kelamin</label>
                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                            {{ $customer->gender == 'laki' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400' : 'bg-pink-100 text-pink-800 dark:bg-pink-900/30 dark:text-pink-400' }}">
                            {{ ucfirst($customer->gender) }}
                        </span>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Dibuat Pada</label>
                        <p class="text-gray-900 dark:text-gray-100">{{ $customer->created_at->format('d M Y H:i') }}</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Terakhir Diupdate</label>
                        <p class="text-gray-900 dark:text-gray-100">{{ $customer->updated_at->format('d M Y H:i') }}</p>
                    </div>

                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('customers.index') }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition">
                            Kembali
                        </a>
                        <a href="{{ route('customers.edit', $customer) }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
