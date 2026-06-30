---
extends: _layouts.post
section: content
title: How can you benefit from PestPHP in a PHPUnit codebase?
date: 2024-05-20
description: How can you benefit from PestPHP in a PHPUnit codebase?
categories: [tools]
---

In the PHP ecosystem, there are two well-known testing frameworks: PHPUnit and PestPHP.

PHPUnit is much older and considered the standard in the ecosystem; however, Pest is newer.

In the early days of Pest, the only thing Pest had to offer was the new syntax, that's not the case anymore.

Yes in my opinion the best thing about Pest is the new syntax it's cleaner and minimalistic But you might have decades of experience with PHPUnit and don't want to learn a new syntax. Here is the next good thing about Pest.

## PHPUnit integration
Since Pest uses PHPUnit under the hood you don't need to use the new syntax or rewrite all your tests using the new syntax. You can simply install Pest and use it to run your PHPUnit tests.

You might ask what is the benefit of using Pest instead of PHPUnit to run tests.

## Cleaner and better test reporting
Another improvement of Pest over PHPUnit is the cli printers. It's much cleaner and readable. and error reporting is cleaner too:

![failure output](/assets/img/posts/19/img.png)

here is the output of the `--coverage` option in CLI:
![coverage output](/assets/img/posts/19/img_1.png)


## Built-in Parallel testing
Pest lets you run your tests in parallel by passing the `--parallel` flag when you run your tests.

## Build-in Profiling
Another cool feature that Pest provides is profiling. You can find your slow tests by passing the `--profile` flag when you want to run your tests.

## Watch Plugin
Another cool feature that comes as a first-party plugin is the `--watch` command. By this command, Pest will automatically re-run your tests when it detects a new change in your codebase.


> You can use all these features without using the Pest syntax. If you accept to use the new syntax you can benefit even more.

## Architecture Testing
Using architecture testing you can enforce rules that make your project codebase clean and sustainable.
For example, with these simple tests, you can prevent any debugging code from reaching your production
```php
test('globals')
    ->expect(['dd', 'dump', 'var_dump'])
    ->not->toBeUsed();
```

There are lots of other cool stuff about Pest But it requires you to use the new syntax.
I know that change can be terrifying, but Pest is not that different from PHPUnit.It's just simpler and cleaner.
I wrote about it in [this](https://ariaieboy.ir/blog/enjoyable-php-testing-with-pestphp/) blog post.
