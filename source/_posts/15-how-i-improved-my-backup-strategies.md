---
extends: _layouts.post
section: content
title: "How I improved my backup strategies using TrueNAS Scale"
date: 2023-08-18
description: "How I improved my backup strategies using TrueNAS Scale"
categories: [backup,tools]
---

In my previous blog post [How do I backup my websites, and why should I improve](https://ariaieboy.ir/blog/12-how-do-i-backup-my-websites/), I described how I backup my websites.

In that article, I mentioned some problems with my backup plans. Since then I deployed a local NAS in my home using TrueNAS and improved my backup plans.


### Redaundent storage using Raid-1
The first improvement is my Raid-1 configuration for backup storage.
This means that in the event of one of my drives failing, I can restore my backed-up files from the other disk.

### Object storage backup
One missing part of my backup process was the object storage.
Thanks to TrueNAS, I can easily backup my object storage files using TrueNAS Data Protection Cloud Sync Task.
It will sync my object storage files with my Local NAS.

### Gickup for git backup
Another service that I run is Gickup, which backup all my remote git repositories to my local NAS.

### One last thing: Backup health check
Right now, I backup multiple things like my Databases, Object Storage, and git repositories.
I need to check the integrity of the backup files.
