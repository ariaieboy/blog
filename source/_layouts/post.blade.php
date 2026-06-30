@extends('_layouts.main')

@php
    $page->type = 'article';
@endphp

@section('body')
    <article class="max-w-2xl min-w-2xl mx-auto p-4 prose prose-indigo">
        @if ($page->cover_image)
            <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="mb-6 rounded-lg w-full">
        @endif

        <h1 class="!mt-0">{{ $page->title }}</h1>

        <p class="text-sm text-gray-500 mb-4">{{ date('F j, Y', $page->date) }} • {{ $page->estimated_reading_time }}</p>

        @if ($page->categories)
            <div class="mb-4">
                @foreach ($page->categories as $category)
                    <a href="{{ '/blog/categories/' . $category }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 text-xs font-semibold rounded px-2 py-1 mr-2" title="View posts in {{ $category }}">{{ $category }}</a>
                @endforeach
            </div>
        @endif

        <div class="border-b border-gray-200 mb-8 pb-4" v-pre>
            @yield('content')
        </div>

        <nav class="flex justify-between text-sm text-gray-600">
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" class="hover:underline" title="Older Post: {{ $next->title }}">&larr; {{ $next->title }}</a>
            @endif
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" class="hover:underline" title="Newer Post: {{ $previous->title }}">{{ $previous->title }} &rarr;</a>
            @endif
        </nav>
    </article>
@endsection
