require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('main-component', require('./App.vue').default);

const app = new Vue({
    el: '#app',
});
