---
extends: _layouts.post
section: content
title: "How do I backup my websites, and why should I improve"
date: 2023-06-23
description: "How do I backup my websites, and why should I improve"
categories: [tools]
---

In the old days, I didn't have any backup plans, and the only time I needed my website backed up, I was lucky that my host provider had an automatic backup system. I could restore my website using those backups, but I lost a week of data because the hosting provider would back up the host weekly.

I do not use a shared host these days, and I manage my servers, so I need to back up my websites personally.

## How should I backup?

Determining which data requires backup and the frequency of changes is critical.

To determine the needed data, we can think that our server is gone, and we want to restore our website to its current state.

In my case, I need to know the services that my website needs, for example, the web server, application, database, object storage, and cache services.

Then I need to recreate these services using my website source code and run those on my new server.

After running the services, I first need to restore my databases. And if required, my object storage files.

## How am I backing up my websites

I back up my databases to another server at least once daily. And in some cases, multiple times a day based on the application traffic.

I back up my codebases on my local machine and the remote git repository hosted on GitHub or GitLab.

Since I use docker for development, All my websites have a docker-compose file that can recreate all required services for the website.

## What is missing?

The big missing part is the object storage part. I need to implement a way to automatically back up my files from my self-hosted object storage into another server.

I must implement the 3-2-1 strategy for all my backups.

I need to document the restoration process for each website.

Implement a way to verify the health of the backup files; the last thing I want is a corrupted backup file. 
