<nav class="sticky top-0 z-50 bg-white shadow-sm">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-4">
                <div>
                    <a href="{{ route('home') }}" class="flex items-center">
                        <x-application-logo class="block w-auto text-indigo-600 fill-current h-9" />
                        <span class="ml-2 text-xl font-bold text-gray-900">LaraStore</span>
                    </a>
                </div>
            </div>

            <div class="flex items-center">
                <div class="flex items-center space-x-4 border-r border-gray-300 pr-4">
                    <a href="{{ route('landing') }}" class="py-2 text-sm font-medium text-gray-700 transition rounded-md hover:text-indigo-600" href="">Home</a>
                    <a href="{{ route('home') }}" class="py-2 text-sm font-medium text-gray-700 transition rounded-md hover:text-indigo-600" href="">Produk</a>
                </div>
                <div class="space-x-2">
                    @auth
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 text-sm font-medium text-gray-700 transition rounded-md hover:text-indigo-600">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium text-gray-700 transition rounded-md hover:text-indigo-600">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700">
                        Register
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>