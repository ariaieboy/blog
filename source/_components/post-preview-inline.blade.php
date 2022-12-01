<div class="border-b border-grey-lighter {{ !$loop->first?'pt-10':'' }} pb-8">
    @if ($post->categories)
        @foreach ($post->categories as $i => $category)
            <a
                href="{{ '/blog/categories/' . $category }}"
                title="View posts in {{ $category }}"
                class="mb-4 inline-block rounded-full bg-green-light px-2 py-1 font-body text-sm text-green"
            >{{ $category }}</a
            >
        @endforeach
    @endif

    <a
        href="{{ $post->getUrl() }}"
        class="block font-body text-lg font-semibold text-primary transition-colors hover:text-green dark:text-white dark:hover:text-secondary"
    >{{ $post->title }}</a
    >
    <div class="flex items-center pt-4">
        <p class="pr-2 font-body font-light text-primary dark:text-white">
            {{ $post->getDate()->format('F j, Y') }}
        </p>
        <span class="font-body text-grey dark:text-white">//</span>
        <p class="pl-2 font-body font-light text-primary dark:text-white">
            4 min read
        </p>
    </div>
</div>
