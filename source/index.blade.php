@extends('_layouts.main')

@section('hide_header')
    true
@endsection

@section('body')
    @include('_partials.hero')

    <section class="py-12 px-4 flex-1">
        <div class="max-w-2xl min-w-2xl mx-auto">
            <h2 class="text-2xl font-bold mb-8">Latest Posts</h2>

            <div class="space-y-2">
                @foreach ($posts as $post)
                    <a href="{{ $post->getUrl() }}" class="block p-4 rounded-lg hover:bg-base-200 transition">
                        <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                        <time class="text-sm opacity-60">{{ $post->getDate()->format('M d, Y') }}</time>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
