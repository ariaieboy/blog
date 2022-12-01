---
title: Uses
description: A collection of most of the tools I use every day.
---
@extends('_layouts.main')

@section('body')
    <div>
        <img src="/assets/img/icon-uses.png" alt="icon uses"/>
    </div>
    <h1
            class="pt-5 font-body text-4xl font-semibold text-primary dark:text-white md:text-5xl lg:text-6xl"
    >
        /uses
    </h1>
    <div class="pr-2 pt-3">
      <span class="font-body text-xl font-light text-primary dark:text-white">
        Inspired by
        <a
                href="https://uses.tech/"
                target="_blank"
                class="border-b border-green"
        >
          <span
                  class="font-medium text-green hover:text-secondary dark:text-green-light dark:hover:text-secondary"
          >Wes Bos</span
          >
          and his project,
          <span
                  class="font-medium text-green hover:text-secondary dark:text-green-light dark:hover:text-secondary"
          >uses.tech</span
          >.
        </a>
      </span>
    </div>

    <div class="pt-16 lg:pt-20 prose dark:prose-dark">
        @include("_components.techs")
    </div>
@stop
