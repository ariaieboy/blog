---
title: Blog
description: The list of blog posts for the site
---
@extends('_layouts.main')

@section('body')
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-3xl font-bold mb-8">Blog</h1>

        @php $grouped = $posts->groupBy(fn($post) => $post->getDate()->format('Y')) @endphp

        @foreach ($grouped as $year => $yearPosts)
            <h2 class="text-lg font-bold mb-4 mt-8 first:mt-0">{{ $year }}</h2>

            <div class="space-y-2">
                @foreach ($yearPosts as $post)
                    <a href="{{ $post->getUrl() }}" class="block p-4 rounded-lg hover:bg-base-200 transition">
                        <h3 class="text-base font-semibold">{{ $post->title }}</h3>
                        <time class="text-sm opacity-60">{{ $post->getDate()->format('M d') }}</time>
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
@stop
