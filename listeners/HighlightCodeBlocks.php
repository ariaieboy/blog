<?php

namespace App\Listeners;

use Tempest\Highlight\Highlighter;
use Tempest\Highlight\Themes\CssTheme;
use TightenCo\Jigsaw\Jigsaw;

class HighlightCodeBlocks
{
    public function handle(Jigsaw $jigsaw)
    {
        // Get the output directory
        $outputPath = $jigsaw->getDestinationPath();

        // Find all HTML files in the output directory
        $files = $this->getHtmlFiles($outputPath);

        $highlighter = new Highlighter(new CssTheme())->withGutter();

        foreach ($files as $file) {
            $content = file_get_contents($file);

            // Process code blocks with language specified
            $content = preg_replace_callback(
                '/<pre><code class="language-(\w+)">([^<]*)<\/code><\/pre>/s',
                function ($matches) use ($highlighter) {
                    $language = $matches[1];
                    $code = html_entity_decode($matches[2]);

                    try {
                        $highlighted = $highlighter->parse($code, strtolower($language));
                        return '<pre class="highlight"><code class="language-' . $language . '">' . $highlighted . '</code></pre>';
                    } catch (\Exception $e) {
                        // If highlighting fails, return the original
                        return $matches[0];
                    }
                },
                $content
            );

            // Also process generic code blocks without language
            $content = preg_replace_callback(
                '/<pre><code>([^<]*)<\/code><\/pre>/s',
                function ($matches) use ($highlighter) {
                    $code = html_entity_decode($matches[1]);

                    try {
                        // Default to plaintext for blocks without language
                        $highlighted = $highlighter->parse($code, 'txt');
                        return '<pre class="highlight"><code>' . $highlighted . '</code></pre>';
                    } catch (\Exception $e) {
                        return $matches[0];
                    }
                },
                $content
            );

            file_put_contents($file, $content);
        }
    }

    private function getHtmlFiles($path)
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'html') {
                $files[] = $file->getPathname();
            }
        }

        return $files;
    }
}
