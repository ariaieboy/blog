import { readFileSync, writeFileSync } from 'fs';
import { readdir, stat, readFile, writeFile } from 'fs/promises';
import { extname, join } from 'path';

const ROOT = new URL('..', import.meta.url).pathname;
const BUILD = join(ROOT, 'build_production');

// Collect all .webp files available in the build
const webpFiles = new Set();

async function* walk(dir) {
  const entries = await readdir(dir, { withFileTypes: true });
  for (const entry of entries) {
    const path = join(dir, entry.name);
    if (entry.isDirectory()) yield* walk(path);
    else yield path;
  }
}

for await (const file of walk(BUILD)) {
  if (file.endsWith('.webp')) {
    // Store relative path from build root, without extension
    const rel = file.replace(BUILD, '').replace(/\.webp$/, '');
    webpFiles.add(rel);
  }
}

// Now walk all HTML files and replace <img src="x.png"> / <img src="x.jpg">
// with <picture><source srcset="x.webp" type="image/webp"><img src="x.png"></picture>
// when a .webp version exists.

const EXTENSIONS = /\.(png|jpe?g)($|\?)/;
let replaced = 0;

for await (const file of walk(BUILD)) {
  if (!file.endsWith('.html')) continue;

  let html = await readFile(file, 'utf-8');
  let modified = false;

  // Match <img tags and look for src= that points to a convertible image
  html = html.replace(/(<img[^>]*\s+src=")([^"]+\.(png|jpe?g))("[^>]*\/?>)/gi, (match, before, src, ext, after) => {
    // Remove query params for the check
    const cleanPath = src.replace(/\?.*$/, '');
    // Check if .webp version exists
    const webpKey = cleanPath.replace(/\.\w+$/, '');
    if (webpFiles.has(webpKey)) {
      modified = true;
      // Wrap in <picture> with <source> for WebP
      return `<picture><source srcset="${cleanPath.replace(/\.\w+$/, '.webp')}" type="image/webp">${before}${src}${after}</picture>`;
    }
    return match;
  });

  if (modified) {
    // Clean up double-wrapped <picture> from any already-wrapped images
    html = html.replace(/<picture>\s*<picture>/g, '<picture>');
    html = html.replace(/<\/picture>\s*<\/picture>/g, '</picture>');

    await writeFile(file, html);
    replaced++;
  }
}

console.log(`HTML post-process: wrapped ${replaced} images with <picture><source webp>`);
