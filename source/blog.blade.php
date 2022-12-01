---
title: Blog
description: The list of blog posts for the site
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.main')

@section('body')
    <div class="py-16 lg:py-20">
        <div>
            <img src="/assets/img/icon-blog.png" alt="icon envelope"/>
        </div>

        <h1
            class="pt-5 font-body text-4xl font-semibold text-primary dark:text-white md:text-5xl lg:text-6xl"
        >
            Blog
        </h1>

        <div class="pt-3 sm:w-3/4">
            <p class="font-body text-xl font-light text-primary dark:text-white">
                Articles, tutorials, snippets, and everything else.
            </p>
        </div>

        <div class="pt-8 lg:pt-12">
            @foreach ($posts as $post)
                @include('_components.post-preview-inline')
            @endforeach
        </div>

        <div class="flex pt-8 lg:pt-16">
            @if ($pagination->pages->count() > 1)
                <nav class="flex text-base my-8">
                    @if ($previous = $pagination->previous)
                        <a
                            href="{{ $previous }}"
                            title="Previous Page"
                            class="group ml-3 flex cursor-pointer items-center border-2 border-primary px-3 py-1 font-body font-medium text-primary transition-colors hover:border-secondary hover:text-secondary dark:border-green-light dark:text-white dark:hover:border-secondary dark:hover:text-secondary"
                        >

                            <i
                                class="bx bx-left-arrow-alt ml-1 text-primary transition-colors group-hover:text-secondary dark:text-white"
                            ></i
                            >
                            Prev
                        </a>
                    @endif

                    @foreach ($pagination->pages as $pageNumber => $path)
                        <a
                            href="{{ $path }}"
                            title="Go to Page {{ $pageNumber }}"
                            class="cursor-pointer mx-2 border-2 {{ $pagination->currentPage == $pageNumber ? 'border-secondary' : 'border-primary' }} px-3 py-1 font-body font-medium text-secondary"
                        >{{ $pageNumber }}</a
                        >
                    @endforeach

                    @if ($next = $pagination->next)
                        <a
                            href="{{ $next }}"
                            title="Next Page"
                            class="group ml-3 flex cursor-pointer items-center border-2 border-primary px-3 py-1 font-body font-medium text-primary transition-colors hover:border-secondary hover:text-secondary dark:border-green-light dark:text-white dark:hover:border-secondary dark:hover:text-secondary"
                        >Next
                            <i
                                class="bx bx-right-arrow-alt ml-1 text-primary transition-colors group-hover:text-secondary dark:text-white"
                            ></i
                            ></a>
                    @endif
                </nav>
            @endif
        </div>
    </div>
@stop
