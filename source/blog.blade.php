---
title: Blog
description: The list of blog posts for the site
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.main')

@section('body')
    <div class="py-4 lg:py-8">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-16 h-16 fill-current text-primary"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg>
        </div>

        <h1
            class="pt-5 text-4xl font-semibold text-base-content md:text-5xl lg:text-6xl"
        >
            Blog
        </h1>

        <div class="pt-3 sm:w-3/4">
            <p class="text-xl font-light text-base-content">
                Articles, tutorials, snippets, and everything else.
            </p>
        </div>

        <div class="pt-4 lg:pt-8 flex flex-col gap-4">
            @foreach ($pagination->items as $post)
                @include('_components.post-preview-inline')
            @endforeach
        </div>

        <div class="flex pt-4 lg:pt-8">
            @if ($pagination->pages->count() > 1)
            <div class="btn-group">
                @if ($previous = $pagination->previous)
                <a class="btn" href="{{ $previous }}"
                   title="Previous Page">« Prev</a>
                @endif
                    @foreach ($pagination->pages as $pageNumber => $path)
                        <a class="btn {{ $pagination->currentPage == $pageNumber ? 'btn-active' : '' }}" href="{{ $path }}"
                           title="Go to Page {{ $pageNumber }}">
                            {{ $pageNumber }}
                        </a>

                    @endforeach
                    @if ($next = $pagination->next)
                        <a class="btn" href="{{ $next }}"
                           title="Next Page">Next »</a>
                    @endif
            </div>
            @endif
        </div>
    </div>
@stop
