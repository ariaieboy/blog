---
extends: _layouts.post
section: content
title: Translate Your Laravel Application to 78 Languages
date: 2023-02-28
description: Translate Your Laravel Application to 78 Languages
categories: [tools]
---

Laravel has localization tools that help you translate your applications into any language you want.
But by default, all the Laravel Lang files include the English language. And if your application needs other languages you must create and manage lang files for each language by yourself.

Right now that I am writing this article we have more than 1400 keys for each language in the Laravel-Lang package that includes Laravel and its first-party packages.

You can translate Laravel and its packages like Jetstream, Fortify, Cashier, etc into 78 Languages.

All you need to do is to install Laravel-lang/common packages using the command below:

```bash
composer require laravel-lang/common --dev
```

After that you can add any languages you want using the command below:

```bash
php artisan lang:add en de ro zh_CN lv
```

Laravel often introduces new localization keys to the lang files and the community might update the translations in the future you can update the added languages using the command below:
```bash
php artisan lang:update
```

You can translate missing keys or improve the translations and create a PR on the [Laravel-Lang/lang](https://github.com/Laravel-Lang/lang)  and help improve this package.