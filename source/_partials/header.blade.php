<header class="bg-base-200 border-b border-base-300">
    <div class="max-w-2xl mx-auto px-4 py-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 sm:gap-0">
        <a href="{{ $page->baseUrl }}" class="flex items-center gap-2 font-bold text-lg">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            {{ $page->siteName }}
        </a>
        <div class="flex flex-wrap gap-2">
            <a href="/blog" class="btn btn-ghost {{ $page->isActive('/blog') ? 'text-primary' : '' }}">Blog</a>
            <a href="/uses" class="btn btn-ghost {{ $page->isActive('/uses') ? 'text-primary' : '' }}">Uses</a>
            <a href="/about" class="btn btn-ghost {{ $page->isActive('/about') ? 'text-primary' : '' }}">About</a>
            <a href="/contact" class="btn btn-ghost {{ $page->isActive('/contact') ? 'text-primary' : '' }}">Contact</a>
        </div>
    </div>
</header>