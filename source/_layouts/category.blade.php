@extends('_layouts.main')

@section('body')
    <div class="py-16 lg:py-20">
        <h1 class="pt-5 font-body text-4xl font-semibold text-primary dark:text-white md:text-5xl lg:text-6xl">{{ $page->title }}</h1>

        <div class="font-body text-xl font-light text-primary dark:text-white">
            @yield('content')
        </div>
        <div class="pt-8 lg:pt-12">
            @foreach ($page->posts($posts) as $post)
                @include('_components.post-preview-inline')
            @endforeach
        </div>
    </div>
@stop
