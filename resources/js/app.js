/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('file-uploader', require('./components/FileUploader.vue').default);
Vue.component('manage-files', require('./components/ManageFiles.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// Do CDTS stuff
// TODO: language switching, move into a component or helper?
var defTop = document.getElementById("def-top");
var language = document.documentElement.lang;
var switchLanguage = language == 'en' ? 'fr' : 'en';

defTop.outerHTML = wet.builder.appTop({
    appName: [
      {
        href: "/",
        text: ('Canada Pension Plan Disability Benefit - Document Upload')
      }
    ],
    search: false,
    lngLinks: [
      {
        lang: switchLanguage,
        href: "?lang=" + switchLanguage,
        text: 'Français'
      }
    ],
    showPreContent: false,
    topSecMenu: false
});

var defPreFooter = document.getElementById("def-preFooter");
defPreFooter.outerHTML = wet.builder.preFooter({
    dateModified: "2019-07-08",
    versionIdentifier: "0.0.1",
    showPostContent: false
});
  
var defFooter = document.getElementById("def-footer");
defFooter.outerHTML = wet.builder.appFooter({

});
