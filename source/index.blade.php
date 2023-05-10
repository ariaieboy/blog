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

        <div class="py-4 lg:py-8">
            <div class="flex items-center pb-6">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-8 h-8 fill-current text-primary">
                    <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M168 80c-13.3 0-24 10.7-24 24V408c0 8.4-1.4 16.5-4.1 24H440c13.3 0 24-10.7 24-24V104c0-13.3-10.7-24-24-24H168zM72 480c-39.8 0-72-32.2-72-72V112C0 98.7 10.7 88 24 88s24 10.7 24 24V408c0 13.3 10.7 24 24 24s24-10.7 24-24V104c0-39.8 32.2-72 72-72H440c39.8 0 72 32.2 72 72V408c0 39.8-32.2 72-72 72H72zM176 136c0-13.3 10.7-24 24-24h96c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24H200c-13.3 0-24-10.7-24-24V136zm200-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
                </svg>
                <h3
                        class="ml-3 font-body text-2xl font-semibold"
                >
                    My Posts
                </h3>
                <a
                        href="/blog/2/"
                        class="flex gap-2 hover:text-primary items-center pl-10 font-bold italic link-hover link"
                >
                    More posts
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-auto fill-current">
                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
                    </svg>
                </a>
            </div>
            <div class="pt-8 flex flex-col gap-4">
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
