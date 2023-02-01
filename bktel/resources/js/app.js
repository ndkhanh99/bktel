/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./js/pages/dashboard3');
require('./js/pages/dashboard');
require('./js/pages/dashboard2');
require('./js/adminlte');
require('./js/demo');
require('./js/Chart');


window.Vue = require('vue').default;
import Vue from 'vue';
window.axios = require('axios');

 //this line is important to remove 'protocol' ERROR


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
Vue.component(
    "sidebar-component",
    require('./components/SidebarComponent.vue').default
);
Vue.component(
    "navbar-component",
    require("./components/navbarComponent.vue").default
);
Vue.component(
    "container-component",
    require("./components/ContainerComponent.vue").default
);

Vue.component(
    "footer-component",
    require("./components/FooterComponent.vue").default
);
Vue.component(
    "form_student-component",
    require("./components/FormStudentComponent.vue").default
);
Vue.component(
    "form_teacher-component",
    require("./components/FormTeacherComponent.vue").default
);
Vue.component(
    "up-image-component",
    require("./components/UpLoadImageComponent.vue").default
);
Vue.component(
    "sidebar-admin-component",
    require("./components/SidebarAdminComponent.vue").default
);
Vue.component(
    "import-teacher-component",
    require("./components/ImportTeacherComponent").default
);
Vue.component(
    "import-student-component",
    require("./components/ImportStudentComponent").default
);
Vue.component(
    "add-subject-component",
    require("./components/FormSubjectComponent").default
);

Vue.component(
    "import-subject-component",
    require("./components/ImportSubjectComponent").default
);
Vue.component(
    "enroll-teacher-subject-component",
    require("./components/TeacherToSubject.vue").default
);
Vue.component(
    "upload-report-component",
    require("./components/UploadReportComponent.vue").default
);
Vue.component(
    "side-bar-teacher-component",
    require("./components/SidebarTeacherComponent.vue").default
);
Vue.component(
    "submit-mark-component",
    require("./components/SubmitMarkComponent.vue").default
);

Vue.component(
    "export-component",
    require("./components/ExportComponent.vue").default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app'
});









