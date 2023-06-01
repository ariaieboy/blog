---
extends: _layouts.post
section: content
title: "Code-splitting and Lazy-loading Alpine Components using Async Alpine"
date: 2023-06-02
description: "Code-splitting and Lazy-loading Alpine Components using Async Alpine"
categories: [tools]
---

Code-splitting and Lazy-loading Alpine Components using Async Alpine

With AlpineJs, you can create components in two ways: using inline HTML markup or the `Alpine.data()` function to define a component globally and use it throughout the entire project.

Each approach has its pros and cons. For example, It is not possible to cache the inline components. And are only reusable if you use your template engine to create reusable components. The benefit of this approach is that you don't need a build step; you can add the AlpineJS to your HTML markup using CDN and start building your application.

On the other hand, using `Alpine.data()` to declare the components, you can reuse them and cache them like other static files. This option has some downsides too.
You must set up a bundler like Vite or Webpack to bundle the codes. And if you have a big project, your bundled file size can grow over time.

To fix these issues, you can use Async Alpine to split your components into individual files and load them only when needed.

## Installation
You can use Async Alpine using CDN or npm:

```HTML
<script defer src="https://cdn.jsdelivr.net/npm/async-alpine@1.x.x/dist/async-alpine.script.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

When you want to use CDN, you must load Async Alpine before loading the Alpine itself.

Install from npm with:

```bash
npm install async-alpine
```
Import it into your bundle alongside Alpine and run AsyncAlpine.init(Alpine) and AsyncAlpine.start() before Alpine.start():

```JS
import AsyncAlpine from 'async-alpine';
import Alpine from 'alpinejs';
AsyncAlpine.init(Alpine);
AsyncAlpine.start();
Alpine.start();
```

## Usage

To use Async Alpine, you must create your components in individual files using ES Module format like the code below:

```JS
// publicly available at `/assets/path-to-component.js`
export default function myComponent() {
  return {
    message: '',
    init() {
      this.message = 'my component has initialised!'
    }
  }
}
```

After creating components in separate files, you can load them using one of these four options depending on your environment:
URL Components — most straightforward implementation declaring component URLs in JS;
Data Components — for building tools with dynamic import/code-splitting like Vite, WebPack, Rollup, and Parcel;
Alias Loading — if your components are in a very consistent file-system structure;
Inline Components — you need to declare components in HTML to get the asset URL, for example, using an asset CDN or for Shopify sites.

After loading components, you can use them asynchronously by adding `x-ignore` and `ax-load` with your `x-data` attribute like the code below:

```HTML
<div
  x-ignore
  ax-load="visible"
  x-data="myComponent"
>
  <div x-text="message"></div>
</div>
```

## Loading Strategies

In the code above, you can see that we used a value in the `ax-load` attribute. You can change the loading strategy by setting these values in the `ax-load`

### Eager
It's the default behavior; if you do not provide any value, the component will load in this mode.
In eager mode, the component will start loading immediately on page load.
It will still load asynchronously in the background but with the highest priority possible.

This mode is useful when you want a component to be interactive as soon as possible.

### Idle
It uses requestIdleCallback, where it's supported to load when the main thread is less busy.
Components not critical to the initial load are bests for this scenario.

### Visible
It uses IntersectionObserver only to load when the component is in view, similar to lazy-loading images.

### Media
The component will be loaded when the provided media query is true.

### Event
The component will be loaded once it receives the async-alpine:load event on the window. Provide the id of the component in detail.id.

```HTML
<!-- on a button click using Alpine's $dispatch -->
<button x-data @click="$dispatch('async-alpine:load', { id: 'my-component-1' })">Load component</button>
<div
  id="my-component-1"
  x-ignore
  ax-load="event"
  x-data="componentName"
></div>

<!-- load our component after `another-library-init` has loaded -->
<script>
window.addEventListener('another-library-init', () => {
  window.dispatchEvent(new CustomEvent('async-alpine:load', {
    detail: {
      id: 'my-component-2'
    }
  }))
})
</script>
<div
  id="my-component-2"
  x-ignore
  ax-load="media (prefers-reduced-motion: no-preference)"
  x-data="componentName"
></div>
```

For more information and more detailed examples, you can check out the official document of Async Alpine [here](https://async-alpine.dev/docs/).

