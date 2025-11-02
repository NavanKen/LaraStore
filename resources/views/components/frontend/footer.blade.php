<footer class="mt-3 bg-white border-t border-gray-200">
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <div>
                <h3 class="mb-4 text-lg font-semibold text-gray-900">Tentang Kami</h3>
                <p class="text-sm text-gray-600">Aplikasi Ini cuman buat tugas Sekolah</p>
            </div>
            <div>
                <h3 class="mb-4 text-lg font-semibold text-gray-900">Tautan Cepat</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('landing') }}" class="text-gray-600 transition hover:text-indigo-600">Home</a></li>
                    <li><a href="{{ route('home') }}" class="text-gray-600 transition hover:text-indigo-600">Products</a></li>
                    <li><a href="#" class="text-gray-600 transition hover:text-indigo-600">Contact</a></li>
                </ul>
            </div>
            <div>
                <h3 class="mb-4 text-lg font-semibold text-gray-900">Contact</h3>
                <p class="text-sm text-gray-600">Email: apanapin@email.com</p>
                <p class="text-sm text-gray-600">Phone: +62 821 781 761</p>
            </div>
        </div>
        <div class="pt-8 mt-8 text-center border-t border-gray-200">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Laravel Dua Belas. All rights reserved.</p>
        </div>
    </div>
</footer>