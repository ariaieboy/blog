<!DOCTYPE html>
<html lang="en" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta name="theme-color" content="#1e1e2a">

        <!-- Preconnect for newsletter -->
        <link rel="preconnect" href="https://ariaieboy.kit.com">
        <link rel="dns-prefetch" href="https://ariaieboy.kit.com">

        <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:type" content="{{ $page->type ?? 'website' }}" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">
        <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        @viteRefresh()
        <link rel="preload" href="{{ vite('source/_assets/css/main.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}"></noscript>
{{--        <script defer type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>--}}
        @stack('head')
    </head>

    <body class="min-h-screen flex flex-col">
        @if (! $__env->yieldContent('hide_header'))
            @include('_partials.header')
        @endif

        @yield('body')
        @include('_partials.footer')
        @stack('scripts')
    </body>
</html>
