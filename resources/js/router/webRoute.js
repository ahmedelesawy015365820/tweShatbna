import {createRouter, createWebHistory} from 'vue-router';

import Index from '../view/web/index.vue';
import successPartner from '../view/web/successPartner.vue';
import registerPartiner from '../view/web/registerPartiner.vue';
import registerClient from '../view/web/registerClient.vue';
import browseProject from '../view/web/browse-project.vue';
import browseCompany from "../view/web/browse-company.vue";
import browseDetails from  "../view/web/browse-details.vue";
import browseDesgin from "../view/web/browse-design";
import page404 from '../view/web/404.vue';
import loginPartiner from '../view/web/loginPartiner.vue';
import privacy from '../view/web/privacy';
import forgetPassword from '../view/web/forgetPassword.vue';
import resetPassword from '../view/web/resetPassword.vue';
import middlewarePipeline from "./middlewarePipeline";
import store from "../store/web";
import lang from "../middleware/web/lang";
import guest from "../middleware/web/guest";
import auth from "../middleware/web/auth";
import advertise from "./webRoute/advertise";
import design from "./webRoute/design";
import company from "./webRoute/company";
import client from "./webRoute/client";



const routes = [
    {
    path: '/',
    redirect: `/${localStorage.getItem("langWeb") || 'ar'}`
    },
    {
        path: '/:lang',
        component: {
            template:'<router-view />',
        },
        meta: {
            middleware: [lang]
        },
        children:[
            {
                path: '',
                name: 'home',
                component: Index
            },
            {
                path: 'register-partiner',
                name: 'registerPartiner',
                component: registerPartiner,
                meta: {
                    middleware: [guest]
                }
            },
            {
                path: 'register',
                name: 'registerClient',
                component: registerClient,
                meta: {
                    middleware: [guest]
                }
            },
            {
                path: 'login',
                name: 'loginPartiner',
                component: loginPartiner,
                meta: {
                    middleware: [guest]
                }
            },
            {
                path: 'forget-password',
                name: 'forgetPassword',
                component: forgetPassword,
                meta: {
                    middleware: [guest]
                }
            },
            {
                path: 'reset-password',
                name: 'resetPassword',
                component: resetPassword,
                meta: {
                    middleware: [guest]
                }
            },
            {
                path: 'success-partners',
                name: 'partners',
                component: successPartner,
                meta: {
                    middleware: [guest]
                },
            },
            {
                path: 'browse-project',
                name: 'browse-project',
                component: browseProject,
            },
            {
                path: 'browse-details',
                name: 'browse-details',
                component: browseDetails,
            },
            {
                path: 'browse-company',
                name: 'browse-company',
                component: browseCompany,
            },
            {
                path: 'browse-desgin',
                name: 'browse-desgin',
                component: browseDesgin,
            },
            {
                path: 'privacy',
                name: 'privacy',
                component: privacy,
                meta: {
                    middleware: [guest]
                }
            },
            {
                path: 'p',
                name: 'partner',
                component:  {
                    template:'<router-view />',
                },
                meta: {
                    middleware: [auth]
                },
                children:[
                    ...design
                    ,
                    ...company
                    ,
                    ...advertise
                    ,
                    ...client
                ]
            },
        ]
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'error',
        component: page404
    },
];

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { top: 0, behavior: 'smooth' }

        }
    },
});

router.beforeEach((to, from, next) => {

    if (!to.meta.middleware) return next();
    const middleware = to.meta.middleware;
    const context = {
        to,
        from,
        next,
        store,
        router
    };
    return middleware[0]({
        ...context,
        next: middlewarePipeline(context, middleware, 1)
    });
});

export default router;
