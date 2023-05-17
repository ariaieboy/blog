---
extends: _layouts.post
section: content
title: "Free Performance + Extra features for Laravel using Octane and Swoole"
date: 2023-05-26
description: "Free Performance + Extra features for Laravel using Octane and Swoole"
categories: [tools]
---

## How Laravel Octane Boosts Performance?

As you know, in traditional Laravel applications, the PHP process will run the application from the ground up with each request, and the PHP process can only handle one request at a time.

But in Laravel Octane, the application will bootstrap once at the first request to the ram. After that, every request that hits the server will serve using the bootstrapped application in the ram instead of running the application from the ground up.

Another feature is that Laravel Octane can run multiple workers at once, so instead of handling one request at a time, it can take multiple requests at once.

## How much faster is Octane?

A quick search in the internet you can find lots of benchmarks on the internet, but for a quick comparison, I  tested my website using both Laravel Octane (swoole) and nginx + PHP-fpm with default settings and did a benchmark using this command:
`ab -t 10 -c http://localhost`

And here is the result:

`nginx`
![nginx php fpm](/assets/img/posts/10/php-fpm.png)
`octane`
![laravel octane swoole](/assets/img/posts/10/swoole-octane.png)

As you can see in the results above, it's about 25% faster than nginx-fpm.

Based on the configurations, it can perform much faster with fewer resources, but 25-30% boosts are a lot.

Boosting Performance is one of many things that Laravel Octane can do.

Laravel Octane under the hood uses some drivers to run the workers and bootstrap the application to the ram, including swoole, openswoole, and Roadrunner.

If you use swoole as the driver, you can access some cool extra features that can be useful depending on your application.

### Concurrent Tasks

You can run operations concurrently using swoole task workers:
```php
[$users, $servers] = Octane::concurrently([
 fn () => User::all(),
 fn () => Server::all(),
]);
```
All the functions above will run in parallel using swoole task workers. Isn't that awesome?

### The Octane Cache

Octane using Swoole Table provides a cache driver that can handle up to 2 million reads and write operations per second.

You can also interact directly with Swoole Table using these codes:
```php
Octane::table('example')->set('uuid', [
 'name' => 'Nuno Maduro',
 'votes' => 1000,
]);

return Octane::table('example')->get('uuid');
```

## Ticks & Intervals

Using Octane with Swoole allows you to execute callables every specified second.

For example, the code below will run each 20 seconds after the application startup:
```php
Octane::tick('simple-ticker', fn () => ray('Ticking...'))
 ->seconds(20);
```

## How can you use Laravel Octane?

There is a good installation tutorial in the Laravel doc itself [here](https://laravel.com/docs/10.x/octane#installation)

You need to install the drivers on your server first. For example, for installing swoole, you can use pecl:
`pecl install swoole`

After that, you need to install the laravel Octane itself using the code below:

`composer require laravel/octane`

Then you need to run this command:

`php artisan octane:install`

And at the end, for serving your application, you can use this artisan command:

`php artisan octane:start`

## But can I use Octane on all Laravel applications?

The quick answer is Yes and also No!

You can use Octane on all Laravel applications, but since it handles requests differently, you must check that your application is compatible with Octane.

For example, your application's service providers `register` and `boot` methods will only be executed once when the request worker initially boots.

Because of that, You should double-check the injections in your `boot` and `register` methods.

You can read about the [Dependency Injection & Octane](https://laravel.com/docs/10.x/octane#dependency-injection-and-octane) in the Laravel Doc.

If you use Larastan, there is a rule that you can use to check Octane Compatibility. You can enable this rule by setting this parameter in your `phpstan.neon` file:

```
parameters:
    checkOctaneCompatibility: true
```

But don't be afraid of compatibility problems and memory leaks. After using Octane for almost two years, I only encounter one memory leak in `barryvdh/laravel-debugbar`.

Since You only use the debug bar in the development environment, it might not be a big deal. Still, I replaced it with `itsgoingd/clockwork`, and I can tell you it's as good as the laravel debug bar, and it supports Octane without any memory leak or compatibility problem.
