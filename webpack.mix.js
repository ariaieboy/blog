const mix = require('laravel-mix');
require('laravel-mix-jigsaw');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');

mix.jigsaw()
    .js('source/_assets/js/main.js', 'js')
    .postCss('source/_assets/css/main.css', 'css/main.css', [
        require("tailwindcss/nesting"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .options({ processCssUrls: false })
    .browserSync({
        server: 'build_local',
        files: ['build_local/**'],
    })
    .sourceMaps()
    .version();
