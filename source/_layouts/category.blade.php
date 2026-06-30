@extends('_layouts.main')

@section('body')
    <div class="max-w-2xl min-w-2xl mx-auto p-4">
        <h1 class="text-3xl font-bold mb-2">{{ $page->title }}</h1>

        <div class="text-base text-gray-500 mb-8 border-b border-gray-200 pb-6">
            @yield('content')
        </div>

        <div class="space-y-2">
            @foreach ($page->posts($posts) as $post)
                <a href="{{ $post->getUrl() }}" class="block p-4 rounded-lg hover:bg-base-200 transition">
                    <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                    <time class="text-sm opacity-60">{{ $post->getDate()->format('M d, Y') }}</time>
                </a>
            @endforeach
        </div>
    </div>
@stop
