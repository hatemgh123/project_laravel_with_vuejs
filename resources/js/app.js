
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Event=new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('after-navbar', require('./components/after-navbar.vue'));
Vue.component('after-navbar-stud', require('./components/after-navbar-stud.vue'));
Vue.component('support-cours', require('./components/support-cours.vue'));
Vue.component('support-cours-etud', require('./components/support-cours-etud.vue'));
Vue.component('cours', require('./components/cours.vue'));
Vue.component('travaux', require('./components/travaux.vue'));
Vue.component('un-travaux', require('./components/un-travaux.vue'));
Vue.component('un-travaux-etud', require('./components/un-travaux-etud.vue'));
Vue.component('moncours', require('./components/moncours.vue'));
Vue.component('cours-etud', require('./components/cours-etud.vue'));
Vue.component('footers', require('./components/footer.vue'));
Vue.component('aucun-r', require('./components/aucun-r.vue'));


Vue.component('messagers-prof', require('./components/messagers-prof.vue'));
/* 
Vue.component('msg', require('./components/msg.vue')); */

const app = new Vue({
    el: '#app'
});
