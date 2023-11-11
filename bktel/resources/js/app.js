/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import axios from 'axios';	window.axios = require('axios');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('form_student-component', require('./components/FormStudentComponent.vue').default);
Vue.component('form_teacher-component',require('./components/FormTeacherComponent.vue').default);
Vue.component('import_teacher-component',require('./components/ImportTeacherComponent.vue').default);
Vue.component('import_student-component',require('./components/ImportStudentComponent.vue').default);
Vue.component('form_subject-component',require('./components/FormSubjectComponent.vue').default);
Vue.component('import_subject-component',require('./components/ImportSubjectComponent.vue').default);
Vue.component('teacher_to_subject-component',require('./components/TeacherToSubjectComponent.vue').default);
Vue.component('search_teacher-to_subject-component',require('./components/SearchTeacherToSubjectComponent.vue').default);

Vue.component(
    "Sliderbar",
    require("./components/SliderBarComponent.vue").default
);
Vue.component(
    "Navvv",
    require("./components/NavBarComponent.vue").default
);
Vue.component(
    "Container",
    require("./components/ContainerComponent.vue").default
);
Vue.component(
    "Attheend",
    require("./components/FooterComponent.vue").default
);


// Vue.component(
//     "admin-form-component",
//     require("./components/AdminComponent.vue").default
// );
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
