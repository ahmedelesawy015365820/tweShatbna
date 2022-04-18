import {createRouter, createWebHistory} from 'vue-router';
import i18n from '../lang/web';

import Index from '../view/web/index.vue';
import successPartner from '../view/web/successPartner.vue';
import design from '../view/web/design.vue';
import company from '../view/web/company.vue';
import registerPartiner from '../view/web/registerPartiner.vue';
import page404 from '../view/web/404.vue';
import loginPartiner from '../view/web/loginPartiner.vue';
import middlewarePipeline from "./middlewarePipeline";
import store from "../store/web";
import lang from "../middleware/web/lang";
import guest from "../middleware/web/guest";
import auth from "../middleware/web/auth";
import advertise from "./webRoute/advertise";


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
                path: 'register',
                name: 'registerPartiner',
                component: registerPartiner,
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
                path: 'success-partners',
                name: 'partners',
                component: successPartner,
                meta: {
                    middleware: [auth]
                },
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
                    {
                        path: 'design',
                        name: 'design',
                        component: design,
                    },
                    {
                        path: 'company',
                        name: 'company',
                        component: company
                    },
                    ...advertise
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
    routes
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
