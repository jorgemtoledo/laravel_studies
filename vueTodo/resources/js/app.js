// load all dependencies
import axios from 'axios';
import Datepicker from 'vuejs-datepicker';
window.Vue = require('vue');
window.axios = axios;
// load all components
Vue.component('task-list', require('./components/Task-list.vue'));
// define new Vue instances
const app = new Vue({
    el: '#app'
});
const date_picker = new Vue({
    el: '#date_picker',
    components: {
        Datepicker
    },
    data: {
        date: new Date()
    }
});