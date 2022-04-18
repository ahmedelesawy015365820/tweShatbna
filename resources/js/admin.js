require('./bootstrap');

import { createApp } from 'vue';
import i18n from './lang/admin';
import store from './store/admin';
import router  from './router/adminRoute';
import Admin from "./Admin.vue";
import mitt from 'mitt';

const emitter = mitt();

const admin = createApp(Admin);

admin.provide('emitter', emitter);

import loader from './components/loader';
import LaravelVuePagination from 'laravel-vue-pagination';

admin.component('loader', loader);
admin.component('Pagination', LaravelVuePagination);

admin.use(i18n).use(store).use(router).mount('#admin');


// set lang
if(!localStorage.getItem("langAdmin")){
    localStorage.setItem('langAdmin','ar');
}

let tagHtml = document.querySelector('html'),
    styleLink = document.getElementById('style_link');


if(localStorage.getItem("langAdmin") == 'ar'){
    tagHtml.setAttribute('dir', 'rtl');
    styleLink.setAttribute('href', 'https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css');
}else{
    tagHtml.setAttribute('dir', 'ltr');
    styleLink.setAttribute('href','')
}

