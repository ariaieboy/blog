---
extends: _layouts.post
section: content
title: CapRover - Easy and Free Self-Hosted PaaS!
date: 2023-02-10
description: CapRover is an Easy, Free, Open Source, Self-Hosted PaaS!
categories: [tools]
---

## What Is Caprover ?
If you managed a server on your own you know that configuring everything correctly is a very hard job to do.
Handling Nginx configuration, issuing SSL Certifications securing the services, etc.
Now imagine if you want to run more than a service on a server or you want to load balance your incoming requests between multiple servers and spin up more than one instance of a service on your servers. That's a hard job, right?
Not with Caprover, You can manage multiple services like your NodeJS, Python, PHP, ASP.NET, and Ruby Apps or your Databases like MySQL, MongoDB, Postgres, etc. on a single server or a cluster of servers.
It will load balance your app using a customizable Nginx proxy server and it can create free SSL certifications using Let's Encrypt.
CapRover Has a nice WEB GUI that helps you manage your services. you can also manage your services using the CLI of the CapRover.
Another awesome feature of CapRover is the rollback feature if you shipped a bad version on production you can easily roll back to any version of your APP with a single click.

## But How It Is Working?
Under the hood, CapRover uses Docker to containerize your applications. An Nginx Reverse Proxy will manage your load balancing, the Reverse Proxy will also route the incoming requests to the specified services in your server(s).
And for clustering, Caprover uses Docker Swarm.
In the picture below you can see how CapRover works:
![CapRover Architecture](/assets/img/posts/6/img.png)

## Is It Safe?
Caprover is an open-source project and you can check both the backend and frontend codes of it in their GitHub organization.
Since CapRover only uses docker in the background you can remove CapRover from your server any time you wanted to and your apps will continue working without any problem.

## But I Didn't Work With Docker Before
CapRover has lots of one-click apps which means you can deploy lots of popular projects with a single click.
For example, you can deploy MySql, PostgreSQL, MariaDB, Redis, WordPress, Minio, etc.
You can find the full list of the apps here https://github.com/caprover/one-click-apps/tree/master/public/v4/apps.
Besides one-click apps, there are some sample apps that you can use to practice or even deploy your application using these samples.
https://caprover.com/docs/sample-apps.html

### Last Word
CapRover might not be a good option for big teams and companies but it's a really good option for individuals or small to medium teams that want to reduce their costs and enjoy the power of Docker and Nginx without having to learn them or deal with their settings scripts to make things work!! 
