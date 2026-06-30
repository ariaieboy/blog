---
extends: _layouts.post
section: content
title: Enjoyable PHP Testing with PestPHP
date: 2022-12-23
description: Enjoyable PHP Testing with PestPHP
categories: [tools]
---

Writing tests is time-consuming and tedious. But if you want close your eyes without fear at night, having good tests in your applications is essential.

With Pest, testing is much more enjoyable. It has a simpler syntax compared to PHPUnit. The test reports have more useful information in a beautiful style.

Pest is a progressive testing framework that uses PHPUnit at its core. That means you can both PHPUnit test classes and Pest test files in the same test suite.

You can also convert your PHPUnit test classes to Pest test files using these tools:
[Pest Convertor by Laravel-Shift](https://laravelshift.com/phpunit-to-pest-converter) (Each Shift Costs 9$)
[Pest Convertor by mandisma](https://github.com/mandisma/pest-converter) (Open-Source and free!)

Laravel Shift is a well-known Service, especially among Laravel Users. It can convert your PHPUnit tests for 9$.

The open-source option is not that popular but I've used it on a medium-sized project with hundreds of tests, and it's worked very well for me but it may need more work in big projects with complicated test suites.

At the end let's compare a test written in both PHPUnit and Pest:

PHPUnit:
```PHP
<?php
	 
	namespace Tests\Feature;
	 
	use Tests\TestCase;
	 
	class HomepageTest extends TestCase
	{
	 /** @test */
	 public function it_renders_the_homepage()
	 {
	 $response = $this->get('/');
	 
	 $response->assertStatus(200);
	 }
	 
	}
```

Pest:
```PHP
<?php
	 
	it('renders the homepage', function () {
	 $response = $this->get('/');
	 
	 $response->assertStatus(200);
	});
```

Beautiful version of this test using Pest:
```php
<?php

	it('renders the homepage')->get('/')->assertStatus(200);
```

Isn't the last example beautiful? We only wrote 1 line of code instead of 18 lines.

And that's why I love Pest that much. it's simple, minimal, and enjoyable to use.
