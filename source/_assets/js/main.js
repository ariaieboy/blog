window.axios = require('axios');
import Vue from 'vue';
import Search from './components/Search.vue';
import hljs from 'highlight.js/lib/core';
import Alpine from 'alpinejs'

window.Alpine = Alpine;
Alpine.data('global', () => ({
    isMobileMenuOpen: false,
    isDarkMode: false,
    themeInit() {
        if (
            localStorage.theme === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            localStorage.theme = "dark";
            document.documentElement.classList.add("dark");
            this.isDarkMode = true;
        } else {
            localStorage.theme = "light";
            document.documentElement.classList.remove("dark");
            this.isDarkMode = false;
        }
    },
    themeSwitch() {
        if (localStorage.theme === "dark") {
            localStorage.theme = "light";
            document.documentElement.classList.remove("dark");
            this.isDarkMode = false;
        } else {
            localStorage.theme = "dark";
            document.documentElement.classList.add("dark");
            this.isDarkMode = true;
        }
    },
}))
Alpine.start();
// Syntax highlighting
hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'));
hljs.registerLanguage('css', require('highlight.js/lib/languages/css'));
hljs.registerLanguage('html', require('highlight.js/lib/languages/xml'));
hljs.registerLanguage('javascript', require('highlight.js/lib/languages/javascript'));
hljs.registerLanguage('json', require('highlight.js/lib/languages/json'));
hljs.registerLanguage('markdown', require('highlight.js/lib/languages/markdown'));
hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));
hljs.registerLanguage('scss', require('highlight.js/lib/languages/scss'));
hljs.registerLanguage('yaml', require('highlight.js/lib/languages/yaml'));

document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightBlock(block);
});

Vue.config.productionTip = false;

new Vue({
    components: {
        Search,
    },
}).$mount('#vue-search');