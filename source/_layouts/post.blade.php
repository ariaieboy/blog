@extends('_layouts.main')

@php
    $page->type = 'article';
@endphp

@section('body')
    <div class="pt-16 lg:pt-20">
        <div class="border-b border-grey-lighter pb-8 sm:pb-12">
            @if ($page->categories)
                @foreach ($page->categories as $i => $category)
                    <a
                        href="{{ '/blog/categories/' . $category }}"
                        title="View posts in {{ $category }}"
                        class="mb-4 inline-block rounded-full bg-green-light px-2 py-1 font-body text-sm text-green"
                    >{{ $category }}</a
                    >
                @endforeach
            @endif
            <h2
                class="block font-body text-3xl font-semibold leading-tight text-primary dark:text-white sm:text-4xl md:text-5xl"
            >
                {{ $page->title }}
            </h2>
            <div class="flex items-center pt-5 sm:pt-8">
                <p class="pr-2 font-body font-light text-primary dark:text-white">
                    {{ date('F j, Y', $page->date) }}
                </p>
                <span class="vdark:text-white font-body text-grey">//</span>
                <p class="pl-2 font-body font-light text-primary dark:text-white">
                    4 min read
                </p>
            </div>
        </div>
        <div
            class="prose prose max-w-none border-b border-grey-lighter py-8 dark:prose-dark sm:py-12"
        >
            @yield('content')
        </div>
    </div>

    <div class="flex justify-between gap-2 text-sm md:text-base text-primary dark:text-white py-2">
        <div>
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}" class="flex items-center">
                    <img src="/assets/img/long-arrow-left.png" class="mr-1" alt="arrow left">
                    <span>{{ $next->title }}</span>
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}" class="flex items-center">
                    <span>{{ $previous->title }}</span>
                    <img src="/assets/img/long-arrow-right.png" class="ml-1" alt="arrow right">
                </a>
            @endif
        </div>
    </div>
@endsection
