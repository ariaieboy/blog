@extends('_layouts.main')

@section('body')
    <div class="max-w-2xl mx-auto p-4 pt-12 md:pt-24">
        <div class="flex flex-col items-center text-center">
            <h1 class="text-5xl sm:text-6xl font-light leading-none mb-2 opacity-60">404</h1>
            <h2 class="text-xl sm:text-3xl font-bold">Page not found.</h2>

            <hr class="block w-full max-w-xs mx-auto border my-8 opacity-30">

            <p class="text-sm sm:text-base opacity-70">
                The page you're looking for doesn't exist.
                <a href="{{ $page->baseUrl }}" class="link">Go home</a>.
            </p>
        </div>
    </div>
@endsection
