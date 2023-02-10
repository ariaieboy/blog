---
title: Home
description: The Home page of my blog
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.main')

@section('body')
    <div id="main">
        <div>
            <div class="container mx-auto">
                <div class="border-b border-grey-lighter py-16 lg:py-20">
                    <div>
                        @include('_components.me')
                    </div>
                    <h1
                        class="pt-3 font-body text-4xl font-semibold text-primary dark:text-white md:text-5xl lg:text-6xl"
                    >
                        Hi, I’m AriaieBOY.
                    </h1>
                    <p class="pt-3 font-body text-xl font-light text-primary dark:text-white">
                        A Solo Web Developer that loves creating and sharing.
                    </p>
{{--                    <a--}}
{{--                            target="_blank"--}}
{{--                        href="https://t.me/ariaieboy"--}}
{{--                        class="mt-12 block bg-secondary px-10 py-4 text-center font-body text-xl font-semibold text-white transition-colors hover:bg-green sm:inline-block sm:text-left sm:text-2xl"--}}
{{--                    >--}}
{{--                        Say Hello!--}}
{{--                    </a>--}}
                </div>

                <div class="border-b border-grey-lighter py-16 lg:py-20">
                    <div class="flex items-center pb-6">
                        <img src="/assets/img/icon-story.png" alt="icon story"/>
                        <h3
                            class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white"
                        >
                            My Story
                        </h3>
                    </div>
                    <div>
                        <p class="font-body font-light text-primary dark:text-white">
                            I started my journey of the web-development with a simple blog
                            after that I came across WordPress and I started working with it
                            for some years suddenly I heard sth about a new framework for PHP
                            and that was Laravel since then I am in love with Laravel and the ecosystem around it.
                            <br/>
                            <br/>
                            I usually work alone on projects of my own. while doing this,
                            I try my best to contribute to the open-source projects that I use.
                            <br/>
                            Right now I spend most of my time on Rakolo an e-commerce website.
                            and my contributions to open-source projects are on
                            <a href="https://github.com/ariaieboy" class="text-blue underline">my GitHub page</a>.
                        </p>
                    </div>
                </div>

                <div class="py-16 lg:py-20">
                    <div class="flex items-center pb-6">
                        <img src="/assets/img/icon-post.png" alt="icon story"/>
                        <h3
                            class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white"
                        >
                            My Posts
                        </h3>
                        <a
                            href="/blog/2/"
                            class="flex items-center pl-10 font-body italic text-green transition-colors hover:text-secondary dark:text-green-light dark:hover:text-secondary"
                        >
                            More posts
                            <img
                                src="/assets/img/long-arrow-right.png"
                                class="ml-3"
                                alt="arrow right"
                            />
                        </a>
                    </div>
                    <div class="pt-8">
                        @foreach ($pagination->items as $post)
                            @include('_components.post-preview-inline')
                        @endforeach
                    </div>
                </div>

                <div class="pb-16 lg:pb-20">
                    <div class="flex items-center pb-6">
                        <img src="/assets/img/icon-project.png" alt="icon story"/>
                        <h3
                            class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white"
                        >
                            My Projects
                        </h3>
                    </div>
                    <div>

                        <a
                            href="https://rakolo.com"
                            target="_blank"
                            class="mb-6 flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6"
                        >
        <span class="w-9/10 pr-8">
          <h4
              class="font-body text-lg font-semibold text-primary dark:text-white"
          >
            Rakolo
          </h4>
          <p class="font-body font-light text-primary dark:text-white">
            An E-Commerce website written with TALL Stack.
          </p>
        </span>
                            <span class="w-1/10">
          <img src="/assets/img/chevron-right.png" class="mx-auto" alt="chevron right"/>
        </span>
                        </a>

                        <a
                                target="_blank"
                            href="https://donateon.ir"
                            class="mb-6 flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6"
                        >
        <span class="w-9/10 pr-8">
          <h4
              class="font-body text-lg font-semibold text-primary dark:text-white"
          >
            DonateOn
          </h4>
          <p class="font-body font-light text-primary dark:text-white">
            Donation system for iranian streamers.
          </p>
        </span>
                            <span class="w-1/10">
          <img src="/assets/img/chevron-right.png" class="mx-auto" alt="chevron right"/>
        </span>
                        </a>

                        <a
                            href="https://cnz.ir"
                            target="_blank"
                            class="mb-6 flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6"
                        >
        <span class="w-9/10 pr-8">
          <h4
              class="font-body text-lg font-semibold text-primary dark:text-white"
          >
            CnZ.ir (formally known as dir.bz)
          </h4>
          <p class="font-body font-light text-primary dark:text-white">
            A free link shortener website.
          </p>
        </span>
                            <span class="w-1/10">
          <img src="/assets/img/chevron-right.png" class="mx-auto" alt="chevron right"/>
        </span>
                        </a>

                        <a
                            href="https://github.com/ariaieboy"
                            target="_blank"
                            class="mb-6 flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6"
                        >
        <span class="w-9/10 pr-8">
          <h4
              class="font-body text-lg font-semibold text-primary dark:text-white"
          >
            Open-Source Contributions
          </h4>
          <p class="font-body font-light text-primary dark:text-white">
            Open-Source contributions mostly to the TALL-Stack projects.
          </p>
        </span>
                            <span class="w-1/10">
          <img src="/assets/img/chevron-right.png" class="mx-auto" alt="chevron right"/>
        </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>


    </div>
@stop
