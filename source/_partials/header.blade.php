<header class="navbar bg-base-200 border-b border-base-300">
    <div class="flex-1">
        <a href="{{ $page->baseUrl }}" class="btn btn-ghost text-xl">
            {{ $page->siteName }}
        </a>
    </div>
    <div class="flex-none gap-2">
        <a href="/blog" class="btn btn-ghost btn-sm {{ $page->isActive('/blog') ? 'text-primary' : '' }}">Blog</a>
        <a href="/about" class="btn btn-ghost btn-sm {{ $page->isActive('/about') ? 'text-primary' : '' }}">About</a>
        <a href="/contact" class="btn btn-ghost btn-sm {{ $page->isActive('/contact') ? 'text-primary' : '' }}">Contact</a>
    </div>
</header>