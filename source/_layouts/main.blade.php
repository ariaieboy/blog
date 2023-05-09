<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

    <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
    <meta property="og:type" content="{{ $page->type ?? 'website' }}"/>
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}"/>

    <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

    <link rel="home" href="{{ $page->baseUrl }}">
    <link rel="icon" href="/favicon.ico">
    <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

    @if ($page->production)
        <!-- Insert analytics code here -->
    @endif
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
</head>

<body class="bg-base-300">

<div id="main" class="container mx-auto">
    {{--  header  --}}
    <div class="py-4 lg:py-6">
        <div class="navbar bg-base-100 rounded-lg">
            <div class="navbar-start">
                <a href="/" class="btn btn-ghost normal-case text-xl flex items-center">
      <span href="/" class="mr-2 h-10 w-10 rounded-full">
        <img src="/assets/img/logo.png" alt="logo"/>
      </span>
                    <p
                            class="font-body text-2xl font-bold text-primary dark:text-white"
                    >
                        AriaieBOY
                    </p>
                </a>
            </div>
            <div class="navbar-end hidden lg:flex font-bold">
                <ul class="menu menu-horizontal px-1">
                    <li><a href="/">Home</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/uses">Uses</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            <div class="navbar-end lg:hidden font-bold">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h8m-8 6h16"/>
                        </svg>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="/">Home</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/uses">Uses</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    {{--  end header  --}}

    <div>
        @yield('body')
    </div>

    <div
            class="flex flex-col items-center justify-between border-t border-grey-lighter py-10 sm:flex-row sm:py-12"
    >
        <div class="mr-auto flex flex-col items-center sm:flex-row">
            <a href="/" class="mr-auto sm:mr-6 h-10 w-10  bg-primary rounded-full">
                <img src="/assets/img/logo.png" alt="logo"/>
            </a>
            <p class="pt-5 font-body font-light text-primary dark:text-white sm:pt-0">
                ©2022{{(date('Y')!=='2022'?"-".date('Y'):'')}} AriaieBOY.
            </p>
        </div>
        <div class="mr-auto flex items-center pt-5 sm:mr-0 sm:pt-0">

            <a href="https://github.com/ariaieboy" target="_blank">
                <i
                        class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-github"
                ></i>
            </a>

            <a href="https://twitter.com/ariaieboy.ir" target="_blank">
                <i
                        class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-twitter"
                ></i>
            </a>
            <a href="https://phpc.social/@ariaieboy" target="_blank">
                <i
                        class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-mastodon"
                ></i>
            </a>
            {{--                <a href="https://instagram.com/ariaieboy" target="_blank">--}}
            {{--                    <i--}}
            {{--                        class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-instagram"--}}
            {{--                    ></i>--}}
            {{--                </a>--}}
            {{--                <a href="https://t.me/ariaieboy" target="_blank">--}}
            {{--                    <i--}}
            {{--                        class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-telegram"--}}
            {{--                    ></i>--}}
            {{--                </a>--}}
            <a href="/blog/feed.atom" target="_blank">
                <i
                        class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bx-rss"
                ></i>
            </a>
        </div>
    </div>

</div>
<script src="{{ mix('js/main.js', 'assets/build') }}"></script>
<!-- Matomo -->
<script>
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function () {
        var u = "//stats.rakolo.com/";
        _paq.push(['setTrackerUrl', u + 'matomo.php']);
        _paq.push(['setSiteId', '2']);
        var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
        g.async = true;
        g.src = u + 'matomo.js';
        s.parentNode.insertBefore(g, s);
    })();
</script>
<!-- End Matomo Code -->
@stack('scripts')
</body>
</html>
