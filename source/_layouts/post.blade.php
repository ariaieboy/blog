@extends('_layouts.main')

@php
    $page->type = 'article';
@endphp

@section('body')
    <article class="w-full max-w-2xl mx-auto p-4 prose prose-indigo min-w-0">
        @if ($page->cover_image)
            <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" loading="lazy" class="mb-6 rounded-lg w-full">
        @endif

        <h1 class="!mt-0">{{ $page->title }}</h1>

        <p class="text-sm text-base-content/70 mb-4">{{ date('F j, Y', $page->date) }} • {{ $page->estimated_reading_time }}</p>

        @if ($page->categories)
            <div class="mb-4 not-prose">
                @foreach ($page->categories as $category)
                    <a href="{{ '/blog/categories/' . $category }}" class="btn btn-ghost btn-xs" title="View posts in {{ $category }}">{{ $category }}</a>
                @endforeach
            </div>
        @endif

        <div class="border-b border-gray-200 mb-8 pb-4 overflow-x-auto" v-pre>
            @yield('content')
        </div>

        <div class="my-8">
            @include('_partials.newsletter')
        </div>

        <nav class="flex flex-col sm:flex-row sm:justify-between gap-2 overflow-hidden">
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" class="btn btn-ghost btn-sm text-left truncate max-w-full" title="Older Post: {{ $next->title }}">&larr; {{ $next->title }}</a>
            @endif
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" class="btn btn-ghost btn-sm text-left sm:text-right truncate max-w-full" title="Newer Post: {{ $previous->title }}">{{ $previous->title }} &rarr;</a>
            @endif
        </nav>
    </article>
@endsection
