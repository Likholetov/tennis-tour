/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueI18n from "vue-i18n"; //needed for calendar locale

require("./bootstrap");

window.Vue = require("vue").default;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.use(VueI18n);

window.i18n = new VueI18n({
    locale: "ru",
});

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component(
    "players-component",
    require("./components/player/PlayersComponent.vue").default
);

Vue.component(
    "calendar-component",
    require("./components/Calendar.vue").default
);

Vue.component("my-select", require("./components/Select.vue").default);

Vue.component("news-form", require("./components/NewsForm.vue").default);

Vue.component(
    "tournament-component",
    require("./components/tournament/TournamentComponent.vue").default
);

Vue.component(
    "results-component",
    require("./components/tournament/ResultsComponent.vue").default
);

Vue.component(
    "groups-component",
    require("./components/tournament/GroupsComponent.vue").default
);

// Пагинация
Vue.component("pagination", require("laravel-vue-pagination"));

import vSelect from "vue-select";
Vue.component("v-select", vSelect);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    i18n,
});
