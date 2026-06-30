---
extends: _layouts.post
section: content
title: Test Your Codebase Without Testing It Using Larastan
date: 2023-01-14
description: Larastan and PHPStan helps you test your code base without writing tests
categories: [tools]
---

**Larastan** is a wrapper around PHPStan for Laravel, and it let you test your source codes without writing any tests.

PHPStan is a static analyzer for PHP and it's working with legacy and modern codes.

Since lots of Laravel works magically PHPStan needs some justification to understand the magic behind Laravel it's when Larastan comes into place.

So if you have any PHP code base you can PHPStan and if you use Laravel you must go with Larastan. from here on I am gonna reference these tools as static analyzers.

## But how it's working
Static Analyzers scan your code base before you even run your code in development or in CI to prevent any obvious & tricky bugs to reach your production.

PHPStan has 9 levels of rule sets that you can use on your code base. for example, level 0 only checks for:
> basic checks, unknown classes, unknown functions, unknown methods called on $this, wrong number of arguments passed to those methods and functions, always undefined variables.

It's good practice to start using these tools with low levels and fix bugs and errors after you fixed all errors on that level you can bump your level up and try to make your code base more strict and bug-free.

For sure Static Analyzers are not going to test all possible outcomes of your code, but they can detect lots of annoying bugs and dead codes etc. and make your code base much cleaner and bug-free.
