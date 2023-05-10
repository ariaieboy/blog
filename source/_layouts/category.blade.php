@extends('_layouts.main')

@section('body')
    <div class="py-4 lg:py-8">
        <h1 class="pt-5 font-body text-4xl font-semibold md:text-5xl lg:text-6xl">{{ $page->title }}</h1>

        <div class="text-xl font-light">
            @yield('content')
        </div>

        <div class="pt-4 lg:pt-8 flex flex-col gap-4">
            @foreach ($page->posts($posts) as $post)
                @include('_components.post-preview-inline')
            @endforeach
        </div>
    </div>
@stop
