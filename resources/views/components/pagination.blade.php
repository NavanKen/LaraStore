@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center">
        <div class="flex items-center space-x-1">
            @if ($paginator->onFirstPage())
                <span class="flex items-center justify-center w-10 h-10 text-gray-400 bg-white border border-gray-200 rounded-lg cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center w-10 h-10 text-gray-600 transition-all duration-200 bg-white border border-gray-200 rounded-lg hover:bg-indigo-50 hover:border-indigo-300 hover:text-indigo-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="flex items-center justify-center w-10 h-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-default">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="flex items-center justify-center w-10 h-10 font-semibold text-white bg-indigo-600 border border-indigo-600 rounded-lg shadow-sm">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="flex items-center justify-center w-10 h-10 font-medium text-gray-700 transition-all duration-200 bg-white border border-gray-200 rounded-lg hover:bg-indigo-50 hover:border-indigo-300 hover:text-indigo-600">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center w-10 h-10 text-gray-600 transition-all duration-200 bg-white border border-gray-200 rounded-lg hover:bg-indigo-50 hover:border-indigo-300 hover:text-indigo-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            @else
                <span class="flex items-center justify-center w-10 h-10 text-gray-400 bg-white border border-gray-200 rounded-lg cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            @endif
        </div>
    </nav>

    <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">      
            Menampilkan 
            <span class="font-semibold text-gray-900">{{ $paginator->firstItem() }}</span>
            hingga
            <span class="font-semibold text-gray-900">{{ $paginator->lastItem() }}</span>
            Dari
            <span class="font-semibold text-gray-900">{{ $paginator->total() }}</span>
            Hasil
        </p>
    </div>
@endif