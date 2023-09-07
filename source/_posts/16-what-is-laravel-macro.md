---
extends: _layouts.post
section: content
title: "What is a Laravel Macro, and how can you write an IDE Helper for a Macro?"
date: 2023-09-07
description: "What is a Laravel Macro, and how can you write an IDE Helper for a Macro?"
categories: [tips,tutorials]
---

## What is a Macro in Laravel?

Macro is a simple mechanism that lets you add extra functionality to the classes that use the Macroable trait.

For example, in my [filament-jalali-datetime](https://github.com/ariaieboy/filament-jalali-datetime) plugin for filament, I added a `jalaliDate` method to the filament `TextColumn` class using the code below:

```php
TextColumn::macro('jalaliDate', function (?string $format = null, ?string $timezone = null): static {
            $format ??= config('filament-jalali-datetime.date_format');

            $this->formatStateUsing(static function (Column $column, $state) use ($format, $timezone): ?string {
                /** @var TextColumn $column */

                if (blank($state)) {
                    return null;
                }

                return Jalalian::fromCarbon(Carbon::parse($state)
                    ->setTimezone($timezone ?? $column->getTimezone()))
                    ->format($format);
            });

            return $this;
        });

```

You can add new functionality to any class that uses the `Illuminate\Support\Traits\Macroable` trait.

It's valuable, especially when you want to add new functionality to the core components of the framework and share it as a package.

## The IDE-Helper

Laravel Macros are magical, and your IDE might not detect them correctly, so to have better IDE support, you must create some IDE helpers so the IDE can see your macros.

The simplest way I found is an `ide_helpers.stubs.php` on the root that contains the signature of your macros; for example, for my `jalaliDate` method, I created this file, and my IDE can detect this method without any problem:
```php
<?php

namespace Filament\Tables\Columns {
    class TextColumn
    {
        /**
         * @source packages/filament-jalali-datetime/src/FilamentJalaliDatetimeServiceProvider.php:28
         */
        public function jalaliDate(?string $format = null, ?string $timezone = null): self
        {
            return $this;
        }
}
```

There is also a package to create automatic IDE-Helpers for macros named [tutorigo/laravel-ide-macros](https://github.com/KristofMorva/laravel-ide-macros).

If you have any other option to create IDE-Helpers for Laravel macros, you can share it in the comments.
