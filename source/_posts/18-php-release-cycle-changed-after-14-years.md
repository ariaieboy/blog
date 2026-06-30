---
extends: _layouts.post
section: content
title: PHP Release Cycle changed after 14 years
date: 2024-05-14
description: PHP Release Cycle changed after 14 years
categories: [news]
---

The last time the PHP release cycle changed was in 2010 with the acceptance of [Release Process RFC](https://wiki.php.net/rfc/releaseprocess) after 14 years PHP accepted yet another RFC that changed the Release Cycle and the support policy for all active maintenance php versions including php >8.0

The biggest change is that each PHP version will get updates for 4 years instead of the previous 3 years of support.

Each PHP version including PHP >8.1 will receive 2 years of bug fixes and an additional 2 years of security fixes.

Another change is DisAllowing new features in release candidate and bug fix releases. Before this RFC “small self-contained feature” could get merged into the PHP language in a new bug fix release or release candidate but from now on after the beta 3 release new features can't get merged into the PHP.

The Release Cycle now bounds to the end of the year.
that means even if a PHP GA release shifts because of any problem the end of the bug fix releases and the security releases will be the Dec 31 and it's not dependant on the release date of the PHP.


There are more changes to the release cycle like "Allow features that do not require an RFC in the beta period", "Reduce the number of RCs to Four" and "Allowing recent regression fixes during security support".

You can read about these changes on the RFC page [here](https://wiki.php.net/rfc/release_cycle_update)