<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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


    <link
        crossorigin="crossorigin"
        href="https://fonts.gstatic.com"
        rel="preconnect"
    />

    <link
        as="style"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="preload"
    />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    />

    <link
        rel="stylesheet"
        href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
    />
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
</head>

<body
    x-data="global()"
    x-init="themeInit()"
    :class="isMobileMenuOpen ? 'max-h-screen overflow-hidden relative' : ''"
    class="dark:bg-primary"
>

<div id="main">
    <div class="container mx-auto">
        <div class="flex items-center justify-between py-6 lg:py-10">
            <a href="/" class="flex items-center">
      <span href="/" class="mr-2 h-10 w-10 bg-primary rounded-full">
        <img src="/assets/img/logo.png" alt="logo"/>
      </span>
                <p
                    class="hidden font-body text-2xl font-bold text-primary dark:text-white lg:block"
                >
                    AriaieBOY
                </p>
            </a>
            <div class="flex items-center lg:hidden">
                <i
                    class="bx mr-8 cursor-pointer text-3xl text-primary dark:text-white"
                    @click="themeSwitch()"
                    :class="isDarkMode ? 'bxs-sun' : 'bxs-moon'"
                ></i>

                <svg
                    width="24"
                    height="15"
                    xmlns="http://www.w3.org/2000/svg"
                    @click="isMobileMenuOpen = true"
                    class="fill-current text-primary dark:text-white"
                >
                    <g fill-rule="evenodd">
                        <rect width="24" height="3" rx="1.5"/>
                        <rect x="8" y="6" width="16" height="3" rx="1.5"/>
                        <rect x="4" y="12" width="20" height="3" rx="1.5"/>
                    </g>
                </svg>
            </div>
            <div class="hidden lg:block">
                <ul class="flex items-center">

                    <li class="group relative mr-6 mb-1">
                        <div
                            class="absolute left-0 bottom-0 z-20 h-0 w-full opacity-75 transition-all group-hover:h-2 group-hover:bg-yellow"
                        ></div>
                        <a
                            href="/"
                            class="relative z-30 block px-2 font-body text-lg font-medium text-primary transition-colors group-hover:text-green dark:text-white dark:group-hover:text-secondary"
                        >Home</a
                        >
                    </li>

                    <li class="group relative mr-6 mb-1">
                        <div
                            class="absolute left-0 bottom-0 z-20 h-0 w-full opacity-75 transition-all group-hover:h-2 group-hover:bg-yellow"
                        ></div>
                        <a
                            href="/blog"
                            class="relative z-30 block px-2 font-body text-lg font-medium text-primary transition-colors group-hover:text-green dark:text-white dark:group-hover:text-secondary"
                        >Blog</a
                        >
                    </li>

                    <li class="group relative mr-6 mb-1">
                        <div
                            class="absolute left-0 bottom-0 z-20 h-0 w-full opacity-75 transition-all group-hover:h-2 group-hover:bg-yellow"
                        ></div>
                        <a
                            href="/uses"
                            class="relative z-30 block px-2 font-body text-lg font-medium text-primary transition-colors group-hover:text-green dark:text-white dark:group-hover:text-secondary"
                        >Uses</a
                        >
                    </li>

                    <li class="group relative mr-6 mb-1">
                        <div
                            class="absolute left-0 bottom-0 z-20 h-0 w-full opacity-75 transition-all group-hover:h-2 group-hover:bg-yellow"
                        ></div>
                        <a
                            href="/contact"
                            class="relative z-30 block px-2 font-body text-lg font-medium text-primary transition-colors group-hover:text-green dark:text-white dark:group-hover:text-secondary"
                        >Contact</a
                        >
                    </li>

                    <li>
                        <i
                            class="bx cursor-pointer text-3xl text-primary dark:text-white"
                            @click="themeSwitch()"
                            :class="isDarkMode ? 'bxs-sun' : 'bxs-moon'"
                        ></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div
        class="pointer-events-none fixed inset-0 z-50 flex bg-black bg-opacity-80 opacity-0 transition-opacity lg:hidden"
        :class="isMobileMenuOpen ? 'opacity-100 pointer-events-auto' : ''"
    >
        <div class="ml-auto w-2/3 bg-green p-4 md:w-1/3">
            <i
                class="bx bx-x absolute top-0 right-0 mt-4 mr-4 text-4xl text-white"
                @click="isMobileMenuOpen = false"
            ></i>
            <ul class="mt-8 flex flex-col">

                <li class="">
                    <a
                        href="/"
                        class="mb-3 block px-2 font-body text-lg font-medium text-white"
                    >Intro</a
                    >
                </li>

                <li class="">
                    <a
                        href="/blog"
                        class="mb-3 block px-2 font-body text-lg font-medium text-white"
                    >Blog</a
                    >
                </li>

                <li class="">
                    <a
                        href="/uses"
                        class="mb-3 block px-2 font-body text-lg font-medium text-white"
                    >Uses</a
                    >
                </li>

                <li class="">
                    <a
                        href="/contact"
                        class="mb-3 block px-2 font-body text-lg font-medium text-white"
                    >Contact</a
                    >
                </li>

            </ul>
        </div>
    </div>


    <div>
        <div class="container mx-auto">
            @yield('body')
        </div>
    </div>

    <div class="container mx-auto">
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

                <a href="https://twitter.com/smr_seddighy" target="_blank">
                    <i
                        class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-twitter"
                    ></i>
                </a>
                <a href="https://instagram.com/ariaieboy" target="_blank">
                    <i
                        class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-instagram"
                    ></i>
                </a>
                <a href="https://t.me/ariaieboy" target="_blank">
                    <i
                        class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-telegram"
                    ></i>
                </a>
                <a href="/blog/feed.atom" target="_blank">
                    <i
                            class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bx-rss"
                    ></i>
                </a>
            </div>
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
    (function() {
        var u="//stats.rakolo.com/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '2']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<!-- End Matomo Code -->
@stack('scripts')
</body>
</html>
