@extends('_layouts.main')

@section('hide_header')
    true
@endsection

@section('body')
    @include('_partials.hero')

    <section class="py-12 px-4 flex-1">
        <div class="max-w-2xl min-w-2xl mx-auto">
            <h2 class="text-2xl font-bold mb-8">Posts</h2>

            @php $grouped = $posts->groupBy(fn($post) => $post->getDate()->format('Y')) @endphp

            @foreach ($grouped as $year => $yearPosts)
                <h3 class="text-lg font-bold mb-4 mt-8 first:mt-0">{{ $year }}</h3>

                <div class="space-y-2">
                    @foreach ($yearPosts as $post)
                        <a href="{{ $post->getUrl() }}" class="block p-4 rounded-lg hover:bg-base-200 transition">
                            <h4 class="text-base font-semibold">{{ $post->title }}</h4>
                            <time class="text-sm opacity-60">{{ $post->getDate()->format('M d') }}</time>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
@endsection
