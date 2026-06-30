<header class="bg-base-200 border-b border-base-300">
    <div class="max-w-2xl mx-auto px-4 h-16 flex items-center justify-between">
        <a href="{{ $page->baseUrl }}" class="font-bold text-lg">{{ $page->siteName }}</a>
        <div class="flex gap-4 text-sm">
            <a href="/about" class="link link-hover {{ $page->isActive('/about') ? 'text-primary' : '' }}">About</a>
            <a href="/contact" class="link link-hover {{ $page->isActive('/contact') ? 'text-primary' : '' }}">Contact</a>
        </div>
    </div>
</header>