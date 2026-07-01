import sharp from 'sharp';
import { readFileSync, statSync } from 'fs';
import { readdir, stat, unlink } from 'fs/promises';
import { extname, join, relative, parse } from 'path';

const ROOT = new URL('..', import.meta.url).pathname;
const SRC_IMG = join(ROOT, 'source', 'assets', 'img');
const EXTENSIONS = new Set(['.png', '.jpg', '.jpeg']);
const QUALITY = 82;

async function* walk(dir) {
  const entries = await readdir(dir, { withFileTypes: true });
  for (const entry of entries) {
    const path = join(dir, entry.name);
    if (entry.isDirectory()) yield* walk(path);
    else yield path;
  }
}

const results = { converted: 0, skipped: 0, bytesSaved: 0 };

for await (const file of walk(SRC_IMG)) {
  const ext = extname(file).toLowerCase();
  if (!EXTENSIONS.has(ext)) continue;

  const webpPath = file.replace(/\.[^.]+$/, '.webp');
  const origSize = (await stat(file)).size;

  // If WebP already exists and is newer, skip
  try {
    const webpStat = await stat(webpPath);
    const origStat = await stat(file);
    if (webpStat.mtimeMs > origStat.mtimeMs) {
      // WebP is up to date
      results.skipped++;
      continue;
    }
  } catch { /* doesn't exist → convert */ }

  const img = sharp(file);
  const meta = await img.metadata();

  // Don't upscale — keep original dimensions
  const resizeOpts = {};
  if (meta.width && meta.width > 2000) resizeOpts.width = 2000;

  await img
    .resize(resizeOpts)
    .webp({ quality: QUALITY, effort: 4 })
    .toFile(webpPath);

  const webpSize = (await stat(webpPath)).size;

  // If WebP is bigger, delete it and skip (rare for quality=82)
  if (webpSize >= origSize) {
    await unlink(webpPath);
    results.skipped++;
    continue;
  }

  const saved = origSize - webpSize;
  results.bytesSaved += saved;
  results.converted++;

  const rel = relative(ROOT, file);
  console.log(`  ✓ ${rel}  ${(origSize/1024).toFixed(0)}KB → ${(webpSize/1024).toFixed(0)}KB  (${(saved/origSize*100).toFixed(0)}%)`);
}

const totalKB = (results.bytesSaved / 1024).toFixed(0);
console.log(`\nDone: ${results.converted} converted, ${results.skipped} skipped, ${totalKB}KB saved`);
