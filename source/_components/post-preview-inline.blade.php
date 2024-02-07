<div class="card w-full bg-base-100 shadow-xl">
    <div class="card-body ">
        <a
                class="link link-hover hover:text-primary text-base-content"
                href="{{ $post->getUrl() }}">
            <h2 class="card-title">
                {{$post->title}}
            </h2>
        </a>
        <div class="flex">
            <p class="pr-2 grow-0">
                {{ $post->getDate()->format('F j, Y') }}
            </p>
            <span class="grow-0">//</span>
            <p class="pl-2 grow-0">
                {{$post->estimated_reading_time}} read
            </p></div>
        <div class="card-actions justify-end">
            @if ($post->categories)
                @foreach ($post->categories as $i => $category)
                    <a
                            href="{{ '/blog/categories/' . $category }}"
                            title="View posts in {{ $category }}"
                            class="badge badge-outline link link-hover"
                    >{{ $category }}</a
                    >
                @endforeach
            @endif
        </div>
    </div>
</div>
