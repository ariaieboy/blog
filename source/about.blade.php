---
title: About
description: A little bit about the site
---
@extends('_layouts.main')

@section('body')
    <div class="max-w-2xl min-w-2xl mx-auto p-4 pt-12 md:pt-24 prose prose-indigo">
        <h1 class="!mt-0">About</h1>

        <img src="/assets/img/about.png"
            alt="About image"
            class="flex rounded-full h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">

        <p class="mb-6">This is where you can give a little more information about yourself or site. If you'd like to change the structure of this page, you can find the file at <code>source/about.blade.php</code></p>

        <p class="mb-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum officia dolorem accusantium veniam quae, possimus, temporibus explicabo magni voluptas. fugit natus deserunt atque veniam possimus earum harum itaque est!</p>

        <p class="mb-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum officia dolorem accusantium veniam quae, possimus, temporibus explicabo magni voluptas. fugit natus deserunt atque veniam!</p>
    </div>
@endsection
