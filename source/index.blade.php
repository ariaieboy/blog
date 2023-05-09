---
title: Home
description: The Home page of my blog
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.main')

@section('body')
    <div>
        <div class="py-4 lg:py-8 flex flex-col md:flex-row gap-4 md:items-center">
            <div>
                @include('_components.me')
            </div>
<div>
    <h1
            class="pt-3 font-body text-4xl font-semibold md:text-5xl lg:text-6xl"
    >
        Hi, I’m AriaieBOY.
    </h1>
    <p class="pt-3 font-body text-xl font-normal">
        Self-Employed, Full-Stack web developer at Rakolo.com
    </p>
</div>
        </div>

        <div class="py-16 lg:py-20">
            <div class="flex items-center pb-6">
                <img src="/assets/img/icon-post.png" alt="icon story"/>
                <h3
                        class="ml-3 font-body text-2xl font-semibold"
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
@stop
