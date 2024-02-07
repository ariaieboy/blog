/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        'source/_assets/*.{html,md,js,blade.php,vue}',
        'source/_categories/*.{html,md,js,blade.php,vue}',
        'source/_components/*.{html,md,js,blade.php,vue}',
        'source/_layouts/*.{html,md,js,blade.php,vue}',
        'source/_nav/*.{html,md,js,blade.php,vue}',
        'source/_posts/*.{html,md,js,blade.php,vue}',
        'source/404.blade.php',
        'source/about.blade.php',
        'source/blog.blade.php',
        'source/contact.blade.php',
        'source/index.blade.php',
        'source/uses.blade.php',
    ],
    theme: {
        screens: {
            'xs': '425px',
            ...defaultTheme.screens,
        },
        extend: {
            container: {
                screens: {
                    '2xl': '1440px'
                },
                padding: '1rem',
                center: true
            }
        },
    },
    daisyui: {
        themes: [{
            light: {
                ...require("daisyui/src/theming/themes")["light"],
                primary: "#156EF4",
            },
            dark: {
                ...require("daisyui/src/theming/themes")["dark"],
                primary: "#156EF4",
            },
        }]
    },
    plugins: [
        require("@tailwindcss/typography"),
        require("daisyui")
    ],
}

