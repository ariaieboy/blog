window.axios = require('axios');
import Vue from 'vue';
import Search from './components/Search.vue';
import Alpine from 'alpinejs';

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

Vue.config.productionTip = false;

new Vue({
    components: {
        Search,
    },
}).$mount('#vue-search');