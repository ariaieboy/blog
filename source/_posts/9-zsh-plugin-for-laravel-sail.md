---
extends: _layouts.post
section: content
title: "ZSH Plugin for Laravel Sail"
date: 2023-05-19
description: "ZSH Plugin for Laravel Sail"
categories: [tools]
---

## What is Laravel Sail

Laravel Sail is a development environment that uses docker under the hood.
By using Laravel Sail, you can use the power of docker without knowing much about it.
It has pre-defined services for your applications, including a web server, database, Redis, etc.

Sail also provides a CLI tool that helps you to manage the services and run commands like artisan, composer, npm, etc.
For example, you can start the service containers using `./vendor/bin/sail up` or run artisan commands using `./vendor/bin/sail artisan`

## Laravel Sail ZSH Plugin features

As you can see from the examples above, you need to use the sail binary file path to run these commands.

I've created a plugin for ZSH with lots of aliases, so you can use Laravel Sail with shorter commands.

For example, you can start the service containers using the `sup` alias or run composer commands using the `sc` alias instead of `./vendor/bin/sail composer`

Aside from simple aliases, the plugin also lets you use these aliases in any project sub-directories without you needing to provide the path to sail binary.

It also provides some basic autocompletion for the commands.

Another feature that makes this plugin much more helpful than a simple set of aliases is that you can install composer and npm dependencies using `s cinit` and `ninit` commands.

## How to install this plugin

Run this command in your terminal and clone the source code to your ohmyzsh plugin directory.

```bash
 git clone --depth=1 https://github.com/ariaieboy/laravel-sail ${ZSH_CUSTOM:-~/.oh-my-zsh/custom}/plugins/laravel-sail
```
Then open the `~/.zshrc` file in the editor of your choice and add `laravel-sail` to your ohmyzsh plugins list.

You can see the list of all aliases in the link below:

[Laravel Sail ZSH Plugin](https://github.com/ariaieboy/laravel-sail/blob/main/README.md)
