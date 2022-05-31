require('./bootstrap');

import { createApp } from 'vue';
import  router  from './router/webRoute';
import i18n from './lang/web';
import App from "./App.vue";
import store from './store/web';
import mitt from 'mitt';
import VueSocialauth from 'vue-social-auth'


const emitter = mitt();

const web = createApp(App);

web.provide('emitter', emitter);
//start web component global
import header from './components/web/general/header';
import footer from './components/web/general/footer';
import loader from './components/loader';
import loader2 from './components/loader2';
import LaravelVuePagination from 'laravel-vue-pagination';

web.component('layout-header', header);
web.component('layout-footer', footer);
web.component('loader', loader);
web.component('loader2', loader2);
web.component('Pagination', LaravelVuePagination);

// web.use(VueSocialauth,{
//     providers: {
//         google: {
//             clientId: '953215675652-2e1do520dv7ogoq5haod1l0p0h2gjmt6.apps.googleusercontent.com',
//             client_secret: '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',
//             redirectUri: 'register/google/callback' // Your client app URL
//         }
//     }
// });


//end web component global

web.use(i18n).use(store).use(router).mount('#app');

// set lang
if(!localStorage.getItem("langWeb")){
    localStorage.setItem('langWeb','ar');
}
import'./assets/web/custom-en.css';
import './assets/web/custom.css';

let tagHtml = document.querySelector('html'),
    styleLink = document.getElementById('style_web');

if(localStorage.getItem("langWeb") == 'ar'){
    tagHtml.setAttribute('dir', 'rtl');
    styleLink.setAttribute('href', 'https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css');
    import('./assets/web/custom.css');
}else{
    tagHtml.setAttribute('dir', 'ltr');
    styleLink.setAttribute('href','');
}


