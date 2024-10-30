---
extends: _layouts.post
section: content
title: "How I improved my docker build GitHUB action speed by +2000% "
date: 2024-10-30
description: "How I improved my docker build GitHUB action speed by +2000% "
categories: [performance,tips]
---
Let me clarify that the 2000% speed boost I achieved was from a subsequent build of a Laravel app. You may not see the same improvement in every situation, but this enhancement significantly helped me.

I like to ship websites quickly. When I fix a bug or implement a feature, I push it to production immediately. If something goes wrong after all my tests and static analyzers pass, I either roll back to the previous version or deploy a hotfix right away.

My Docker build action originally took around 3 minutes to complete, and I had not taken the time to investigate ways to boost its speed until I saw the new GitHub Docker build summary.

Initially, my Docker build workflow utilized 0% of Docker's caching capability. I had over-engineered my Docker images with a multi-stage build, ensuring that each layer contained minimal changes, allowing Docker to cache my image layers easily.

### So, what was the problem? 🤔

The first issue was my inexperience. At the beginning of my docker file, I specified an `ARG` that sets my application version.
```
ARG APP_VERSION
ENV APP_VERSION=$APP_VERSION
```
The version changes with each build because of that docker wouldn't cache anything in my build. I just boosted my cache utilization to 26% by moving these 2 lines to the end of my dockerfile since I don't use this ARG in my build process and only use the environment variable in laravel to show the current online version.

### 26% was not enough
I managed to cut the build time to half by changing that 2 line but 26% cache hit with 1m20s was not enough for me I knew that I could boost the speed and cache hit even more. So I dig deeper.
The next thing that I changed was the front-end build stage.
As I mentioned above I was using a multi-stage build docker image to reduce the image file size and boost cache hits but I wasn't successful before these changes.
Here are my build stages:
```dockerfile
		FROM composer:2 AS back
		COPY . /var/www/html
		WORKDIR /var/www/html
		RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-reqs
		
		###step 2 frontend
		FROM node:22 AS front
		COPY . /var/www/html
		COPY --from=back /var/www/html/vendor /var/www/html/vendor
		WORKDIR /var/www/html
		RUN npm install && npm run build
```
The problem with that code is that it copies the whole project to install dependencies and run the npm build command. Because of that in each build, It installs dependencies even if the package.json is untouched.
So I fixed that issue by changing the front-end stage like this:
```dockerfile
		FROM node:22 AS front
		COPY package*.json .
		RUN npm install
		COPY . .
		COPY --from=back /var/www/html/vendor /var/www/html/vendor
		RUN npm run build
```
By separating the `npm install` and `npm run build` commands now docker can cache the first 2 layers if the package.json file is not changed.

### The last change that reduced the build time to 7 seconds
Every article you come across about Docker highlights the importance of the `.dockerignore` file. This file is essential for optimizing your builds and ensuring efficiency in your development process.
Since I use GitHub Actions to build my image, I initially thought it wasn't necessary to include a `.dockerignore` file. I already specified the files I wanted to ignore in my `.gitignore`, so those files were never pushed to the Git repository in the first place.
But I was wrong. By adding these files and folders to my `.dockerignore` file I managed to hit a higher cache ratio and reduce my subsequential build to 7 seconds:
```
.github
database/factories
database/fake
tests
.git
tmp
```
You must add a `.dockerignore` file according to your project structure and the technologies that you are using.
