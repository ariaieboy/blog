---
title: About
description: A little bit about the site
---
@extends('_layouts.main')

@section('body')
    <div class="max-w-2xl mx-auto p-4 pt-12 md:pt-24">
        <svg class="w-10 h-10 fill-current text-primary mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 128c39.77 0 72 32.24 72 72S295.8 272 256 272c-39.76 0-72-32.24-72-72S216.2 128 256 128zM384 405.7c-32.4 30.89-78.26 50.29-128 50.29s-95.6-19.4-128-50.29v-5.422c0-35.94 29.12-65.07 65.07-65.07h125.9c35.95 0 65.07 29.13 65.07 65.07V405.7z"/>
        </svg>
        <h1 class="text-3xl font-bold mb-1">About</h1>
        <p class="text-base opacity-80 mb-8">Hi, I'm Seyyed Mohammad Reza Seddighi — known as <strong>AriaieBOY</strong>.</p>

        <div class="space-y-4 text-sm leading-relaxed opacity-90">
            <p>I'm a self-employed full-stack web developer based in <strong>Mashhad, Iran</strong>. By day I work on <a href="https://rakolo.com" target="_blank" class="link">Rakolo</a>, an e-commerce platform I built, and by night I contribute to open-source and build side projects.</p>

            <p>I specialize in the <strong>TALL stack</strong> (Tailwind CSS, Alpine.js, Laravel, Livewire) and the <strong>FilamentPHP</strong> ecosystem. I'm the creator of packages like <a href="https://github.com/ariaieboy/filament-currency" target="_blank" class="link">Filament Currency</a>, <a href="https://github.com/ariaieboy/filament-jalali" target="_blank" class="link">Filament Jalali</a>, and a <a href="https://github.com/ariaieboy/laravel-sail" target="_blank" class="link">Zsh plugin for Laravel Sail</a>. I'm also a contributor to projects like Laravel-Lang.</p>

            <p>Beyond Rakolo, I've built <strong>DonateOn</strong> (a donation system for Iranian streamers) and <strong>CnZ.ir</strong> (a link shortener). I write about Laravel, Docker, DevOps, and tools I use on this blog.</p>

            <p>I maintain a modern PHP stack: Laravel, PestPHP, Larastan, Swoole/Octane, PostgreSQL/MySQL/Redis, all running on Docker with CapRover, on Ubuntu — and I do it all from <strong>PhpStorm</strong> on Windows via WSL2.</p>
        </div>

        <div class="flex flex-wrap gap-3 mt-8 pt-8 border-t border-base-300">
            <a href="https://github.com/ariaieboy" target="_blank" rel="noopener noreferrer" class="btn btn-outline">GitHub</a>
            <a href="https://x.com/ariaieboy_ir" target="_blank" rel="noopener noreferrer" class="btn btn-outline">X (Twitter)</a>
            <a href="https://bsky.app/profile/ariaieboy.ir" target="_blank" rel="noopener noreferrer" class="btn btn-outline">Bluesky</a>
            <a href="/uses" class="btn btn-outline">/uses</a>
            <a href="/contact" class="btn btn-outline">Contact</a>
        </div>
    </div>
@endsection
