---
extends: _layouts.post
section: content
title: "Nala: modern front end for the apt package manager"
date: 2023-04-16
description: "Nala: modern front end for the apt package manager"
categories: [tools]
---

As someone that uses Laravel and PestPHP, I am used to the beautiful CLI outputs. Nala is like a skin for apt with human-friendly outputs.
For example, look at the picture below which one do you prefer?

![apt vs nala](/assets/img/posts/8/apt-v-nala.webp)

Besides the beautiful CLI outputs, Nala adds some nice to have features to the table.

The parallel download mode helps you to download lots of small and large packages faster than the default APT.

Another feature is `nala fetch` that test the latency of the available mirrors and then saves the 3 fastest mirrors and saves it in a file.

Another feature that I found out about Nala while I was writing this article is `nala history` it's like git but for the packages. It's save all installed removed or upgraded packages in var/lib/nala/history.json with a unique ID.
You can undo or redo changes using these IDs.
Nala is free and open-source and is written using Python.
If you use the latest version of Debian or Ubuntu you can install it as simply as an apt install:
```bash
sudo apt install Nala
```
Or you can check their wiki about other installation options:
[Installation Page](https://gitlab.com/volian/nala/-/wikis/Installation)
