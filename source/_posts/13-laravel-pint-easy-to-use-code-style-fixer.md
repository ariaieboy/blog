---
extends: _layouts.post
section: content
title: "Laravel Pint: Easy-to-use Code Style Fixer For Artisans"
date: 2023-08-04
description: "Laravel Pint: Easy-to-use Code Style Fixer For Artisans"
categories: [tools]
---

For Laravel developers, having a standardized code style for each project is crucial.

It makes the code more readable and gives the entire project a uniform look.

However, adhering to these guidelines while focusing on writing code can be challenging.

Thankfully, code-style fixers like Prettier in the JS ecosystem and PHP-CS-Fixer in PHP exist to take care of this issue.

But installing and configuring these tools can pose a challenge.

That's where Laravel Pint comes in - it provides a pre-configured PHP-CS-Fixer for use in Laravel projects.

To install it, run the command `composer requires laravel/pint --dev` in your Laravel project.

Then, to fix your Laravel project file styles, run the `./vendor/bin/pint` command.

Laravel Pint is highly customizable, and you can configure it to suit your needs with a JSON config file.

It also uses pre-existing rules from PHP-CS-Fixer in your configuration, making it a more straightforward and uncomplicated option.

The default configuration works for most Laravel projects, making Laravel Pint a must-have code-style fixer for Laravel developers.
